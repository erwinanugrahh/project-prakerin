@extends('layouts.admin')

@section('title') Halaman Materi @endsection
@section('page') Materi @endsection
@section('action') Indeks @endsection

@section('content')
    <div class="row border-bottom mb-4">
        <div class="col-sm-6 pt-2"><h6 class="mb-4 bc-header">Data Materi</h6></div>
        <div class="col-sm-6 text-right pb-3">
            <a href="{{ route('lesson.create') }}" class="pull-right mr-3 shadow btn btn-primary text-white"><b>Tambah Materi</b></a>

            <button class="pull-right mr-3 shadow btn btn-danger" id="delete-selected"><b>Hapus Terpilih</b></button>

            <div class="clearfix"></div>
        </div>
    </div>

    <div class="table-responsive product-list">

        <table class="table table-bordered table-striped mt-3" id="lessons_table">
            <thead>
                <tr class="bg-theme">
                    <th style="width: 10px;" class="p-0 pr-4 align-middle">
                        <div class="form-check-box cta white">
                            <span class="color3">
                                <input type="checkbox" id="orderAll">
                                <label for="orderAll"></label>
                            </span>
                        </div>
                    </th>
                    <th>Judul</th>
                    <th>Konten</th>
                    <th style="width: 150px;">Action</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>

@endsection

@push('js')
    <script src="{{ url('js/teacher/lesson.js') }}"></script>
@endpush
