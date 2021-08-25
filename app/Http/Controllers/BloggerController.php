<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class BloggerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('role', 'blogger')->get();
        return view('admin.blogger.index', compact('users'));
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
            'password_confirmation' => 'nullable|same:password'
        ]);
        if(is_null($validate['password'])){
            unset($validate['password']);
        }
        $blogger->update($validate);

        return redirect()->route('blogger.index')->with('success','Blogger berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $blogger
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $blogger)
    {
        $blogger->delete();

        return back()->with('success', 'Blogger berhasil dihapus');
    }
}
