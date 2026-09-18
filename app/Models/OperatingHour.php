<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OperatingHour extends Model
{
    use HasFactory;

    protected $fillable = [
        'label',
        'day_start',
        'day_end',
        'open_time',
        'close_time',
        'is_closed',
        'service_type',
        'description',
        'icon',
        'sort_order',
    ];

    /** @return array<string, string> */
    protected function casts(): array
    {
        return [
            'is_closed' => 'boolean',
        ];
    }
}
