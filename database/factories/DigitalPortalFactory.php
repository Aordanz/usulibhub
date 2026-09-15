<?php

namespace Database\Factories;

use App\Models\DigitalPortal;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<DigitalPortal> */
class DigitalPortalFactory extends Factory
{
    /** @return array<string, mixed> */
    public function definition(): array
    {
        return [
            'name' => fake()->words(3, true),
            'description' => fake()->paragraph(),
            'url' => fake()->url(),
            'icon' => 'language',
            'badge_text' => fake()->word(),
            'display_url' => null,
            'is_active' => true,
            'sort_order' => 0,
        ];
    }
}
