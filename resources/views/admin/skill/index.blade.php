@extends('layouts.admin')

@section('title') Halaman Program Keahlian @endsection
@section('page') Program Keahlian @endsection
@section('action') Indeks @endsection

@section('content')

<div class="product-list">

<div class="row border-bottom mb-4">
    <div class="col-sm-6 pt-2"><h6 class="mb-4 bc-header">Tabel Data Jurusan</h6></div>
    <div class="col-sm-6 d-flex justify-content-end pb-3">
        <button class="btn btn-danger mr-2 shadow" id="delete-selected">
            <span class='text-white'><b>Hapus Terpilih</b></span>
        </button>
        <a href="{{ route('skill.create') }}" class="pull-right mr-3 shadow btn btn-primary"> <b>Tambah Jurusan</b></a>
        <div class="clearfix"></div>
    </div>
</div>

<div class="table-responsive product-list">
    <table class="table table-bordered table-stripped mt-3" id="skills_table">
        <thead class="bg-theme">
            <th style="width: 10px;" class="p-0 pr-4 align-middle">
                <div class="form-check-box cta white">
                    <span class="color1">
                        <input type="checkbox" id="orderAll">
                        <label for="orderAll"></label>
                    </span>
                </div>
            </th>
            <th>Logo</th>
            <th>Nama Jurusan</th>
            <th style="width: 200px">Aksi</th>
        </thead>
        <tbody>

        </tbody>
    </table>
</div>

<div class="modal fade" id="detail-skill-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title text-secondary"><strong class="name"></strong></h5>
                <button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <img src="" id="image-skill" alt="" class="img-thumbnail d-block mx-auto" style="max-height: 140px">
                <p id="description"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--Default modal-->


</div>
@endsection

@push('js')
    <script src="{{ asset('js/admin/skill.js') }}"></script>
@endpush
