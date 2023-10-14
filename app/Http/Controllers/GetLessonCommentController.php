<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\LessonCommentResource;
use App\Models\LessonComment;

class GetLessonCommentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        private LessonComment $lessonComment
    ) {
    }

    /**
     * @return JsonResponse
     */
    public function __invoke(int $lessonId)
    {
        $comments = LessonCommentResource::collection(
            $this->lessonComment
                ->with('user')
                ->with('replies')
                ->where('lesson_id', $lessonId)
                ->whereNull('lesson_comment_id')->get()
        );

        return response()->json([
            'discussion' => $comments,
        ]);
    }
}
