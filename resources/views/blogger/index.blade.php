@extends('layouts.admin')

@section('title') Halaman Blog @endsection
@section('page') Blog @endsection
@section('action') Indeks @endsection

@section('content')
<div class="product-list">
    <div class="row border-bottom mb-4">
        <div class="col-sm-3 pt-2"><h6 class="mb-4 bc-header">Blog Ku</h6></div>
        <div class="col-sm-9 d-flex justify-content-end pb-3">
            <select class="shadow bulk-actions mr-3" id="filter_status">
                <option value="" data-display="Filter Status">Tidak</option>
                <option value="pending">Pending</option>
                <option value="accepted">Diterima</option>
                <option value="rejected">Ditolak</option>
            </select>
            <button id="delete-selected" class="pull-right mr-3 shadow btn btn-danger"><b>Hapus Terpilih</b></button>
            <a href="{{ route('blog.create') }}" class="pull-right shadow btn btn-primary text-white"><b>Tambah Blog</b></a>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="table-responsive product-list">
        <table class="table table-bordered table-striped mt-3" id="blogs_table">
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
                    <td>Banner</td>
                    <td>Judul</td>
                    <td>Status</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</div>

@endsection

@push('js')
    <script src="{{ url('plugins/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ url('js/blogger/blog.js') }}"></script>
@endpush
