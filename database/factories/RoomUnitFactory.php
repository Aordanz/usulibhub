<?php

namespace Database\Factories;

use App\Models\Room;
use App\Models\RoomUnit;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<RoomUnit> */
class RoomUnitFactory extends Factory
{
    /** @return array<string, mixed> */
    public function definition(): array
    {
        return [
            'room_id' => Room::factory(),
            'name' => fake()->words(2, true),
            'capacity' => fake()->randomElement([1, 6, 8, 12, 18]),
            'is_active' => true,
            'sort_order' => 0,
        ];
    }
}
