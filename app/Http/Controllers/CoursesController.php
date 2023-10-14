<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Inertia\Response;

class CoursesController extends Controller
{
    public function watch(): Response
    {
        return inertia('Courses/Index');
    }

    public function show(string $slug): Response
    {
        $course = collect([
            'title' => str($slug)->camel(),
            'slug' => $slug,
            'creator' => collect([
                'name' => 'Diogo Antunes',
            ]),
            'created_at' => now()->format('d/m/Y'),
        ]);

        return inertia('Courses/Show', compact('course'));
    }
}