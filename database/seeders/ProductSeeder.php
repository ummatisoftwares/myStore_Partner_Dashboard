<?php

namespace Database\Seeders;

use App\Models\Attribute;
use App\Models\AttributeOption;
use App\Models\Product;
use App\Models\Sku;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Simplified attributes mapping for the example
        $attributesMapping = Attribute::pluck('id', 'name')->toArray();

        // Detailed product and SKU configuration
        $productsConfig = [
            [
                'product_name' => 'Product 1',
                'description' => 'Description for Product 1',
                'price' => 5000,
                'currency' => 'USD',
                'product_type' => 'Type 1',
                'stock_quantity' => 100,
                'user_id' => 1,
                'product_category_id' => 1,
                'skus' => [
                    [
                        'code' => 'P1-001',
                        'price' => 5000,
                        'attributes' => [
                            'Color' => ['Red', 'Blue'],
                            'RAM' => ['4GB', '8GB'],
                            'Storage' => ['64GB', '128GB']
                        ]
                    ],
                    // Add more SKUs as needed
                ]
            ],
            // Add more products as needed
        ];

        // Loop through products, create entries, and assign SKUs
        foreach ($productsConfig as $productData) {
            DB::transaction(function () use ($productData, $attributesMapping) {
                $product = Product::create([
                    'product_name' => $productData['product_name'],
                    'description' => $productData['description'],
                    'price' => $productData['price'],
                    'currency' => $productData['currency'],
                    'product_type' => $productData['product_type'],
                    'stock_quantity' => $productData['stock_quantity'],
                    'user_id' => $productData['user_id'],
                    'product_category_id' => $productData['product_category_id'],
                ]);

                foreach ($productData['skus'] as $skuData) {
                    $sku = Sku::create([
                        'product_id' => $product->id,
                        'code' => $skuData['code'],
                        'price' => $skuData['price'],
                    ]);

                    foreach ($skuData['attributes'] as $attributeName => $attributeValues) {
                        $attributeId = $attributesMapping[$attributeName];
                        $attributeOptions = AttributeOption::whereIn('value', $attributeValues)
                            ->where('attribute_id', $attributeId)
                            ->pluck('id');

                        $sku->attributeOptions()->attach($attributeOptions);
                    }
                }
            });
        }
    }
}
