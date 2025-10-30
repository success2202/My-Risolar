@extends('layouts.app')
@section('title')
<title> Checkout Address | Sanlive Pharmarcy</title>
@endsection
@section('head')

<link rel="canonical" href="{{ url()->current() }}">
@endsection
@section('content')
@section('styles')

<style>
.labl {
    display : block;
}
.labl > input{ /* HIDE RADIO */
    visibility: hidden; /* Makes input not-clickable */
    position: absolute; /* Remove input from document flow */
}
.labl > input + div{ /* DIV STYLES */
    cursor:pointer;
    border:2px solid transparent;
}
.labl > input:checked + div{ /* (RADIO CHECKED) DIV STYLES */
    background-color: #ffd6bb;
    border: 1px solid #ff6600;
}

</style>
@endsection
<div class="ps-shopping" style="background: #eee">
    <div class="container">
        <div class="ps-shopping__content" >
            <div class="row" >
                <div class="col-12 col-md-7 col-lg-9 mt-5" >
                <div class="row">
               
                <div class="col-12 col-md-12 col-lg-12" style="background: #fff; border-radius:10px">
                <p class="m-4" style="color:#332d2d"> <i class="fa fa-check-square-o" style="color:rgb(79, 81, 79)"></i>  
                    Shipping Address </p> 
                <hr>
                @forelse ($addresses as  $address)
                <label class="labl"> 
                <div class="ps-categogyt m-5 p-3" style="border: 1px solid #4e4a4a51; border-radius: 10px" >
              
                  <table class="table table-responsive"> 
                    <tr> 
                        <td>     <input type="radio"  id="defaul_address" name="defaul_address" value="{{$address->id}}" @if($address->is_default) checked @endif>  </td>
                        <td><p style="color:#322f37">{{$address->name}}</p>
                            <p>{{$address->address}}, {{$address->city}} |  {{$address->state}}, {{$address->country}} 
                                | {{$address->phone}} | {{$address->email}}</p>
                                <a href="{{route('UpdateDefaultAddress',$address->hashid)}}" style="border-radius:5px; font-size:13px; color:rgb(157, 107, 14)" >SELECT ADDRESS </a></td>
                    </tr> 
                  </table>
                 
                    </div>
                </label>
                @empty
                <div class="p-5">
                <a href="{{route('createAddress')}}" class="ps-btn ps-btn--primary w-25" style="border-radius:5px" > Create Address </a> 
                </div>
            @endforelse
            @if(count($addresses) > 0)
            <a href="{{route('createAddress')}}"  class="ml-5" style="border-radius:5px; font-size:15px; font-weight:500; color:#321069" > + ADD ADDRESS </a> 
            <span style="float: right;"> <button type="button" onclick="history.back()" class="   ps-btn--warning m-4" style="border-radius:5px; " >Return Back </button> 
             </span>
            @endif
                </div>
                <div class="col-12 col-md-12 col-lg-12 mt-3" style="background: #fff;  border-radius:10px">
                    <p class="m-4" style="color:#332d2d"> <i class="fa fa-check-square-o" style="color:rgb(70, 73, 70)"></i> Shipping Method</p> 
                   
                 </div>

                  <div class="col-12 col-md-12 col-lg-12 mt-3" style="background: #fff;  border-radius:10px">
                    <p class="m-4" style="color:#332d2d"><i class="fa fa-check-square-o" style="color:rgb(112, 109, 109)"></i> Payment Method</p> 
                  
                   
                    </div>
               </div>
                </div>
            
                @if(count($carts) > 0)
                <div class="col-12 col-md-5 col-lg-3">
                    <div class="ps-shopping__box mt-5" style="background: #fff">
                        <div class="ps-shopping__row" >
                            <div class="ps-shopping__label">Cart Summary</div>
                        </div>

                        <div class="ps-shopping__form">
                            <div class="ps-shopping__group">
                                <input class="form-control ps-input" type="text" placeholder="County">
                            </div>
                            <div class="ps-shopping__group">
                                <input class="form-control ps-input" type="text" placeholder="Town / City">
                            </div>
                            <div class="ps-shopping__group">
                                <input class="form-control ps-input" type="text" placeholder="Postcode">
                            </div>
                        </div>
                        <div class="ps-shopping__row">
                            <div class="ps-shopping__label">Total</div>
                            <div class="ps-shopping__price">₦{{\Cart::priceTotal()}}</div>
                        </div>
                        <div class="ps-shopping__text">Shipping options will be updated during checkout.</div>
                       
                        <div class="ps-shopping__checkout"><a class="ps-btn ps-btn--success"  style="border-radius:5px" href="{{route('checkout.index')}}">Proceed to checkout</a>
                            <a class="ps-shopping__link" href="{{route('shops.index')}}">Continue Shopping</a></div>
                    </div>
                </div>
                @endif
            </div>
        
        </div>
    </div>
</div>
<div style="height: 2em; background:#eee"></div>

@endsection

@section('script')
<script>
  

</script>
@endsection