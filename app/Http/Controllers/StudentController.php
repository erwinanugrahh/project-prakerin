<?php

namespace App\Http\Controllers;

use App\Models\Major;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Imports\StudentImport;
use Illuminate\Database\QueryException;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $model=Student::with('major')->get();

        if($request['filter_major']!=null)
        {
            $model=$model->where('major_id',$request['filter_major']);
        }

        $datatable = DataTables::collection($model)
        ->addColumn('checkbox', function($student){
            return view('admin.students._checkbox', compact('student'));
        })
        ->addColumn('major_name', function($student){
            return $student->major->getMajor();
        })
        ->addColumn('action',function($student){
            return view('admin.students._action',compact('student'));
        })
        ->toJson();

        $students = Student::all();
        $majorities = Major::all();
        return $request->ajax()?$datatable:view('admin.students.index', compact('students','majorities'));
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

    public function preview(Request $request)
    {
        $validate = $request->validate([
            'excel' => 'mimes:xlsx,xls,csv,ods'
        ]);

        $array = Excel::toCollection(new StudentImport, $request->file('excel'));
        foreach($array[0] as $i => $model){
            $array[0][$i]['id'] = $i;
        }
        $datatable = DataTables::collection($array[0])
            ->addColumn('checkbox', function($student){
                return '
                <div class="form-check-box cta">
                    <span class="color1">
                        <input type="checkbox" id="order'.$student['id'].'" value="'.$student['id'].'" class="ids" name="selected[]">
                        <label for="order'.$student['id'].'"></label>
                    </span>
                </div>
                ';
            })
            ->addColumn('nisn', function($student){
                return $student[0];
            })
            ->addColumn('name', function($student){
                return $student[1];
            })
            ->addColumn('email', function($student){
                $hasAlready = User::where('email', $student[2])->first();
                return $student[2].(is_null($hasAlready)?'':'<br><small class="text-danger">Email sudah terdaftar</small>');
            })
            ->addColumn('address', function($student){
                return $student[3];
            })
            ->removeColumn([0,1,2,3])
            ->escapeColumns([])
            ->toJson();
        return $datatable;
    }

    public function import(Request $request)
    {
        $validate = $request->validate([
            'excel' => 'mimes:xlsx,xls,csv,ods',
            'major_id'=>'required',
            'selected' => 'required|array|min:3'
        ],[],[
            'major_id'=>'Kelas',
            'selected'=>'Pilihan'
        ]);
        $students = Excel::toCollection(new StudentImport, $request->file('excel'))[0];
        $success = 0;
        $fails = 0;
        foreach($students as $id => $student){
            if(in_array($id, $validate['selected'])){
                try{
                    $user = User::create([
                        'name' => $student[1],
                        'email' => $student[2],
                        'password' => bcrypt('passwordsiswa'),
                        'role' => 'student'
                    ]);
                    if($user->exists){
                        $studentM = Student::create([
                            'user_id' => $user->id,
                            'nisn' => $student[0],
                            'name' => $student[1],
                            'email' => $student[2],
                            'address' => $student[3],
                            'major_id' => $validate['major_id']
                        ]);
                        if($studentM->exists) $success++;
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
        $name = $student->name;
        $student->user->delete();

        return request()->ajax()?response()->json(['message'=>"Siswa $name berhasil dihapus"]):redirect()->route('student.index')->with('success', 'Siswa berhasil dihapus');
    }

    public function delete_selected(Request $request)
    {
        foreach($request->id as $id){
            $student = Student::find($id);
            $student->user->delete();
        }

        return response()->json([
            'count' => count($request->id)
        ]);
    }
}
