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

        $course = Course::create([
            'title' => $title,
            'slug' => str($title)->slug(),
            'description' => fake()->text(600),
        ]);

        $lessons = [
            [
                'course_id' => $course->id,
                'title' => 'Montando o ambiente',
                'description' => 'Loren ipsum dolor sit amet, consectetur adipiscing elit. Nullam euismod, nisl eget aliquam ultricies, nunc nisl aliquet nunc, quis aliquam nisl',
                'path' => 'https://www.youtube.com/embed/o7NRCy-dCMk',
                'order' => 2,
            ],
            [
                'course_id' => $course->id,
                'title' => 'Primeiros passos com PHP',
                'description' => 'Loren ipsum dolor sit amet, consectetur adipiscing elit. Nullam euismod, nisl eget aliquam ultricies, nunc nisl aliquet nunc, quis aliquam nisl',
                'path' => 'https://www.youtube.com/embed/Q_FgNKPSi74',
                'order' => 3,
            ],
            [
                'course_id' => $course->id,
                'title' => 'Conhecendo o PHP',
                'description' => 'Loren ipsum dolor sit amet, consectetur adipiscing elit. Nullam euismod, nisl eget aliquam ultricies, nunc nisl aliquet nunc, quis aliquam nisl',
                'path' => 'https://www.youtube.com/embed/JlPqHQuYD4Y',
                'order' => 4,
            ],
        ];

        foreach ($lessons as $lesson) {
            Lesson::create($lesson);
        }
    }
}
