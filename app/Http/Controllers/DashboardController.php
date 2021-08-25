<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if(auth()->user()->role=='admin'){
            return $this->admin();
        }else if(auth()->user()->role=='teacher'){
            return $this->teacher();
        }else if(auth()->user()->role=='student'){
            return $this->student();
        }else if(auth()->user()->role=='blogger'){
            return $this->blogger();
        }
    }

    public function admin()
    {
        return view('admin.index');
    }

    public function teacher()
    {
        return view('teacher.index');
    }

    public function student()
    {
        return view('student.index');
    }

    public function blogger()
    {
        $blogs = Blog::where('user_id', auth()->user()->id)->get();
        return view('blogger.index', compact('blogs'));
    }
}
