<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Lesson;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $major_id = auth()->user()->student->major_id;
        $lessons = Lesson::where('major_id', $major_id)->get();
        return view('student.task.index', compact('lessons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tasks = Task::all();
        return view('student.task.create');
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
            'lesson_id' => 'required',
            'content' => 'required',
        ]);

        Task::firstOrCreate([
            'lesson_id' => $validate['lesson_id']
        ],[
            'content' => $validate['content'],
            'student_id' => student()->id
        ])->update(['content'=>$validate['content']]);

        return redirect()->route('task.index')->with('success', 'Tugas berhasil diupload');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Lesson $task)
    {
        $myAnswer = $task->tasks->where('student_id', student()->id)->first();
        return view('student.task.show', compact('task', 'myAnswer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //
    }
}
