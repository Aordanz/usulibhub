<?php

namespace Database\Factories;

use App\Models\Room;
use App\Models\RoomRule;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<RoomRule> */
class RoomRuleFactory extends Factory
{
    /** @return array<string, mixed> */
    public function definition(): array
    {
        return [
            'room_id' => Room::factory(),
            'rule' => fake()->sentence(),
            'sort_order' => 0,
        ];
    }
}
