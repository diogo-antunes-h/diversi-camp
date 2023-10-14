<?php

namespace App\Rules;

use App\Models\Lesson;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class LessonBelongsToCourse implements ValidationRule
{
    public function __construct(private string $slug)
    { }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $exists = Lesson::query()
            ->where('id', $value)
            ->whereHas('course', function ($query) {
                $query->where('slug', $this->slug);
            })
            ->exists();

        if (! $exists) {
            $fail('Lesson does not belongs to any course with the given slug');
        }
    }
}
