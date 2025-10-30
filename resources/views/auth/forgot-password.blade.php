
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
        <img class="logo" src="{{asset('/images/'.$settings->site_logo)}}" style="width: 150px" alt="image">
    </div>
    <!-- ./ logo -->

    <h5>Reset password</h5>

    <!-- form -->
    
<form method="POST" action="{{ route('password.email') }}">
    @csrf
        <div class="form-group">
            <input type="text" name="email" class="form-control" placeholder=" email" required autofocus>
        </div>
        <button class="btn btn-primary btn-block"> {{ __('Email Password Reset Link') }}</button>
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


 