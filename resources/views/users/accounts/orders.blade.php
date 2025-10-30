

@extends('layouts.app')
@section('title')
<title> My Orders | Risolar</title>
@endsection
@section('head')

<link rel="canonical" href="{{ url()->current() }}">
@endsection
@section('content')
@section('styles')
    <style>
        .navIL 
        {
            padding: 15px;
            padding-left: 10px
        }
        .dropdown-item:hover 
        {
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
                      <span class="pt-5 pl-5">  Open Orders   <hr style="width:100%">  </span>
       @forelse($orders as $order)

    <div class="col-12 mb-4">
        <div class="card shadow-sm border-0 rounded-3">
            <div class="row g-0">
                {{-- Thumbnail --}}
                <div class="col-md-4">
                    @if($order)
                        <a href="{{ route('users.orders.details', $order->order_no) }}">
                            <img src="{{ asset('images/products/'.$order->image) }}" 
                                 class="img-fluid rounded-start" 
                                 alt="{{ $order->product_name }}">
                        </a>
                    @else
                        <img src="{{ asset('images/no-image.png') }}" 
                             class="img-fluid rounded-start" 
                             alt="No product">
                    @endif
                </div>

                {{-- Order Info --}}
                <div class="col-md-8">
                    <div class="card-body">
                        <h6 class="card-title">
                            {{ $order->product_name ?? 'No Product' }}
                        </h6>
                        <p class="card-text mb-1">
                            Order No: <strong>{{ $order->order_no }}</strong> 
                            {{-- <strong>Channel:</strong> {{ $order->channel }} <br> --}}
                            <p>Quantity: {{ $order->qty }} </p>
                            <p>Amount: {{ moneyFormat($order->price,2) }}</p>
                        </p>

                        {{-- Status Badges --}}
                        <p>
                            @if($order->dispatch_status == 1) 
                                <span class="badge bg-success">Delivered</span>
                            @elseif($order->dispatch_status == 0) 
                                <span class="badge bg-info">Awaiting Confirmation</span>
                            @elseif($order->dispatch_status == -1) 
                                <span class="badge bg-danger">Cancelled</span>
                            @elseif($order->dispatch_status == 2) 
                                <span class="badge bg-primary">Shipped</span>
                            @endif

                            @if($order->is_paid == 1) 
                                <span class="badge bg-success">Paid</span>
                            @else 
                                <span class="badge bg-warning text-dark">Not Paid</span>
                            @endif
                        </p>

                        <small class="text-muted">
                            Created: {{ \Carbon\Carbon::parse($order->created_at)->format('d M Y, h:i A') }}
                        </small>

                        <a href="{{ route('users.orders.details', $order->order_no) }}" 
                           class="btn btn-outline-primary btn-sm float-end">
                            View Details
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@empty
    <div class="col-12">
        <div class="alert alert-info text-center">
            You don’t have any order yet.  
            <a href="{{route('users.products')}}" class="btn btn-primary btn-sm mt-2">Start Shopping</a>
        </div>
    </div>
@endforelse

{{-- Pagination --}}
<div class="d-flex justify-content-center mt-4">
    {{-- {{ $orders->links('pagination::bootstrap-4') }} --}}
</div>



                </div>



            </div>

        </div>
    </div>
</div>
<div style="height: 2em; background:#eee"></div>

@endsection

@section('script')
@endsection