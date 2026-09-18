<?php

namespace Database\Factories;

use App\Models\OperatingHour;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<OperatingHour> */
class OperatingHourFactory extends Factory
{
    /** @return array<string, mixed> */
    public function definition(): array
    {
        return [
            'label' => fake()->dayOfWeek(),
            'day_start' => 1,
            'day_end' => 1,
            'open_time' => '08:00',
            'close_time' => '20:00',
            'is_closed' => false,
            'service_type' => 'fisik',
            'description' => 'Pelayanan Penuh',
            'icon' => 'calendar_today',
            'sort_order' => 0,
        ];
    }
}
