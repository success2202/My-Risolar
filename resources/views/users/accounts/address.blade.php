@extends('layouts.app')
@section('title')
<title> Addresses | Sanlive Pharmarcy</title>
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
               
 <!-- Main Content -->
        <div class="col-md-9">

            @forelse ($addresses as $address)
            <div class="card shadow-sm rounded-3">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <strong>Billing Address</strong>
                    <span class="badge bg-danger">Default</span>
                    <a href="{{route('users.address.edit', $address->hashid)}}" class="text-warning ms-2">
                        <i class="bi bi-pencil-square"></i>
                    </a>
                </div>
                <div class="card-body">
                    <p><strong>Name:</strong> {{ucfirst($address->name  )}}</p>
                    <p><strong>Address:</strong> {{ $address->address ?? 'No address added yet' }}</p>
                    <p><strong>Email:</strong> {{ $address->email ?? '' }} </p>
                    <p><strong>Phone:</strong> {{ $address->phone ?? '' }}</p>
                    <p><strong>City:</strong> {{ $address->city ?? '' }}</p>
                </div>
            </div>

 @empty
                        <div class="col-12 col-md-6">
                            <div class="ps-categogy--list">
                                <div class="ps-product ps-product--list"
                                style="border:2px solid #d1d5dad4; border-radius:10px">
                                <div class="ps-product__conent" style="border-right:0px">
                        <div class="ps-product__info"><a class="ps-product__branch" href="#"></a>
                            <p class="ps-product__tite " style="font-size:16px; color:#262525"><a></a>

                              Shipping Address <small style="font-size: 10px; color:rgb(117, 131, 242)"> Default</small>
                                <span style="float: right"> <a href=""> <i class="icon-pen"></i> </a> </span>
                            </p>
                            <hr>
                            
                            <ul class="ps-product__list">
                                <li> <span class="ps-list__title"> </span>You don't have a shippig address yet <br>
                                    <a href="{{route('users.address.create')}}" class="btn btn-info">Add Shipping Address</a>
                                 
                            </li>
                            </ul>
                        </div>
                                </div>
                            </div>
                        </div>
                        </div>

                        @endforelse


            <div class="mt-4">
                <a href="{{route('users.address.create')}}" class="btn btn-warning fw-bold px-4 py-2">
                    Add New Address
                </a>
            </div>
        </div>
   





            </div>
        </div>
    </div>
</div>
<div style="height: 2em; background:#eee"></div>

@endsection



