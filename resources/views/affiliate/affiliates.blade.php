@extends('layouts.master')
@section('title', 'Affiliates')

@section('css')

@endsection

@section('style')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/date-picker.css')}}">
@endsection

@section('breadcrumb-title')
<h3>Affiliates</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Affiliates</li>
<li class="breadcrumb-item active">Affiliates</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="email-wrap bookmark-wrap">
        <div class="row">
            <div class="col-xl-12 col-md-12 box-col-12">
                <div class="email-right-aside bookmark-tabcontent">
                    <div class="card email-body radius-left">
                        <div class="ps-0">
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="pills-created" role="tabpanel"
                                    aria-labelledby="pills-created-tab">
                                    <div class="card mb-0">
                                        <div class="card-header d-flex">
                                            <h5 class="mb-0">Affiliates</h5>
                                            <!-- <a class="btn btn-primary" href="{{ route('sociallinkscreate') }}">
                                                <i data-feather="plus-square"></i> Add New Affiliate
                                            </a> -->
                                        </div>
                                        <div class="card-body p-0">
                                            <div class="taskadd">
                                                @if($affiliates->isEmpty())
                                                <div class="text-center">
                                                    No records found.
                                                </div>
                                                @else
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tbody class="ui-sortable" id="draggableMultiple">
                                                            @foreach($affiliates as $affiliate)
                                                            <tr>
                                                                <td>
                                                                    <h6 class="task_title_0">
                                                                        {{ $affiliate->name }}</h6>
                                                                    <p class="project_name_0">
                                                                        <a href="{{ $affiliate->email }}"
                                                                            target="_blank">{{ $affiliate->email }}</a>
                                                                    </p>
                                                                </td>
                                                                <td>
                                                                   <strong>Earned:</strong> <p class="task_desc_0">${{ $affiliate->earnings }}
                                                                    </p>
                                                                </td>
                                                                <td>
                                                                <a href="#" data-bs-original-title="" title=""><svg
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            width="24" height="24" viewBox="0 0 24 24"
                                                                            fill="none" stroke="currentColor"
                                                                            stroke-width="2" stroke-linecap="round"
                                                                            stroke-linejoin="round"
                                                                            class="feather feather-more-horizontal">
                                                                            <circle cx="12" cy="12" r="1"></circle>
                                                                            <circle cx="19" cy="12" r="1"></circle>
                                                                            <circle cx="5" cy="12" r="1"></circle>
                                                                        </svg></a>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
<script src="{{asset('assets/js/select2/select2.full.min.js')}}"></script>
<script src="{{asset('assets/js/select2/select2-custom.js')}}"></script>
<script src="{{asset('assets/js/form-validation-custom.js')}}"></script>
<script src="{{asset('assets/js/task/custom.js')}}"></script>
@endsection
