@extends('layouts.app')
@section('title')
<title> My Recent Views | Sanlive Pharmarcy</title>
@endsection
@section('head')

<link rel="canonical" href="{{ url()->current() }}">
@endsection
@section('content')
@section('styles')
    <style>
        .navIL {
            padding: 15px;
            padding-left: 10px
        }

        .dropdown-item:hover {
            background: rgb(219, 218, 218);
        }
    </style>
@endsection

<div class="ps-shopping" style="background: #eee; ">
    <div class="container">
        <div class="ps-shopping__content">
            <div class="row">
             @include('includes.sidebarAccount')
                <div class="col-12 col-md-7 col-lg-8 mt-5" style="background: #fff; border-radius: 5px">

                    <div class="row">
                        <span class="pt-5 pl-5"> <a href="#" onclick="history.back()"> {{_('<< back ')}} </a> <hr style="width:100%"></span>
                        
                       <div class="ps-categogy--grid">
                        <div class="row m-0">

                            @forelse ($recent as $product)
                            <div class="col-6 col-lg-4 col-xl-3 p-0">
                                <div class="ps-product ps-product--standard">
                                    <div class="ps-product__thumbnail"><a class="ps-product__image" href="product1.html">
                                            <figure><img src="{{asset('images/products/'.$product->image_path)}}" alt="{{$product->name}}">
                                            </figure>
                                        </a>
                                        <div class="ps-product__badge">
                                            <div class="ps-badge ps-badge--sale">-{{number_format($product->discount)}}%</div>
                                        </div>
                                    </div>
                                    <div class="ps-product__content"><a class="ps-product__branch" href="{{route('users.products',[$product->hashid, $product->productUrl])}}">{{$product->category->name}}</a>
                                        <h5 class="ps-product__ttle"><a href="{{route('users.products',[$product->hashid, $product->productUrl])}}">{{$product->name}}</a></h5>
                                        <div class="ps-product__meta"><span class="ps-product__price sale">{{moneyFormat($product->sale_price)}}</span><span class="ps-product__del">{{moneyFormat($product->price)}}</span>
                                        </div>
                                      <center>  <a href="{{route('users.products',[$product->hashid, $product->productUrl])}}" class="btn btn-primary"> Add To Cart</a></center>  
                                    </div>
                                </div>
                            </div> 
                            @empty
                            @endforelse
                        </div>
                    </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<div style="height: 2em; background:#eee"></div>

@endsection



