<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\Subject;
use App\Models\Major;
use App\Models\User;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::all();
        return view('admin.teachers.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjects = Subject::all();
        $majorities = Major::all();
        return view('admin.teachers.create', compact('subjects','majorities'));
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
            'nip' => 'required|min:11|max:13',
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'subject_id' => 'required',
            'major_id' => 'required',
        ]);

        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt('passwordguru'),
            'role'=>'teacher'
        ]);

        Teacher::create(collect($validate)->put('user_id', $user->id)->toArray());

        return redirect()->route('teacher.index')->with('success', 'Siswa berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        $subjects = Subject::all();
        $majorities = Major::all();
        return request()->ajax()? response()->json($teacher):view('admin.teachers.edit', compact('teacher','majorities','subjects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
        $validate = $request->validate([
            'nip' => 'required|min:11|max:13',
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$teacher->email.',email',
            'subject_id' => 'required',
            'major_id' => 'required',
        ]);

        $teacher->update($validate);

        $teacher->user->update($validate);

        return redirect()->route('teacher.index')->with('success', 'Guru '.$teacher->name.' berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->user->delete();
        $teacher->delete();
    }
}
