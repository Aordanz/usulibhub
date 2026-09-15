<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<Contact> */
class ContactFactory extends Factory
{
    /** @return array<string, mixed> */
    public function definition(): array
    {
        return [
            'type' => fake()->randomElement(['phone', 'email', 'social_media']),
            'label' => fake()->words(2, true),
            'value' => fake()->phoneNumber(),
            'url' => null,
            'icon' => 'call',
            'description' => null,
            'sort_order' => 0,
            'is_active' => true,
        ];
    }
}
