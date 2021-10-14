<?php

namespace App\Http\Controllers;

use App\Models\Major;
use App\Models\Skill;
use Exception;
use Illuminate\Http\Request;

class MajorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $level = [
            ['Name'=>'','Id'=>0],
            ['Name'=>'VII','Id'=>1],
            ['Name'=>'VIII','Id'=>2],
            ['Name'=>'IX','Id'=>3]
        ];
        if(setting('setting_web')['website_for']=='smk'){
            $level[1]['Name'] = 'X';
            $level[2]['Name'] = 'XI';
            $level[3]['Name'] = 'XII';
        }
        $is_smk = setting('setting_web')['website_for']=='smk';
        $data = Major::select('id', 'level', 'skill_id', 'name')->get();
        $skills = Skill::select('id', 'name')->get()->toArray();
        return request()->ajax()?response()->json(compact('level', 'data','is_smk', 'skills')):view('admin.major.index');
    }

    public function ajax()
    {
        $majors = Major::select('id', 'level', 'skill_id', 'name')->get();
        return request()->ajax()?response()->json($majors):abort(403);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'level' => 'required',
            'skill_id'=>'sometimes',
            'name' => 'required'
        ]);

        $id = Major::create($validate)->id;

        // return $request->ajax()?response()->json(['id'=>$id]):back()->with('success', 'Kelas berhasil ditambahkan');
        return response()->json($id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Major  $major
     * @return \Illuminate\Http\Response
     */
    public function show(Major $major)
    {
        return request()->ajax()?response()->json($major):abort(404, 'permintaan harus ajax');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Major  $major
     * @return \Illuminate\Http\Response
     */
    public function edit(Major $major)
    {
        return view('admin.major.edit', compact('major'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Major  $major
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Major $major)
    {
        $validate = $request->validate([
            'level' => 'required',
            'skill_id'=>'sometimes',
            'name' => 'required'
        ]);

        $major->update($validate);

        return $request->ajax()?response()->json($major->toArray()):redirect()->route('major.index')->with('success', 'Kelas berhasi diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Major  $major
     * @return \Illuminate\Http\Response
     */
    public function destroy(Major $major)
    {
        $major->delete();

        return request()->ajax()?response()->json(['oke']):back()->with('success', 'Kelas berhasil dihapus');
    }
}
