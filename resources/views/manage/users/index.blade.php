@extends('layouts.admin')
@section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
 
                <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h2 class="font-weight-bold mb-2">{{$products}}</h2>
                                    <div>Total Products</div>
                                </div> 
                                <div>
                                    <span class="dashboard-pie-1">{{$products}}/100</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h2 class="font-weight-bold mb-2">{{$order}}</h2>
                                    <div>Number of Orders</div>
                                </div>
                                <div>
                                    <span class="dashboard-pie-2">{{$order}}/100</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h2 class="font-weight-bold mb-2">{{$users}}</h2>
                                    <div>Registered Users</div>
                                </div>
                                <div>
                                    <span class="dashboard-pie-3">{{$users}}/100</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h2 class="font-weight-bold mb-2">{{moneyFormat($sales)}}</h2>
                                    <div>Total Orders </div>
                                </div>
                                <div>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h6 class="card-title">Recent Orders</h6>
                                <div>
                                    <a href="#" class="mr-3">
                                        <i class="fa fa-refresh"></i>
                                    </a>
                                    <div class="dropdown">
                                        <a href="#" data-toggle="dropdown" aria-haspopup="true"
                                           aria-expanded="false">
                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item">Report</a>
                                            <a href="#" class="dropdown-item">Download</a>
                                            <a href="#" class="dropdown-item">Close</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                 <div class="table-responsive">
                                        <table id="myTable" class="table table-striped table-bordered">
                                           <thead>
                                            <tr>
                                                <th>User Email</th>
                                                <th>Order No</th>
                                                <th>Payment Ref</th>
                                                  <th>Payment Method</th>
                                                <th>Amount</th>
                                                <th>Payment Status</th>
                                                <th>Completion Status</th>
                                                <th>Dispatch Status</th>
                                                 <th>Created At</th>
                                                 <th> &nbsp; &nbsp; &nbsp;&nbsp; </th>
                                            </thead>
                                            <tbody>
                                        @forelse ($orders as  $sp)
                                        
                                            <tr>
                                                <td>
                                                    <a href="#">{{substr($sp->user->email,0,15)}}..</a>
                                                </td> 
                                                <td>
                                                    <a href="#">{{$sp->order_no}}</a>
                                                </td>
                                                <td>
                                                    <a href="#">{{$sp->payment_ref??"-"}}</a>
                                                </td>
                                                <td>
                                                    <a href="#">{{_('card')}}</a>
                                                </td>
                                                 <td>
                                                    <a href="#">{{number_format($sp->payable,2)}}</a>
                                                </td>
                                                 <td>
                                                    @if($sp->is_paid == 1) <span  class="badge badge-success">Paid</span> @else <span type="span" class="badge badge-light">Pending</span> @endif</a>
                                                </td> 
                                                <td>
                                                <a href="#">@if($sp->is_delivered == 1) <span  class="badge badge-info">Initiated</span>
                                                    @elseif($sp->is_delivered == 2) <span  class="badge badge-primary">Completed</span>
                                                    @elseif($sp->is_delivered == 3) <span  class="badge badge-danger">Cancelled</span>
                                                    @else <span class="badge badge-light">Pending</span> @endif</a>
                                                </td>
                                                <td>
                                                <a href="#">@if($sp->dispatch_status == 1) <span  class="badge badge-primary">Dispatched</span> 
                                                    @elseif($sp->dispatch_status == 2) <span class="badge badge-success">Delivered</span>
                                                    @else <span  class="badge badge-light">Pending</span>@endif</a>
                                                </td>      
                                                  <td>
                                                    <a href="#">{{$sp->created_at->format('d/M/y')}}</a>
                                                </td>
                                               
                                                        
                                                <td class="text-right">
                                                    <div class="dropdown">
                                                        <a href="#" data-toggle="dropdown">
                                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a href="{{route('admin.order-details', encrypt($sp->order_no))}}" class="dropdown-item">View Order Details</a>
                                                            <a href="{{route('admin.shipping', encrypt($sp->order_no))}}" class="dropdown-item">View Shipping</a>
                                                          <a href="{{route('order.status', encrypt($sp->order_no))}}" class="dropdown-item">Update Status</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                             @empty
                                             <tr>
                                                <td> No data available </td>
                                                </tr>
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
        </div>

      

@endsection
@section('script')
<script>
    $(function () {
        $('.slick-js').slick({
            speed: 500,
            arrows: false,
            slidesToShow: 5,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            responsive: [
                {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 3
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]
        });
    })
</script>
@endsection
