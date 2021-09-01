@extends('layouts.admin')

@section('title') Halaman Absen @endsection
@section('page') Absen @endsection
@section('action') Histori @endsection

@section('content')
<div class="row border-bottom mb-4">
    <div class="col-sm-6 pt-2"><h6 class="mb-4 bc-header">Histori Absen</h6></div>

    <div class="col-sm-6 d-flex justify-content-end pb-3">
        {{-- <button class="btn btn-danger shadow" id="delete-selected">
            <span class='text-white'><b>Hapus Terpilih</b></span>
        </button> --}}

        <select class="shadow bulk-actions ml-3" id="filter_absen">
            <option value="" data-display="Filter Absen">Tidak</option>
            <option value="day">Per Hari</option>
            <option value="week">Per Minggu</option>
            <option value="month">Per Bulan</option>
        </select>

        {{-- <a href="{{ route('student.create') }}" class="shadow ml-3 btn btn-primary">
            <span class='text-white'><b>Tambah Siswa</b></span>
        </a> --}}

        <div class="clearfix"></div>
    </div>
</div>

<div class="table-responsive product-list">

    <table class="table table-bordered table-striped mt-3" id="histories_table">
        <thead>
            <tr class="text-center bg-theme">
                <th style="width: 200px;" class="align-middle">Tanggal</th>
                <th>Hadir</th>
                <th>Izin</th>
                <th>Sakit</th>
                <th>Alfa</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            {{-- @foreach ($histories as $date => $history)
                <tr class="text-center">
                    <td>{{ \Carbon\Carbon::parse($date)->translatedFormat('j F Y') }}</td>
                    <td>{{ $history->where('absen', 'H')->count() }}</td>
                    <td>{{ $history->where('absen', 'I')->count() }}</td>
                    <td>{{ $history->where('absen', 'S')->count() }}</td>
                    <td>{{ $history->where('absen', 'A')->count() }}</td>
                    <td>
                        <form action="{{ route('absen.history.export', $date) }}" method="post">
                            @csrf
                            <button class="btn btn-theme"><i class="fas fa-file-excel"></i></button>
                            <a href="{{ route('absen.history.detail', $date) }}" class="btn btn-info text-white"><i class="fas fa-eye"></i></a>
                        </form>
                    </td>
                </tr>
            @endforeach --}}
        </tbody>
    </table>
</div>
@endsection

@push('js')
    <script>
        $('#history-absen').addClass('active').parent().parent().addClass('active')
        var table = $('#histories_table').DataTable({
            "processing": true,
            "serverSide": true,
            "bSort" : true,
            "ajax": {
                url: '',
                data: function(data){
                    data.filter_absen=$('#filter_absen').val()
                }
            },
            // orderCellsTop: true,
            fixedHeader: true,
            "columns": [
                {data:"date",className:'align-middle'},
                {data:"hadir",className:'align-middle'},
                {data:"izin",className:'align-middle text-center'},
                {data:"sakit",className:'align-middle text-center'},
                {data:"alfa",className:'align-middle text-center'},
                {data:"action",searchable:false,orderable:false,sortable:false,className:'align-middle text-center'}//action
            ],
        })

        $('#filter_absen').on('change', function() {
            table.draw()
        })
    </script>
@endpush
