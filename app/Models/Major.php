<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function students()
    {
        return $this->hasMany(Student::class, 'major_id', 'id');
    }

    public function teacher()
    {
        return $this->hasOne(Teacher::class, 'major_id', 'id');
    }
}
