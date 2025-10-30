@extends('layouts.admin')
@section('content')
@if(Session::has('alert'))
<div class="alert alert-{{ Session::get('alert') }}">
    {{ Session::get('message') }}
</div>
@endif
        <div class="container-fluid h-100">
            <div class="row app-block">
                <div class="col-md-3 app-sidebar">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{route('admin.settings.createaboutus')}}" class="badge badge-info p-2"  style="color:#fff">
                                Add New About us
                            </a>
                        </div>
                        <div class="app-sidebar-menu">
                            @include('manage.settings.sidebar')
                        </div>
                    </div>
                </div>
              
                <div class="col-md-9">
                    <div class="card">
                        @if ($aboutus )
                        <div class="card-body">
                          <a  href="{{route('admin.settings.aboutusEdit', encrypt($aboutus->id))}}"  class=" badge badge-info "> Edit Content</a>
                          &nbsp; &nbsp;  <a  href="{{route('admin.settings.aboutusDelete', encrypt($aboutus->id))}}" onclick="return confirm('Are you sure, you want to delete this content')" class="badge badge-danger"> Delete Content</a>
                        </h6>
                            
                            <div data-label="About us Content Text" class="demo-code-preview">
                                {!! $aboutus->content !!}
                            </div>
                            {{-- <div data-label="Slider Content Text" class="demo-code-preview">
                                {{$ss->content}}
                            </div> --}}
                        </div>
                        @else
                        <p>No About us found.</p>
                        @endif
                    </div>
                </div>
                
            </div>

        </div>
@endsection
@section('script')
<script>
$('.slider-for').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    asNavFor: '.slider-nav'
});

$('.slider-nav').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    asNavFor: '.slider-for',
    centerMode: true,
    focusOnSelect: true
});
</script>
@endsection