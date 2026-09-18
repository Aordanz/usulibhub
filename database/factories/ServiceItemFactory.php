<?php

namespace Database\Factories;

use App\Models\Service;
use App\Models\ServiceItem;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<ServiceItem> */
class ServiceItemFactory extends Factory
{
    /** @return array<string, mixed> */
    public function definition(): array
    {
        return [
            'service_id' => Service::factory(),
            'name' => fake()->words(3, true),
            'description' => fake()->paragraph(),
            'icon' => 'check_circle',
            'badge_text' => null,
            'external_url' => null,
            'location' => null,
            'is_active' => true,
            'sort_order' => 0,
        ];
    }
}
