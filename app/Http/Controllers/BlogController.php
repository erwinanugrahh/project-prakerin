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
    public function index(Request $request)
    {
        $blogs = Blog::where('user_id', auth()->user()->id)->get();

        $model=Blog::where('user_id', auth()->user()->id)->with('blogger');

        if($request['filter_status']!=null)
        {
            $model->where('status',$request['filter_status']);
        }

        $datatable = DataTables::collection($model->get())
        ->addColumn('checkbox', function($blog){
            return "<div class=\"form-check-box cta\">
                        <span class=\"color1\">
                            <input type=\"checkbox\" id=\"order$blog->id\" value=\"$blog->id\" name=\"selected\">
                            <label for=\"order$blog->id\"></label>
                        </span>
                    </div>";
        })
        ->editColumn('banner', function($blog){
            return "<img src=\"images/banners/$blog->banner\" style=\"max-width: 100px; max-height: 100px\" alt=\"$blog->slug\">";
        })
        ->editColumn('status', function($blog){
            return $blog->getStatus();
        })
        ->addColumn('action',function($blog){
            return "<a href=\"".route('blog.show', $blog->slug)."\" class=\"btn btn-theme text-white\"><i class=\"fa fa-eye\"></i> </a>
                    <a href=\"".route('blog.edit', $blog->slug)."\" class=\"btn btn-success text-white\"><i class=\"fa fa-pencil\"></i> </a>
                    <button class=\"btn btn-danger delete\" data-id=\"blog/$blog->slug\"><i class=\"fas fa-trash\"></i></button>";
        })
        ->escapeColumns([])
        ->toJson();

        return $request->ajax()?$datatable:view('blogger.index', compact('blogs'));
    }

    public function request_blog(Request $request)
    {
        $model=Blog::where('status', 'pending')->with('blogger');

        if($request['filter_blogger']!=null)
        {
            $model->where('user_id',$request['filter_blogger']);
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
            'tags' => 'required',
            'category_id' => 'required',
            'title' => 'required',
            'banner' => 'required|mimes:png,jpg',
            'content' => 'required'
        ]);

        $fileName = "banner-".time().'.'.$request->file('banner')->getClientOriginalExtension();
        $request->file('banner')->move('images/banners/', $fileName);

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
        return view('blogger.show', compact('blog'));
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
            'tags' => 'required',
            'category_id' => 'required',
            'title' => 'required',
            'banner' => 'sometimes|mimes:png,jpg',
            'content' => 'required'
        ]);
        $blog->views()->delete();
        $blog->comments()->delete();
        if($request->hasFile('banner')){
            if(file_exists(base_path('public/images/banners/'.$blog->banner))){
                unlink(base_path('public/images/banners/'.$blog->banner));
            }
            $fileName = "banner-".time().'.'.$request->file('banner')->getClientOriginalExtension();
            $request->file('banner')->move('images/banners/', $fileName);
            $validate['banner'] = $fileName;
        }
        $validate['status'] = 'pending';
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
        return request()->ajax()?response()->json(['message'=>'Blog berhasil dihapus']):back()->with('success', 'Blog berhasil dihapus');
    }

    public function delete_selected(Request $request)
    {
        foreach($request->id as $id){
            $user = Blog::find($id);
            $user->delete();
        }

        return response()->json([
            'count' => count($request->id)
        ]);
    }
}
