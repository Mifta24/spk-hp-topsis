<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    protected $fillable = [
        'name',
        'label',
        'type', // benefit or cost
    ];
}
