@extends('layouts.master')
@section('title', 'Product Groups List')

@section('css')

@endsection

@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/date-picker.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/dropzone.css')}}">
@endsection

@section('breadcrumb-title')
<h3>Product Groups Create</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Product Groups</li>
<li class="breadcrumb-item active">Product Groups Create</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6">
            <form class="card" method="POST" action="{{ route('productgroupsstore') }}">
                @csrf
                <div class="card-body">
                    <div class="form theme-form">
                        <div class="row">
                            <div class="col">
                            <div class="mb-3">
                                    <label>Group Name</label>
                                    <input class="form-control" name="name" type="text" placeholder="Group Name *">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="mb-3 selected-products-container">
                                    <label>Selected Products</label>
                                    <!-- ADDED PRODUCTS HERE -->
                                    <div>
                                        <!-- ADD PRODUCTS HERE -->
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col">
                                <button type="submit" class="btn btn-success me-3">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h5>Products</h5>
                </div>
                <div class="card-body">
                    <div class="row g-sm-4 g-3">
                        <div class="col-xl-6 col-md-12">

                            @foreach($products as $product)
                            <div class="prooduct-details-box m-2" data-product-id="{{ $product->id }}">
                                <div class="media">
                                    <img class="align-self-center img-fluid img-60"
                                        src="https://laravel.pixelstrap.com/cuba/assets/images/ecommerce/product-table-5.png"
                                        alt="#">
                                    <div class="media-body ms-3">
                                        <div class="product-name">
                                            <h6><a href="#" data-bs-original-title=""
                                                    title="">{{ $product->product_name }}</a>
                                            </h6>
                                        </div>
                                        <div class="price d-flex">
                                            <div class="text-muted me-2">Price</div>: {{ $product->price }}$
                                            <div class="text-muted me-2"><a class="btn btn-primary btn-xs add-to-group-btn" href="#"
                                            data-bs-original-title="" title="">Add to Group</a></div>

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
@endsection

@section('script')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Add click event listener to all "Add to Group" buttons
        $('.add-to-group-btn').click(function(event) {
            event.preventDefault(); // Prevent the default behavior of the button

            // Get the product details
            var productId = $(this).closest('.prooduct-details-box').data('product-id');
            var productName = $(this).closest('.prooduct-details-box').find('.product-name a').text();
            var productPrice = $(this).closest('.prooduct-details-box').find('.price').text();

            // Generate HTML for the selected product
            var selectedProductHTML = '<div class="prooduct-details-box m-2" data-product-id="' + productId + '">';
            selectedProductHTML += '<input type="hidden" name="product_ids[]" value="' + productId + '">'; // Hidden input field for product ID
            selectedProductHTML += '<div class="media">';
            selectedProductHTML += '<img class="align-self-center img-fluid img-60" src="https://laravel.pixelstrap.com/cuba/assets/images/ecommerce/product-table-5.png" alt="#">';
            selectedProductHTML += '<div class="media-body ms-3">';
            selectedProductHTML += '<div class="product-name"><h6><a href="#" data-bs-original-title="" title="">' + productName + '</a></h6></div>';
            selectedProductHTML += '<div class="price d-flex">';
            selectedProductHTML += '<div class="text-muted me-2"></div>' + productPrice;
            selectedProductHTML += '<div class="text-muted me-2"><a class="btn btn-danger btn-xs remove-from-group-btn" href="#" data-bs-original-title="" title="">Remove from Group</a></div>';
            selectedProductHTML += '</div></div></div></div>';

            // Append the selected product HTML to the "Selected Products" section
            $('.selected-products-container').append(selectedProductHTML);
        });

        // Add click event listener to remove-from-group-btn
        $('.selected-products-container').on('click', '.remove-from-group-btn', function(event) {
            event.preventDefault(); // Prevent the default behavior of the button
            $(this).closest('.prooduct-details-box').remove(); // Remove the selected product
        });
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
