@extends('layouts.app')
@section('content')
<div class="ps-page__content">
    <div class="row p-5">
        <div class="col-12 col-md-12 col-lg-12" style="display: block; text-align:center">
            
            <p>Something went wrong, please refresh page<p>
            <a class="btn btn-success" style="border-radius: 5px" href="{{route('users.index')}}">Back to homepage</a>
      
        </div>
    </div>
</div>
@endsection