<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\LessonGroup;
use App\Models\Major;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $model=Lesson::select('lessons.*');

        if(auth()->user()->teacher){
            $lessons = Lesson::where('teacher_id',auth()->user()->teacher->id)->get();
            $model->where('teacher_id',auth()->user()->teacher->id);
        }else{
            $lessons = Lesson::all();
        }

        $datatable = DataTables::of($model)
        ->editColumn('content', function($lesson){
            return Str::limit($lesson->content, 100, '...');
        })
        ->addColumn('checkbox', function($teacher){
            return view('admin.teachers._checkbox', compact('teacher'));
        })
        ->addColumn('action',function($lesson){
            return view('teacher.lesson._action',compact('lesson'));
        })
        ->escapeColumns([])
        ->toJson();

        return $request->ajax()?$datatable:view('teacher.lesson.index', compact('lessons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $majorities = Major::all();
        $classess = [[
            'major_id'=>0,
            'start_at'=>'',
            'end_at'=>'',
        ]];
        return view('teacher.lesson.create', compact('majorities', 'classess'));
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
            'title' => 'required',
            'content' => 'required',
            'major_id.*' => 'required',
            'start_at.*' => 'required',
            'end_at.*' => 'required'
        ]);

        $validate['teacher_id'] = teacher()->id??null;
        if($request->hasFile('attachment')){
            $fileName = 'attachment-'.time().'.'.$request->file('attachment')->getClientOriginalExtension();
            if($request->file('attachment')->move(base_path('public/images/attachments/'), $fileName)){
                $validate['attachment'] = $fileName;
            }
        }

        $lesson_id = Lesson::create($validate)->id;
        foreach($request->major_id as $i => $id){
            LessonGroup::create([
                'lesson_id'=>$lesson_id,
                'major_id'=>$id,
                'start_at'=> Carbon::parse(date('Y-m-d ').$request->start_at[$i])->format('Y-m-d H:i:s'),
                'end_at'=> Carbon::parse(date('Y-m-d ').$request->end_at[$i])->format('Y-m-d H:i:s')
            ]);
        }

        return redirect()->route('lesson.index')->with('success', 'Materi berhasi ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Lesson $lesson)
    {
        $model = [];
        foreach($lesson->majors as $majors){
            foreach($majors->major->students as $student){
                $task = $student->getTheTask($lesson);
                $model[] = collect([
                    'student' => $student,
                    'name' => $student->name,
                    'major' => $majors->major->getMajor(),
                    'value' => $student->getTheTask($lesson)->value??0,
                    'done' => $student->haveDone($lesson),
                    'status_done' => $student->haveDone($lesson, false, $request->filter_status),
                    'action' => '<a class="btn btn-theme text-white '.(is_null($task)?'disabled':'').'" href="'.route('lesson.task', $task->id??0).'">
                                    <i class="fa fa-eye"></i>
                                </a>'
                ]);
            }
        }
        $model = collect($model);

        if(!is_null($request->filter_status)){
            $model = $model->filter(function($item)use($request){
                return $item['status_done']==$request->filter_status;
            });
        }
        if(!is_null($request->filter_major)){
            $model = $model->filter(function($item)use($request){
                return $item['major']==$request->filter_major;
            });
        }

        $datatable = DataTables::collection($model)
            ->addIndexColumn()
            ->escapeColumns([])
            ->toJson();

        return $request->ajax()?$datatable:view('teacher.lesson.show', compact('lesson'));
    }

    public function task(Task $task)
    {
        return view('teacher.lesson.task', compact('task'));
    }

    public function update_task(Request $request, Task $task)
    {
        $validate = $request->validate([
            'value' => 'required|numeric|between:0,100',
            'description' => 'nullable|string'
        ]);

        $task->update($validate);

        return redirect()->route('lesson.index')->with('success', "Berhasil memberi nilai tugas \"{$task->student->name}\"");
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
        $lesson->majors;
        $times = [];
        $classess = [];
        foreach($lesson->majors as $i => $major){
            $classess[$i]['major_id'] = $major->id;
            $classess[$i]['start_at'] = substr($major->start_at, 11, 5);
            $classess[$i]['end_at'] = substr($major->end_at, 11, 5);
            $times[$i]['start_at'] = substr($major->start_at, 11, 5);
            $times[$i]['end_at'] = substr($major->end_at, 11, 5);
        }

        return request()->ajax()?response()->json($times):view('teacher.lesson.edit', compact('majorities', 'lesson', 'classess'));
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
            'major_id' => 'array',
            'start_at.*' => 'required',
            'end_at.*' => 'required'
        ]);

        $ids = $lesson->majors->whereNotIn('major_id',$request->major_id)->pluck('id');
        LessonGroup::destroy($ids);
        foreach($request->major_id as $i => $major_id){
            LessonGroup::firstOrCreate([
                'major_id' => $major_id,
                'lesson_id' => $lesson->id
            ],[
                'start_at' => Carbon::parse(date('Y-m-d ').$request->start_at[$i])->format('Y-m-d H:i:s'),
                'end_at'=> Carbon::parse(date('Y-m-d ').$request->end_at[$i])->format('Y-m-d H:i:s')
            ])->update([
                'start_at' => Carbon::parse(date('Y-m-d ').$request->start_at[$i])->format('Y-m-d H:i:s'),
                'end_at'=> Carbon::parse(date('Y-m-d ').$request->end_at[$i])->format('Y-m-d H:i:s')
            ]);
        }

        if($request->hasFile('attachment')){
            $fileName = 'attachment-'.time().'.'.$request->file('attachment')->getClientOriginalExtension();
            if(file_exists(base_path('public/images/attachments/'.($lesson->attachment??'no')))){
                unlink(base_path('public/images/attachments/'.($lesson->attachment??'no')));
            }
            if($request->file('attachment')->move(base_path('public/images/attachments/'), $fileName)){
                $validate['attachment'] = $fileName;
            }
        }
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
        if(file_exists(base_path('public/images/attachments/'.($lesson->attachment??'no')))){
            unlink(base_path('public/images/attachments/'.($lesson->attachment??'no')));
        }
        $lesson->delete();
        return request()->ajax()?response()->json(['message'=>'Materi berhasi dihapus']):back()->with('success','Materi berhasil dihapus');
    }

    public function delete_selected(Request $request)
    {
        foreach($request->id as $id){
            $lesson = Lesson::find($id);
            if(file_exists(base_path('public/images/attachments/'.($lesson->attachment??'no')))){
                unlink(base_path('public/images/attachments/'.($lesson->attachment??'no')));
            }
            $lesson->delete();
        }

        return response()->json([
            'count' => count($request->id)
        ]);
    }
}
