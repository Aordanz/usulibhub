<?php

namespace Database\Factories;

use App\Models\Statistic;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<Statistic> */
class StatisticFactory extends Factory
{
    /** @return array<string, mixed> */
    public function definition(): array
    {
        return [
            'label' => fake()->words(2, true),
            'value' => (string) fake()->numberBetween(1000, 999999),
            'sublabel' => fake()->optional()->words(2, true),
            'icon' => 'bar_chart',
            'color_scheme' => fake()->randomElement(['green', 'amber']),
            'sort_order' => 0,
        ];
    }
}
