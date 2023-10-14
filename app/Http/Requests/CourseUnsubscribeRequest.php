<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CourseUnsubscribeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check();
    }

    public function rules(): array
    {
        /**
         * @var int
         */
        $userId = Auth::user()->id;

        return [
            'subscription_id' => [
                'required',
                "exists:user_courses,id,user_id,{$userId}",
            ],
        ];
    }
}