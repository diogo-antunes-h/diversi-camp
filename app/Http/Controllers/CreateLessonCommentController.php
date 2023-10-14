<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateLessonCommentRequest;
use App\Models\LessonComment;

class CreateLessonCommentController extends Controller
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
    public function __invoke(CreateLessonCommentRequest $request)
    {
        try {
            $lessonComment = $this->lessonComment->create($request->validated());
            return response()->json([
                'success' => boolval($lessonComment),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'erro' => $e->getMessage(),
            ], 422);
        }
    }
}
