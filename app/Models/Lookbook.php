<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lookbook extends Model
{
    protected $fillable = [
        'title',
        'image',
        'hover_image',
        'product_link',
        'price',
        'position',
    ];
}
