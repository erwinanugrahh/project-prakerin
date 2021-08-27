@extends('layouts.admin')

@section('title') Halaman Blogger @endsection
@section('page') Blogger @endsection
@section('action') Indeks @endsection

@section('content')
    <div class="row border-bottom mb-4">
        <div class="col-sm-6 pt-2"><h6 class="mb-4 bc-header">Data Blogger</h6></div>
        <div class="col-sm-6 text-right pb-3">
            <a href="{{ route('blogger.create') }}" class="pull-right mr-3 shadow btn btn-primary"><b>Tambah Blogger</b></a>

            <button class="pull-right mr-3 shadow btn btn-danger" id="delete-selected"><b>Hapus Terpilih</b></button>

            <div class="clearfix"></div>
        </div>
    </div>

    <div class="table-responsive product-list">

        <table class="table table-bordered table-striped mt-3" id="bloggers_table">
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
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Total Blog</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
@endsection

@push('js')
    <script src="{{ url('js/admin/blogger.js') }}"></script>
@endpush
