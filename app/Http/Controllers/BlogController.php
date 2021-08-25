<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::where('user_id', auth()->user()->id)->get();
        return view('blogger.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blogger.create');
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
            'banner' => 'required|mimes:png,jpg',
            'content' => 'required'
        ]);

        $fileName = "banner-".time().'.'.$request->file('banner')->getClientOriginalExtension();
        $request->file('banner')->move('images/banners/', $fileName);

        $validate['slug'] = Str::slug($validate['title']);
        $validate['user_id'] = auth()->user()->id;
        $validate['banner'] = $fileName;

        Blog::create($validate);

        return redirect()->route('blog.index')->with('success', 'Blog berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('blogger.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $validate = $request->validate([
            'title' => 'required',
            'banner' => 'sometimes|mimes:png,jpg',
            'content' => 'required'
        ]);

        if($request->hasFile('banner')){
            unlink(base_path('public/images/banners/'.$blog->banner));
            $fileName = "banner-".time().'.'.$request->file('banner')->getClientOriginalExtension();
            $request->file('banner')->move('images/banners/', $fileName);
            $validate['banner'] = $fileName;
        }

        $blog->update($validate);

        return redirect()->route('blog.index')->with('success', 'Blog berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        if(file_exists(base_path('public/images/banners/'.$blog->banner))){
            unlink(base_path('public/images/banners/'.$blog->banner));
        }

        $blog->delete();
        return back()->with('success', 'Blog berhasil dihapus');
    }
}
