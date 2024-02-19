<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'product_name',
        'description',
        'price',
        'currency',
        'product_type',
        'stock_quantity',
        'user_id',
        'product_category_id',
    ];


    public function productCategories()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }

    public function groups()
    {
        return $this->belongsToMany(ProductGroup::class, 'product_groups');
    }

    public function skus(): HasMany
    {
        return $this->hasMany(Sku::class);
    }

}
