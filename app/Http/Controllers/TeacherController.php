<?php

namespace App\Http\Controllers;

use App\Imports\TeacherImport;
use App\Models\Teacher;
use App\Models\Subject;
use App\Models\Major;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Yajra\DataTables\Facades\DataTables;
use Maatwebsite\Excel\Facades\Excel;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $model=collect(Teacher::with('major')->select('teachers.*')->get());

        $datatable = DataTables::collection($model)
        ->addColumn('checkbox', function($teacher){
            return view('admin.teachers._checkbox', compact('teacher'));
        })
        ->addColumn('major_name', function(Teacher $teacher){
            return $teacher->major->getMajor();
        })
        ->addColumn('action',function($teacher){
            return view('admin.teachers._action',compact('teacher'));
        })
        ->toJson();

        $teachers = Teacher::all();
        return $request->ajax()?$datatable:view('admin.teachers.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjects = Subject::all();
        $majorities = Major::with('teacher')->get();
        $majorities = $majorities->filter(function($item){
            return is_null($item->teacher);
        });
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

        return redirect()->route('teacher.index')->with('success', 'Guru berhasil ditambahkan');
    }

    public function preview(Request $request)
    {
        $validate = $request->validate([
            'excel' => 'mimes:xlsx,xls,csv,ods'
        ]);

        $array = Excel::toCollection(new TeacherImport, $request->file('excel'));
        foreach($array[0] as $i => $model){
            $array[0][$i]['id'] = $i;
        }
        if(count($array[0][0])<8){
            throw ValidationException::withMessages(['excel' => 'Format tidak sesuai dengan table']);
        }
        $datatable = DataTables::collection($array[0])
            ->addColumn('checkbox', function($student){
                return '
                <div class="form-check-box cta">
                    <span class="color1">
                        <input type="checkbox" id="select'.$student['id'].'" value="'.$student['id'].'" class="ids" name="selected[]">
                        <label for="select'.$student['id'].'"></label>
                    </span>
                </div>
                ';
            })
            ->editColumn(4, function($teacher){
                $hasAlready = User::where('email', $teacher[4])->first();
                return $teacher[4].(is_null($hasAlready)?'':'<br><small class="text-danger">Email sudah terdaftar</small>');
            })
            ->escapeColumns([])
            ->toJson();
        return $datatable;
    }

    public function import(Request $request)
    {
        $validate = $request->validate([
            'excel' => 'mimes:xlsx,xls,csv,ods',
            'selected' => 'required|array|min:3'
        ],[],[
            'selected'=>'Pilihan'
        ]);
        $teachers = Excel::toCollection(new TeacherImport, $request->file('excel'))[0];
        $success = 0;
        $fails = 0;
        foreach($teachers as $id => $teacher){
            if(in_array($id, $validate['selected'])){
                try{
                    $user = User::create([
                        'name' => $teacher[2],
                        'email' => $teacher[4],
                        'password' => bcrypt('passwordguru'),
                        'role' => 'teacher'
                    ]);
                    if($user->exists){
                        $major = Major::create([
                            'level' => $teacher[5],
                            'name' => $teacher[6]
                        ]);
                        $teacherM = Teacher::create([
                            'user_id' => $user->id,
                            'nip' => $teacher[0],
                            'front_title' => $teacher[1],
                            'name' => $teacher[2],
                            'back_degree' => $teacher[3],
                            'email' => $teacher[4],
                            'address' => $teacher[7],
                            'major_id' => $major->id,
                            'subject_id'=>1
                        ]);
                        if($teacherM->exists) $success++;
                        else $fails++;
                    }else $fails++;
                }catch(QueryException $exception){
                    $fails++;
                }
            }
        }
        return response()->json(['message'=>"Data berhasil diimport. $success berhasil, $fails gagal"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        $teacher->subject;
        $teacher->major_name = $teacher->major->getMajor();
        return request()->ajax()? response()->json(array_merge($teacher->toArray(), ['fullName'=>$teacher->getFullName()])):abort(403);
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
        $name = $teacher->name;
        $teacher->user->delete();
        $teacher->delete();
        return response()->json(['message'=>"Guru $name berhasil dihapus"]);
    }

    public function delete_selected(Request $request)
    {
        foreach($request->id as $id){
            $teacher = Teacher::find($id);
            $teacher->user->delete();
            $teacher->delete();
        }

        return response()->json([
            'count' => count($request->id)
        ]);
    }
}
