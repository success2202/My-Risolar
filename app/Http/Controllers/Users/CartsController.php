<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Product;
use App\Models\Category;
use Vinkla\Hashids\Facades\Hashids;
use Gloudemans\Shoppingcart\Facades\Cart;

use App\Traits\imageUpload;
use auth;

class CartsController extends Controller
{
    //
use imageUpload;
    public function add(Request $request)
     {   
      // return response()->json($request);

          $request->validate([
        'product_id' => 'required|exists:products,id',
        'quantity' => 'required|integer|min:1',
         
        // 'rowId' => 'required'
    ]);

   
    $product = Product::findOrFail($request->product_id);
    //  $product = Product::with('category')->findOrFail($request->product_id); // Load category
    $quantity = $request->quantity;
    $userId    = auth_user()->id;
    // $rowId = $request->rowId;
      // If cartSession doesn't exist, create one
    if (!session()->has('cartSession')) {
        $encodedSession = Hashids::connection('products')->encode(time(), $userId);
        session(['cartSession' => $encodedSession]);
    } else {
        $encodedSession = session('cartSession');
    }

    // Add item to session cart
    $cart = session()->get('cart', []);


    if (isset($cart[$product->id])) {
        $cart[$product->id]['quantity'] += $quantity;
    } else {
        $cart[$product->id] = [
            "rowId" => $product->id,
            "name" => $product->name,
            "price" => $product->price, 
            "quantity" => $quantity,
            "sku" => $product->sku,
            "image" => $product->image_path,
            // "category"  => $product->category ? $product->category->name : 'Uncategorized'
            
        ];
    }

    session()->put('cart', $cart);

    return redirect()->back()->with('success', 'Product added to cart!');
}
     
     public function CartTest(Request $request){
      return $request;
     }



    public function Index()
    { 
      $prod = Product::latest()->take(6)->get();
      foreach($prod as $pp){
        $pp->productUrl = trimInput($pp->name);
        $pp->hashid = Hashids::connection('products')->encode($pp->id);
        
      } 
       //dd(session('cart'));
        $user    = auth_user()->id;
        

        $cartSession = Hashids::connection('products')->encode(time(), $user ?? rand(1, 999));
        return view('users.carts.carts') 
        ->with('carts', session()->get('cart', []))
        // ->with('carts', Cart::content())
        ->with('latest', $prod)
        ->with('userId', $user)
        ->with('cartSession', $cartSession)
        ->with('breadcrumb', 'Shopping Cart');
        
    }

   



public function destroy($id)
{
    $cart = session()->get('cart', []);

    if(isset($cart[$id])) {
        unset($cart[$id]);
        session()->put('cart', $cart);
    }

    return redirect()->back()->with('success', 'Item removed from cart.');
}

    public function update(Request $request){
        $cartItemId = $request->cartId;
        $quantity = $request->qty;
        // Update the cart item quantity
        Cart::update($cartItemId, $quantity);
        Session::flash('alert', 'success');
        Session::flash('msg', 'Cart item quantity updated successfully');
        return back();
    }
}
