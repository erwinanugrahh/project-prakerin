@extends('layouts.admin', ['noCard'=>true])

@section('title') Halaman Testimonial @endsection
@section('page') Testimoni @endsection
@section('action') Edit @endsection

@section('content')
<div class="mt-4 mb-3 p-3 button-container bg-white border shadow-sm">
    <h6 class="mb-3">Edit Testimoni</h6>

    <form action="{{ route('testimonial.update', $testimonial) }}" method="post" class="needs-validation" novalidate enctype="multipart/form-data">
        @csrf
        @method('put')
        @include('admin.testimonial._form')
        <button class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
