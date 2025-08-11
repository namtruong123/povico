<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id', 'customer_name', 'customer_phone', 'customer_address', 'customer_email', 'total', 'status'
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
