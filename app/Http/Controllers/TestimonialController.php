<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Testimonial::all();
        return view('admin.testimonial.index', compact('testimonials'));
    }

    public function ajax()
    {
        $model=Testimonial::all();

        return DataTables::of($model)
        ->editColumn('photo', function($testimonial){
            return '<img src="'.asset('storage/testimonials/'.$testimonial->photo).'" style="height: 100px;width:100px" alt="" class="img-thumbnail">';
        })
        ->addColumn('checkbox', function($testimonial){
            return view('admin.testimonial._checkbox', compact('testimonial'));
        })
        ->addColumn('desc', function($testimonial){
            return $testimonial->title.', '.$testimonial->company;
        })
        ->addColumn('action',function($testimonial){
            return view('admin.testimonial._action',compact('testimonial'));
        })
        ->escapeColumns([''])
        ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.testimonial.create');
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
            'photo' => 'required|image|max:3076',
            'name' => 'required',
            'title' => 'required',
            'company' => 'required',
            'quote' => 'required'
        ]);

        $file_name = 'photo-'.date('Ymd_His').'.'.$request->file('photo')->getClientOriginalExtension();
        $request->file('photo')->storeAs('/public/testimonials', $file_name);
        $validate['photo'] = $file_name;

        Testimonial::create($validate);
        return redirect()->route('testimonial.index')->with('success', 'Testimoni berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonial.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $validate = $request->validate([
            'photo' => 'image|max:3076',
            'name' => 'required',
            'title' => 'required',
            'company' => 'required',
            'quote' => 'required'
        ]);

        if($request->hasFile('photo')){
            if(base_path('storage/app/public/testimonials/'.$testimonial->photo)){
                unlink(base_path('storage/app/public/testimonials/'.$testimonial->photo));
            }
            $file_name = 'photo-'.date('Ymd_His').'.'.$request->file('photo')->getClientOriginalExtension();
            $request->file('photo')->storeAs('/public/testimonials', $file_name);
            $validate['photo'] = $file_name;
        }

        $testimonial->update($validate);
        return redirect()->route('testimonial.index')->with('success', 'Testimoni berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial)
    {
        if(base_path('storage/app/public/testimonials/'.$testimonial->photo)){
            unlink(base_path('storage/app/public/testimonials/'.$testimonial->photo));
        }
        $testimonial->delete();
        return response()->json(['message'=>'Testimoni berhasi dihapus']);
    }

    public function delete_selected(Request $request)
    {
        foreach($request->id as $id){
            $testimonial = Testimonial::find($id);
            if(base_path('storage/app/public/testimonials/'.$testimonial->photo)){
                unlink(base_path('storage/app/public/testimonials/'.$testimonial->photo));
            }
            $testimonial->delete();
        }

        return response()->json([
            'count' => count($request->id)
        ]);
    }
}
