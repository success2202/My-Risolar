@extends('layouts.app')
@section('title')
<title> Doctor Prescription - Sanlive Pharmacy  </title>
@endsection
@section('head')
<link rel="canonical" href="{{ url()->current() }}">
@endsection
@section('content')
<div class="ps-checkout">
    <div class="container">
        <ul class="ps-breadcrumb">
            <li class="ps-breadcrumb__item"><a href="">Home</a></li>
            <li class="ps-breadcrumb__item active" aria-current="page"> Doctor's Prescription</li>
        </ul>
        <div class="ps-checkout__content">
    <form action="{{route('doctores.prescription')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="ps-checkout__form">
                    <h3 class="ps-checkout__heading">Patient's Information</h3>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="ps-checkout__group">
                                <label class="ps-checkout__label">Full name *</label>
                                <input class="ps-input"  value="{{old('name')}}" name="name" type="text">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="ps-checkout__group">
                                <label class="ps-checkout__label">Email address *</label>
                                <input class="ps-input" value="{{old('email')}}" name="email" type="email">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="ps-checkout__group">
                                <label class="ps-checkout__label">Phone *</label>
                                <input class="ps-input"  value="{{old('phone')}}" name="phone" type="text">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="ps-checkout__group">
                                <label class="ps-checkout__label">Street address *</label>
                                <input class="ps-input mb-3" value="{{old('address')}}" name="address" type="text" placeholder="House number and street name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="ps-checkout__group">
                                <label class="ps-checkout__label">Town / City *</label>
                                <input class="ps-input" value="{{old('city')}}" name="city" type="text">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="ps-checkout__group">
                                <label class="ps-checkout__label">State *</label>
                                <input class="ps-input" value="{{old('state')}}" name="state" type="text">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="ps-checkout__group">
                                <label class="ps-checkout__label">Upload Prescription *</label>
                                <input class="ps-input" name="image" type="file"> 
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="ps-checkout__group">
                                <label class="ps-checkout__label">Notes </label>
                                <textarea class="ps-textarea" name="notes" rows="7" placeholder="write additional notes about the description.">{{old('notes')}}</textarea>
                            </div>
                        </div>
                        
                    </div>
                    <button type="submit" class="btn btn-success btn-lg w-25 p-2" style="border-radius: 10px"> Upload Prescription</button>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <section class="ps-section--block-grid" style="display: block">
                    <div class="ps-section__content">
                        <h3 class="ps-section__title">Upload your Prescription from a Doctor</h3>
                        <div class="ps-section__subtitle">Here's a guide to ensure you upload a valid Prescription.</div>
                        <div class="ps-section__desc">Please Ensure Your Prescription Contains All 5 Elements</div>
                        <ul class="ps-section__list">
                            <li>Hospital / Clinic Information</li>
                            <li>Doctor's Details</li>
                            <li>Patient's Details</li>
                            <li>Drug Details</li>
                            <li>Doctor's Signature / Stamp & Date</li>
                        </ul>
                    </div>
                </section>
            </div>
        </div>
    </form>
</div>
        </div>
    </div>

@endsection