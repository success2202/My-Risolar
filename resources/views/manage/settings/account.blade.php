@extends('layouts.admin')
@section('content')
      
<div class="container-fluid">

    <div class="row">
        <div class="col-md-4">

            <div class="card">
                <div class="card-body text-center">
                    <figure class="avatar avatar-lg m-b-20">
                        <img src="{{asset('assets/logo.png')}}" class="rounded-circle" alt="image">
                    </figure>
                    <h5 class="mb-1">{{$user->name}}</h5>
                    <p class="text-muted small">Administrator</p>
                </div>
                <hr class="m-0">
               
            </div>

            <div class="card">
                <div class="card-body">
                    <h6 class="card-title d-flex justify-content-between align-items-center">
                        Information
                       
                    </h6>
                    <div class="row mb-2">
                        <div class="col-4 text-muted">First Name:</div>
                        <div class="col-8">{{$user->name}}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-4 text-muted">Email</div>
                        <div class="col-8">{{$user->email}}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-4 text-muted">Phone</div>
                        <div class="col-8">{{$user->phone}}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-4 text-muted">Last Login</div>
                        <div class="col-8">{{$user->last_login}}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-4 text-muted">Login IP</div>
                        <div class="col-8">{{$user->login_ip}}.</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-6 text-muted">Login Location</div>
                        <div class="col-6">{{$user->new_login}}</div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-8">

            <div class="card">
                <div class="card-body">
                    <form method="post" action="{{route('admin.UpdateAccount')}}">
                        @csrf
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" name="name"  value="{{$user->name}}" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1"
                                       aria-describedby="emailHelp" placeholder="Update Name">
                                <small id="emailHelp" class="form-text text-muted">Update Name
                                </small>
                                @error('name')
                                <span class="invalid-feedback"> <small> * </small> </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="email" name="email"  value="{{$user->email}}" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1"
                                       aria-describedby="emailHelp" placeholder="Update Login Email">
                                <small id="emailHelp" class="form-text text-muted">Update Login Email
                                </small>
                                @error('email')
                                <span class="invalid-feedback"> <small> * </small> </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" name="phone"  value="{{$user->phone}}" class="form-control @error('phone') is-invalid @enderror" id="exampleInputEmail1"
                                       aria-describedby="emailHelp" placeholder="Update Phone Number">
                                <small id="emailHelp" class="form-text text-muted">Update Phone Number
                                </small>
                                @error('phone')
                                <span class="invalid-feedback"> <small> * </small> </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="password" name="password"  value="**************" class="form-control @error('password') is-invalid @enderror" id="exampleInputEmail1"
                                       aria-describedby="emailHelp" placeholder="Change Password">
                                <small id="emailHelp" class="form-text text-muted">Change Passsword
                                </small>
                                @error('password')
                                <span class="invalid-feedback"> <small> * </small> </span>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary"> Update Details</button>
                    </form>
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