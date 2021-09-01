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

    public function tasks()
    {
        return $this->hasMany(Task::class, 'student_id', 'id');
    }

    public function major()
    {
        return $this->belongsTo(Major::class, 'major_id', 'id');
    }

    public function getAbsenToday($withStyle = false)
    {
        $absenToday = date('Y-m-d');
        $absen = $this->absens->whereBetween('created_at', [$absenToday.' 00:00:00',$absenToday.' 99:99:99'])->first();
        if($withStyle){
            $style = [
                'H' => 'success','I'=>'info','S'=>'warning','A'=>'danger',''=>'secondary'
            ];
            $detail = ['H'=>'Hadir','I'=>'Izin','S'=>'Sakit','A'=>'Alfa',''=>'Belum Absen'];
            $a = $absen->absen??'';
            return "<span class='badge badge-$style[$a]'>$detail[$a]</span>";
        }else{
            return $absen->absen??'';
        }
    }

    public function getDescriptionAbsenToday()
    {
        $absenToday = date('Y-m-d');
        $absen = $this->absens->whereBetween('created_at', [$absenToday.' 00:00:00',$absenToday.' 99:99:99'])->first();
        return $absen->description??old('description.'.$this->id);
    }

    public function hasAbsenToday()
    {
        $absenToday = date('Y-m-d');
        $absen = $this->absens->whereBetween('created_at', [$absenToday.' 00:00:00',$absenToday.' 99:99:99'])->first();
        return !is_null($absen);
    }

    public function haveDone(Lesson $lesson, $style = true, $status = null)
    {
        $task = Task::where([
            'lesson_id'=>$lesson->id,
            'student_id'=>$this->id
        ])->first();
        if(!$style){
            $check = is_null($task)?'dont':'done';
            return $check == $status;
        }else{
            if(is_null($task)){
                return '<div class="text-center"><i class="fa fa-lg fa-times-circle text-danger"></i></div>';
            }else{
                return '<div class="text-center"><i class="fas fa-lg fa-check-double text-success"></i></div>';
            }
        }
    }

    public function getTheTask(Lesson $lesson)
    {
        return $this->tasks->where('lesson_id', $lesson->id)->first();
    }
}
