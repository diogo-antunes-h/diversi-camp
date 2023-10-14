<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Lesson extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'order',
        'course_id',
        'path',
        'description',
    ];

    public function lessonComments()
    {
        return $this->hasMany(LessonComment::class, 'lesson_id', 'id')->orderBY('created_at');
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }
}
