@extends('layouts.admin')

@section('title') Halaman Guru @endsection
@section('page') Guru @endsection
@section('action') Edit @endsection

@section('content')
<div class="mt-4 mb-3 p-3 button-container bg-white border shadow-sm">
    <h6 class="mb-3">Tambah Guru</h6>

    <form action="{{ route('teacher.update', $teacher->id) }}" method="post" class="needs-validation" novalidate>
        @csrf
        @method('put')
        @include('admin.teachers._form')
        <button class="btn btn-primary">Edit</button>
    </form>
</div>
@endsection

@push('js')
    <script>
        $('#data-teacher').addClass('active').parent().parent().addClass('active');
    </script>
@endpush
