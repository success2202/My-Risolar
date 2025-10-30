@extends('layouts.app')
@section('title')
<title> Carts Index </title>
@endsection
@section('head')

<link rel="canonical" href="{{ url()->current() }}">
@endsection

  
@section('styles')
<style>
.cart-wrapper {
  max-width: 800px;
  margin: 40px auto;
  padding: 20px;
  background-color: #f9f9f9;
  border-radius: 12px;
  box-shadow: 0 10px 30px rgba(11, 29, 58, 0.15);
  font-family: 'Segoe UI', sans-serif;
}

.cart-wrapper h2 {
  margin-bottom: 20px;
  color: #0b1d3a;
}

.cart-items {
  margin-bottom: 30px;
}

.cart-item {
  display: flex;
  align-items: center;
  margin-bottom: 20px;
  background: white;
  padding: 10px;
  border-radius: 10px;
  box-shadow: 0 4px 10px rgba(11, 29, 58, 0.05);
}

.cart-item img {
  width: 80px;
  height: 80px;
  object-fit: cover;
  border-radius: 8px;
  margin-right: 20px;
}

.item-details {
  flex: 1;
}

.item-details h4 {
  margin: 0 0 8px;
  font-size: 18px;
  color: #0b1d3a;
}

.item-details p {
  margin: 0 0 8px;
  color: #333;
}

.qty input {
  width: 50px;
  padding: 4px;
}

.item-total {
  font-weight: bold;
  color: #0b1d3a;
}

.cart-summary {
  border-top: 1px solid #ddd;
  padding-top: 20px;
}

.summary-row {
  display: flex;
  justify-content: space-between;
  margin-bottom: 10px;
}

.summary-row.total {
  font-size: 18px;
  border-top: 1px solid #ccc;
  padding-top: 10px;
}

.checkout-btn {
  width: 100%;
  padding: 12px;
  background-color: #007bff;
  color: white;
  font-size: 16px;
  font-weight: bold;
  border: none;
  border-radius: 8px;
  cursor: pointer;
  margin-top: 20px;
  transition: background 0.3s ease;
}

.checkout-btn:hover {
  background-color: #0056b3;
}
.cart-item {
  position: relative; /* Needed to position the remove button */
}

.remove-btn {
  position: absolute;
  top: 8px;
  right: 8px;
  background-color: #dc3545; /* red color */
  color: white;
  border: none;
  border-radius: 50%;
  width: 28px;
  height: 28px;
  font-size: 18px;
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: background 0.3s ease;
}

.remove-btn:hover {
  background-color: #b02a37;
}

/* .related-products {
  max-width: 1200px;
  margin: 60px auto;
  padding: 0 20px;
}

.related-products h2 {
  text-align: center;
  font-size: 28px;
  color: #0b1d3a;
  margin-bottom: 30px;
} */
</style>
@endsection

@section('content')

   <!-- ========================
       page title 
    =========================== -->
    <section class="page-title pt-30 pb-30">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb mt-0">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item"><a href="#">Shop</a></li>
                  <li class="breadcrumb-item active" aria-current="page">{{ $breadcrumb }}</li>
                </ol>
              </nav>
            </div><!-- /.col-lg-12 -->
          </div><!-- /.row -->
        </div><!-- /.container -->
        </section>
@php
    $totalItems = 0;
    $totalCost = 0;
@endphp

<div class="cart-wrapper">
  <h4 style="text-align:center;"> Cart</h4>

  <!-- Cart Items -->
  <div class="cart-items">
    @if(session('cart') && count(session('cart')) > 0)
  {{-- @forelse ($carts as $cart) --}}
    @forelse (session('cart') as $id => $cart)
    
        @php
            $totalItems += $cart['quantity'];
            $totalCost += $cart['price'] * $cart['quantity'];
            
        @endphp
    <div class="cart-item">
      <img src="{{asset('images/products/'.$cart['image']) }}" alt="Product">
      <div class="item-details">
        <h4>{{$cart['name']}}</h4>
        <p>{{moneyFormat($cart['price'])}}</p>
        <div class="qty">
          Quantity: <input type="number" value="{{$cart['quantity']}}" min="1" disabled>
        </div>

        <form action="{{ route('carts.delete', $id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="remove-btn" title="Remove Item">&times;</button>
        </form>

        
        {{-- <a href="{{route('carts.delete',$carts['id'])}}" class="remove-btn" title="Remove Item">&times;</a> --}}
        
      </div>
      <div class="item-total">{{ moneyFormat($cart['price'] * $cart['quantity']) }}</div>
    </div>
         @empty
                <div class="ps-product ps-product--li">
                    <div class="ps-prod" style="border-right:0px">
              <p style="text-align: center"> 
                <i  style="font-size:50px; padding-right:2px; font-weight:800" class="icon-cart-empty"></i> 
                <br> Your cart is empty.
                You have not added any item to your cart.</p> 
                    </div>
                </div>
        @endforelse
        @endif
    {{-- <div class="cart-item">
      <img src="product2.jpg" alt="Product">
      <div class="item-details">
        <h4>Another Product</h4>
        <p>₦15,000</p>
        <div class="qty">
          Quantity: <input type="number" value="2" min="1">
        </div>
      </div>
      <div class="item-total">₦30,000</div>
    </div> --}}

  </div>

  <!-- Summary -->
 
 @if(session('cart') && count(session('cart')) > 0)

  
  <div class="cart-summary">
  
    <div class="summary-row">
      <span>Total Item:</span>
      <span><b>{{$totalItems}} Items</b></span>
    </div>
    {{-- <div class="summary-row">
      <span>Tax (5%):</span>
      <span>₦2,000</span>
      
    </div> --}}
    <div class="summary-row total">
      <strong>Total:</strong>
      <strong>{{moneyFormat($totalCost)}}</strong>
     
    </div>
  
    @if(session()->has('cartSession'))
    
   <center> <a href="{{ route('checkout.index', $cartSession) }}"><button class="btn btn-success">Proceed to Checkout</button> </a></center>
  @endif
   </div>
          <a  href="{{route('users.products')}}"><b style="align-text:center;">Continue Shopping</b> </a>
        </div>
  </div>

@endif

</div>



{{-- <div class="related-products">
  <h2>Related Products</h2> </dv> --}}
                <!-- Product item #1 -->
               
             
{{-- <div class="container my-5">
  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">
    <!-- Card 1 -->
    @forelse ($latest as $item)
    <div class="col">
      <div class="card h-100 shadow-sm rounded-4">
        <img src="{{ asset('images/products/'.$item->image_path) }}" class="card-img-top" alt="Product Image">
        <div class="card-body">
          <b class="card-title"><a href="{{ route('product.details',encrypt($item->id)) }}"> {{ $item->name }}</a> </b>
          <p class="card-text mb-1">
            <small class="text-muted text-decoration-line-through">${{ $item->price }}</small>
            <span class="text-danger fw-bold ms-2">${{ $item->sale_price }}</span>
          </p>
          <a href="{{route('users.products',[$item->hashid, $item->productUrl])}}" class="btn btn-sm btn-primary mt-2 w-100">Add to Cart</a>
        </div>
      </div>
    </div>
 @empty
                    
 @endforelse
   
  </div>
</div> --}}


    
              {{-- </div><!-- /.row --> --}}






@endsection

@section('script')


@endsection