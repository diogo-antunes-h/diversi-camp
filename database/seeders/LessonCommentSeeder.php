<?php

namespace Database\Seeders;

use App\Models\Lesson;
use App\Models\LessonComment;
use Illuminate\Database\Seeder;

class LessonCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lessons = Lesson::get();

        foreach ($lessons as $lesson) {
            for ($i = 0; $i < rand(0, 5); $i++) {
                LessonComment::create([
                    'comment' => 'Loren ipsum dolor sit amet, consectetur adipiscing elit. Nullam euismod, nisl eget aliquam ultricies, nunc nisl aliquet nunc, quis aliquam nisl',
                    'user_id' => 1,
                    'lesson_id' => $lesson->id,
                ]);
            }
        }
        
        $lessonComments = LessonComment::get();
        
        foreach ($lessonComments as $lessonComment) {
            for ($i = 0; $i < rand(0, 3); $i++) {
                LessonComment::create([
                    'comment' => 'Loren ipsum dolor sit amet, consectetur adipiscing elit. Nullam euismod, nisl eget aliquam ultricies, nunc nisl aliquet nunc, quis aliquam nisl',
                    'user_id' => 1,
                    'lesson_id' => $lessonComment->lesson_id,
                    'lesson_comment_id' => $lessonComment->id
                ]);
            }
        }
    }
}
