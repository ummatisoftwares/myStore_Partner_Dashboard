@extends('layouts.master')
@section('title', 'Product Edit')

@section('css')

@endsection

@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/date-picker.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/dropzone.css')}}">
@endsection

@section('breadcrumb-title')
<h3>Product Edit</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Product</li>
<li class="breadcrumb-item active">Product Edit</li>
@endsection

@section('content')
<div class="card-body">
    <ul class="nav nav-tabs border-tab nav-primary" id="info-tab" role="tablist">
        <li class="nav-item"><a class="nav-link active" id="info-home-tab" data-bs-toggle="tab" href="#info-home"
                role="tab" aria-controls="info-home" aria-selected="true" data-bs-original-title="" title="">Details</a>
        </li>
        <li class="nav-item"><a class="nav-link" id="profile-info-tab" data-bs-toggle="tab" href="#info-profile"
                role="tab" aria-controls="info-profile" aria-selected="false" data-bs-original-title=""
                title="">Variants</a></li>
    </ul>
    <div class="tab-content" id="info-tabContent">
    <form class="card" method="POST" action="{{ route('productsupdate', $product->id) }}">
        @csrf
        @method('PUT')
        <div class="tab-pane fade active show" id="info-home" role="tabpanel" aria-labelledby="info-home-tab">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                            <div class="card-body">
                                <div class="form theme-form">
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label>Product Name</label>
                                                <input class="form-control" name="product_name"
                                                    value="{{ old('name', $product->product_name) }}" type="text"
                                                    placeholder="Product Name *">
                                                @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label>Description</label>
                                                    <input class="form-control" name="description"
                                                        value="{{ old('name', $product->description) }}" type="text"
                                                        placeholder="Description">
                                                    @error('description')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label>Price</label>
                                                <input class="form-control" name="price"
                                                    value="{{ old('name', $product->price) }}" type="number"
                                                    placeholder="Price *">
                                                @error('price')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <label>Currency</label>
                                                <select class="form-control" name="currency">
                                                    <option value="PKR" {{ $product->currency === 'PKR' ? 'selected' : '' }}>PKR
                                                    </option>
                                                    <option value="USD" {{ $product->currency === 'USD' ? 'selected' : '' }}>USD
                                                    </option>
                                                    <option value="EUR" {{ $product->currency === 'EUR' ? 'selected' : '' }}>EUR
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label>Stock Quantity</label>
                                                <input class="form-control" name="stock_quantity"
                                                    value="{{ old('name', $product->stock_quantity) }}" type="number"
                                                    placeholder="Stock Quantity *">
                                                @error('stock_quantity')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label>Product Groups</label>
                                                <select class="form-control" name="product_group_ids[]" multiple>
                                                    <!-- Assuming $product->groups() returns a collection of group IDs -->
                                                    @foreach($productGroups as $group)
                                                        <option value="{{ $group->id }}"
                                                            @if(in_array($group->id, $product->groups->pluck('id')->toArray()))
                                                                selected
                                                            @endif>{{ $group->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <label>Product Category</label>
                                                <select class="form-control" name="product_category_id">
                                                    <!-- Assuming $product->productCategories() returns a single category ID -->
                                                    @foreach($productCategories as $category)
                                                    <option value="{{ $category->id }}"
                                                        {{ $product->product_category_id === $category->id ? 'selected' : '' }}>
                                                        {{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label>Product Type</label>
                                                <select class="form-control" name="product_type">
                                                    <option value="Physical"
                                                        {{ $product->product_type === 'Physical' ? 'selected' : '' }}>Physical
                                                    </option>
                                                    <option value="Digital"
                                                        {{ $product->product_type === 'Digital' ? 'selected' : '' }}>Digital
                                                    </option>
                                                    <option value="Affiliated"
                                                        {{ $product->product_type === 'Affiliated' ? 'selected' : '' }}>Affiliated
                                                    </option>
                                                </select>
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
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="info-profile" role="tabpanel" aria-labelledby="profile-info-tab">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card" >
                            <div class="card-body">
                                <div class="form theme-form">
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label>Attribute Type</label>
                                                <select class="form-control" name="attribute_id" id="attribute_id">
                                                    <option value="">Select Attribute</option>
                                                    @foreach($attributes as $attribute)
                                                    <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('attribute_id')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                            </div>
                                        </div>
                                        <div class="col" id="attribute_value_container" style="display: none;">
                                            <div class="mb-3">
                                                <label>Attribute Value</label>
                                                <select class="form-control" name="attribute_value"
                                                    id="attribute_value">
                                                    <option value="">Select Attribute</option>
                                                </select>
                                                @error('attribute_value')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <a href="#" id="add_attribute_btn" class="btn btn-primary">Add Attribute</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    </div>
</div>
<!-- Container to display selected attribute values in a table -->
<div class="container-fluid mt-4" id="selected_attributes_container">
    <div class="row">
        <div class="card-body">
            <div class="card">
                <div class="row">
                    <div class="col">
                        <div class="mb-3 p-3">
                            <h3>Selected Attributes:</h3>
                            <table class="table m-3">
                                <thead>
                                    <tr>
                                        <th>Attribute</th>
                                        <th>Attribute Value</th>
                                    </tr>
                                </thead>
                                <tbody id="selected_attributes_list">
                                    @foreach($skus as $sku)
                                        @foreach($sku->attributeOptions as $option)
                                            <tr>
                                                <td>{{ $option->attribute->name }}</td>
                                                <td>{{ $option->value }}</td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
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
<script type="text/javascript">
    $(document).ready(function () {
       // Array to store selected attributes and their values
    var selectedAttributes = [];

// Event handler for the change event of Attribute Type dropdown
$('#attribute_id').on('change', function () {
    var attributeId = $(this).val();
    var $attributeValueContainer = $('#attribute_value_container');

    if (attributeId !== '') {
        // Show the Attribute Value dropdown if an Attribute Type is selected
        $attributeValueContainer.show();

        // Fetch and populate attribute options based on the selected attribute id
        var options = '<option value="">Select Attribute</option>';
        @foreach($attributes as $attribute)
            if ("{{ $attribute->id }}" === attributeId) {
                @foreach($attribute->attributeOptions as $option)
                    options += '<option value="{{ $option->id }}">{{ $option->value }}</option>';
                @endforeach
            }
        @endforeach
        $('#attribute_value').html(options);
    } else {
        // Hide the Attribute Value dropdown if no Attribute Type is selected
        $attributeValueContainer.hide();
    }
});

$('#add_attribute_btn').on('click', function () {
    var attributeType = $('#attribute_id option:selected').text();
    var attributeValue = $('#attribute_value option:selected').text();

    // Check if the attribute type and value combination is already selected
    var isDuplicate = false;
    $('#selected_attributes_list tr').each(function () {
        var existingAttributeType = $(this).find('td:first').text();
        var existingAttributeValue = $(this).find('td:nth-child(2)').text();
        if (existingAttributeType === attributeType && existingAttributeValue === attributeValue) {
            isDuplicate = true;
            return false; // Exit the loop if duplicate is found
        }
    });

    if (!isDuplicate) {
        // Create a new row to display the selected attribute values in the table
        var row = '<tr><td>' + attributeType + '</td><td>' + attributeValue + '</td></tr>';
        $('#selected_attributes_list').append(row);

        // Add the selected attribute and its value to the array
        selectedAttributes.push({ attributeType: attributeType, attributeValue: attributeValue });

        // Show the selected attributes container
        $('#selected_attributes_container').show();
    } else {
        alert('This attribute is already selected.');
    }
});

        // Event handler for the click event of Confirm button
   // Event handler for the click event of Confirm button
    $(document).on('click', '#save_btn', function () {
            // Add hidden input fields dynamically to the form
            $.each(selectedAttributes, function (index, attribute) {
                var inputField = '<input type="hidden" name="selected_attributes[' + index + '][attributeType]" value="' + attribute.attributeType + '">';
                inputField += '<input type="hidden" name="selected_attributes[' + index + '][attributeValue]" value="' + attribute.attributeValue + '">';
                $('#info-home').append(inputField);
            });

            // Submit the form
            $('form').submit();
        });



        const detailsTab = document.getElementById('info-home-tab');
        const variantsTab = document.getElementById('profile-info-tab');
        const detailsContent = document.getElementById('info-home');
        const variantsContent = document.getElementById('info-profile');

        // Hide variants tab content by default
        variantsContent.classList.add('d-none');

        // Event listener for the details tab
        detailsTab.addEventListener('click', function () {
            detailsContent.classList.remove('d-none');
            variantsContent.classList.add('d-none');
        });

        // Event listener for the variants tab
        variantsTab.addEventListener('click', function () {
            variantsContent.classList.remove('d-none');
            detailsContent.classList.add('d-none');
        });

    });
</script>

<script src="{{asset('assets/js/datepicker/date-picker/datepicker.js')}}"></script>
<script src="{{asset('assets/js/datepicker/date-picker/datepicker.en.js')}}"></script>
<script src="{{asset('assets/js/datepicker/date-picker/datepicker.custom.js')}}"></script>
<script src="{{asset('assets/js/dropzone/dropzone.js')}}"></script>
<script src="{{asset('assets/js/dropzone/dropzone-script.js')}}"></script>
@endsection
