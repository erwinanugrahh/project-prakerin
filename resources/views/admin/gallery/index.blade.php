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
    <script>
        // $lg = $("#galleryCard");
        // $lg.on('onAfterOpen.lg',function(event){
        //     $('.lg-toolbar').append(`<button class="lg-icon bg-transparent border-0" aria-label="Add slide" onclick="deletePicture(event)"><i class="fas fa-trash"></i></button>`);
        // });
        // $lg.lightGallery({
        //     dynamic: true,
        //     dynamicEl: []
        // })
        // const gallery = lightGallery($lg, {
        //     dynamic: true,
        //     dynamicEl: []
        // })
    </script>
@endpush
