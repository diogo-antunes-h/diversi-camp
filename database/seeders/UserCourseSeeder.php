<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = Course::all();
        $users = User::all();

        foreach ($courses as $course) {
            foreach ($users as $user) {
                $isSubscribed = (bool)random_int(0, 1);

                if (! $isSubscribed) continue;

                $user->courses()->create([
                    'user_id' => $user->id,
                    'course_id' => $course->id,
                    'finished' => (bool)random_int(0, 1),
                ]);
            }
        }
    }
}
