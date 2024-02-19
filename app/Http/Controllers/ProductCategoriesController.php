<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoriesController extends Controller
{
    public function productCategories()
    {
        $productCategories = ProductCategory::all();
        $products = Product::with('productCategories')->get();
        return view('ProductCategories.product_categories', compact('productCategories'));
    }

    public function create()
    {
        $products = Product::all();
        return view('ProductCategories.productcategoriescreate', compact('products'));
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'product_ids' => 'nullable|array', // Validate if product_ids is an array
            'product_ids.*' => 'exists:products,id', // Validate if each product_id exists in the products table
        ]);

        // Create a new product category
        ProductCategory::create([
            'name' => $request->input('name'),
        ]);

        // // Attach products to the product category
        // if ($request->has('product_ids')) {
        //     $productCategory->products()->attach($request->input('product_ids'));
        // }

        return redirect()->route('product_categories')->with('success', 'Product category created successfully.');
    }

    public function edit($id)
    {
        $productCategory = ProductCategory::findOrFail($id);
        $products = Product::all();
        return view('ProductCategories.productcategoriesedit', compact('productCategory', 'products'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'product_ids' => 'nullable|array', // Validate if product_ids is an array
            'product_ids.*' => 'exists:products,id', // Validate if each product_id exists in the products table
        ]);


        $productCategory = ProductCategory::findOrFail($id);
        $productCategory->update([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('product_categories')->with('success', 'Product category updated successfully.');
    }

    public function destroy($id)
    {
        $productCategory = ProductCategory::findOrFail($id);
        $productCategory->delete();

        return redirect()->route('product_categories')->with('success', 'Product category deleted successfully.');
    }


}
