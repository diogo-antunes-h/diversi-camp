<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
