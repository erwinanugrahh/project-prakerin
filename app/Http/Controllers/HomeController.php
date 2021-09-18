<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('welcome');
    }

    public function welcome()
    {
        $data['setting_web'] = setting('setting_web');
        $data['about_us']= setting('about_us');
        $data['category_gallery'] = setting('category_gallery')['items'];
        $data['galleries'] = Gallery::all();
        return view('welcome', $data);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function update_profile(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,'.auth()->user()->id,
            'phone' => 'required|numeric|digits_between:9,13',
            'address' => 'required'
        ]);

        if(auth()->user()->role == 'teacher')
            teacher()->update($request->only('email', 'phone', 'address'));
        else
            student()->update($request->only('email', 'phone', 'address'));

        auth()->user()->update($validate);
        return back()->with('success','Profile berhasil diubah');
    }

    public function update_password(Request $request)
    {
        $validate = $request->validate([
            'old_password' => 'required|password',
            'password' => 'required|same:password_confirmation|min:6',
            'password_confirmation' => 'required'
        ]);

        $validate['password'] = bcrypt($validate['password']);

        auth()->user()->update($validate);
        return back()->with('success','Password berhasil diubah');
    }

    public function set_blogger(Request $request)
    {
        $blogger = $request->is_blogger;
        if(student()){
            student()->update(['is_blogger'=>$blogger]);
        }else{
            teacher()->update(['is_blogger'=>$blogger]);
        }

        $message = $blogger==1?'Berhasil mengaktifkan mode blogger':'Berhasil menonaktifkan mode blogger';
        session()->flash('success', $message);
        // return response()->json($message);
    }
}
