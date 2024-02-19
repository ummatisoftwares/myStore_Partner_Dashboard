@extends('layouts.master')
@section('title', 'Edit Profile')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>Edit Profile</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Users</li>
<li class="breadcrumb-item active">Edit Profile</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="edit-profile">
        <div class="row">
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">My Profile</h4>
                        <div class="card-options"><a class="card-options-collapse" href="#"
                                data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a
                                class="card-options-remove" href="#" data-bs-toggle="card-remove"><i
                                    class="fe fe-x"></i></a></div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('save-profile') }}">
                            @csrf
                            <div class="row mb-2">
                                <div class="profile-title">
                                    <div class="media"> <img class="img-70 rounded-circle" alt=""
                                            src="{{ asset('assets/images/user/user-dp.png') }}">
                                        <div class="media-body">
                                            <h5 class="mb-1">{{$user->name ? $user->name : 'N/A'}}</h5>
                                            <p>PARTNER</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="mb-3">
                                <h6 class="form-label">Bio</h6>
                                <textarea class="form-control @error('bio') is-invalid @enderror" name="bio" rows="5"
                                    placeholder="Enter bio">{{ old('bio', $user->bio) }}</textarea>
                                @error('bio')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div> -->
                            <div class="mb-3">
                                <label class="form-label">Email-Address</label>
                                <div class="input-group">
                                    <input class="form-control @error('email') is-invalid @enderror" type="email"
                                        name="email" value="{{ old('email', $user->email) }}" placeholder="Email">
                                    @if ($user->is_email_verified)
                                    <span class="input-group-text text-success" title="Verified">
                                        <i class="icofont icofont-checked text-success"></i> Verified
                                    </span>
                                    @else
                                    <span class="input-group-text text-danger" title="Not Verified">
                                        <i class="icofont icofont-close-squared text-danger"></i>Not Verified
                                    </span>
                                    @endif
                                </div>
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Phone Number</label>
                                <div class="input-group">
                                        <input class="form-control @error('phone_number') is-invalid @enderror"
                                            type="text" name="phone_number"
                                            value="{{ old('phone_number', $user->phone_number) }}"
                                            placeholder="phone_number">
                                    @if ($user->is_phone_verified)
                                    <span class="input-group-text text-success" title="Verified">
                                        <i class="icofont icofont-checked text-success"></i> Verified
                                    </span>
                                    @else
                                    <span class="input-group-text text-danger" title="Not Verified">
                                        <i class="icofont icofont-close-squared text-danger"></i>Not Verified
                                    </span>
                                    @endif
                                </div>
                                @error('phone_number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Website</label>
                                <input class="form-control @error('website') is-invalid @enderror" type="text"
                                    name="website" value="{{ old('website', $user->website) }}"
                                    placeholder="Enter website">
                                @error('website')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-footer">
                                <button class="btn btn-primary btn-block">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <form class="card" method="POST" action="{{ route('update-profile') }}">
                    @csrf
                    <div class="card-header">
                        <h4 class="card-title mb-0">Edit Profile</h4>
                        <div class="card-options"><a class="card-options-collapse" href="#"
                                data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a
                                class="card-options-remove" href="#" data-bs-toggle="card-remove"><i
                                    class="fe fe-x"></i></a></div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <!-- <div class="col-sm-6 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Username</label>
                                    <input class="form-control @error('username') is-invalid @enderror" type="text"
                                        name="username" value="{{ old('username', $user->username) }}"
                                        placeholder="Username">
                                    @error('username')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div> -->
                            <!-- <div class="col-sm-6 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Phone Number</label>
                                    <div class="input-group">
                                        <input class="form-control @error('phone_number') is-invalid @enderror"
                                            type="number" name="phone_number"
                                            value="{{ old('phone_number', $user->phone_number) }}"
                                            placeholder="phone_number">
                                    </div>
                                    @error('phone_number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div> -->
                            <div class="col-sm-12 col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Full Name</label>
                                    <input class="form-control @error('name') is-invalid @enderror" type="text"
                                        name="name" value="{{ old('name', $user->name) }}" placeholder="Full Name">
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- <div class="col-sm-6 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Address</label>
                                    <input class="form-control @error('address') is-invalid @enderror" type="text"
                                        name="address" value="{{ old('address', $user->address) }}"
                                        placeholder="Home Address">
                                    @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">City</label>
                                    <input class="form-control @error('city') is-invalid @enderror" type="text"
                                        name="city" value="{{ old('city', $user->city) }}" placeholder="City">
                                    @error('city')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Postal Code</label>
                                    <input class="form-control @error('postal_code') is-invalid @enderror" type="number"
                                        name="postal_code" value="{{ old('postal_code', $user->postal_code) }}"
                                        placeholder="ZIP Code">
                                    @error('postal_code')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div> -->

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">New Password</label>
                                    <input class="form-control @error('password') is-invalid @enderror"
                                        type="password" name="password" placeholder="New Password">
                                    @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div>
                                    <label class="form-label">About Me</label>
                                    <textarea class="form-control @error('about_me') is-invalid @enderror"
                                        name="about_me" rows="4"
                                        placeholder="Enter About your description">{{ old('about_me', $user->about_me) }}</textarea>
                                    @error('about_me')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button class="btn btn-primary" type="submit">Update Profile</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

<script src="{{ asset('assets/js/notify/bootstrap-notify.min.js') }}"></script>


@if(session('success'))
<script src="{{ asset('assets/js/notify/recordSaved.js') }}"></script>
@endif

@endsection
