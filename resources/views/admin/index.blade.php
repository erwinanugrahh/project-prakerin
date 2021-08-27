@extends('layouts.admin')

@section('title') Halaman Darhboard @endsection
@section('page') Dashboard @endsection
@section('action') Admin @endsection

@section('content')
    <h3>Dashboard untuk user admin draa.</h3>
@endsection

@push('js')
    <script>
        $('#dashboard').addClass('active')
    </script>
@endpush
