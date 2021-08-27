@extends('layouts.admin')

@section('title') Mata Pelajaran @endsection
@section('page') Mata Pelajaran @endsection
@section('action') Indeks @endsection

@section('content')
    <!--Validation Scenario-->
    <div class="row border-bottom mb-4">
        <div class="col-sm-6 pt-2"><h6 class="mb-4 bc-header">Tabel Data Mata Pelajaran</h6></div>
    </div>

    <div id="subjects_table"></div>
    <!--/Validation Scenario-->
@endsection

@push('css')
    <!--JsGrid CSS-->
    <link rel="stylesheet" href="{{ url('admin') }}/css/jsgrid.min.css">
    <link rel="stylesheet" href="{{ url('admin') }}/css/jsgrid-theme.min.css">
@endpush

@push('js')
    <script src="{{ url('admin/js/jsgrid.min.js') }}"></script>
    <script src="{{ url('js/admin/subject.js') }}"></script>
@endpush
