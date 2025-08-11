<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    protected $fillable = ['name', 'slug', 'description', 'group_id', 'color'];

    public function group()
    {
        return $this->belongsTo(ProductAttributeGroup::class, 'group_id');
    }
}
