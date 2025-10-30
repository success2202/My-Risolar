<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManualPayment extends Model
{
    use HasFactory;


    protected $fillable = ['name', 'email', 'amount', 'products_name', 'payment_ref', 'currency', 'payment_status', 'date_paid', 'order_status', 'external_ref', 'payment_link'];
}
