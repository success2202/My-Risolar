@extends('layouts.app')
@section('title')
<title> My Payments | Sanlive Pharmarcy</title>
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
                       <div class="table-responsive-sm">
                        <table class="table ps-table ps-table--product">
                            <thead>
                                @if(count($payments) > 0)
                                <tr>
                                   
                                    <th>Order No</th>
                                    <th>Payment Ref</th>
                                    <th >External Ref</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                   
                                </tr>
                                @endif
                            </thead>
                            <tbody>
                                @forelse ($payments as  $pay)
                                <tr>
                                    <td > {{$pay->order_id}}</td>
                                    <td > {{$pay->payment_ref}}</td>
                                    <td >{{$pay->external_ref}} </td>
                                    <td >{{moneyFormat($pay->payable)}}</td>
                                    <td >
                                        @if($pay->status == 1) 
                                        <span class="badge badge-success"> Success</span> 
                                        @else <span class="badge badge-warning"> Pending</span>
                                         @endif
                                    </td>
                                </tr>
                                @empty
                                
                                    <p style="margin: 80px auto"> No Data Found</p>
                                    
                                
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<div style="height: 2em; background:#eee"></div>

@endsection



