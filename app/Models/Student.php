<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function absens()
    {
        return $this->hasMany(Absen::class, 'student_id', 'id');
    }

    public function getAbsenToday()
    {
        $absenToday = date('Y-m-d');
        $absen = $this->absens->where('created_at', '>=', $absenToday.' 00:00:00')
                              ->where('created_at', '<=', $absenToday.' 99:99:99')->first();
        return $absen->absen??'';
    }

    public function hasAbsenToday()
    {
        $absenToday = date('Y-m-d');
        $absen = $this->absens->where('created_at', '>=', $absenToday.' 00:00:00')
                              ->where('created_at', '<=', $absenToday.' 99:99:99')->first();
        return !is_null($absen);
    }
}
