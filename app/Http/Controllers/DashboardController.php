<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Lesson;
use App\Models\LessonGroup;
use App\Models\Major;
use App\Models\Task;
use App\Models\User;
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
        $users = User::where('role', '!=', 'admin')->get();
        $blogs = Blog::all();
        $majors = Major::all();
        return view('admin.index', compact('users', 'blogs', 'majors'));
    }

    public function teacher()
    {
        $students = teacher()->students;
        $blogs = Blog::with('views')->where('user_id', auth()->user()->id);
        $lessons = Lesson::where('teacher_id', teacher()->id)->get();
        return view('teacher.index', compact('students','blogs','lessons'));
    }

    public function student()
    {
        $major_id = auth()->user()->student->major_id;
        $tasks = LessonGroup::with(['lesson','lesson.tasks'])->where('major_id', $major_id);
        $blogs = Blog::with('views')->where('user_id', auth()->user()->id);
        return view('student.index', compact('tasks', 'blogs'));
    }

    public function blogger()
    {
        return view('blogger.dashboard');
    }
}
