<?php

namespace App\Http\Controllers;

use App\Models\Major;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return view('admin.students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $majorities = Major::all();
        return view('admin.students.create', compact('majorities'));
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
            'nisn' => 'required|min:11|max:13',
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'phone' => 'sometimes|min:9|max:13',
            'major_id' => 'required',
            'address' => 'required'
        ]);

        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt('passwordsiswa'),
            'role'=>'student'
        ]);

        Student::create(collect($validate)->put('user_id', $user->id)->toArray());

        return redirect()->route('student.index')->with('success', 'Siswa berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $majorities = Major::all();
        return view('admin.students.edit', compact('student', 'majorities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $validate = $request->validate([
            'nisn' => 'required|min:11|max:13',
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$student->email.',email',
            'phone' => 'sometimes|min:9|max:13',
            'major_id' => 'required',
            'address' => 'required'
        ]);

        $student->update($validate);

        $student->user->update($validate);

        return redirect()->route('student.index')->with('success', 'Siswa berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->user->delete();

        $student->delete();

        return redirect()->route('student.index')->with('success', 'Siswa berhasil dihapus');
    }
}
