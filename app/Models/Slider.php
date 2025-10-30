<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'content', 'image_path', 'links'
    ];

    CONST Active = 1;
    CONST Inactive = -1;
}
