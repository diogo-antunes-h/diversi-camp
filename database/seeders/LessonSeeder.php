<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Database\Seeder;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->createFirstCourseLessons();

        $courses = Course::query()
            ->whereNot('id', 1)
            ->get();

        foreach ($courses as $course) {
            $lessons = Lesson::factory(random_int(1, 10))->make();

            foreach ($lessons as $key => $lesson) {
                $lesson->order = $key + 1;
                $course->lessons()->create($lesson->toArray());
            }
        }
    }

    private function createFirstCourseLessons(): void
    {
        $course = Course::find(1);
        if (empty($course)) return;

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
