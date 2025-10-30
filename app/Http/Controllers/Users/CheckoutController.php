<?php

namespace App\Http\Controllers\Users;

use Carbon\Carbon;
use App\Models\User;
use App\Mail\RegMail;
use App\Models\Order;
use App\Models\CartItem;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Events\CartItemsEvent;
use App\Services\RegisterUser;
use App\Models\CountryCurrency;
use App\Models\ShippingAddress;
use App\Models\ShipmentLocation;
use App\Traits\CalculateShipping;
use Vinkla\Hashids\Facades\Hashids;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Validator;
use Unicodeveloper\Paystack\Facades\Paystack;


class CheckoutController extends Controller
{
    use CalculateShipping;
 
    //

    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function Index($cartSession = null){
    if(!auth::check()){
            $check = new RegisterUser;
           return  $check->viewCheckout();
           
        }
        // if(count(Cart::content()) <= 0 || empty(Cart::content())){
        //     return redirect()->intended(route('users.index'));
        // }

         $cart = session()->get('cart', []); // get cart from session

    if (empty($cart)) {
        return redirect()->route('users.index')->with('error', 'Your cart is empty');
    }

    // return view('users.carts.checkout', compact('cart'));

        
        // $userData =   getUserLocationData();
        // dd($userData);

            // $country = $userData['country'] ?? null;

            
                $currency = CountryCurrency::where('currency', 'NGN')->first();
            //  dd($currency);

        

        $address = ShippingAddress::where('user_id', Auth::id())->first();

    // pick default if exists, else latest one
    $defaultAddressId = $address->where('is_default', true)->first()->id 
        ?? $address->last()->id 
        ?? null;
        
        // $address = ShippingAddress::where(['user_id' => auth_user()->id, 'is_default' =>1])->get();
     
            if(!$address){
                return view('users.accounts.address_create');
            }
        if($currency){
            if($currency['country'] == "NG" && Str::contains(strtolower($address->address), 'lagos')){
                $shipping_fee = '8000';
            }else{
                $shipping_fee = $currency['shipping_fee']; 
          }
        }else {
            $shipping_fee = '6500';
          }

      
        // $carts = Cart::content();
         $carts = session()->get('cart', []);
        $orderNo = rand(111111111,999999999);
//  dd($carts);
        if(!isset($address)){
            Session::flash('alert', 'error');
            Session::flash('msg', 'Please add a shipping address before you can proceed');
            return redirect()->intended(route('users.account.address'));
        }
    
       

        $cart = Hashids::connection('products')->decode($cartSession); 
        $check = CartItem::where(['user_id' => auth_user()->id, 'cartSession' => $cart[0]])->first();
        if(!isset($check) || empty($check)){
            event(new CartItemsEvent($carts, $orderNo, $cartSession));
        }
         $date['start'] = Carbon::now();
         $date['end'] = Carbon::now()->addDay(1);

        return view('users.carts.checkout', $date)
        ->with('carts', $carts)
        ->with('cart', $cart)
        ->with('address', $address)
        ->with('defaultAddressId', $defaultAddressId)
        ->with('orderNo', $orderNo)
        ->with('shipping_fee',  $shipping_fee);

          
    }


    public function process(Request $request)
    {
        $cart = session('cart');
        if (!$cart || count($cart) === 0) {
            return response()->json(['status' => 'error', 'message' => 'Cart is empty']);
        }
        // dd($cart);
    $request->validate([
        'address_id' => 'required|exists:shipping_addresses,id',
        'set_default' => 'nullable|boolean',
    ]);

    // if set as default, update others to false
    if ($request->has('set_default') && $request->set_default == 1) {
        ShippingAddress::where('user_id', Auth::id())->update(['is_default' => false]);
        ShippingAddress::where('id', $request->address_id)->update(['is_default' => true]);
    }


    //       $shippingAddress = ShippingAddress::where('id', $request->address_id)
    //                     ->where('user_id', Auth::id())
    //                     ->first();

    // if (!$shippingAddress) {
    //     return response()->json(['status' => 'error', 'message' => 'Invalid shipping address']);
    // }
 $shipping_fee = 8000;
    $totalCost = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);
    $grandTotal = $totalCost + $shipping_fee;

    // ✅ Generate a unique order number
    $orderNo = 'ORD-' . strtoupper(uniqid());
    $address_id = rand(111111111,999999999);

        // 🚚 Home Delivery
        if ($request->payment_method === 'delivery') {
        // 1. Save order
        Order::create([
            'user_id'        => Auth::id(),
            'order_no'       => $orderNo,
            'cart_items'     => json_encode($cart),
            'payment_method' => 'delivery',
            'payable'        => $grandTotal,
            'status'         => 'pending',
            'channel'        => 'Home Delivery',
             'address_id'     => $request->address_id
        ]);
// dd($cart);
        foreach ($cart as $item) {
            CartItem::create([
                'order_no'     => $orderNo, // ✅ store same order number
                'product_id'   => $item['rowId'],
                'product_name' => $item['name'],
                'payable'        => $grandTotal,
                'qty'          => $item['quantity'],
                'price'        => $grandTotal,
                'user_id'      => Auth::id(),
                'image'        => $item['image'] ?? null, // if available
            ]);
        }

       
        $success = "your order has been placed and is pending delivery";
             Session::forget('cart');
            return view('users.carts.success')
            ->with('success', $success);
            
        }

        // 💳 Card (Paystack)
        if ($request->payment_method === 'credit') {
            $verify = Http::withToken(config('paystack.secretKey'))
                ->get("https://api.paystack.co/transaction/verify/{$request->reference}")
                ->json();

            if ($verify['status'] && $verify['data']['status'] === 'success') {
                Order::create([
                    'user_id' => Auth::id(),
                    'items' => json_encode($cart),
                    'payment_method' => 'credit',
                    'total_amount' => $grandTotal,
                    'status' => 'paid',
                    'transaction_ref' => $request->reference, // store ref if column exists
                ]);
                

                Session::forget('cart');

                return response()->json(['status' => 'success']);
            }

            return response()->json(['status' => 'error', 'message' => 'Payment verification failed']);
        }


         // 🏦 Bank Transfer
        if ($request->payment_method === 'bank') {
            Order::create([
                'user_id' => Auth::id(),
                'items' => json_encode($cart),
                'payment_method' => 'bank',
                'total_amount' => $grandTotal,
                'status' => 'pending',
            ]);

            $success = "Your order has been placed. Please complete the bank transfer.";
             Session::forget('cart');
            return view('users.carts.success')
            ->with('success', $success);

        }

    

        // Bank or others
        return redirect()->route('checkout.index')->with('error', 'Invalid payment method.');
    }

    public function success()
    {
        return view('users.carts.success');
    }
}
