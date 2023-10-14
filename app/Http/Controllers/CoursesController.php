<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseSubscribeRequest;
use App\Http\Requests\CourseUnsubscribeRequest;
use App\Http\Requests\CourseWatchRequest;
use App\Models\Course;
use App\Models\User;
use App\Models\UserCourse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Inertia\Response;

class CoursesController extends Controller
{
    public function search(): Response
    {
        $courses = Course::all() ?? [];

        return inertia('Courses/Search', compact('courses'));
    }

    public function watch(string $slug, CourseWatchRequest $request): Response
    {
        $course = Course::query()
            ->where('slug', $slug)
            ->with('lessons.lessonComments')
            ->firstOrFail();

        $video = (int)$request->validated('video');

        return inertia('Courses/Index', compact('course', 'video'));
    }

    public function show(string $slug): Response
    {
        $course = Course::where('slug', $slug)->firstOrFail();

        /**
         * @var null|User
         */
        $user = Auth::user();

        $subscription = UserCourse::query()
            ->where('user_id', $user->id)
            ->where('course_id', $course->id)
            ->first();
        $isSubscribed = ! empty($subscription);

        $subscriptionId = $subscription?->id;

        return inertia('Courses/Show', compact('course', 'isSubscribed', 'subscriptionId'));
    }

    public function subscribe(CourseSubscribeRequest $request): RedirectResponse
    {
        /**
         * @var User
         */
        $user = Auth::user();

        $course = Course::find($request->validated('course_id'));

        $existingSubscription = UserCourse::query()
            ->withTrashed()
            ->where('course_id', $course->id)
            ->where('user_id', $user->id)
            ->first();
        if (! empty($existingSubscription)) {
            $existingSubscription->restore();

            return to_route('courses.show', ['slug' => $course->slug]);
        }

        $user->courses()->create(['course_id' => $course->id]);

        return to_route('courses.show', ['slug' => $course->slug]);
    }

    public function unsubscribe(CourseUnsubscribeRequest $request): RedirectResponse
    {
        $courseSubscription = UserCourse::find($request->validated('subscription_id'));
        if (empty($courseSubscription)) return redirect()->back();

        $courseSubscription->delete();

        /**
         * @var Course
         */
        $course = $courseSubscription->course;

        return to_route('courses.show', ['slug' => $course->slug]);
    }
}