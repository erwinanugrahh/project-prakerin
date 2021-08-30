@extends('layouts.admin')

@section('title') Halaman Dashboard @endsection
@section('page') Dashboard @endsection
@section('action') Blogger @endsection

@section('content')

@endsection

@push('js')
    <script>
        $('#dashboard').addClass('active')
    </script>
@endpush
