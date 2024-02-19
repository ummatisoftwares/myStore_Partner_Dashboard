<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\AttributeOption;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductGroup;
use App\Models\Sku;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function products()
    {
        $products = Product::all();
        return view('product.products', compact('products'));
    }

    public function create()
    {
        $productCategories = ProductCategory::all();
        $productGroups = ProductGroup::all();
        $attributes = Attribute::with('attributeOptions')->get();
        return view('product.productscreate', compact('productCategories', 'productGroups','attributes'));
    }

    public function storeOld(Request $request)
    {

        dd($request->all());

        // Parse the request data to organize it according to the desired format
        $requestData = [
            'product_name' => $request->input('product_name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'currency' => $request->input('currency'),
            'product_type' => $request->input('product_type'),
            'stock_quantity' => $request->input('stock_quantity'),
            'user_id' => auth()->user()->id,
            'product_category_id' => $request->input('product_category_id'),
            'skus' => [
                [
                    'code' => 'P1-001',
                    'price' => $request->input('price'), // Example, you may need to adjust this
                    'attributes' => [
                        'Color' => $request->input('color'), // Example, you may need to adjust this
                        'RAM' => $request->input('ram'), // Example, you may need to adjust this
                        'Storage' => $request->input('storage') // Example, you may need to adjust this
                    ]
                ]
                // Add more SKUs as needed
            ]
        ];

        // Validate the request
        $request->validate([
            'product_name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'currency' => 'required|string|max:10',
            'product_type' => 'required|string|max:50',
            'stock_quantity' => 'required|integer|min:0',
            'product_type' => 'required|string',
            'product_category_id' => 'required|exists:product_categories,id',
        ]);


        // Create a new product category
        $product = Product::create([
            'product_name' => $request->input('product_name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'currency' => $request->input('currency'),
            'product_type' => $request->input('product_type'),
            'stock_quantity' => $request->input('stock_quantity'),
            'user_id' => auth()->user()->id,
            'product_category_id' => $request->input('product_category_id'),
        ]);


        // Attach product groups to the product
        if ($request->has('product_group_ids')) {
            $product->groups()->attach($request->input('product_group_ids'));
        }


        return redirect()->route('products')->with('success', 'Product created successfully.');
    }

    public function store(Request $request)
    {
        // // Simplified attributes mapping for the example
        $attributesMapping = Attribute::pluck('id', 'name')->toArray();

          // Define validation rules
            $rules = [
                'product_name' => 'required|string|max:255',
                'description' => 'required|string',
                'price' => 'required|numeric|min:0',
                'currency' => 'required|string|max:10',
                'product_type' => 'required|string|max:50',
                'stock_quantity' => 'required|integer|min:0',
                'product_category_id' => 'required|exists:product_categories,id',
                // Add more validation rules as needed
            ];

            // Validate the request data
            $validatedData = $request->validate($rules);

            // Extract selected attributes from the request
            $selectedAttributes = $request->input('selected_attributes', []);

            // Start creating products and SKUs in a transaction
        DB::transaction(function () use ($validatedData, $selectedAttributes,$request,$attributesMapping) {
            // Create a new product
            $product = Product::create([
                'product_name' => $validatedData['product_name'],
                'description' => $validatedData['description'],
                'price' => $validatedData['price'],
                'currency' => $validatedData['currency'],
                'product_type' => $validatedData['product_type'],
                'stock_quantity' => $validatedData['stock_quantity'],
                'user_id' => auth()->user()->id,
                'product_category_id' => $validatedData['product_category_id'],
            ]);

            // Loop through selected attributes and create SKUs
            foreach ($selectedAttributes as $attribute) {
                $sku = Sku::create([
                    'product_id' => $product->id,
                    'code' => $attribute['attributeType'] . '-' . $attribute['attributeValue'], // Generate SKU code
                    'price' => $validatedData['price'], // Use the product price
                ]);


                foreach ($selectedAttributes as $attribute) {
                    // Extract attribute type and attribute value from the current attribute array
                    $attributeType = $attribute['attributeType'];
                    $attributeValue = $attribute['attributeValue'];

                    // Retrieve the attribute ID using the attribute type from the attributes mapping
                    $attributeId = $attributesMapping[$attributeType];

                    // Retrieve attribute options based on the attribute ID and attribute value
                    $attributeOptions = AttributeOption::where('attribute_id', $attributeId)
                        ->where('value', $attributeValue)
                        ->pluck('id');

                    // Attach the attribute options to the SKU
                    $sku->attributeOptions()->attach($attributeOptions);
                }
            }
              // Attach product groups to the product
             if ($request->has('product_group_ids')) {
                $product->groups()->attach($request->input('product_group_ids'));
            }

        });
        return redirect()->route('products')->with('success', 'Products created successfully.');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $productGroups = ProductGroup::all();
        $productCategories = ProductCategory::all();
        $users = User::all();
        $attributes = Attribute::with('attributeOptions')->get();

        // Retrieve the SKUs related to the product
        $skus = $product->skus()->with('attributeOptions.attribute')->get();


        return view('product.productsedit', compact('product', 'productGroups', 'productCategories', 'users','attributes', 'skus'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'product_name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'currency' => 'required|string|max:10',
            'product_type' => 'required|string|max:50',
            'stock_quantity' => 'required|integer|min:0',
            'product_category_id' => 'required|exists:product_categories,id',
        ]);

        $product = Product::findOrFail($id);
        $product->update([
            'product_name' => $request->input('product_name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'currency' => $request->input('currency'),
            'product_type' => $request->input('product_type'),
            'stock_quantity' => $request->input('stock_quantity'),
            'user_id' => auth()->user()->id,
            'product_category_id' => $request->input('product_category_id'),
        ]);

            // Attach product groups to the product
        if ($request->has('product_group_ids')) {
            // Get the new group IDs from the request
            $newGroupIds = $request->input('product_group_ids');

            // Delete existing associations
            $product->groups()->detach();

            // Attach the product to the new groups
            $product->groups()->attach($newGroupIds);
        }


        return redirect()->route('products')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products')->with('success', 'Product deleted successfully.');
    }


    // public function show(Request $request, Product $product)
    // {
    //     $attributes = Attribute::pluck('name', 'id');
    //     // $options = $this->fetchAvailableAttributeOptions($product);
    //     return view('products.show', compact('product', 'attributes', 'options'));
    // }

    // public function addProductAttributes(Request $request)
    // {
    //     $request->validate([
    //         'product_id' => 'required|exists:products,id',
    //         'attribute_id' => 'required|exists:attributes,id',
    //         'attribute_value' => 'required|string',
    //     ]);

    //     $productAttribute = new ProductAttribute();
    //     $productAttribute->product_id = $request->product_id;
    //     $productAttribute->attribute_id = $request->attribute_id;
    //     $productAttribute->value = $request->attribute_value;
    //     $productAttribute->save();

    //     return redirect()->back()->with('success', 'Attribute added successfully.');
    // }

    // private function fetchAvailableAttributeOptions(Product $product): array
    // {
    //     // ... [Implementation from your code]
    //     return $options;
    // }

    // private function computePriceBasedOnAttributes(Product $product, Request $request): ?array
    // {
    //     $priceDetails = null;
    //     if ($request->has('attributes')) {
    //         $priceDetails = ['exists' => false, 'price' => null, 'skuCode' => null];
    //         $skuSearch = $product->skus()->where(function ($query) use ($request) {
    //             foreach ($request->input('attributes') as $attributeId => $optionValue) {
    //                 $query->whereHas('attributeOptions', function (Builder $query) use ($attributeId, $optionValue) {
    //                     $query->where(['id' => $optionValue, 'attribute_id' => $attributeId]);
    //                 });
    //             }
    //         });
    //         if ($matchedSku = $skuSearch->first()) {
    //             $priceDetails['exists'] = true;
    //             $priceDetails['price'] = $matchedSku->price;
    //             $priceDetails['skuCode'] = $matchedSku->code;
    //         }
    //     }
    //     return $priceDetails;
    // }

}
