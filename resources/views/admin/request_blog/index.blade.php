@extends('layouts.admin')

@section('title') Persetujuan Blog @endsection
@section('page') Blogger @endsection
@section('action') Permintaan @endsection

@section('content')
    <div class="row border-bottom mb-4">
        <div class="col-sm-6 pt-2"><h6 class="mb-4 bc-header">Data Siswa</h6></div>

        <div class="col-sm-6 d-flex justify-content-end pb-3">
            <button class="btn btn-danger shadow" onclick="bulk_send('rejected')">
                <span class='text-white'><i class="fas fa-times mr-2"></i> <b>Tolak Blog Terpilih</b></span>
            </button>

            <button class="shadow ml-3 btn btn-success" onclick="bulk_send('accepted')">
                <span class='text-white'><i class="fas fa-check-double mr-2"></i> <b>Terima Blog Terpilih</b></span>
            </button>

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
                    <th>Blogger</th>
                    <th>Judul</th>
                    <th>Konten</th>
                    <th style="width: 180px" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
@endsection

@push('js')
    <script src="{{ url('js/admin/request_blog.js') }}"></script>
@endpush
