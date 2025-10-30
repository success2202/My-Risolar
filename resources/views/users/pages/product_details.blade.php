@extends('layouts.app')
@section('title')
<title> Product Details - Sanlive Pharmacy  </title>
@endsection
@section('head')
<link rel="canonical" href="{{ url()->current() }}">
@endsection
@section('styles')
<style>
.product-container {
  transition: transform 0.3s ease, box-shadow 0.3s ease !important;
  border-radius: 8px !important; /* optional: makes corners round */
  overflow: hidden !important;
}

/* Hover effect */
.product-container:hover {
  transform: scale(1.05) !important; /* zooms in slightly */
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2) !important; /* shadow on hover */
  cursor: pointer !important;
}


.cart-icon {
  position: absolute;
  bottom: 10px;
  right: 8px;
  background-color:rgb(4, 30, 58); /* Bootstrap blue */
  border-radius: 50%;
  padding: 8px;
  width: 30px;
  height: 30px;
  display: flex;
  justify-content: center;
  align-items: center;
}
.cart-icon i {
  color: white;
  font-size: 13px;
}


.product-grid {
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    gap: 15px;
}
/* .product-card {
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 10px;
    text-align: center;
} */
/* .product-card img {
    height: 150px;
    object-fit: contain;
} */
.product-card h6 {
    font-size: 14px;
    height: 40px;
    overflow: hidden;
}
.product-card p {
    font-size: 14px;
    height: 40px;
    overflow: hidden;
}

</style>

@endsection

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- @if(session('success'))
        <div class="cart-success" id="cartSuccess">{{ session('success') }}</div>
    @endif --}}

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
                  <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
                </ol>
              </nav>
            </div><!-- /.col-lg-12 -->
          </div><!-- /.row -->
        </div><!-- /.container -->
      </section><!-- /.page-title -->
  
      <!-- ========================
         shop single
      =========================== -->
      <section class="shop pb-40 pt-0">
        <div class="container">
          <div class="row">
            <div class="col-12">

              {{-- <div  class="alert alert-primary d-flex flex-wrap justify-content-between align-items-center mb-40">
                <h3 class="alert__title my-1">“{{ $product->name }}” </h3>
                <a href="{{ route('carts.index') }}" class="btn btn__secondary btn__rounded">View Cart</a>
              </div><!-- /.alert-panel--> --}}

              <div class="row product-item-single">
                <div class="col-sm-6">
                  <div class="product__img">
                    <img src="{{ asset('images/products/'.$product->image_path) }}" height="200px" width="300px" class="zoomin" alt="product" loading="lazy">
                  </div><!-- /.product-img -->
                </div>
                <div class="col-sm-6">
                  <h6 class="product__title">{{ $product->name }}</h6>
                  <div class="product__meta-review mb-20">
                    <span class="product__rating">
                      <i class="fa fa-star active"></i>
                      <i class="fa fa-star active"></i>
                      <i class="fa fa-star active"></i>
                      <i class="fa fa-star active"></i>
                      <i class="fa fa-star"></i>
                    </span>
                    <span>4 Review(s)</span>
                    <a href="#">Add Review</a>
                  </div><!-- /.product-meta-review -->
                  <span class="product__price mb-20"> {{ moneyFormat($product->sale_price)  }}</span>
                  {{-- <div class="product__desc">
                    <p>EGCG is one of the most powerful compounds in green tea. Research has tested its ability to help
                      treat various diseases. It appears to be one of the main compounds that gives green tea its
                      medicinal properties (2
                    </p>
                  </div><!-- /.product-desc --> --}}
                  <div class="product__quantity d-flex mb-30">
                    <form  action="{{ route('carts.add', encrypt($product->id)) }}" method="POST" style="display:inline;">
                      @csrf
                    <div class="quantity__input-wrap mr-20">
                     
                      <i class="decrease-qty fa fa-minus"></i>
                      
                      <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="number" class="qty-input" id="quantiy" name="quantity" value="1" min="1">
                      <i class="increase-qty fa fa-plus"></i>
                      
                    </div>
                    <button  type="submit" class="btn btn__secondary"> add to cart <i class="icon-cart"></i></button>
                   
                  </form>
                   @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
                  </div><!-- /.product-quantity -->
                  <div class="product__meta-details">
                    <ul class="list-unstyled mb-30">
                      <li><span>SKU :</span> <span>#{{ $product->sku }}</span></li>
                      <li><span>Category :</span> <span><strong>{{ $prod->category ? $product->category->name : 'Uncategorized' }}</strong></span></li>
                      {{-- <li><span>Tags :</span> <span>Beauty, Supplements</span></li> --}}
                    </ul>
                  </div><!-- /.product__meta-details -->
                  {{-- <ul class="social-icons list-unstyled mb-0">
                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                  </ul><!-- /.social-icons --> --}}
                </div>
              </div><!-- /.row -->
              <div class="product__details mt-100">
                <nav class="nav nav-tabs">
                  <a class="nav__link active" data-toggle="tab" href="#Description">Description</a>
                  {{-- <a class="nav__link" data-toggle="tab" href="#Details">Details</a> --}}
                  <a class="nav__link" data-toggle="tab" href="#Reviews">Reviews (3)</a>
                </nav>
                <div class="tab-content mb-50" id="nav-tabContent">
                  <div class="tab-pane fade show active" id="Description">
                    <p>{{trim(strip_tags($product->description))}}.</p>
                  </div><!-- /.desc-tab -->
                  {{-- <div class="tab-pane fade" id="Details">
                    <p>Yorks is not just about graphic design; it's more than that. We offer integral communication
                      services, and we're responsible for our process and results. We thank each of our clients and their
                      portfolios; thanks to them we have grown and built what we are today! After all</p>
                    <p>as described in Web
                      Design Trends 2015 & 2016, vision dominates a lot of our subconscious interpretation of the world
                      around us. On top of that, pleasing images create a better user experience.
                      At League Agency, we shows only the best websites and portfolios built completely with passion,
                      simplicity & creativity !</p>
                  </div><!-- /.details-tab --> --}}
                  <div class="tab-pane fade" id="Reviews">
                    <form class="reviews__form">
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="Name">
                      </div><!-- /.form-group -->
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="Email">
                      </div><!-- /.form-group -->
                      <div class="form-group">
                        <textarea class="form-control" placeholder="Review"></textarea>
                      </div><!-- /.form-group -->
                      <button  class="btn btn__primary btn__rounded">Submit </button>
                    </form>
                  </div><!-- /.reviews-tab -->
                </div>
              </div><!-- /.product-tabs -->
              
              <h6 class="related__products-title text-center-xs mb-25">Related Products</h6>
              <div class="row">
                <!-- Product item #1 -->
               
             
<div class="container my-5">
  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">
    <!-- Card 1 -->
    @forelse ($products as $item)
    <div class="col">
      <div class="card h-100 shadow-sm rounded-4 product-container">
      <a href="{{ route('product.details',encrypt($item->id)) }}"> 
        <img src="{{ asset('images/products/'.$item->image_path) }}" class="card-img-top" alt="Product Image">
        </a>
        <div class="card-body product-card">
          <h6 class="card-title"><a href="{{ route('product.details',encrypt($item->id)) }}"> {{ $item->name }}</a> </h6>
          <p class="card-text mb-1">
            <small class="text-muted text-decoration-line-through">${{ $item->price }}</small>
            <span class="text-danger fw-bold ms-2">${{ $item->sale_price }}</span>
          </p>
            <div class="cart-icon">
        <i class="fas fa-shopping-cart"></i>
      </div>
          {{-- <a href="" class="btn btn-sm btn-primary mt-2 w-100">Add to Cart</a> --}}
        </div>
      </div>
    </div>
 @empty
                    
 @endforelse
   
  </div>
</div>


{{-- <div class="container my-4">
    <div class="product-grid">
        @foreach($products as $product)
            <div class="product-card">
                <img src="{{ asset('images/products/'.$product->image_path) }}" alt="{{ $product->name }}">
                <h6>{{ $product->name }}</h6>
                <p>
                    <span class="fw-bold text-success">₦{{ number_format($product->price, 2) }}</span>
                    @if($product->sale_price)
                        <span style="text-decoration: line-through; color:#888;">
                            ₦{{ number_format($product->sale_price, 2) }}
                        </span>
                    @endif
                </p>
                
                    <div class="cart-icon">
        <i class="fas fa-shopping-cart"></i>
      </div>
              
            </div>
        @endforeach
    </div>
</div> --}}



    
              </div><!-- /.row -->
            </div><!-- /.col-12 -->
          </div><!-- /.row -->
        </div><!-- /.container -->
      </section><!-- /.shop single -->

      @endsection

      @section('scripts')



@endsection