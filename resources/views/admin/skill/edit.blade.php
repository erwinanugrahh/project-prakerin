@extends('layouts.admin', ['noCard'=>true])

@section('title') Halaman Jurusan @endsection
@section('page') Jurusan @endsection
@section('action') Edit @endsection

@section('content')
<div class="mt-4 mb-3 p-3 button-container bg-white border shadow-sm">
    <h6 class="mb-3">Edit Jurusan</h6>

    <form action="{{ route('skill.update', $skill) }}" method="post" class="needs-validation" novalidate enctype="multipart/form-data">
        @csrf
        @method('put')
        @include('admin.skill._form', ['logo'=>asset($skill->logo)])
        <button class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
