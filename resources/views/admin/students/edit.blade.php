@extends('layouts.admin')

@section('title') Halaman Siswa @endsection
@section('page') Siswa @endsection
@section('action') Edit @endsection

@section('content')

<div class="mt-4 mb-3 p-3 button-container bg-white border shadow-sm">
    <h6 class="mb-3">Edit Siswa</h6>

    <form action="{{ route('student.update', $student->id) }}" method="post" class="needs-validation" novalidate>
        @csrf
        @method('put')
        @include('admin.students._form')
        <button class="btn btn-primary">Edit</button>
    </form>

</div>

@endsection

@push('js')
    <script>
        $('#data-student').addClass('active').parent().parent().addClass('active');
    </script>
@endpush
