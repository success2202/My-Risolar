@extends('layouts.admin')
@section('content')
        <div class="container-fluid h-100">
            <div class="row app-block">
                <div class="col-md-3 app-sidebar">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{route('admin.sliderCreate')}}" class="badge badge-info p-2"  style="color:#fff">
                                Add New Slider
                            </a>
                        </div>
                        <div class="app-sidebar-menu">
                            @include('manage.settings.sidebar')
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card">
                        @forelse ($sliders as $ss )
                        <div class="card-body">
                        <h6 class="card-title"> @if($ss->status == 1) <a href="{{route('admin.sliderDeactivate', encrypt($ss->id))}}" class="badge badge-warning "> Deactivate </a> @else <a href="{{route('admin.sliderActivate', encrypt($ss->id))}}" class="badge badge-success"> Activate </a>@endif
                            <span style="float:right"> @if($ss->status == 1) <span class="badge badge-success"> Active  </span> @else <span class="badge badge-warning"> Inactive </span>@endif</span> 
                            &nbsp; &nbsp;  <a  href="{{route('admin.sliderEdit', encrypt($ss->id))}}"  class=" badge badge-info "> Edit Slider</a>
                          &nbsp; &nbsp;  <a  href="{{route('admin.sliderDelete', encrypt($ss->id))}}" onclick="return confirm('Are you sure, you want to delete this slider')" class="badge badge-danger"> Delete Slider</a>
                        </h6>
                            <div class="slider-for">
                               
                                <div class="slick-slide-item">
                                    <img src="{{asset('images/sliders/'.$ss->image_path)}}" class="img-fluid" style="width:100%"
                                         alt="{{asset('images/sliders/'.$ss->image_path)}}">
                                </div>
                            </div>
                            <div class="slider-nav">
                              
                                <div class="slick-slide-item">
                                    <img src="{{asset('images/sliders/'.$ss->image_path)}}" class="img-fluid" alt="{{asset('images/sliders/'.$ss->image_path)}}">
                                </div>
                            </div>
                            <div data-label="Slider Title Text" class="demo-code-preview">
                                {{$ss->title}}
                            </div>
                            <div data-label="Slider Title Text" class="demo-code-preview">
                                {{$ss->content}}
                            </div>
                            {{-- <div data-label="Slider Content Text" class="demo-code-preview">
                                {{$ss->content}}
                            </div> --}}
                        </div>
                        @empty         
                        @endforelse
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

