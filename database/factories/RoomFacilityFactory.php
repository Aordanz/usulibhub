<?php

namespace Database\Factories;

use App\Models\Room;
use App\Models\RoomFacility;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<RoomFacility> */
class RoomFacilityFactory extends Factory
{
    /** @return array<string, mixed> */
    public function definition(): array
    {
        return [
            'room_id' => Room::factory(),
            'name' => fake()->words(3, true),
            'icon' => 'check_circle',
            'sort_order' => 0,
        ];
    }
}
