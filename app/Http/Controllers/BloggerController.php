<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BloggerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::where('role', 'blogger')->get();

        $model=User::where('role', 'blogger');

        $datatable = DataTables::of($model)
        ->addColumn('checkbox', function($blogger){
            return view('admin.blogger._checkbox', compact('blogger'));
        })
        ->addColumn('blog_count', function($blogger){
            return $blogger->blogs->count();
        })
        ->filterColumn('blog_count', function($query, $keyword){
            return $query->whereRaw('LOWER(users.id) = ?', ["%{$keyword}%"]);
        })
        ->addColumn('action',function($blogger){
            return view('admin.blogger._action',compact('blogger'));
        })
        ->toJson();

        return $request->ajax()?$datatable:view('admin.blogger.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blogger.create');
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
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password'
        ]);
        $validate['role'] = 'blogger';
        $validate['password'] = bcrypt($validate['password']);
        User::create($validate);

        return redirect()->route('blogger.index')->with('success','Blogger berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $blogger
     * @return \Illuminate\Http\Response
     */
    public function show(User $blogger)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $blogger
     * @return \Illuminate\Http\Response
     */
    public function edit(User $blogger)
    {
        return view('admin.blogger.edit', compact('blogger'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $blogger
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $blogger)
    {
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$blogger->email.',email',
            'password' => 'nullable|min:6',
            'password_confirmation' => 'required_if:password,exist|same:password'
        ]);
        if(is_null($validate['password'])){
            unset($validate['password']);
            $additional_message = 'tanpa mengubah password';
        }else{
            $validate['password'] = bcrypt($validate['password']);
            $additional_message = 'dengan mengubah password';
        }
        $blogger->update($validate);

        return redirect()->route('blogger.index')->with('success','Blogger berhasil diubah, '.$additional_message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $blogger
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $blogger)
    {
        $name = $blogger->name;
        $blogger->delete();

        return request()->ajax()?response()->json(['message'=>"Blogger $name berhasil dihapus"]):back()->with('success', 'Blogger berhasil dihapus');
    }

    public function delete_selected(Request $request)
    {
        foreach($request->id as $id){
            $user = User::find($id);
            $user->delete();
        }

        return response()->json([
            'count' => count($request->id)
        ]);
    }
}
