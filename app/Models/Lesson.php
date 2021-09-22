<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function tasks()
    {
        return $this->hasMany(Task::class, 'lesson_id', 'id');
    }

    public function majors()
    {
        return $this->hasMany(LessonGroup::class, 'lesson_id', 'id');
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id', 'id');
    }

    public function getMyValue()
    {
        return $this->tasks->where('student_id', student()->id)->first()->value??0;
    }
}
