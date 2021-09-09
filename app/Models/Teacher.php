<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $guarded = ["id"];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function major()
    {
        return $this->belongsTo(Major::class, 'major_id', 'id');
    }

    public function students()
    {
        return $this->hasManyThrough(Student::class, Major::class, 'id');
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class, 'teacher_id', 'id');
    }

    public function getFullName()
    {
        return ($this->front_title.' '??'').$this->name.(' '.$this->front_title??'');
    }
}
