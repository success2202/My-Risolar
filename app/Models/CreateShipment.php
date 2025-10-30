<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreateShipment extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id', 'order_id', 'address_id', 'sender_name', 'sender_address', 'sender_phone', 'sender_email', 'receipient_name', 'receipient_address', 'receipient_phone', 'receipient_email', 'fee', 'tracking_number', 'origin', 'destination', 'item_category', 'description', 'vehicle', 'status', 'payment_status'
    ];
    protected $table = "create_shipments";
}
