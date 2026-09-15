<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DigitalPortal extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'url',
        'icon',
        'badge_text',
        'display_url',
        'is_active',
        'sort_order',
    ];

    /** @return array<string, string> */
    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }
}
