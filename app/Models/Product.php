<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [

        'category_id', 'name', 'title', 'cost_price', 'description', 'specification', 'image_path', 'price', 'sale_price', 'discount', 'views', 'order_count', 'sku', 'qty', 'status'
    ];

    protected $table = "products";

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
