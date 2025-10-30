@extends('layouts.admin')
@section('content')
<div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                     <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h6 class="card-title">Blog</h6>
                                <div>
                                    <a href="{{route('admin.blog.create')}}" class="btn btn-info">Create Blog</a>
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
                                                <th>Title</th>
                                                <th>Image</th>
                                                 <th>Created At</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                        @forelse ($blogs as  $sp)
                                            <tr>
                                                <td>
                                                    <a href="#">{{$sp->title}}</a>
                                                </td>
                                                <td>
                                                    <img src="{{asset('images/blog/'.$sp->image)}}" width="100px" height="100px"> 
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
                                                                 <a href="{{route('admin.blog.edit', $sp->hashid)}}" class="dropdown-item">Edit Blog</a>
                                                    
                                                            <form method="post" action="{{route('admin.blog.delete',$sp->hashid)}}" id="form1"> 
                                                            @csrf  
                                                              <button type="submit" onclick="return confirm('Are you sure you want to delete blog')" class="dropdown-item" style="color:red">Delete</button>
                                                             </form>
                                                       
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
$('.clockpicker-example').clockpicker({
    autoclose: true
});

$('input[name="audition_date"]').daterangepicker({
  singleDatePicker: true,
  showDropdowns: true
});

let message = {!! json_encode(Session::get('message')) !!};
let msg = {!! json_encode(Session::get('alert')) !!};
//alert(msg);
toastr.options = {
        timeOut: 3000,
        progressBar: true,
        showMethod: "slideDown",
        hideMethod: "slideUp",
        showDuration: 200,
        hideDuration: 200
    };
if(message != null && msg == 'success'){
toastr.success(message);
}else if(message != null && msg == 'error'){
    toastr.error(message);
}
</script>
@endsection