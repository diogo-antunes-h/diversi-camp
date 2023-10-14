<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseSubscribeRequest;
use App\Models\Course;
use App\Models\User;
use App\Models\UserCourse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Inertia\Response;

class CoursesController extends Controller
{
    public function watch(): Response
    {
        return inertia('Courses/Index');
    }

    public function show(string $slug): Response
    {
        $course = Course::where('slug', $slug)->firstOrFail();

        /**
         * @var null|User
         */
        $user = Auth::user();
        $isSubscribed = $user?->courses()
            ->where('course_id', $course->id)
            ->exists() ?? false;

        return inertia('Courses/Show', compact('course', 'isSubscribed'));
    }

    public function subscribe(CourseSubscribeRequest $request): RedirectResponse
    {
        $course = Course::find($request->validated('course_id'));

        /**
         * @var User
         */
        $user = Auth::user();
        $user->courses()->create(['course_id' => $course->id]);

        return to_route('courses.show', ['slug' => $course->slug]);
    }
}