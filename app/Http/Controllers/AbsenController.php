<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\Student;
use Illuminate\Http\Request;

class AbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(teacher()->students);
        $students = teacher()->students;
        $absens = [
            'H'=>'Hadir',
            'I'=>'Izin',
            'S'=>'Sakit',
            'A'=>'Alfa'
        ];
        return view('teacher.absen.index', compact('students','absens'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'absen.*' => 'required'
        ]);

        foreach($validate['absen'] as $id => $absen){
            $student = Student::find($id);
            if($student->hasAbsenToday()){
                $student->absens->last()->update(['absen'=>$absen]);
                $message = 'ubah';
            }else{
                Absen::create(['student_id'=>$id,'absen'=>$absen]);
                $message = 'tambahkan';
            }
        }

        return back()->with('success', 'Absen berhasil di'.$message);
    }
}
