<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Course;
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

        return inertia('Courses/Show', compact('course'));
    }
}