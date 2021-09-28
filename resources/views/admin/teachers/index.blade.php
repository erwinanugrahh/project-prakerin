@extends('layouts.admin')

@section('title') Halaman Guru @endsection
@section('page') Guru @endsection
@section('action') Indeks @endsection

@section('content')
    <div class="product-list">

        <div class="row border-bottom mb-4">
            <div class="col-sm-6 pt-2"><h6 class="mb-4 bc-header">Data Guru</h6></div>
            <div class="col-sm-6 d-flex justify-content-end pb-3">
                <button type="button" class="shadow mr-3 btn btn-success" data-toggle="modal" data-target="#importData">
                    <b>Import Data</b>
                </button>

                <a href="{{ route('teacher.create') }}" class="pull-right mr-3 shadow btn btn-primary"><b>Tambah Guru</b></a>

                <button class="pull-right mr-3 shadow btn btn-danger" id="delete-selected"><b>Hapus Terpilih</b></button>

                <div class="clearfix"></div>
            </div>
        </div>

        <div class="table-responsive product-list">

            <table class="table table-bordered table-striped mt-3" id="teachers_table">
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
                        <th>NIP</th>
                        <th>Nama Guru</th>
                        <th>Wali Kelas</th>
                        <th>Action</th>
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
                        <form method="post" action="{{ url('/admin/teacher/import') }}" id="formImport" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('import-data') is-invalid @enderror" name="import-data" id="import-data">
                                    <label class="custom-file-label" for="import-data">Pilih Excel, Csv atau Sejenisnya </label>
                                    @error('import-data')
                                        <i class="text-sm text-danger">{{ $message }}</i>
                                    @enderror
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped mt-3" id="preview_table">
                                    <thead>
                                        <tr class="bg-theme">
                                            <th rowspan="2" style="width: 10px;" class="p-0 pr-4 align-middle">
                                                <div class="form-check-box cta white">
                                                    <span class="color1">
                                                        <input type="checkbox" id="orderAllField">
                                                        <label for="orderAllField"></label>
                                                    </span>
                                                </div>
                                            </th>
                                            <th rowspan="2" class="align-middle">NIP</th>
                                            <th rowspan="2" class="align-middle">Gelar Depan</th>
                                            <th rowspan="2" class="align-middle">Nama</th>
                                            <th rowspan="2" class="align-middle">Gelar Belakang</th>
                                            <th rowspan="2" class="align-middle">Email</th>
                                            <th colspan="2" class="text-center">Wali Kelas</th>
                                            <th rowspan="2" class="align-middle">Alamat</th>
                                        </tr>
                                        <tr class="bg-theme">
                                            <th>Tingkat</th>
                                            <th>Kelas</th>
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
    @include('admin.teachers._modal')
@endsection

@push('js')
    <script src="{{ url('js/admin/teacher.js') }}"></script>
@endpush
