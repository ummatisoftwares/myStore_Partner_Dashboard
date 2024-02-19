@extends('layouts.master')
@section('title', 'Store Settings')

@section('css')

@endsection

@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/date-picker.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/dropzone.css')}}">
@endsection

@section('breadcrumb-title')
<h3>Store Settings</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Store</li>
<li class="breadcrumb-item active">Store Settings</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('store-settings.save') }}">
                        @csrf
                        <div class="form theme-form">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label>Store Name</label>
                                        <input name="store_name" class="form-control" type="text"
                                            placeholder="Store name *" required
                                            value="{{ $user->storeSettings ? $user->storeSettings->store_name : '' }}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label>Status</label>
                                        <select name="status" class="form-select" required>
                                            <option value="Active"
                                                {{ $user->storeSettings && $user->storeSettings->status == 'Active' ? 'selected' : '' }}>
                                                Active</option>
                                            <option value="InActive"
                                                {{ $user->storeSettings && $user->storeSettings->status == 'InActive' ? 'selected' : '' }}>
                                                InActive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label>Default Language</label>
                                        <select name="default_language" class="form-select" required>
                                            <option value="EN"
                                                {{ $user->storeSettings && $user->storeSettings->default_language == 'EN' ? 'selected' : '' }}>
                                                EN</option>
                                            <option value="FR"
                                                {{ $user->storeSettings && $user->storeSettings->default_language == 'FR' ? 'selected' : '' }}>
                                                FR</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label>Default Currency</label>
                                        <select name="default_currency" class="form-select" required>
                                            <option value="USD"
                                                {{ $user->storeSettings && $user->storeSettings->default_currency == 'USD' ? 'selected' : '' }}>
                                                USD</option>
                                            <option value="EUR"
                                                {{ $user->storeSettings && $user->storeSettings->default_currency == 'EUR' ? 'selected' : '' }}>
                                                EUR</option>
                                            <option value="PKR"
                                                {{ $user->storeSettings && $user->storeSettings->default_currency == 'PKR' ? 'selected' : '' }}>
                                                PKR</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label>Timezone</label>
                                    <select name="timezone" class="form-select" required>
                                        @foreach(timezone_identifiers_list() as $timezone)
                                        @php
                                        $tz = new DateTimeZone($timezone);
                                        $offset = $tz->getOffset(new DateTime);
                                        $offsetHours = floor(abs($offset) / 3600);
                                        $offsetMinutes = floor((abs($offset) - $offsetHours * 3600) / 60);
                                        $offsetSign = ($offset < 0 ? '-' : '+' );
                                            $offsetFormatted=sprintf('(GMT%s%02d:%02d) %s', $offsetSign, $offsetHours,
                                            $offsetMinutes, $timezone); @endphp <option value="{{ $timezone }}"
                                            {{ $user->storeSettings && $user->storeSettings->timezone == $timezone ? 'selected' : '' }}>
                                            {{ $offsetFormatted }}
                                            </option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label>Enter Description</label>
                                        <textarea name="description" class="form-control"
                                            id="exampleFormControlTextarea4"
                                            rows="3">{{ $user->storeSettings ? $user->storeSettings->description : '' }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <button type="submit" class="btn btn-success me-3">Save</button>
                                    <a class="btn btn-danger" href="#">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
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

<script src="{{asset('assets/js/datepicker/date-picker/datepicker.js')}}"></script>
<script src="{{asset('assets/js/datepicker/date-picker/datepicker.en.js')}}"></script>
<script src="{{asset('assets/js/datepicker/date-picker/datepicker.custom.js')}}"></script>
<script src="{{asset('assets/js/dropzone/dropzone.js')}}"></script>
<script src="{{asset('assets/js/dropzone/dropzone-script.js')}}"></script>
<script src="{{asset('assets/js/typeahead/handlebars.js')}}"></script>
<script src="{{asset('assets/js/typeahead/typeahead.bundle.js')}}"></script>
<script src="{{asset('assets/js/typeahead/typeahead.custom.js')}}"></script>
<script src="{{asset('assets/js/typeahead-search/handlebars.js')}}"></script>
<script src="{{asset('assets/js/typeahead-search/typeahead-custom.js')}}"></script>
@endsection
