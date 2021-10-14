@extends('layouts.admin', ['noCard'=>true])

@section('title') Halaman Galeri @endsection
@section('page') Galeri @endsection
@section('action') Indeks @endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('admin/css/lightgallery/css/lightgallery.min.css') }}">
@endpush

@section('content')
    @livewire('form-gallery')
@endsection

@push('js')
    <script src="{{ asset('admin/js/lightgallery.min.js') }}"></script>
@endpush
