<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Inertia\Response;

class MyCoursesController extends Controller
{
    public function index(): Response
    {
        /**
         * @var User
         */
        $user = Auth::user();

        $courses = Course::query()
            ->whereHas('subscriptions.user', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })
            ->get() ?? [];

        return inertia('MyCourses/Index', compact('courses'));
    }
}