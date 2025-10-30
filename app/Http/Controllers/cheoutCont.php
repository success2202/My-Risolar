<?php


namespace App\Http\Controllers;

use Carbon\Carbon;

use App\Models\CartItem;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Events\CartItemsEvent;
use App\Services\RegisterUser;
use App\Models\CountryCurrency;
use App\Models\ShippingAddress;
use Vinkla\Hashids\Facades\Hashids;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Http;
use App\Models\Order;


class CheoutCont extends Controller
{
     public function Index($cartSession = null)
    {
         // Redirect to login/registration if not logged in
    if (!Auth::check()) {
        $check = new RegisterUser;
        return $check->viewCheckout();
    }

    // Use current session ID if none passed
    if (!$cartSession) {
        $cartSession = session()->getId();
    }

    // Get cart contents
    $carts = Cart::content();

    // If no items, go back to cart page
    if (count($carts) <= 0) {
        return redirect()->route('users.index')->with('alert', 'error')
                         ->with('msg', 'Your cart is empty.');
    }

    // Get user info
    $userData = getUserLocationData();
    $currency = CountryCurrency::where('country', $userData['country'])->first();
    $address = ShippingAddress::where([
        'user_id' => auth_user()->id,
        'is_default' => 1
    ])->first();

    // Calculate shipping fee
    if ($currency) {
        if ($currency['country'] == "NG" && Str::contains(strtolower($address->address), 'lagos')) {
            $shipping_fee = '8000';
        } else {
            $shipping_fee = $currency['shipping_fee'];
        }
    } else {
        $shipping_fee = '6500';
    }

    // Generate order number
    $orderNo = rand(111111111, 999999999);

    // Require address before checkout
    if (!isset($address)) {
        return redirect()->route('users.account.address')
                         ->with('alert', 'error')
                         ->with('msg', 'Please add a shipping address before you can proceed');
    }

    // Log cart session in DB if not exists
    $cartDecoded = Hashids::connection('products')->decode($cartSession);
    $check = CartItem::where([
        'user_id' => auth_user()->id,
        'cartSession' => $cartDecoded[0] ?? null
    ])->first();

    if (!isset($check)) {
        event(new CartItemsEvent($carts, $orderNo, $cartSession));
    }

    $date['start'] = Carbon::now();
    $date['end'] = Carbon::now()->addDay(1);

    // Return checkout view
    return view('users.carts.checkout', $date)
        ->with('carts', $carts)
        ->with('address', $address)
        ->with('orderNo', $orderNo)
        ->with('shipping_fee', $shipping_fee);
     }



      public function indexx()
    {
        $address = ShippingAddress::where('user_id', Auth::id())->first();
        $shipping_fee = 2000;

        return view('checkout', [
            'address' => $address,
            'shipping_fee' => $shipping_fee,
        ]);
    }

    public function process(Request $request)
    {
        $cart = session('cart');
        if (!$cart || count($cart) === 0) {
            return response()->json(['status' => 'error', 'message' => 'Cart is empty']);
        }

        $shipping_fee = 2000;
        $totalCost = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);
        $grandTotal = $totalCost + $shipping_fee;

        // ✅ Card Payment (Paystack)
        if ($request->payment_method === 'credit') {
            $verify = Http::withToken(config('paystack.secretKey'))
                ->get("https://api.paystack.co/transaction/verify/{$request->reference}")
                ->json();

            if ($verify['status'] && $verify['data']['status'] === 'success') {
                $order = Order::create([
                    'user_id' => Auth::id(),
                    'items' => json_encode($cart),
                    'payment_method' => 'credit',
                    'total_amount' => $grandTotal,
                    'status' => 'paid',
                    'transaction_ref' => $request->reference, // 🔑 track transaction
                ]);

                Session::forget('cart');

                return response()->json([
                    'status' => 'success',
                    'redirect' => route('checkout.success')
                ]);
            }

            return response()->json(['status' => 'error', 'message' => 'Payment verification failed']);
        }

        // 🚚 Home Delivery
        if ($request->payment_method === 'delivery') {
            $order = Order::create([
                'user_id' => Auth::id(),
                'items' => json_encode($cart),
                'payment_method' => 'delivery',
                'total_amount' => $grandTotal,
                'status' => 'pending',
            ]);

            Session::forget('cart');

            return redirect()->route('orders.show', $order->id)
                ->with('success', 'Your order has been placed successfully!');
        }

        // 🏦 Bank Transfer
        $order = Order::create([
            'user_id' => Auth::id(),
            'items' => json_encode($cart),
            'payment_method' => 'bank',
            'total_amount' => $grandTotal,
            'status' => 'pending',
        ]);

        Session::forget('cart');

        return redirect()->route('checkout.success')->with('success', 'Your bank transfer order has been placed successfully!');
    }

    public function success()
    {
        return view('checkout-success');
    }
}

