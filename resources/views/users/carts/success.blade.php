@extends('layouts.app')

@section('title')
<title>Order Success | Risolar</title>
@endsection

@section('content')
<div class="container py-5 text-center">
    <div class="card shadow-sm p-4">
        <h2 class="text-success mb-3">🎉 Order Successful!</h2>

        @if($success)
            <p class="text-muted">{{ $success }}</p>
        @else
            <p class="text-muted">Your order has been successfully placed.</p>
        @endif

        <a href="{{ route('users.products') }}" class="btn btn-gradient mt-3">
            Continue Shopping
        </a>

         <a href="{{ route('users.orderList') }}" class="btn btn-primary">
            View order
        </a>
    </div>
</div>
@endsection
