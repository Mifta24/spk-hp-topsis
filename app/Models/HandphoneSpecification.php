<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HandphoneSpecification extends Model
{
    protected $fillable = [
        'handphone_id',
        'image',
        'processor_name',
        'camera_detail',
        'battery_capacity',
        'ram_size',
        'storage_size',
        'screen_size',
        'os_version',
        'network',
        'sim',
        'weight',
        'dimensions',
        'colors',
        'features',
        'description',
    ];

    protected $casts = [
        'colors' => 'array',
        'features' => 'array',
    ];

    /**
     * Get the handphone that owns the specification.
     */
    public function handphone(): BelongsTo
    {
        return $this->belongsTo(Handphone::class);
    }
}
