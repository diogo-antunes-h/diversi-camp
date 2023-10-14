<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lesson>
 */
class LessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->unique()->realText(50),
            'path' => $this->faker->unique()->url(),
            'description' => $this->faker->text(random_int(150, 800)),
            'order' => random_int(1, 100),
        ];
    }
}
