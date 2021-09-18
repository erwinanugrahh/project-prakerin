@extends('layouts.admin', ['searchbar'=>false])

@section('title') Halaman blog @endsection
@section('page') blog @endsection
@section('action') Tambah @endsection

@section('content')
    <h6 class="mb-3">Membuat Blog Baru</h6>
    <form action="{{ route('blog.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @include('blogger._form', ['imageUrl'=>'/admin/img/gallery8.jpeg'])
        <button class="btn btn-success">Simpan</button>
    </form>
@endsection
