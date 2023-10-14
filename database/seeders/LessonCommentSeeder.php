<?php

namespace Database\Seeders;

use App\Models\Lesson;
use App\Models\LessonComment;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Testing\WithFaker;

class LessonCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lessons = Lesson::query()
            ->with('course.subscriptions.user')
            ->get();

        foreach ($lessons as $lesson) {
            foreach ($lesson->course->subscriptions as $subscription) {
                $isUserCommented = (bool)random_int(0, 1);
                if (! $isUserCommented) continue;
                
                $comments = LessonComment::factory(random_int(1, 3))->make([
                    'user_id' => $subscription->user->id,
                ]);

                foreach ($comments as $comment) {
                    $lesson->lessonComments()->create($comment->toArray());
                }
            }
        }
    }
}
