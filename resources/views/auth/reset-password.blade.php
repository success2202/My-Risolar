

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{config('app.name')}} - Reset Password</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('images/'.$settings->site_fav)}}"/>

    <!-- Plugin styles -->
    <link rel="stylesheet" href="{{asset('/backend/vendors/bundle.css')}}" type="text/css">

    <!-- App styles -->
    <link rel="stylesheet" href="{{asset('/backend/css/app.min.css')}}" type="text/css">
</head>
<body class="form-membership">

<!-- begin::preloader-->
<div class="preloader">
    <div class="preloader-icon"></div>
</div>
<!-- end::preloader -->

<div class="form-wrapper">

    <!-- logo -->
    <div id="logo">
        <img class="logo" src="{{asset('/images/'.$settings->site_logo)}}" style="width: 150px" alt="{{asset('/images/'.$settings->site_logo)}}">
    </div>
    <!-- ./ logo -->

    <h5>Reset password</h5>

    <!-- form -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form method="POST" action="{{ route('password.update') }}">
        @csrf
    <input type="hidden" name="token" value="{{ $request->route('token') }}">
        <div class="form-group">
            <input type="text" name="email" value="{{old('email', $request->email)}}" class="form-control" placeholder=" email"  >
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Enter Password" type="password" name="password" required>
        </div>
        <div class="form-group">
            <input    type="password" name="password_confirmation" placeholder="Confirm Password" class="form-control"  required>
        </div>
        <button class="btn btn-primary btn-block">  {{ __('Reset Password') }}</button>
        <hr>
        <a href="{{route('register')}}" class="btn btn-sm btn-outline-light mr-1">Register now!</a>
        or
        <a href="{{route('login')}}" class="btn btn-sm btn-outline-light ml-1">Login!</a>
    </form>
    <!-- ./ form -->

</div>

<!-- Plugin scripts -->
<script src="{{asset('backend/vendors/bundle.js')}}"></script>

<!-- App scripts -->
<script src="{{asset('backend/js/app.min.js')}}"></script>
<script type="text/javascript">


    let message = {!! json_encode(Session::get('msg')) !!};
    let msg = {!! json_encode(Session::get('alert')) !!};
    //alert(msg);
    toastr.options = {
            timeOut: 6000,
            progressBar: true,
            showMethod: "slideDown",
            hideMethod: "slideUp",
            showDuration: 200,
            hideDuration: 600
        };
    if(message != null && msg == 'success'){
    toastr.success(message);
    }else if(message != null && msg == 'error'){
        toastr.error(message);
    }        
         </script>
</body>
</html>


 

