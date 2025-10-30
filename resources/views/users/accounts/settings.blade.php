@extends('layouts.app')
@section('title')
<title> My Settings | Sanlive Pharmarcy</title>
@endsection
@section('head')

<link rel="canonical" href="{{ url()->current() }}">
@endsection
@section('content')
@section('styles')
    <style>
        .navIL {
            padding: 15px;
            padding-left: 10px
        }

        .dropdown-item:hover {
            background: rgb(219, 218, 218);
        }

        /* Remove rounded corners from card and form controls */
.card, 
.card-header, 
.form-control, 
.btn {
    border-radius: 0 !important;
}

    </style>
@endsection

<div class="ps-shopping" style="background: #eee; ">
    <div class="container">
        <div class="ps-shopping__content">
            <div class="row">
              @include('includes.sidebarAccount')
             



   <div class="col-md-9">
    <!-- Update Account Form -->
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white border-bottom-0">
            <h5 class="mb-0">Update Details</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('users.settings.update') }}">
                @csrf

                <div class="row">
                    <!-- Left Column -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="first_name" class="form-label">First Name</label>
                            <input 
                                type="text" 
                                class="form-control @error('first_name') is-invalid @enderror" 
                                id="first_name" 
                                name="first_name" 
                                value="{{ old('first_name', auth()->user()->first_name) }}" 
                                required>
                            @error('first_name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input 
                                type="text" 
                                class="form-control @error('last_name') is-invalid @enderror" 
                                id="last_name" 
                                name="last_name" 
                                value="{{ old('last_name', auth()->user()->last_name) }}" 
                                required>
                            @error('last_name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input 
                                type="email" 
                                class="form-control @error('email') is-invalid @enderror" 
                                id="email" 
                                name="email" 
                                value="{{ old('email', $user->email) }}" 
                                required>
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input 
                                type="text" 
                                class="form-control @error('phone') is-invalid @enderror" 
                                id="phone" 
                                name="phone" 
                                value="{{ old('phone', $user->phone) }}" 
                                required>
                            @error('phone')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="city" class="form-label">City</label>
                            <input 
                                type="text" 
                                class="form-control @error('city') is-invalid @enderror" 
                                id="city" 
                                name="city" 
                                value="{{ old('city', $user->city) }}" 
                                required>
                            @error('city')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Current Password</label>
                            <input 
                                type="password" 
                                class="form-control @error('oldpassword') is-invalid @enderror" 
                                id="password" 
                                name="oldpassword" 
                                placeholder="Enter current password"
                                required>
                            @error('oldpassword')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="new_password" class="form-label">New Password</label>
                            <input 
                                type="password" 
                                class="form-control @error('password') is-invalid @enderror" 
                                id="new_password" 
                                name="password" 
                                placeholder="Enter new password">
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="new_password_confirmation" class="form-label">Confirm New Password</label>
                            <input 
                                type="password" 
                                class="form-control" 
                                id="new_password_confirmation" 
                                name="new_password_confirmation" 
                                placeholder="Re-enter new password">
                        </div>
                    </div>
                </div>

                <div class="mt-3 text-end">
                    <button type="submit" class="btn btn-primary px-4">Update Details</button>
                </div>
            </form>
        </div>
    </div>
</div>




        </div>
    </div>
</div>
<div style="height: 2em; background:#eee"></div>

@endsection

@section('script')
@endsection
