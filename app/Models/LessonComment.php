<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonComment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'comment',
        'user_id',
        'lesson_id',
        'closed',
        'user_closed_id',
        'lesson_comment_id',
    ];

    public function replies()
    {
        return $this->hasMany(self::class, 'lesson_comment_id', 'id')->orderBY('created_at');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
