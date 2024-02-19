@extends('layouts.master')
@section('title', 'Social Edit')

@section('css')

@endsection

@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/date-picker.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/dropzone.css')}}">
@endsection

@section('breadcrumb-title')
<h3>Social Edit</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Socials</li>
<li class="breadcrumb-item active">Social Edit</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <form class="card" method="POST" action="{{ route('sociallinksupdate', $social->id) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form theme-form">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label>Social Platform Name</label>
                                    <input type="text"
                                        class="form-control @error('social_platform_name') is-invalid @enderror"
                                        name="social_platform_name" value="{{ $social->social_platform_name }}"
                                        placeholder="Enter Social Platform Name">
                                    @error('social_platform_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label>Upload or Select Social Icon (PNG or JPEG)</label>
                                    <input type="file" class="form-control @error('social_icon') is-invalid @enderror"
                                        name="social_icon">
                                    @error('social_icon')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <!-- Display the social icon image or Font Awesome icon -->
                                    @if($social->social_icon)
                                    <img src="{{ asset('storage/social_icons/' . $social->social_icon) }}"
                                        alt="Social Icon" width="50">
                                    @else
                                    @if(strpos($social->social_icon, 'fa ') !== false)
                                    <div class="social-circle"><i class="{{ $social->social_icon }}"></i></div>
                                    @else
                                    <div class="social-circle">Default Icon or Message</div>
                                    @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label>Social URL</label>
                                    <input class="form-control @error('social_url') is-invalid @enderror"
                                        name="social_url" type="text" value="{{ $social->social_url }}"
                                        placeholder="Social URL *">
                                    @error('social_url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label>Description</label>
                                    <input class="form-control @error('description') is-invalid @enderror"
                                        name="description" type="text" value="{{ $social->description }}"
                                        placeholder="Description">
                                    @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <button type="submit" class="btn btn-success me-3">Update</button>
                                <a class="btn btn-danger" href="#">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')


<script>
    document.addEventListener("DOMContentLoaded", function () {
        var socialPlatform = document.getElementById('social_platform');
        var socialIconContainer = document.getElementById('social_icon');

        // Function to update social icon
        function updateSocialIcon() {
            var selectedPlatform = socialPlatform.value;
            var socialIconHTML = '';

            if (selectedPlatform === 'Facebook') {
                socialIconHTML = '<div class="social-circle"><i class="fa fa-facebook"></i></div>';
            } else if (selectedPlatform === 'Snapchat') {
                socialIconHTML = '<div class="social-circle"><i class="fa fa-snapchat"></i></div>';
            } else if (selectedPlatform === 'Instagram') {
                socialIconHTML = '<div class="social-circle"><i class="fa fa-instagram"></i></div>';
            } else if (selectedPlatform === 'Youtube') {
                socialIconHTML = '<div class="social-circle"><i class="fa fa-youtube"></i></div>';
            }

            // Update the social icon container
            socialIconContainer.innerHTML = socialIconHTML;
        }

        // Add event listener for change in social platform selection
        socialPlatform.addEventListener('change', updateSocialIcon);

        // Initial call to update social icon based on default selection
        updateSocialIcon();
    });

</script>

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
