<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Lesson;
use App\Models\LessonGroup;
use App\Notifications\TaskFinished;
use Illuminate\Http\Request;
use App\Support\Collection;
use Illuminate\Support\Facades\Notification;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $collect = (new Collection(LessonGroup::all()->toArray()))->paginate(20);
        $major_id = auth()->user()->student->major_id;
        $model = LessonGroup::with(['lesson','lesson.teacher'])->where('major_id', $major_id);
        if($request->has('search')){
            $model = $model->whereHas('lesson', function($query)use($request){
                return $query->where('title', 'like', "%{$request->search}%");
            });
        }
        $lessons = (new Collection($model->get()->map(function($item){
            return [
                'title' => $item->lesson->title,
                'teacher' => $item->lesson->teacher->getFullName(),
                'end_at' => $item->end_at,
                'value' => $item->lesson->getMyValue(),
                'href' => route('task.show', $item->lesson->slug)
            ];
        })->toArray()))->paginate(6);
        $request->flash();
        return $request->ajax()?$lessons:view('student.task.index', compact('lessons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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

        $newTask = Task::updateOrCreate([
            'lesson_id'=>$validate['lesson_id'],
            'student_id'=>student()->id
        ],$validate);

        if(is_null($task)){
            $data = [
                'task_id'=>$newTask->id,
                'icon' => 'fas fa-user',
                'color' => 'bg-info',
                'title'=>'Tugas '.auth()->user()->name,
                'text'=>\Str::limit(strip_tags($validate['content']), 50),
                'url'=>url('teacher/lesson/task/'.$newTask->id)
            ];
            $newTask->lesson->teacher->user->notify(new TaskFinished($data));
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
        auth()->user()->notifications->where('data.lesson_id', $task->id)->markAsRead();
        $myAnswer = $task->tasks->where('student_id', student()->id)->first();
        return view('student.task.show', compact('task', 'myAnswer'));
    }
}
