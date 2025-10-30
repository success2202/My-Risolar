<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_name', 'site_logo', 'title', 'fav', 'inflated','markup', 'site_phone', 'site_email', 'site_copyright', 'footer_menu', 'opening_hours', 'facebook', 'twitter', 'linkedIn', 'instagram', 'address', 'city', 'state', 'country'
    ];
}
