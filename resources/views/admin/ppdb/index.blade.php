@extends('layouts.admin')

@section('title') Halaman PPDB @endsection
@section('page') Program PPDB @endsection
@section('action') Indeks @endsection

@section('content')
<div class="row border-bottom mb-4">
    <div class="col-sm-6 pt-2"><h6 class="mb-4 bc-header">Data Siswa</h6></div>

    <div class="col-sm-6 d-flex justify-content-end pb-3">
        <button class="btn btn-danger shadow" onclick="bulk_send('rejected')">
            <span class='text-white'><i class="fas fa-times mr-2"></i> <b>Tolak Siswa Terpilih</b></span>
        </button>

        <button class="shadow ml-3 btn btn-success" onclick="bulk_send('accepted')">
            <span class='text-white'><i class="fas fa-check-double mr-2"></i> <b>Terima Siswa Terpilih</b></span>
        </button>

        <div class="clearfix"></div>
    </div>
</div>

<div class="table-responsive product-list">

    <table class="table table-bordered table-striped mt-3" id="ppdb_table">
        <thead>
            <tr class="bg-theme">
                <th style="width: 10px;" class="p-0 pr-4 align-middle">
                    <div class="form-check-box white cta">
                        <span class="color1">
                            <input type="checkbox" id="orderAll">
                            <label for="orderAll"></label>
                        </span>
                    </div>
                </th>
                <th>Nama</th>
                <th>NISN</th>
                <th>Jurusan</th>
                <th style="width: 180px" class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</div>

@endsection

@push('js')
    <script src="{{ asset('js/admin/ppdb.js') }}"></script>
@endpush

