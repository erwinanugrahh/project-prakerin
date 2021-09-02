@extends('layouts.admin')

@section('title') Halaman Siswa @endsection
@section('page') Siswa @endsection
@section('action') Indeks @endsection

@section('content')
<div class="product-list">

    <div class="row border-bottom mb-4">
        <div class="col-sm-6 pt-2"><h6 class="mb-4 bc-header">Data Siswa</h6></div>

        <div class="col-sm-6 d-flex justify-content-end pb-3">
            <button type="button" class="shadow mr-3 btn btn-success" data-toggle="modal" data-target="#importData">
                <b>Import Data</b>
            </button>

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
                <tr class="bg-theme">
                    <th style="width: 10px;" class="p-0 pr-4 align-middle">
                        <div class="form-check-box cta white">
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

    <div class="modal fade" id="importData" tabindex="-1" role="dialog" aria-labelledby="importDataLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="importDataLabel">Import Data Excel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ url('/admin/student/import') }}" id="formImport" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group form-row">
                            <div class="col-8">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('import-data') is-invalid @enderror" name="import-data" id="import-data">
                                    <label class="custom-file-label" for="import-data">Pilih Excel, Csv atau Sejenisnya </label>
                                    @error('import-data')
                                        <i class="text-sm text-danger">{{ $message }}</i>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <select name="major_id" id="major_id" class="select2">
                                    <option value="">Kelas</option>
                                    @foreach (\App\Models\Major::all() as $major)
                                        <option value="{{ $major->id }}">{{ $major->getMajor() }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped mt-3" id="preview_table">
                                <thead>
                                    <tr class="bg-theme">
                                        <th style="width: 10px;" class="p-0 pr-4 align-middle">
                                            <div class="form-check-box cta white">
                                                <span class="color1">
                                                    <input type="checkbox" id="orderAllField">
                                                    <label for="orderAllField"></label>
                                                </span>
                                            </div>
                                        </th>
                                        <th>NISN</th>
                                        <th>Nama Siswa</th>
                                        <th>Email</th>
                                        <th>Alamat</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" onclick="$('#formImport').submit()" disabled id="import" class="btn btn-primary disabled">Import</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')
    <script src="{{ url('js/admin/student.js') }}"></script>
@endpush
