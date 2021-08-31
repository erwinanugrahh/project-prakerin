@extends('layouts.admin')

@section('title') Halaman Dashboard @endsection
@section('page') Dashboard @endsection
@section('action') Siswa @endsection

@section('content')

<h2>ini halaman dashboard student</h2>

@endsection

@push('js')
    <script>
        $('#dashboard').addClass('active')
    </script>
@endpush
