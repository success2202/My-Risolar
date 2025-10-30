@extends('layouts.app')

@section('title')
<title>{{$products[0]?->categories?->name }}</title>
@endsection
@section('head')
<link rel="canonical" href="{{ url('catalogs/'.Str::slug($products[0]?->categories?->name)) }}">

@endsection

@section('styles')
 <style>

.page-title {
    padding: 8px 0;
    background: #f5f6fa;
    border-bottom: 1px solid #e5e7eb;
    margin-bottom: 0;
  }

  .breadcrumb {
    background: none;
    margin: 0;
    font-size: 14px;
  }

  .breadcrumb a {
    color: #4f46e5;
    text-decoration: none;
  }

  .breadcrumb a:hover {
    text-decoration: underline;
  }
.search-container {
    display: flex;
    width: 100%;
    max-width: 100%;
    margin-bottom: 20px;
}

.search-container input {
    flex: 1;
    padding: 12px 15px;
    border: 2px solid #ddd;
    border-right: none;
    border-radius: 8px 0 0 8px;
    outline: none;
    font-size: 16px;
    transition: all 0.3s ease;
}

.search-container input:focus {
    border-color: #485269;
    /* box-shadow: 0 0 4px rgba(255, 107, 0, 0.3); */
}

.search-container button {
    padding: 12px 20px;
    background: #0a1831;
    color: #fff;
    font-size: 16px;
    border: none;
    border-radius: 0 8px 8px 0;
    cursor: pointer;
    transition: background 0.3s ease;
}

.search-container button:hover {
    /* background: #e65b00; */
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
    
    
    .category-card {
      transition: 0.3s;
      
    }
    .category-card:hover {
      transform: scale(1.03);
    }
    .category-img {
      height: 170px;
      object-fit: cover;
    }

    li.active a {
    font-weight: bold;
    color: #007bff;
}


/* .product-container {
  transition: transform 0.3s ease, box-shadow 0.3s ease !important;
  border-radius: 8px !important; /* optional: makes corners round 
  overflow: hidden !important;
} */

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
    color: #000000;
    text-decoration: none;
    border-radius: 5px;
    transition: background 0.3s ease, color 0.3s ease;
}

.category-sidebar ul li a:hover {
    background: #060813;
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



h5.mb-3 {
    margin-top: 0 !important; /* remove extra top margin before heading */
}


.latest-products {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
  gap: 15px;
}

.latest-card {
  background: #fff;
  border-radius: 10px;
  box-shadow: 0 2px 6px rgba(0,0,0,0.1);
  overflow: hidden;
  text-align: center;
  transition: transform 0.3s ease;
}

.latest-card:hover {
  transform: translateY(-4px);
}

.latest-card img {
  width: 100%;
  height: 160px;
  object-fit: cover;
  display: block;
}

.latest-info {
  padding: 10px;
}

.latest-info h4 {
  font-size: 15px;
  color: #222;
  margin-bottom: 5px;
}

.latest-info .price {
  color: #4f46e5;
  font-weight: 600;
  margin-top: 5px;
}

.cart-action {
  display: flex;
  align-items: center;
  justify-content: start;
  gap: 6px;
  flex-wrap: nowrap;
}

.add-to-cart-btn {
  border: 1px solid #ccc;
  border-radius: 5px;
  background: transparent;
  color: #333;
  font-size: 12px;
  padding: 4px 8px;
  cursor: pointer;
  transition: all 0.3s ease;
  white-space: nowrap; /* Prevents text from wrapping */
  flex-shrink: 0; /* Keeps button from resizing oddly */
}

.add-to-cart-btn:hover {
  background: #f5f5f5;
  border-color: #999;
  color: #000;
}

.product-card {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  height: 100%;
  overflow: hidden;
}

/* Mobile optimization */
@media (max-width: 576px) {
  .add-to-cart-btn {
    font-size: 11px;
    padding: 3px 6px;
  }

  .cart-action {
    gap: 4px;
  }
}





  </style>
  @endsection
@section('content')




  <!-- ========================
       page title 
    =========================== -->
<section class="page-title">
  <div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mt-0 mb-0">
        <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">About Us</li>
      </ol>
    </nav>
  </div>
</section>

 

<div class="container py-5">
    <div class="row">
        <!-- Categories Sidebar -->
        <div class="col-md-3">
            {{-- <h5 class="mb-3">Categories</h5> --}}
            <!-- Search -->
                {{-- <div class="search-container">
    <input type="text" placeholder="Search products...">
    <button type="submit">
        
    </button>
</div> <br> --}}
           
        <aside class="category-sidebar">
          <h3>Categories</h3>
          <ul>
              @foreach ($categories as $cat)
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
      <a href="{{ route('product.details', encrypt($item->id)) }}"> 
        <img src="{{ asset('images/products/'.$item->image_path) }}" alt="{{ $item->name }}">
      </a>
      <div class="latest-info">
        <h4>
          <a href="{{ route('product.details', encrypt($item->id)) }}">{{ $item->name }}</a>
        </h4>
        <small class="text-muted text-decoration-line-through">${{ $item->price }}</small>
        <p class="price">${{ $item->sale_price }}</p>
      </div>
    </div>
  @endforeach
</aside>

        </div>

        <!-- Products Grid -->
        <div class="col-md-9">
            <h5 class="mt-0 mb-2">{{ $currentCategory->name ?? ' Products' }}</h5>
            <div class="row">

<form action="{{ route('prod.search') }}" method="GET" style="max-width: 860px;">
@csrf
  <div style="display: flex; width: 100%;">
    <input 
      type="text" 
      name="query" 
      placeholder="Search for Products" 
      value="{{ request('query') }}" 
      style="
        flex: 1;
        padding: 10px 12px;
        border: 1px solid #0d2f6b;
        border-right: none;
        outline: none;
        font-size: 14px;
        border-radius: 4px 0 0 4px;
      "
    >
    <button 
      type="submit" 
      style="
        background-color: #0d2f6b;
        color: #fff;
        font-weight: bold;
        padding: 0 18px;
        border: 1px solid #0d2f6b;
        border-radius: 0 4px 4px 0;
        cursor: pointer;
      "
    >
      SEARCH
    </button>
  </div>
</form>



<div class="container my-5">
  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">
    @forelse ($products as $item)
      <div class="col-6">
        <div class="card h-100 product-container">
          <a href="{{ route('product.details', encrypt($item->id)) }}">
            <img src="{{ asset('images/products/'.$item->image_path) }}" class="card-img-top" alt="{{ $item->name }}">
          </a>

          <div class="card-body product-card">
            <h6 class="card-title">
              <a href="{{ route('product.details', encrypt($item->id)) }}">{{ $item->name }}</a>
            </h6>

            <p class="card-text mb-1">
              <small class="text-muted text-decoration-line-through">${{ $item->price }}</small>
              <span class="text-danger fw-bold ms-2">${{ $item->sale_price }}</span>
            </p>

<div class="cart-action d-flex align-items-center mt-2">
  <i class="fa-solid fa-cart-arrow-down text-primary me-2 fs-6"></i>
  <button class="btn add-to-cart-btn">Add to Cart</button>
</div>




          </div>
        </div>
      </div>
    @empty
      <p class="text-center">No products available.</p>
    @endforelse
  </div>
</div>

        
       </div>

            
        </div>
    </div>
</div>





@endsection