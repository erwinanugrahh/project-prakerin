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
        $majorities = Major::with('skill')->get();
        $skills = Skill::select('id', 'name')->get()->toArray();
        return request()->ajax()?response()->json(['data'=>$majorities, 'level'=>$level, 'is_smk'=>$is_smk, 'skills'=>$skills]):view('admin.major.index', compact('majorities'));
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
        try{
            $validate = $request->validate([
                'level' => 'required',
                'skill_id'=>'sometimes',
                'name' => 'required'
            ]);

            $id = Major::create($validate)->id;
            $code = 200;
            $response = ['id'=>$id];
        }catch(Exception $e){
            $code = 500;
            $response = ['err' => $e->getMessage()];
        }

        // return $request->ajax()?response()->json(['id'=>$id]):back()->with('success', 'Kelas berhasil ditambahkan');
        return response()->json($response, $code);
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

        return $request->ajax()?response()->json(['oke'=>'oke']):redirect()->route('major.index')->with('success', 'Kelas berhasi diubah');
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
