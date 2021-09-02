<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function getAbsen()
    {
        $style = [
            'H' => 'success','I'=>'info','S'=>'warning','A'=>'danger',''=>'secondary'
        ];
        $detail = ['H'=>'Hadir','I'=>'Izin','S'=>'Sakit','A'=>'Alfa',''=>'Belum Absen'];
        $a = $this->absen;
        return "<span class='badge badge-$style[$a]'>$detail[$a]</span>";
    }
}
