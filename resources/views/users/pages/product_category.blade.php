@extends('layouts.app')

@section('title')
<title>{{$product[0]?->category?->name }}</title>
@endsection
@section('head')
<link rel="canonical" href="{{ url('catalogs/'.Str::slug($product[0]?->category?->name)) }}">
@endsection
@section('content')
@section('styles')
<style>
.search-container {
    display: flex;
    max-width: 100%;
    width: 100%;
    border: 2px solid #ddd;
    border-radius: 30px;
    overflow: hidden;
    background: #fff;
}

.search-container input {
    flex: 1;
    border: none;
    padding: 10px 15px;
    font-size: 16px;
    outline: none;
    min-width: 0; /* Prevent overflow on mobile */
}

.search-container button {
    background:rgb(10, 2, 48);
    border: none;
    color: white;
    padding: 0 16px;
    font-size: 18px;
    cursor: pointer;
    transition: background 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
}

.search-container button:hover {
    background: #e65a00;
}

/* Mobile adjustments */
@media (max-width: 480px) {
    .search-container input {
        font-size: 14px;
        padding: 8px 12px;
    }

    .search-container button {
        font-size: 16px;
        padding: 0 12px;
    }
}
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

.category-sidebar {
    width: 250px;
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    padding: 15px;
    font-family: Arial, sans-serif;
}

.category-sidebar h3 {
    margin-bottom: 12px;
    font-size: 18px;
    border-bottom: 2px solid #f0f0f0;
    padding-bottom: 5px;
}

.category-sidebar ul {
    list-style: none;
    margin: 0;
    padding: 0;
}

.category-sidebar ul li {
    margin-bottom: 8px;
}

.category-sidebar ul li a {
    display: block;
    padding: 8px 10px;
    color: #333;
    text-decoration: none;
    border-radius: 5px;
    transition: background 0.3s ease, color 0.3s ease;
}

.category-sidebar ul li a:hover {
    background: #ff6b00;
    color: #fff;
}

/* Mobile Friendly */
@media (max-width: 768px) {
    .category-sidebar {
        width: 100%;
        margin-bottom: 20px;
    }
}

.latest-products {
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    padding: 15px;
    font-family: Arial, sans-serif;
    width: 280px;
}

.latest-products h3 {
    margin-bottom: 12px;
    font-size: 18px;
    border-bottom: 2px solid #f0f0f0;
    padding-bottom: 5px;
}

.latest-card {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 15px;
    padding-bottom: 10px;
    border-bottom: 1px solid #eee;
}

.latest-card:last-child {
    border-bottom: none;
}

.latest-card img {
    width: 80px;
    height: 80px;
    object-fit: cover;
    border-radius: 5px;
}

.latest-info h4 {
    font-size: 15px;
    margin: 0;
    color: #333;
}

.latest-info .price {
    font-weight: bold;
    color: #ff6b00;
    margin-top: 5px;
}

/* Mobile Friendly */
@media (max-width: 768px) {
    .latest-products {
        width: 100%;
    }
}

</style>
@endsection

{{-- <div class="ps-categogy ps-categogy--dark" style="background: #e8e8e8;">
    <div class="container">
        <ul class="ps-breadcrumb">
            <li class="ps-breadcrumb__item"><a href="">Home</a></li>
            <li class="ps-breadcrumb__item"><a href="">Category</a></li>
            <li class="ps-breadcrumb__item"><a href="">Products</a></li>
        </ul>
        <div class="ps-categogy__content">
            <div class="row row-reverse">
                <div class="col-12 col-md-9" style="
                background: #fff;
                padding: 10px;
                border-radius: 10px; top:-40px">
                    <div class="ps-categogy__wrapper">
                      
                        <div class="ps-categogy__onsale">
                            <form>
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" id="onSaleProduct" checked >
                                    <label class="custom-control-label" for="onSaleProduct">@if(isset($searchterm)) {{$searchterm}} @else Showing All Results @endif</label>
                                </div>
                            </form>
                        </div>
                        <div class="ps-categogy__sort">
                            <form><span>Sort by</span>
                                <select class="form-select">
                                    <option selected="">Latest</option>
                                    <option value="Popularity">Popularity</option>
                                </select>
                            </form>
                        </div>
                       
                    </div>
                    <div class="ps-categogy--grid">
                        <div class="row m-0">
                            @forelse ($products as $prods )
                            <div class="col-6 col-lg-4 col-xl-3 p-0">
                                <div class="ps-product ps-product--standard">
                                    <div class="ps-product__thumbnail"><a class="ps-product__image" href="{{route('users.products',[$prods->hashid, $prods->productUrl])}}">
                                            <!--<figure><img src="{{$prods->image_path}}" alt="{{$prods->image_path}}"><img src="{{$prods->image_path }}" alt="{{$prods->name }}">-->
                                                   <figure><img src="{{asset('images/products/'.$prods->image_path)}}" alt="{{$prods->name }}" /><img src="{{asset('images/products/'.$prods->image_path)}}" alt="{{$prods->name }}" /> 
                                            </figure>
                                        </a>
                                        <div class="ps-product__badge">
                                            <span class="badge badge-warning"> -{{number_format($prods->discount,0)}}%</span>
                                        </div>
                                    </div>
                                    <div class="ps-product__content">
                                        <h5 class="ps-product__tite"><a href="{{route('users.products',[$prods->hashid, $prods->productUrl])}}">{{$prods->name}}</a></h5>
                                        <div class="ps-product__meta"><span class="ps-product__price">{{moneyFormat($prods->sale_price)}}</span>
                                        <span class="ps-product__price "> <small> <del> {{moneyFormat($prods->price)}}</del> </small></span>
                                        </div>
                                    </div>
                                     <center> <a
                                                        href="{{ route('users.products', [$prods->hashid, $prods->productUrl]) }}"
                                                        class="btn  btn-lg" style="background:#fff; color:#73c2fb; border:1px solid #73c2fb; width:100px"> Add to
                                                    Cart <i class="fa fa-shopping-basket"></i></a>
                                                       <a target="_blank" rel="noopener noreferrer" href="https://wa.me/+2348058885913?text=Please i need {{ $prods->name }}, the  price on your website is {{ moneyFormat($prods->sale_price) }} ">
                                                             <i class="fa fa-whatsapp" aria-hidden="true" style="font-size:20px; border:1px solid #eee; padding:5px; color:#73c2fb "> 
                                                             </i></a> 
                                                    </center>
                                </div>
                            </div> 
                             
                            @empty
                            <div class="ps-delivery ps-delivery--info">
                                <div class="ps-delivery__content">
                                    <div class="ps-delivery__text"> <i class="icon-shield-check"></i><span> <strong>No Item found </strong></span></div>
                                </div>
                            </div>
                            @endforelse
                          
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3" style="top:-40px">
                    <div class="ps-widget ps-widget--product" style="
                    background: #fff;
                    border-radius: 10px;
                    padding: 10px 20px;">
                        <div class="ps-widget__block">
                            <h4 class="ps-widget__title">Categories</h4><a class="ps-block-control" href="#"><i class="fa fa-angle-down"></i></a>
                            <div class="ps-widget__content ps-widget__category">
                                <ul class="menu--mobile">
                                  
                                 @forelse ($categories as $cat )
                                    <li><a href="{{route('products.search',$cat->hashid)}}" style="font-size: 14px">{{substr($cat->name, 0,30)}}</a><span class="sub-toggle"><i class="fa fa-chevron-down"></i></span>
                                        <ul class="sub-menu">
                                            @foreach ($cat->products as $prod )
                                           
                                            <li><a href="{{route('users.products',[$prod->hashid, $prod->productUrl])}}">{{$prod->name}}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>

                                     
                                 @empty
                                     
                                 @endforelse 

                                </ul>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
  
</div> --}}

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
                  <li class="breadcrumb-item active" aria-current="page">Cart</li>
                </ol>
              </nav>
            </div><!-- /.col-lg-12 -->
          </div><!-- /.row -->
        </div><!-- /.container -->
        </section>

 <!-- ========================
       page title 
    =========================== -->
    {{-- <section class="page-title page-title-layout5 text-center">
        <div class="bg-img"><img src="{{ asset('frontend/images/backgrounds/6.jpg') }}" alt="background"></div>
        <div class="container">
          <div class="row">
            <div class="col-12">
              <h1 class="pagetitle__heading">Our Products</h1>
              <nav>
                <ol class="breadcrumb justify-content-center mb-0">
                  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Product</li>
                </ol>
              </nav>
            </div><!-- /.col-xl-6 -->
          </div><!-- /.row -->
        </div><!-- /.container -->
      </section><!-- /.page-title --> --}}
  
      <!-- ========================
         shop 
      =========================== -->
     <div class="container py-5">
    <div class="row">
        <!-- Categories Sidebar -->
        <div class="col-md-3">
                <div class="search-container">
    <input type="text" placeholder="Search products...">
    <button type="submit">
        🔍
    </button>
</div> <br>

            <aside class="category-sidebar">
          <h3>Categories</h3>
          <ul>
              @foreach ($cate as $cat)
                          <li  {{ request('category') == $cat->id ? 'active' : '' }}>
                              <a href="{{route('category.products',$cat->id)}}" {{ request()->category == $cat->id ? 'text-yellow' : '' }}>
                                  {{ $cat->name }}
                              </a>
                          </li>
                  @endforeach
          </ul>
    </aside>
<br>

    <aside class="latest-products">
    <h3>Latest Products</h3>
@foreach ($latest as $item)
    <div class="latest-card">
    <a href="{{ route('product.details',encrypt($item->id)) }}"> 
        <img src="{{ asset('images/products/'.$item->image_path) }}" alt="Product Image">
          </a>
        <div class="latest-info">
            <h4><a href="{{ route('product.details',encrypt($item->id)) }}">{{ $item->name }} </a> </h4>
            <small class="text-muted text-decoration-line-through">${{ $item->price }}</small>
            <p class="price">{{ $item->sale_price }}</p>
        </div>
    </div>
  @endforeach  
</aside>

        </div>


        <!-- Products Grid -->
        <div class="col-md-9">
            <h6 class="mb-3">{{ $currentCategory->name ?? 'All Products' }}</h6>
            <div class="row">
               
      
  <div class="container my-5">
  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">
    <!-- Card 1 -->
    @forelse ($product as $item)
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
     <p>No products found in this category.</p>                
 @endforelse
   
  </div>
</div>


</div>

            
        </div>
    </div>
</div>
      
@endsection