<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;
    protected $fillable = [

        'user_id', 'product_id', 'order_no', 'qty', 'payable', 'status','cartSession', 'product_name', 'image', 'price', 'product_prescription'
    ];

      public function order()
    {
        return $this->belongsTo(Order::class, 'order_no', 'order_no');
    }

    public function products(){
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    
}
