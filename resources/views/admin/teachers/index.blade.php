@extends('layouts.admin')

@section('content')
    <div class="product-list">

        <div class="row border-bottom mb-4">
            <div class="col-sm-6 pt-2"><h6 class="mb-4 bc-header">Data Guru</h6></div>
            <div class="col-sm-6 text-right pb-3">
                <a href="{{ route('teacher.create') }}" class="pull-right mr-3 shadow btn btn-primary"><b>Tambah Guru</b></a>

                <button class="pull-right mr-3 shadow btn btn-danger" id="delete-selected"><b>Hapus Terpilih</b></button>

                <div class="clearfix"></div>
            </div>
        </div>

        <div class="table-responsive product-list">

            <table class="table table-bordered table-striped mt-3" id="teachers_table">
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
    </div>
@endsection

@push('js')
    <script src="{{ url('js/admin/teacher.js') }}"></script>
@endpush
