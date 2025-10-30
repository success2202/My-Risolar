@extends('layouts.admin')
@section('content')
<div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                     <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h6 class="card-title">Shipping Details</h6>
                                <div>
                                    <a href="#" class="mr-3">
                                        <i class="fa fa-refresh"></i>
                                    </a>
                                    <div class="dropdown">
                                        <a href="#" data-toggle="dropdown" aria-haspopup="true"
                                           aria-expanded="false">
                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                 <div class="table-responsive">
                                        <table id="myTable" class="table table-striped table-bordered">
                                           <thead>
                                            <tr>
                                                
                                                <th>Receiver Name</th>
                                                  <th>Receiver Email</th>
                                                <th>Phone</th>
                                                <th>Address</th>
                                                <th>City</th>
                                                  <th>State</th>
                                                 <th>Postal Code</th>
                                                 <th>Country</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                       
                                            <tr>
                                            @if(isset($shipping))
                                            
                                                <td>
                                                    <a href="#">{{$shipping->name}}</a>
                                                </td>
                                            
                                                 <td>
                                                    <a href="#">{{$shipping->email}}</a>
                                                </td>
                                                  <td>
                                                    <a href="#">{{$shipping->phone}}</a>
                                                </td>
                                                 <td>
                                                    <a href="#">{{$shipping->address}}</a>
                                                </td>
                                                <td>
                                                    <a href="#">{{$shipping->city}}</a>
                                                </td>
                                                <td>
                                                    <a href="#">{{$shipping->state}}</a>
                                                </td>
                                                <td>
                                                    <a href="#">{{$shipping->postal_code}}</a>
                                                </td>
                                                <td>
                                                    <a href="#">{{$shipping->country}}</a>
                                                </td>
                                            
                                            </tr>
                                              @else 
                                              <tr>
                                              <td> No data available </td>
                                              </tr>
                                              @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h6 class="card-title">Delivery Information</h6>
                                <div>
                                    <a href="#" class="mr-3">
                                        <i class="fa fa-refresh"></i>
                                    </a>
                                    <div class="dropdown">
                                        <a href="#" data-toggle="dropdown" aria-haspopup="true"
                                           aria-expanded="false">
                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                 <div class="table-responsive">
                                        <table id="myTable" class="table table-striped table-bordered">
                                           <thead>
                                            <tr>
                                                <th>Courier Id</th>
                                                  <th> Courier Name</th>
                                                <th>fuel Surcharge</th>
                                                <th>shipment charge</th>
                                                <th>shipment charge total</th>
                                                  <th>effective Incoterms</th>
                                                  <th>Status</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                       
                                            <tr>
                                            @if(isset($delivery) && count($delivery) > 0)
                                            
                                                <td>
                                                    <a href="#">{{$delivery['id']}}</a>
                                                </td>
                                            
                                                 <td>
                                                    <a href="#">{{$delivery['name']}}</a>
                                                </td>
                                                  <td>
                                                    <a href="#">{{$delivery['fuel_surcharge']}}</a>
                                                </td>
                                                 <td>
                                                    <a href="#">{{$delivery['shipment_charge']}}</a>
                                                </td>
                                                <td>
                                                    <a href="#">{{$delivery['total_charge']}}</a>
                                                </td>
                                                <td>
                                                    <a href="#">{{$delivery['effective_incoterms']}}</a>
                                                </td>
                                                <td>
                                                    <a href="#"><span class="badge bg-success"> Paid</span></a>
                                                </td>
                                            
                                            </tr>
                                              @else 
                                              <tr>
                                              <td> There was error generating shipping information or delivery information does not exist</td>
                                              </tr>
                                              @endif
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