<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'name',
        'category',
        'icon',
        'location',
        'floor',
        'total_capacity',
        'description',
        'requires_letter',
        'min_participants',
        'max_duration_hours',
        'is_reservable',
        'is_active',
        'sort_order',
    ];

    /** @return array<string, string> */
    protected function casts(): array
    {
        return [
            'requires_letter' => 'boolean',
            'is_reservable' => 'boolean',
            'is_active' => 'boolean',
        ];
    }

    /** @return HasMany<RoomUnit, $this> */
    public function units(): HasMany
    {
        return $this->hasMany(RoomUnit::class)->orderBy('sort_order');
    }

    /** @return HasMany<RoomFacility, $this> */
    public function facilities(): HasMany
    {
        return $this->hasMany(RoomFacility::class)->orderBy('sort_order');
    }

    /** @return HasMany<RoomRule, $this> */
    public function rules(): HasMany
    {
        return $this->hasMany(RoomRule::class)->orderBy('sort_order');
    }
}
