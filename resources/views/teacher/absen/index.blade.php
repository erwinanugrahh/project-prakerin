@extends('layouts.admin')

@section('title') Halaman Absen @endsection
@section('page') Absen @endsection
@section('action') {{ teacher()->major->getMajor() }} @endsection

@section('title','Absensi Siswa')

@section('content')
    <div class="row border-bottom mb-4">
        <div class="col-sm-6 pt-2"><h6 class="mb-4 bc-header">Absen tanggal {{ \Carbon\Carbon::now()->translatedFormat('j F Y') }}</h6></div>
        <div class="col-sm-6 d-flex justify-content-end pb-3">
            <select class="mr-3 shadow nice-select border-primary text-theme" id="filter-absen">
                <option value="">Filter Absen</option>
                <option value="Hadir">Hadir</option>
                <option value="Izin">Izin</option>
                <option value="Sakit">Sakit</option>
                <option value="Alfa">Alfa</option>
                <option value="Belum Absen">Belum Absen</option>
            </select>

            <div class="clearfix"></div>
        </div>
    </div>

    <form action="{{ route('absen.store') }}" method="post">
        @csrf
        <div class="table-responsive product-list">
            <table class="table table-bordered" width="100%" id="absens_table">
                <thead class="bg-theme">
                    <tr>
                        <th style="width: 10px">No</th>
                        <th class="col-5">Nama</th>
                        <th style="width: 120px"> Absen Hari Ini</th>
                        <th style="width: 100px">Opsi</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students->sortBy('name') as $student)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                {{ $student->name }}
                                @error('absen.'.$student->id)
                                    <p class="error-absen">Absen {{ $student->name }} tidak boleh kosong</p>
                                @enderror
                            </td>
                            <td>{!! $student->getAbsenToday(true) !!}</td>
                            <td>
                                <select name="absen[{{ $student->id }}]" id="absen" class="nice-select">
                                    <option value="">-- PILIH --</option>
                                    @foreach ($absens as $k => $v)
                                        <option value="{{ $k }}" {{ $student->getAbsenToday()==$k||old('absen.'.$student->id)==$k?'selected':'' }}>{{ $v }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input type="text" class="form-control" name="description[{{ $student->id }}]" value="{{ $student->getDescriptionAbsenToday() }}">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <button class="btn btn-success">simpan</button>
    </form>

@endsection

@push('css')
    <style>
        .error-absen{
            font-weight: bold;
            color: red;
            line-height: 1px;
            font-style: italic;
            font-size: 14px;
        }
    </style>
@endpush

@push('js')
    <script src="{{ url('js/teacher/absen.js') }}"></script>
@endpush
