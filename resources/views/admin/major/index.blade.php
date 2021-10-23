@extends('layouts.admin')

@section('title') Kelas Jurusan @endsection
@section('page') Kelas Jurusan @endsection
@section('action') Indeks @endsection

@section('content')
    <!--Validation Scenario-->
    <div class="row border-bottom mb-4">
        <div class="col-sm-6 pt-2"><h6 class="mb-4 bc-header">Tabel Data Kelas / Jurusan</h6></div>
    </div>

    <div id="majorities_table"></div>
    <!--/Validation Scenario-->
@endsection

@push('css')
    <!--JsGrid CSS-->
    <link rel="stylesheet" href="{{ url('admin') }}/css/jsgrid.min.css">
    <link rel="stylesheet" href="{{ url('admin') }}/css/jsgrid-theme.min.css">
@endpush

@push('js')
    <script src="{{ url('admin/js/jsgrid.min.js') }}"></script>
    <script src="{{ url('js/admin/major.js?v=1.2') }}"></script>
@endpush
