@extends('layouts.app')
@section('title')
<title> FAQ - Sanlive Pharmacy  </title>
@endsection
@section('head')
<link rel="canonical" href="{{ url()->current() }}">
@endsection
@section('content')

<div class="ps-about">
    <div class="container">
        <ul class="ps-breadcrumb">
            <li class="ps-breadcrumb__item"><a href="">Home</a></li>
            <li class="ps-breadcrumb__item active" aria-current="page">FAQ</li>
        </ul>
    </div>
    <div class="ps-about__content">
        <section class="ps-about__project">
            <div class="container">
                {{-- <h2 class="ps-about__title">Your home medical provider now also online</h2> --}}
                <section class="ps-section">
                    <div class="ps-section__cntent">
                        <div class="ps-section__desc" style="color:#09376e">    {!! $faq->content !!}</div>
                    </div>
                </section>
            </div>
        </section>
       
    </div>
 
</div>

@endsection