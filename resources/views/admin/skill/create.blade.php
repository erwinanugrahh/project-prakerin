@extends('layouts.admin',['noCard'=>true])

@section('title') Halaman Jurusan @endsection
@section('page') Jurusan @endsection
@section('action') Tambah @endsection

@section('content')

<div class="mt-4 mb-3 p-3 button-container bg-white border shadow-sm">
    <h6 class="mb-3">Tambah Jurusan</h6>

    <form class="needs-validation" action="{{ route('skill.store') }}" method="post" novalidate enctype="multipart/form-data">
        @csrf
        @include('admin.skill._form', ['logo'=>'/user/images/icon-image/service-icon3.png'])
        <button class="btn btn-success" >Simpan</button>
    </form>

</div>

@endsection
