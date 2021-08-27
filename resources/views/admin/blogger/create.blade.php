@extends('layouts.admin')

@section('title') Halaman Blogger @endsection
@section('page') Blogger @endsection
@section('action') Tambah @endsection

@section('content')
    <div class="mt-4 mb-3 p-3 button-container bg-white border shadow-sm">
        <h6 class="mb-3">Tambah Blogger</h6>
        <form action="{{ route('blogger.store') }}" method="post" novalidate class="needs-validation">
            @csrf
            @include('admin.blogger._form')
            <button class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection

@push('js')
    <script>
        $('#data-major').addClass('active').parent().parent().addClass('active');
    </script>
@endpush
