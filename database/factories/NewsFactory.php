<?php

namespace Database\Factories;

use App\Models\News;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<News> */
class NewsFactory extends Factory
{
    /** @return array<string, mixed> */
    public function definition(): array
    {
        $title = fake()->sentence(6);

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'excerpt' => fake()->paragraph(),
            'body' => null,
            'category' => fake()->randomElement(['Berita', 'Literasi Informasi', 'Transformasi Digital']),
            'image_path' => null,
            'external_url' => 'https://library.usu.ac.id/id/berita',
            'published_at' => fake()->dateTimeBetween('-6 months', 'now'),
            'is_published' => true,
            'author_id' => null,
        ];
    }
}
