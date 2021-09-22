@extends('layouts.admin', ['noCard'=>true])

@section('title') Halaman Testimonial @endsection
@section('page') Testimoni @endsection
@section('action') Tambah @endsection

@section('content')
<div class="mt-4 mb-3 p-3 button-container bg-white border shadow-sm">
    <h6 class="mb-3">Tambah Testimoni</h6>

    <form action="{{ route('testimonial.store') }}" method="post" class="needs-validation" novalidate enctype="multipart/form-data">
        @csrf
        @include('admin.testimonial._form')
        <button class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
