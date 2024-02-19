<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductGroup;
use Illuminate\Http\Request;

class ProductGroupsController extends Controller
{
    public function productGroups()
    {
        $productGroups = ProductGroup::with('products')->get();
        return view('ProductGroups.product_groups', compact('productGroups'));
    }

    public function create()
    {
        $products = Product::all();
        return view('ProductGroups.productgroupscreate', compact('products'));
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'product_ids' => 'nullable|array', // Validate if product_ids is an array
            'product_ids.*' => 'exists:products,id', // Validate if each product_id exists in the products table
        ]);

        // Create a new product group
        $productGroup = ProductGroup::create([
            'name' => $request->input('name'),
        ]);

        // Attach products to the product group
        if ($request->has('product_ids')) {
            $productGroup->products()->attach($request->input('product_ids'));
        }

        return redirect()->route('product_groups')->with('success', 'Product group created successfully.');
    }

    public function edit($id)
    {
        $productGroup = ProductGroup::with('products')->findOrFail($id);
        $products = Product::all();
        return view('ProductGroups.productgroupsedit', compact('productGroup', 'products'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'product_ids' => 'nullable|array', // Validate if product_ids is an array
            'product_ids.*' => 'exists:products,id', // Validate if each product_id exists in the products table
        ]);

        $productGroup = ProductGroup::findOrFail($id);
        $productGroup->update([
            'name' => $request->input('name'),
        ]);

        // Sync the associated products
        $productGroup->products()->sync($request->input('product_ids'));

        return redirect()->route('product_groups')->with('success', 'Product group updated successfully.');
    }

    public function destroy($id)
    {
        $productGroup = ProductGroup::findOrFail($id);
        $productGroup->delete();

        return redirect()->route('product_groups')->with('success', 'Product group deleted successfully.');
    }


}
