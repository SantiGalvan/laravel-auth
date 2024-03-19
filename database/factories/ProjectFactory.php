<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->text(20),
            'description' => fake()->paragraphs(10, true),
            'language' => fake()->word(),
            'framework' => fake()->word(),
            'image' => fake()->imageUrl(250, 250, 'animals', true)
        ];
    }
}
