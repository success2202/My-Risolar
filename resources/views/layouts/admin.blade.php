<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> {{config('app.name')}}</title>
    <!-- Favicon -->
 <link rel="stylesheet" href="{{asset('/backend/vendors/dataTable/dataTables.min.css')}}" type="text/css">
  <link rel="icon" href="{{ asset('/images/'.$settings->fav)}}">
    <!-- Plugin styles -->
    <link rel="stylesheet" href="{{asset('/backend/vendors/bundle.css')}}" type="text/css">
  <!-- Datepicker -->
    <link rel="stylesheet" href="{{asset('/backend/vendors/clockpicker/bootstrap-clockpicker.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('/backend/vendors/datepicker/daterangepicker.css')}}">
    <link rel="stylesheet" href="{{asset('/backend/vendors/slick/slick.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('/backend/vendors/slick/slick-theme.css')}}" type="text/css">
    <!-- Vmap -->
    <link rel="stylesheet" href="{{asset('/backend/vendors/vmap/jqvmap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/backend/css/app.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('/backend/vendors/select2/css/select2.min.css')}}" type="text/css">
    @yield('styles')
</head>
<body>
    <!-- App styles  -->
<div class="preloader">
    {{-- <div class="preloader-icon"></div> --}}
</div>
<div id="main">
    <!-- begin::navigation -->
    <div class="navigation">
        <div class="navigation-menu-tab">
          <div>
                <div class="navigation-menu-tab-header" data-toggle="tooltip" title="Admin" data-placement="right">
                    <a href="{{route('admin.index')}}" class="nav-link" data-toggle="dropdown" aria-expanded="false">
                        <figure class="avatar avatar-sm">
                                 <img src="{{asset('images/'.$settings->site_logo)}}" height="10px" width="10px">
                        </figure>
                    </a>
                </div>
            </div>
               <div class="flex-grow-1">
               <ul>
                    <li>
                        <a class="active" href="" data-toggle="tooltip" data-placement="right" title="Dashboard"
                           data-nav-target="#dashboards">
                            <i data-feather="bar-chart-2"></i>
                        </a>
                    </li>
                    </ul>
            </div>
              <div>
                <ul>
                    <li>
                        <a href="" data-toggle="tooltip" data-placement="right" title="Settings">
                            <i data-feather="settings"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.logout') }}" onclick="event.preventDefault() 
                                        document.getElementById('logout-form').submit()" data-placement="right" title="Logout">
                            <i data-feather="log-out"></i>
                        </a>
                         <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" >
                                        @csrf
                                    </form> 
                    </li>
                </ul>
            </div>
        </div>

        <!-- begin::navigation menu -->
        <div class="navigation-menu-body">
            <!-- begin::navigation-logo -->
            <div>
                <div id="navigation-logo">
                    <a href="{{route('admin.index')}}">
                        <img class="logo" src="{{asset('images/'.$settings->site_logo)}}" height="auto" width="120px" alt="{{asset('images/'.$settings->site_logo)}}">
                        <img class="logo-light" src="{{asset('images/'.$settings->site_logo)}}" height="auto" width="120px" alt="{{asset('images/'.$settings->site_logo)}}">
                    </a>
                </div>
            </div>
            <!-- end::navigation-logo -->
          @include('layouts.sidebar')
        </div>
        <!-- end::navigation menu -->

    </div>
    
 <div class="main-content">
        <div class="page-header">
            <div class="container-fluid d-sm-flex justify-content-between">
                <h4>{{$bheading}}</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.index')}}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{$breadcrumb}}</li>
                    </ol>
                </nav>
            </div>
        </div>

        <!-- end::page-header -->
    @yield('content')

    <footer>
        <div class="container-fluid">
            <div>© {{date('Y')}} {{$settings->site_name}}, All Rights Reserved</a></div>
            <div>
                {{-- <nav class="nav">
                    
                    <a href="">Home</a>
                    <a href=""> Pages</a>
                    <a href=""> </a>
                    
                </nav> --}}
            </div>
        </div>
    </footer>
        <!-- end::footer -->

    </div>
    <!-- end::main-content -->

</div>
<!-- end::main -->

<!-- Plugin scripts -->
<script src="{{asset('/backend/vendors/bundle.js')}}"></script>
<!-- Chartjs -->
<script src="{{asset('/backend/vendors/charts/chartjs/chart.min.js')}}"></script>
<script src="{{asset('/backend/vendors/dataTable/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('/backend/vendors/dataTable/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('/backend/vendors/dataTable/dataTables.bootstrap4.min.js')}}"></script>
<!-- Apex chart -->
<script src="{{asset('/backend/vendors/charts/apex/apexcharts.min.js')}}"></script>
<script src="{{asset('/backend/vendors/irregular-data-series.js')}}"></script>
<script src="{{asset('/backend/vendors/charts/apex/apexcharts.min.js')}}"></script>

<!-- Circle progress -->
<script src="{{asset('/backend/vendors/circle-progress/circle-progress.min.js')}}"></script>
<!-- Peity -->
<script src="{{asset('/backend/vendors/charts/peity/jquery.peity.min.js')}}"></script>
<script src="{{asset('/backend/js/examples/charts/peity.js')}}"></script>

<script src="{{asset('/backend/vendors/prism/prism.js')}}"></script>
<script src="{{asset('/backend/js/examples/clockpicker.js')}}"></script>
<!-- Datepicker -->
<script src="{{asset('/backend/vendors/datepicker/daterangepicker.js')}}"></script>
<script src="{{asset('/backend/vendors/clockpicker/bootstrap-clockpicker.min.js')}}"></script>
<!-- Slick -->
<script src="{{asset('/backend/vendors/slick/slick.min.js')}}"></script>
<!-- Vamp -->
<script src="{{asset('/backend/vendors/vmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('/backend/vendors/vmap/maps/jquery.vmap.usa.js')}}"></script>
<script src="{{asset('/backend/js/examples/vmap.js')}}"></script>
<script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>
<script src="{{asset('/backend/vendors/select2/js/select2.min.js')}}"></script>

<!-- Dashboard scripts -->
<script src="{{asset('/backend/js/examples/dashboard.js')}}"></script>
<div class="colors"> <!-- To use theme colors with Javascript -->
    <div class="bg-primary"></div>
    <div class="bg-primary-bright"></div>
    <div class="bg-secondary"></div>
    <div class="bg-secondary-bright"></div>
    <div class="bg-info"></div>
    <div class="bg-info-bright"></div>
    <div class="bg-success"></div>
    <div class="bg-success-bright"></div>
    <div class="bg-danger"></div>
    <div class="bg-danger-bright"></div>
    <div class="bg-warning"></div>
    <div class="bg-warning-bright"></div>
</div>
<!-- App scripts -->
<script src="{{asset('/backend/js/app.min.js')}}"></script>


{{-- <script>
    BalloonEditor
            .create( document.querySelector( '#summernote' ) )
            .then( editor => {
                 //   console.log( editor );
            } )
            .catch( error => {
                    //console.error( error );
            } );
</script> --}}

<script>
    $('.select2-example').select2({
    placeholder: 'Select Products Customer wants to buy'
});
    $(document).ready(function (){
    $('#myTable').DataTable();
});

    CKEDITOR.replace( 'summernote' );
</script>
@yield('script')


</body>
</html>