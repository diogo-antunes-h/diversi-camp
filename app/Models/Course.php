<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
        'slug',
        'user_id',
        'description',
    ];

    protected $casts = [
        'created_at' => 'date:d/m/Y',
    ];

    public function lessons()
    {
        return $this->hasMany(Lesson::class, 'course_id', 'id')->orderBY('order');
    }

    public function subscriptions(): HasMany
    {
        return $this->hasMany(UserCourse::class);
    }
}
