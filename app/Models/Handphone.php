<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Handphone extends Model
{
    protected $fillable = [
        'name',
        'price',
        'camera',
        'battery',
        'ram',
    ];

    
}
