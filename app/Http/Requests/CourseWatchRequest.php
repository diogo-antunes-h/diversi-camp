<?php

namespace App\Http\Requests;

use App\Models\User;
use App\Rules\LessonBelongsToCourse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CourseWatchRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check();
    }

    public function rules(): array
    {
        return [
            'video' => [
                'numeric',
                new LessonBelongsToCourse($this->route('slug')),
            ],
        ];
    }
}