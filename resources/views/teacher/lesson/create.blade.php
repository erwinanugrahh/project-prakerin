@extends('layouts.admin')

@section('title') Halaman Materi @endsection
@section('page') Materi @endsection
@section('action') Tambah @endsection

@section('content')
    <form action="{{ route('lesson.store') }}" enctype="multipart/form-data" method="post" class="needs-validation" novalidate>
        @csrf
        @include('teacher.lesson._form')
    </form>
@endsection
