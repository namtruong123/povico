<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'sku', 'slug', 'category_id', 'attribute_group_id', 'price', 'sale_price', 'quantity',
        'main_image', 'description', 'specifications', 'is_favorite', 'is_new', 'is_best_seller', 'views',
        'attribute_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function attributeGroup()
    {
        return $this->belongsTo(ProductAttributeGroup::class, 'attribute_group_id');
    }

    public function galleries()
    {
        return $this->hasMany(ProductGallery::class);
    }
    
    public function attribute()
    {
        return $this->belongsTo(\App\Models\ProductAttribute::class, 'attribute_id');
    }
}
