<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

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

    public function request_blog(Request $request)
    {
        $model=Blog::where('status', 'pending')->with('blogger');

        if($request['filter_major']!=null)
        {
            $model->where('major_id',$request['filter_major']);
        }

        $datatable = DataTables::of($model)
        ->addColumn('checkbox', function($blog){
            return view('admin.request_blog._checkbox', compact('blog'));
        })
        ->addColumn('action',function($blog){
            return view('admin.request_blog._action',compact('blog'));
        })
        ->editColumn('title', function($blog){
            return Str::limit($blog->title, 20, '...');
        })
        ->editColumn('content', function($blog){
            return Str::limit($blog->content, 20, '...');
        })
        ->escapeColumns([])
        ->toJson();

        $blogs = Blog::where('status', 'pending')->get();
        return $request->ajax()?$datatable:view('admin.request_blog.index', compact('blogs'));
    }

    public function preview(Blog $blog)
    {
        return view('admin.request_blog.show', compact('blog'));
    }

    public function send_result(Request $request)
    {
        $validate = $request->validate([
            'ids' => 'required|array',
            'action' => 'required|string'
        ]);
        foreach ($validate['ids'] as $id) {
            Blog::find($id)->update(['status'=>$validate['action']]);
        }
        $action = [
            'accepted' => 'terima',
            'rejected' => 'tolak'
        ];
        $message = ['message'=> count($validate['ids']).' blog berhasil di'.$action[$validate['action']]];
        if(count($validate['ids'])==1){
            $blog = Blog::find($validate['ids'][0]);
            $message['message'] = "Postingan \"<b>{$blog->blogger->name}</b>\" dengan judul \"<b>$blog->title</b>\" berhasil di<b>{$action[$validate['action']]}</b>";
        }
        return response()->json($message);
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
