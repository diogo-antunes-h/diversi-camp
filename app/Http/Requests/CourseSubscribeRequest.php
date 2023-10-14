<?php

namespace App\Http\Requests;

use App\Models\User;
use App\Models\UserCourse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Unique;

class CourseSubscribeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check();
    }

    public function rules(): array
    {
        /**
         * @var User
         */
        $userId = Auth::user()->id;

        return [
            'course_id' => [
                'required',
                'exists:courses,id',
                (new Unique(UserCourse::class, 'course_id'))->where('user_id', $userId),
            ],
        ];
    }
}