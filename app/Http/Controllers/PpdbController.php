<?php

namespace App\Http\Controllers;

use App\Models\Ppdb;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;

class PpdbController extends Controller
{
    public function index()
    {
        return view('ppdb');
    }

    public function form(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'nisn' => 'required',
            'place' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'child' => 'required',
            'child_from' => 'required',
            'address' => 'required',
            'major' => 'required',
            'phone' => 'required',
            'zip' => 'required',
            'parents_name' => 'required',
            'parents_job' => 'required',
            'parents_address' => 'required',
            'parents_phone' => 'required'
        ]);


        return redirect()->with('success', 'Jurusan berhasil ditambahkan');
    }
}
