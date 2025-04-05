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
        'prosessor',
        'design',
        'storage',
    ];

    public function specification()
    {
        return $this->hasOne(HandphoneSpecification::class);
    }

    public function getCategoryAttribute()
    {
        if ($this->price >= 8000000) return 'Premium';
        if ($this->price >= 4000000) return 'Mid-range';
        if ($this->price >= 2000000) return 'Entry-level';
        return 'Budget';
    }

}
