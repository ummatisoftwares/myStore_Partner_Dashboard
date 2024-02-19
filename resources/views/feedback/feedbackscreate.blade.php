@extends('layouts.master')
@section('title', 'Feedback List')

@section('css')

@endsection

@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/date-picker.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/dropzone.css')}}">
@endsection

@section('breadcrumb-title')
<h3>Feedback Create</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Feedback</li>
<li class="breadcrumb-item active">Feedback Create</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form theme-form">
                            <form action="{{ route('feedbacksstore') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label>Subject</label>
                                            <input class="form-control" type="text" name="subject" placeholder="Subject">
                                            @error('subject')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label>Message</label>
                                            <textarea class="form-control" name="message" rows="3"></textarea>
                                            @error('message')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label>Content</label>
                                            <textarea class="form-control" name="content" rows="3"></textarea>
                                            @error('content')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div><button type="submit" class="btn btn-success me-3">Submit</button>
                                        <a id="calendly-button" class="btn btn-primary" href="#">Book an appointment</a>
                                    </div>
                                    </div>
                                </div>
                                <!-- <div class="row">
                                    <div class="col">
                                        <div id="calendly-button"><button type="button" class="btn btn-primary">Book an appointment</button></div>
                                    </div>
                                </div> -->

                                <div class="row">
                                    <div class="col">
                                        <div id="calendly-container" class="calendly-container" style="display: none;">
                                            <iframe src="https://calendly.com/jahanzeb-choudhry/test-event" style="border: 0; width: 100%; height: 500px;"></iframe>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

<script>
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('calendly-button').addEventListener('click', function () {
                document.getElementById('calendly-container').style.display = 'block';
            });
        });
</script>

@if(session('success') == 'Feedback created successfully.')
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
