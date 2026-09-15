<?php

namespace Database\Factories;

use App\Models\RoomReservation;
use App\Models\RoomUnit;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<RoomReservation> */
class RoomReservationFactory extends Factory
{
    /** @return array<string, mixed> */
    public function definition(): array
    {
        return [
            'room_unit_id' => RoomUnit::factory(),
            'user_id' => User::factory(),
            'reservation_date' => fake()->dateTimeBetween('now', '+30 days'),
            'start_time' => '09:00',
            'end_time' => '12:00',
            'title' => fake()->sentence(4),
            'organizer' => fake()->company(),
            'participant_count' => fake()->numberBetween(4, 20),
            'notes' => fake()->optional()->sentence(),
            'status' => 'pending',
        ];
    }

    public function approved(): static
    {
        return $this->state(fn () => ['status' => 'approved']);
    }

    public function completed(): static
    {
        return $this->state(fn () => ['status' => 'completed']);
    }
}
