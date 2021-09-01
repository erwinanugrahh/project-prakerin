<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Lesson;
use App\Models\LessonGroup;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $major_id = auth()->user()->student->major_id;
        $lessons = LessonGroup::where('major_id', $major_id);
        if($request->has('search')){
            $lessons = $lessons->whereHas('lesson', function($query)use($request){
                return $query->where('title', 'like', "%{$request->search}%");
            });
        }
        $lessons = $lessons->paginate(6);
        $request->flash();
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

        $task = Task::where([
            'lesson_id'  => $validate['lesson_id'],
            'student_id' => student()->id
        ])->first();

        if($request->hasFile('attachment')){
            if(file_exists(base_path('public/images/attachments/'.($task->attachment??'no')))){
                unlink(base_path('public/images/attachments/'.($task->attachment??'no')));
            }
            $fileName = 'attachment-'.time().'.'.$request->file('attachment')->getClientOriginalExtension();
            $request->file('attachment')->move(base_path('public/images/attachments/'),$fileName);
            $validate['attachment'] = $fileName;
        }

        if(is_null($task)){
            Task::create($validate);
        }else{
            $task->update($validate);
        }

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
}
