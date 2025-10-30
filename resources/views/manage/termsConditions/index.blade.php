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
                            <a href="{{route('admin.settings.createtermsConditions')}}" class="badge badge-info p-2"  style="color:#fff">
                                Add New Terms and Conditions
                            </a>
                        </div>
                        <div class="app-sidebar-menu">
                            @include('manage.settings.sidebar')
                        </div>
                    </div>
                </div>
              
                <div class="col-md-9">
                    <div class="card">
                        @if ($termscondition )
                        <div class="card-body">
                          <a  href="{{route('admin.settings.termsConditionsEdit', encrypt($termscondition->id))}}"  class=" badge badge-info "> Edit Content</a>
                          &nbsp; &nbsp;  <a  href="{{route('admin.settings.termsConditionsDelete', encrypt($termscondition->id))}}" onclick="return confirm('Are you sure, you want to delete this content')" class="badge badge-danger"> Delete Content</a>
                        </h6>
                            
                            <div data-label="Terms and Conditions Content Text" class="demo-code-preview">
                                {!! $termscondition->content !!}
                            </div>
                            {{-- <div data-label="Slider Content Text" class="demo-code-preview">
                                {{$ss->content}}
                            </div> --}}
                        </div>
                        @else
                        <p>No Terms and Condition found.</p>
                        @endif
                    </div>
                </div>
                
            </div>

        </div>
@endsection
@section('script')

@endsection