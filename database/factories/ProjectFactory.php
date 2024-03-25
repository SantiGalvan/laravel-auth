<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

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

        $title = fake()->text(20);

        Storage::makeDirectory('project_images');

        $img_url = Storage::putFile('project_images', fake()->image(storage_path('app/public/project_images'), 250, 250));

        return [
            'title' => $title,
            'description' => fake()->paragraphs(10, true),
            'language' => fake()->word(),
            'framework' => fake()->word(),
            'image' => $img_url
        ];
    }
}
