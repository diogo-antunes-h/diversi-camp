<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'user_id',
    ];

    public function lessons()
    {
        return $this->hasMany(Lesson::class, 'course_id', 'id')->orderBY('order');
    }
}
