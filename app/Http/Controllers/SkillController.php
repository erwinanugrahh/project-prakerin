<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.skill.index');
    }

    public function ajax()
    {
        $model = Skill::query();
        $datatable = DataTables::of($model)
        ->addColumn('checkbox', function($skill){
            return view('admin.skill._checkbox', compact('skill'));
        })
        ->editColumn('logo', function($skill){
            return '<img src="'.$skill->logo.'" class="img-thumbnail w-10" />';
        })
        ->addColumn('action', function($skill){
            return view('admin.skill._action', compact('skill'));
        })
        ->escapeColumns([''])
        ->toJson();
        return $datatable;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.skill.create');
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
            'logo' => 'required|mimes:png,jpg,jpeg|max:3076',
            'name' => 'required',
            'description' => 'required'
        ]);

        $file_name = 'logo-'.Str::slug($validate['name']).'.'.$request->file('logo')->getClientOriginalExtension();
        $request->file('logo')->storeAs('/public/skill-logo', $file_name);
        $validate['logo'] = '/storage/skill-logo/'.$file_name;

        Skill::create($validate);
        return redirect()->route('skill.index')->with('success', 'Jurusan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function show(Skill $skill)
    {
        return response()->json($skill->toArray());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function edit(Skill $skill)
    {
        return view('admin.skill.edit', compact('skill'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Skill $skill)
    {
        $validate = $request->validate([
            'logo' => 'image|max:3076',
            'name' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('logo')){
            $logo = explode('/', ltrim($skill->logo, '/'))[2];
            if(file_exists(base_path('storage/app/public/skill-logo/'.$logo))){
                unlink(base_path('storage/app/public/skill-logo/'.$logo));
            }
            $file_name = 'logo-'.Str::slug($validate['name']).'.'.$request->file('logo')->getClientOriginalExtension();
            $request->file('logo')->storeAs('/public/skill-logo', $file_name);
            $validate['logo'] = '/storage/skill-logo/'.$file_name;

        }
        $skill->update($validate);
        return redirect()->route('skill.index')->with('success','Jurusan berhasil di edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */

    public function destroy(Skill $skill)
    {
        $logo = explode('/', ltrim($skill->logo, '/'))[2];
        if(file_exists(base_path('storage/app/public/skill-logo/'.$logo))){
            unlink(base_path('storage/app/public/skill-logo/'.$logo));
        }
        $skill->delete();
        return response()->json(['message'=>'Jurusan berhasi dihapus']);
    }

    public function delete_selected(Request $request)
    {
        Skill::whereIn('id', $request->id)->delete();

        return response()->json([
            'count' => count($request->id)
        ]);
    }
}
