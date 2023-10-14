<?php

namespace App\Http\Controllers\Api\Classes;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    public function getClasses(int $idClasses)
    {
        return Course::with('lessons')->find($idClasses);
    }
}
