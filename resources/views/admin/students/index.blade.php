@extends('layouts.admin')

@section('title') Halaman Siswa @endsection
@section('page') Siswa @endsection
@section('action') Indeks @endsection

@section('content')
<div class="product-list">

    <div class="row border-bottom mb-4">
        <div class="col-sm-6 pt-2"><h6 class="mb-4 bc-header">Data Siswa</h6></div>

        <div class="col-sm-6 d-flex justify-content-end pb-3">
            <button class="btn btn-danger shadow" id="delete-selected">
                <span class='text-white'><b>Hapus Terpilih</b></span>
            </button>

            <select class="shadow bulk-actions ml-3" id="filter_major">
                <option value="" data-display="Filter Kelas">Tidak</option>
                @foreach ($majorities as $major)
                    <option value="{{ $major->id }}">{{ $major->getMajor() }}</option>
                @endforeach
            </select>

            <a href="{{ route('student.create') }}" class="shadow ml-3 btn btn-primary">
                <span class='text-white'><b>Tambah Siswa</b></span>
            </a>

            <div class="clearfix"></div>
        </div>
    </div>

    <div class="table-responsive product-list">

        <table class="table table-bordered table-striped mt-3" id="students_table">
            <thead>
                <tr>
                    <th style="width: 10px;" class="p-0 pr-4 align-middle">
                        <div class="form-check-box cta">
                            <span class="color1">
                                <input type="checkbox" id="orderAll">
                                <label for="orderAll"></label>
                            </span>
                        </div>
                    </th>
                    <th>NISN</th>
                    <th>Nama Siswa</th>
                    <th>Kelas</th>
                    <th>Alamat</th>
                    <th style="width: 150px">Aksi</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</div>

@endsection

@push('js')
    <script src="{{ url('js/admin/student.js') }}"></script>
@endpush
