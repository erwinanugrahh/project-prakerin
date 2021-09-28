@extends('layouts.admin')

@section('title') Halaman Program Keahlian @endsection
@section('page') Program Keahlian @endsection
@section('action') Indeks @endsection

@section('content')

<div class="product-list">

<div class="row border-bottom mb-4">
    <div class="col-sm-6 pt-2"><h6 class="mb-4 bc-header">Tabel Data Jurusan</h6></div>
    <div class="col-sm-6 d-flex justify-content-end pb-3">
        <a href="{{ route('skill.create') }}" class="pull-right mr-3 shadow btn btn-primary"> <b>Tambah Jurusan</b></a>
        <div class="clearfix"></div>
    </div>
</div>

<div class="table-responsive product-list">
    <table class="table table-bordered table-stripped mt-3" id="skills_table">
        <thead>
            <th>No</th>
            <th>Logo</th>
            <th>Nama Jurusan</th>
            <th style="width: 200px">Aksi</th>
        </thead>
        <tbody>
            @foreach (App\Models\Skill::all() as $skill)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><img src="{{ asset($skill->logo) }}" alt="" srcset=""></td>
                    <td>{{ $skill->name }}</td>
                    <td>
                        <a href="{{ route('skill.edit', $skill) }}" class="btn btn-success">Edit</a>
                        <a href="{{ route('skill.destroy', $skill) }}" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

</div>
@endsection
