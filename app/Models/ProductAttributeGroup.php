<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAttributeGroup extends Model
{
    protected $fillable = ['name', 'slug', 'description'];

    public function attributes()
    {
        return $this->hasMany(ProductAttribute::class, 'group_id');
    }
}
