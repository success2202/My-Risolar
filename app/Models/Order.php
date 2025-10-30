<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_no', 'cart_items', 'shipping_method','channel', 'user_id', 'payable', 'payment_ref', 'payment_method', 'address_id', 'is_paid', 'is_delivered', 'dispatch_status'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }


     // An order can have many cart items
    public function cartItems()
    {
        return $this->hasMany(CartItem::class, 'order_no', 'order_no');
    }

    public function shipping()
{
    return $this->belongsTo(ShippingAddress::class, 'address_id');
}

}
