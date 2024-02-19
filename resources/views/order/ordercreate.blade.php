@extends('layouts.master')
@section('title', 'Order List')

@section('css')

@endsection

@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/date-picker.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/dropzone.css')}}">
@endsection

@section('breadcrumb-title')
<h3>Order Create</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Order</li>
<li class="breadcrumb-item active">Order Create</li>
@endsection

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-body">
          <div class="form theme-form">
            <div class="row">
              <div class="col">
                <div class="mb-3">
                  <label>Order Title</label>
                  <input class="form-control" type="text" placeholder="Order name *">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="mb-3">
                  <label>Client name</label>
                  <input class="form-control" type="text" placeholder="Name client or company name">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4">
                <div class="mb-3">
                  <label>Order Rate</label>
                  <input class="form-control" type="text" placeholder="Enter Order Rate">
                </div>
              </div>
              <div class="col-sm-4">
                <div class="mb-3">
                  <label>Order Type</label>
                  <select class="form-select">
                    <option>Hourly</option>
                    <option>Fix price</option>
                  </select>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="mb-3">
                  <label>Priority</label>
                  <select class="form-select">
                    <option>Low</option>
                    <option>Medium</option>
                    <option>High</option>
                    <option>Urgent</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4">
                <div class="mb-3">
                  <label>Order Size</label>
                  <select class="form-select">
                    <option>Small</option>
                    <option>Medium</option>
                    <option>Big</option>
                  </select>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="mb-3">
                  <label>Starting date</label>
                  <input class="datepicker-here form-control" type="text" data-language="en">
                </div>
              </div>
              <div class="col-sm-4">
                <div class="mb-3">
                  <label>Ending date</label>
                  <input class="datepicker-here form-control" type="text" data-language="en">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="mb-3">
                  <label>Enter some Details</label>
                  <textarea class="form-control" id="exampleFormControlTextarea4" rows="3"></textarea>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="mb-3">
                  <label>Upload Order file</label>
                  <form class="dropzone" id="singleFileUpload" action="/upload.php">
                    <div class="dz-message needsclick">
                      <i class="icon-cloud-up"></i>
                      <h6>Drop files here or click to upload.</h6>
                      <span class="note needsclick">(This is just a demo dropzone. Selected files are <strong>not</strong> actually uploaded.)</span>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div><a class="btn btn-success me-3" href="#">Add</a><a class="btn btn-danger" href="#">Cancel</a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
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
