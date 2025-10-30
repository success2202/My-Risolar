@extends('layouts.app')
@section('title')
<title> {{$product->name}} </title>
@endsection
@section('head')
<link rel="canonical" href="{{ route('users.products', [$product->hashid, $product->productUrl]) }}">
@endsection

@section('content')
<div class="ps-page--product ps-page--product1">
    <div class="container">
        <ul class="ps-breadcrumb">
            <li class="ps-breadcrumb__item"><a href="">Home</a></li>
            <li class="ps-breadcrumb__item"><a href="">{{ucwords(strtolower($product->category->name))}}</a></li>
            <li class="ps-breadcrumb__item active" aria-current="page">{{$product->name}}</li>
        </ul>
       
        <div class="ps-page__content">
            <div class="row">
                <div class="col-12 col-md-9">
                    <div class="ps-product--detail">
                        <div class="row">
                            <div class="col-12 col-xl-5">
                                <div class="ps-product--gallery">
                                    <div class="ps-product__thumbnail">
                                        <div class="slide"><img src="{{asset('images/products/'.$product->image_path)}}" alt="{{$product->name}}" /></div>
                                        <div class="slide"><img src="{{asset('images/products/'.$product->image_path)}}" alt="{{$product->name}}" /></div>
                                        
                                    </div>
                                    <div class="ps-gallery--image">
                                        <div class="slide">
                                            {{--   @if($product->gallery)
                                            
                                            @php 
                                           
                                                $images = json_decode($product->gallery);
                                            @endphp
                                            @foreach ($images as $item) 
                                            <!--<div class="ps-gallery__item"><img src="{{asset('images/products/'.$item) }}" alt="{{asset('images/products/'.$item) }}" /></div>-->
                                            @endforeach
                                            @else   @endif --}}
                                            <div class="slide"><img src="{{asset('images/products/'.$product->image_path)}}" alt="{{$product->name}}" /></div>
                                          
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-xl-7">
                                <div class="ps-product__info">
                                    @if($product->status == 1)
                                    <div class="ps-product__badge"><span class="ps-badge ps-badge--outstock">OUT OF STOCK</span>
                                    </div>
                                    @endif
                                   
                                    <div class="ps-product__branch"><a href="{{route('products.search', $product->category->hashid )}}">{{$product->category->name}}</a></div>
                                    <div class="ps-product__title"><a href="#">{{$product->name}}</a></div>
                                    <div class="ps-product__desc">
                                        <ul class="ps-product__list">
                                            <li>{!! substr($product->description,0,100) !!}</li>
                                        </ul>
                                    </div>
                                    <div class="ps-product__meta"><span class="ps-product__price" style="font-size:30px">{{moneyFormat($product->sale_price)}}
                                        <span class="ps-product__del">{{moneyFormat($product->price)}}</span>
                                    </div>
                                    <div class="ps-product__type">
                                        <ul class="ps-product__list">
                                            <li> <span class="ps-list__title">SKU: </span><a class="ps-list__text" href="#">{{$product->sku}}</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <form id="myForm" enctype="multipart/form-data">
                                        @csrf
                                    <div class="ps-product__quantity">
                                        <h6>Quantity:   
                                             <button  type="button" class="ps-btn--primary  decrement-btn" style="width: 30px; border-radius:3px; height:30px"> - </button> 
                                             <input type="text" value="1" name="qty" id="qty" style="border: 1px solid #8c8a8a53; height:30px; width:30px; text-align:center"> 
                                             <button  type="button" class="ps-btn--primary  increment-btn" style="width: 30px; border-radius:3px; height:30px"> + </button>  </h6>
                                     
                                            @if($product->requires_prescription == 1)
                                            <label for="precription_upload" > <span id="fileName" style="color:red" hidden> Upload file </span>
                                            <div class="pb-3"><img src="{{asset('/upload.png')}}">
                                            </div> 
                                            <input type="file" id="precription_upload" name="image" style="border: none; visibility:hidden" > 
                                            </label>
                                            <br>
                                            @endif

                                            
                                        <div class="d-md-flex align-items-center">
                                            <div class="def-number-input number-input safari_only">
                                            </div><button type="button" style="border-radius:5px" class="ps-btn ps-btn--primary w-50"  id="add2cart" 
                                            @if($product->status == 1)
                                            disabled @endif>Add to cart</button>
                                            <span class="p-2"></span>
                                            <a target="_blank" class="btn btn-primary" rel="noopener noreferrer" href="https://wa.me/+2348058885913?text=Please i need {{ $product->name }}, the  price on your website is {{ moneyFormat($product->sale_price) }} ">
                                                             <i class="fa fa-whatsapp" aria-hidden="true" style="font-size:20px; padding:5px; color:#fff "> 
                                                           Order on Whatsapp  </i> </a> 
                                        </div>
                                    </div>
                                    </form>
                                    <div class="ps-product__social">
                                        <ul class="ps-social ps-social--color">
                                        Share this Product
                                            <li><a class="ps-social__link facebook" target="_blank" rel="noopener noreferrer" href="https://www.facebook.com/sharer/sharer.php?u={{ route('users.products', [$product->hashid, $product->productUrl]) }}"><i class="fa fa-facebook"> </i><span class="ps-tooltip">Facebook</span></a></li>
                                            <li><a class="ps-social__link twitter"  target="_blank" rel="noopener noreferrer" href="https://twitter.com/share?url={{ route('users.products', [$product->hashid, $product->productUrl]) }}"><i class="fa fa-twitter"></i><span class="ps-tooltip">Twitter</span></a></li>
                                            <li ><a class="ps-social__link whatsapp" target="_blank"  rel="noopener noreferrer" data-action="share/whatsapp/share"  href="https://api.whatsapp.com/send?text={{ route('users.products', [$product->hashid, $product->productUrl]) }}"><i class="fa fa-whatsapp"></i><span class="ps-tooltip">WhatsApp</span></a></li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ps-product__content">
                            <ul class="nav nav-tabs ps-tab-list" id="productContentTabs" role="tablist">
                                <li class="nav-item" role="presentation"><a class="nav-link active" id="description-tab" data-toggle="tab" href="#description-content" role="tab" aria-controls="description-content" aria-selected="true">Description</a></li>
                            </ul>
                            <div class="tab-content" id="productContent">
                                <div class="tab-pane fade show active" id="description-content" role="tabpanel" aria-labelledby="description-tab">
                                    <div class="ps-document">
                                        <div class="row row-reverse">
                                            <div class="col-12 col-md-6"><img class="ps-thumbnail" src="img/products/pressure-tab-content.jpg" alt="{{$product->name}}"></div>
                                            <div class="col-12 col-md-6">
                                                <h2 class="ps-title">{{$product->name}}</h2>
                                                <div class="ps-subtitle">{{$product->title??null}}</div>
                                                <p> {!! $product->description !!}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="ps-product--extension">
                        <div class="ps-product__delivery">
                            <div class="ps-delivery__item"><i class="icon-wallet"></i>Very secured paymenet methods</div>
                            <div class="ps-delivery__item"><i class="icon-bag2"></i>Shipping will be calculated on checkout</div>
                            <div class="ps-delivery__item"><i class="icon-wallet"></i>Please note that price may increase due to  exchange rate, ensure updated price before making payment</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="ps-section--latest" style="margin-top:5px">
        <div class="container" style="background: #f4f3f33f; padding:10px; border:5px solid #ede8e836">
            <p class="" style="font-size: 20px; color:#000;">Related products</p>
            <div class="ps-section__carousel">
                <div class="owl-carousel" data-owl-auto="false" data-owl-loop="true" data-owl-speed="13000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="5" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="5" data-owl-item-xl="5" data-owl-duration="1000" data-owl-mousedrag="on">
               
                    @forelse ($latest as $prod)
                    <div class="ps-section__product">
                        <div class="ps-product ps-product--standard">
                            <div class="ps-product__thumbnail"><a class="ps-product__image" href="{{ route('users.products', [$prod->hashid, $prod->productUrl]) }}">
                                        <figure><img src="{{asset('images/products/'.$prod->image_path)}}" alt="{{$prod->name}}" /><img src="{{asset('images/products/'.$prod->image_path)}}" alt="{{$prod->name}}" />
                                    </figure>
                                </a>
                                <div class="ps-product__badge" style="right:20px; ">
                                    <div class="ps-badge ps-badge--hot" style="background: rgb(225, 136, 136); border-radius:3px; padding:0 0;">-{{number_format($prod->discount)}}%</div>
                                </div>
                            </div>
                            <div class="ps-product__content">
                                <h5 class="ps-p"><a href="{{ route('users.products', [$prod->hashid, $prod->productUrl]) }}">{{$prod->name}}</a></h5>
                                <div class="ps-product__meta"><span class="ps-pr">{{moneyFormat($prod->sale_price)}}   <span style="font-size:15px"> <del> {{moneyFormat($prod->price)}}</del></span></span></span>
                                </div>
                                <div class="ps-product__actions ps-product__group-mobile">
                                    {{-- <div class="ps-product__cart"> <a class="ps-btn ps-btn--primary" href="#" data-toggle="modal" data-target="#popupAddcart">Add to cart</a></div> --}}
                                </div>
                               
                                
                               <center> <a href="{{route('users.products',[$prod->hashid, $prod->productUrl])}}" class="btn btn-primary spinner-border spinner-border-sm"> Add to Cart</a>
                                  <a target="_blank" rel="noopener noreferrer" href="https://wa.me/+2348058885913?text=Please i need {{ $prod->name }}, the  price on your website is {{ moneyFormat($prod->sale_price) }} ">
                                                             <i class="fa fa-whatsapp" aria-hidden="true" style="font-size:20px; border:1px solid #eee; padding:5px; color:#000 "> 
                                                             </i></a> 
                               </center> 
                            </div>
                        
                        </div>
                    </div> 
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
    </section>
</div>

{{-- @if(Session::has('cartalert')) --}}
@include('users.carts.alert')
{{-- @endif --}}

@endsection

@section('script')

<script>


    $(document).ready(function() {
        var myNumberInput = $('#qty');
        var incrementBtn = $('.increment-btn');
        var decrementBtn = $('.decrement-btn');
        var addToCartButton = $('#add2cart');
        
        // var counter = $('.counter');
        incrementBtn.on('click', function() {
            myNumberInput.val(parseInt(myNumberInput.val()) + 1);
                   
        });

        decrementBtn.on('click', function() {
            var currentValue = parseInt(myNumberInput.val());
            if (currentValue > 1) {
                myNumberInput.val(currentValue - 1);
            }
          
        });
        $('#precription_upload').on('change', function(){
        var file = $('#precription_upload')[0].files[0].name;
        $('#fileName').attr('hidden', false);
        $('#fileName').html(file);
    });
        addToCartButton.on('click', function() {
            if($('#fileName').is(':hidden')){
                var file = $('#precription_upload')[0].files[0]
            }else{
                file = [];
            }
            
            if(file != undefined){
                $('#add2cart').html('Please wait ....')
          var formData =  new FormData($('#myForm')[0]);
            cartId = {!! json_encode($product->id) !!}
            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
                $.ajax({
                    url: "{{route('carts.add','')}}"+"/"+cartId,
                    type: "post",
                    data:		formData,
                    contentType: false,
                    processData: false,
                    dataType:	'json',
                    success:function(response){
                        if(response){
                            console.log(response);
                            $('.cartReload').html(response.qty); 
                           $('#popupAddcartV2').modal('show');
                            setTimeout(function() {
                                $('#popupAddcartV2').modal('hide');  
                            }, 5);
                        }else{
                            alert('no');
                        }
                        $('#add2cart').html('Add to Cart');
                    },
                 
                    error: function(xhr, status,error) {
                        console.log(xhr);
                        $('#add2cart').html('Add to Cart')
                    }
                });
            }else{
        let message = "Please upload prescription before adding item to cart"
        toastr.error(message)     
     }
        });
    



      
    });
    function thousands_separators(num)
    {
        var num_parts = num.toString().split(".");
        num_parts[0] = num_parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        return num_parts.join(".");
    }

</script>
@endsection