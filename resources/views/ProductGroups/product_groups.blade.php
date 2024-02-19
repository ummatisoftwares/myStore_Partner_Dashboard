@extends('layouts.master')
@section('title', 'Product Groups List')

@section('css')

@endsection

@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatable-extension.css') }}">
@endsection

@section('breadcrumb-title')
<h3>Product Groups List</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Product Groups</li>
<li class="breadcrumb-item active">Product Groups List</li>
@endsection

@section('content')
<!-- <div class="container-fluid">
    <div class="row project-cards">
        <div class="col-md-12 project-list">
            <div class="card">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Product Groups</h3>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-0 me-0"></div>
                        <a class="btn btn-primary" href="{{ route('productgroupscreate') }}">
                            <i data-feather="plus-square"></i> Create New Product Groups
                        </a>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="card-body">
                        <div class="dt-ext table-responsive">
                            <table class="display" id="export-button">
                                <thead>
                                    <tr>
                                        <th>Group Name</th>
                                        <th>Created Date</th>
                                        <th>Updated Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($productGroups as $productGroup)
                                    <tr>
                                        <td>{{ $productGroup->name }}</td>
                                        <td>{{ $productGroup->created_at }}</td>
                                        <td>{{ $productGroup->updated_at }}</td>
                                        <td>
                                            <ul class="action">
                                                <li class="edit">
                                                    <a href="{{ route('productgroupsedit', $productGroup->id) }}">
                                                        <i class="icon-pencil-alt"></i>
                                                    </a>
                                                </li>
                                                <li class="delete">
                                                    <form method="POST"
                                                        action="{{ route('productgroupsdestroy', $productGroup->id) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-link"
                                                            style="display: contents;">
                                                            <i class="icon-trash"></i>
                                                        </button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4">
                                            <h5>Products in this Group:</h5>
                                            <ul>
                                                @foreach($productGroup->products as $product)
                                                <li>{{ $product->product_name }}</li>
                                                @endforeach
                                            </ul>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Group Name</th>
                                        <th>Created Date</th>
                                        <th>Updated Date</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->


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
                                            <h6 class="mb-0">Product Groups</h6>
                                            <ul>
                                                <li>
                                                    <a class="btn btn-primary"
                                                        href="{{ route('productgroupscreate') }}">
                                                        <i data-feather="plus-square"></i> Create New Product Groups
                                                    </a>
                                                </li>
                                                <li><a class="grid-bookmark-view" href="javascript:void(0)"><i
                                                            data-feather="grid"></i></a></li>
                                                <li><a class="list-layout-view" href="javascript:void(0)"><i
                                                            data-feather="list"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="card-body pb-0">
                                            <div class="details-bookmark text-center">
                                                <div class="row" id="bookmarkData">
                                                    @foreach($productGroups as $productGroup)
                                                    <div class="col-xl-3 col-md-4 xl-50">
                                                        <div class="card card-with-border bookmark-card o-hidden">
                                                            <div class="details-website">
                                                                <!-- <img class="img-fluid"
                                                                    src="{{ $productGroup->image_url }}" alt=""> -->
                                                                <img class="img-fluid"
                                                                    src="https://laravel.pixelstrap.com/cuba/assets/images//lightgallry/01.jpg"
                                                                    alt="">
                                                                <div class="desciption-data">
                                                                    <div class="title-bookmark">
                                                                        <h6 class="title">{{ $productGroup->name }}</h6>
                                                                        <p class="weburl_0">
                                                                            {{ config('app.url') }}/{{ $productGroup->name }}
                                                                            <!-- <strong>Products:</strong> @foreach($productGroup->products as $product)
                                                                            <span>{{ $product->product_name }}, </span>
                                                                            @endforeach -->
                                                                        </p>
                                                                        <div class="hover-block">
                                                                            <ul>
                                                                                <li><a
                                                                                        href="{{ route('productgroupsedit', $productGroup->id) }}"><i
                                                                                            data-feather="edit-2"></i></a>
                                                                                </li>
                                                                                <li>
                                                                                    <form method="POST"
                                                                                        action="{{ route('productgroupsdestroy', $productGroup->id) }}">
                                                                                        @csrf
                                                                                        @method('DELETE')
                                                                                        <button type="submit"
                                                                                            class="btn btn-link"
                                                                                            style="display: contents;">
                                                                                            <i class="icon-trash"></i>
                                                                                        </button>
                                                                                    </form>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="content-general">
                                                                            <p class="desc">
                                                                                {{ $productGroup->description }}</p>
                                                                            <span
                                                                                class="collection">{{ $productGroup->collection }}</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
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
</div>


@endsection

@section('script')

<script src="{{ asset('assets/js/notify/bootstrap-notify.min.js') }}"></script>

@if(session('success') == 'Product group created successfully.')
<script src="{{ asset('assets/js/notify/recordSaved.js') }}"></script>
@endif

@if(session('success') == 'Product group updated successfully.')
<script src="{{ asset('assets/js/notify/recordUpdated.js') }}"></script>
@endif

@if(session('success') == 'Product group deleted successfully.')
<script src="{{ asset('assets/js/notify/recordDeleted.js') }}"></script>
@endif

<script src="{{asset('assets/js/bookmark/jquery.validate.min.js')}}"></script>
<script src="{{asset('assets/js/bookmark/custom.js')}}"></script>
<script src="{{asset('assets/js/typeahead/handlebars.js')}}"></script>
<script src="{{asset('assets/js/typeahead/typeahead.bundle.js')}}"></script>
<script src="{{asset('assets/js/typeahead/typeahead.custom.js')}}"></script>
<script src="{{asset('assets/js/typeahead-search/handlebars.js')}}"></script>
<script src="{{asset('assets/js/typeahead-search/typeahead-custom.js')}}"></script>
<script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatable-extension/jszip.min.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatable-extension/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatable-extension/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatable-extension/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.autoFill.min.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.select.min.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatable-extension/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatable-extension/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatable-extension/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.keyTable.min.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.colReorder.min.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.fixedHeader.min.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.rowReorder.min.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.scroller.min.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatable-extension/custom.js') }}"></script>
@endsection
