@extends('layouts.admin')

@section('title') Halaman Siswa @endsection
@section('page') Siswa @endsection
@section('action') Tambah @endsection

@section('content')

<div class="mt-4 mb-3 p-3 button-container bg-white border shadow-sm">
    <h6 class="mb-3">Tambah Siswa</h6>

    <form class="needs-validation" action="{{ route('student.store') }}" method="post" novalidate>
        @csrf
        @include('admin.students._form')
        <button class="btn btn-success" >Simpan</button>
    </form>

</div>

@endsection

@push('js')
    <script>
        $('#data-student').addClass('active').parent().parent().addClass('active');
    </script>
@endpush
