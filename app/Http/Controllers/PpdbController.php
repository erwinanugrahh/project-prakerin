<?php

namespace App\Http\Controllers;

use App\Models\Major;
use App\Models\Ppdb;
use App\Models\Student;
use App\Models\User;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PpdbController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:open-ppdb', ['only'=>'form']);
    }

    public function penyetujuan()
    {
        return view('admin.ppdb.index');
    }

    public function form(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'nisn' => 'required',
            'email' => 'required|email',
            'place' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'child' => 'required',
            'child_from' => 'required',
            'address' => 'required',
            'skill_id' => 'required',
            'phone' => 'required',
            'zip' => 'required',
            'parents_name' => 'required',
            'parents_job' => 'required',
            'parents_address' => 'required',
            'parents_phone' => 'required'
        ]);

        Ppdb::create($validate);
        return back()->with('success', 'Berhasil daftar, silahkan tunggu pengumumanya.');
    }

    public function ajax()
    {
        $ppdb = Ppdb::query();
        $datatable = DataTables::of($ppdb)
        ->addColumn('checkbox', function($ppdb){
            return view('admin.ppdb._checkbox', compact('ppdb'));
        })
        ->addColumn('skill', function($ppdb){
            return $ppdb->skill->name??'';
        })
        ->addColumn('action', function($ppdb){
            return view('admin.ppdb._action', compact('ppdb'));
        })
        ->escapeColumns([''])
        ->toJson();
        return $datatable;
    }

    public function show(Ppdb $ppdb)
    {
        return view('admin.ppdb.show', compact('ppdb'));
    }

    public function get_major()
    {
        $model = Major::where('level', 1)->get();
        $majors = [];
        foreach($model as $m){
            $majors[] = [
                'id' => $m->id,
                'name' => $m->getMajor()
            ];
        }
        return response()->json($majors);
    }

    public function send_result(Request $request)
    {
        $validate = $request->validate([
            'ids' => 'required|array',
            'action' => 'required|string',
        ]);
        $action = [
            'accepted'=>'Terima',
            'rejected'=>'Tolak',
        ];
        $message['message'] = count($validate['ids'])." Calon Siswa baru berhasil di<b>".$action[$validate['action']]."</b>";
        if(count($validate['ids'])==1){
            $ppdb = Ppdb::find($validate['ids'][0]);
            $message['message'] = "Calon Siswa \"<b>{$ppdb->name}</b>\" berhasil di<b>".$action[$validate['action']]."</b>";
        }
        if($validate['action']=='accepted'){
            foreach($validate['ids'] as $id){
                $calon_siswa = Ppdb::find($id);
                $students[] = $calon_siswa->only('name');
                $user = User::create([
                    'code' => $calon_siswa->nisn,
                    'name' => $calon_siswa->name,
                    'email' => $calon_siswa->email??'',
                    'password'=>bcrypt($calon_siswa->dob),
                    'role'=>'student'
                ]);
                $student = $calon_siswa->only('nisn', 'name', 'email', 'phone', 'address', '');
                $student = array_merge($student, [
                    'user_id' => $user->id,
                    'major_id' => $request->major_id
                ]);
                Student::create($student);
            }
        }
        Ppdb::whereIn('id', $validate['ids'])->delete();
        return response()->json($message);
    }
}
