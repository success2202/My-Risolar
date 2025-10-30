@extends('layouts.admin')
@section('content')
<div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                     <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h6 class="card-title">Prescription</h6>
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
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Address</th>
                                                 <th>City</th>
                                                <th>State</th>
                                                <th>Prescription</th>
                                                <th>Date Uploaded</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                  
                                        @if(count($prescription) > 0)
                                        @foreach ($prescription as  $sp)
                                            <tr>
                                                <td>
                                                    <a href="#">{{$sp->name}}</a>
                                                </td> 
                                                <td>
                                                    <a href="#">{{$sp->email}}</a> 
                                                </td>
                                                <td>
                                                    <a href="#">{{$sp->phone}}</a> 
                                                </td>   
                                                <td>
                                                    <a href="#">{{$sp->address}}</a> 
                                                </td>  
                                                <td>
                                                    <a href="#">{{$sp->city}}</a> 
                                                </td>  
                                                <td>
                                                    <a href="#">{{$sp->state}}</a> 
                                                </td>  
                                                <td>
                                                    <a href="{{$sp->image}}" target="_blank" rel="noopener noreferrer"><img src="{{$sp->image}}" width="50px" height="50px">
                                                   <br> Download</a> 
                                                </td>  
                                                  <td>
                                                    <a href="#">{{$sp->created_at->format('d/M/y')}}</a>
                                                </td>
                                               
                                            </tr>
                                              @endforeach
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
                    </div>
                </div>
                 </div>
                  </div>

@endsection