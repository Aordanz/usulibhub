<?php

namespace Database\Factories;

use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<Room> */
class RoomFactory extends Factory
{
    /** @return array<string, mixed> */
    public function definition(): array
    {
        return [
            'slug' => fake()->unique()->slug(2),
            'name' => fake()->words(3, true),
            'category' => fake()->randomElement(['Coworking Space', 'Kubikel Hening', 'Ruang Rapat']),
            'icon' => 'meeting_room',
            'location' => 'Lantai '.fake()->numberBetween(1, 3).' Gedung Perpustakaan USU',
            'floor' => fake()->numberBetween(1, 3),
            'total_capacity' => fake()->randomElement([6, 8, 12, 18, 40, 70]),
            'description' => fake()->paragraph(),
            'requires_letter' => false,
            'min_participants' => null,
            'max_duration_hours' => null,
            'is_reservable' => true,
            'is_active' => true,
            'sort_order' => 0,
        ];
    }
}
