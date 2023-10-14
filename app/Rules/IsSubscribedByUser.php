<?php

namespace App\Rules;

use App\Models\Course;
use App\Models\User;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class IsSubscribedByUser implements ValidationRule
{
    public function __construct(private User $user)
    { }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $exists = Course::query()
            ->where('slug', $value)
            ->whereHas('subscritpions', function ($query) {
                $query->where('id', $this->user->id);
            })
            ->exists();

        if (! $exists) {
            $fail('Lesson does not belongs to any course with the given slug');
        }
    }
}
