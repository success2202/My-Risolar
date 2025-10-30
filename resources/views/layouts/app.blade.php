<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
{{-- <title>@if(isset($breadcrum)){{$breadcrum}} @else {{$settings->site_name}} @endif </title> --}}
<!-- Stylesheets -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet"
href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&amp;family=Roboto:wght@400;700&amp;display=swap">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css">
<!-- Bootstrap 5 scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<link rel="stylesheet" href="{{asset('/frontend/css/libraries.css')}}">
<link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">

<link rel="shortcut icon" href="{{asset('images/'.$settings->fav)}}" type="image/x-icon">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
@yield('styles')


</head>
<body>
    <div class="wrapper">
      {{-- <div class="preloader">
        <div class="loading"><span></span><span></span><span></span><span></span></div>
      </div><!-- /.preloader --> --}}
      @include('layouts.header_top')
   @include('layouts.header')
    @yield('content')

<!--== Start Footer Area Wrapper ==-->
@include('layouts.footer')
<!-- End Off Canvas Menu Wrapper -->
@yield('script')


</body>
</html>