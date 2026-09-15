<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<Service> */
class ServiceFactory extends Factory
{
    /** @return array<string, mixed> */
    public function definition(): array
    {
        return [
            'slug' => fake()->unique()->slug(2),
            'name' => fake()->words(3, true),
            'subtitle' => fake()->sentence(3),
            'description' => fake()->paragraph(),
            'icon' => 'storefront',
            'badge_color' => '#0B6839',
            'image_path' => null,
            'is_active' => true,
            'sort_order' => 0,
        ];
    }
}
