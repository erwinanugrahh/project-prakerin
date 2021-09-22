@extends('layouts.admin')

@section('title') Halaman Testimonial @endsection
@section('page') Testimoni @endsection
@section('action') Indeks @endsection

@section('content')
<div class="product-list">

    <div class="row border-bottom mb-4">
        <div class="col-sm-6 pt-2"><h6 class="mb-4 bc-header">Testimoni</h6></div>
        <div class="col-sm-6 d-flex justify-content-end pb-3">
            <a href="{{ route('testimonial.create') }}" class="pull-right mr-3 shadow btn btn-primary"><b>Tambah Testimoni</b></a>

            <button class="pull-right mr-3 shadow btn btn-danger" id="delete-selected"><b>Hapus Terpilih</b></button>

            <div class="clearfix"></div>
        </div>
    </div>

    <div class="table-responsive product-list">

        <table class="table table-bordered table-striped mt-3" id="testimonials_table">
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
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Perusahaan</th>
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
    <script src="{{ asset('js/admin/testimonials.js') }}"></script>
@endpush
