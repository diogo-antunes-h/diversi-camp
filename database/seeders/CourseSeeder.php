<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->createFirstCourse();

        Course::factory(5)->create();
    }

    private function createFirstCourse(): void
    {
        $title = 'PHP do básico ao avançado';

        Course::create([
            'title' => $title,
            'slug' => str($title)->slug(),
            'description' => fake()->text(600),
        ]);
    }
}
