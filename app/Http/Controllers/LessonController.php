<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Major;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->teacher){
            $lessons = Lesson::where('teacher_id',auth()->user()->teacher->id)->get();
        }else{
            $lessons = Lesson::all();
        }
        return view('teacher.lesson.index', compact('lessons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $majorities = Major::all();
        return view('teacher.lesson.create', compact('majorities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function show(Lesson $lesson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function edit(Lesson $lesson)
    {
        $majorities = Major::all();
        return view('teacher.lesson.edit', compact('majorities', 'lesson'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lesson $lesson)
    {
        $validate = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'major_id' => 'required'
        ]);

        $validate['slug'] = Str::slug($validate['title']);
        $validate['teacher_id'] = auth()->user()->teacher->id??null;

        $lesson->update($validate);

        return redirect()->route('lesson.index')->with('success', 'Materi berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lesson $lesson)
    {
        // $lesson->tasks->delete();
        $lesson->delete();
        return back()->with('success','Materi berhasil dihapus');
    }
}
