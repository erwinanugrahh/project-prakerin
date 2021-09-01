@extends('layouts.admin')

@section('title') Halaman Absen @endsection
@section('page') Absen @endsection
@section('action') Detail Histori @endsection

@section('content')
<div class="row border-bottom mb-4">
    <div class="col-sm-6 pt-2"><h6 class="mb-4 bc-header">Histori Absen Tanggal {{ $date }}</h6></div>
    <div class="col-sm-6 text-right pb-3">
        <form action="{{ route('absen.history.export', $params) }}" method="post">
            @csrf
            <button class="pull-right mr-3 shadow btn btn-theme"><b><i class="fas fa-file-excel"></i> Export Excel</b></button>
        </form>
        <div class="clearfix"></div>
    </div>
</div>
<div class="table-responsive product-list">

    <table class="table table-bordered table-striped mt-3" id="histories_table">
        <thead>
            <tr class="text-center bg-theme">
                <th>Tanggal</th>
                <th style="width: 200px;" class="align-middle">Nama</th>
                <th>Absen</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($histories as $history)
                <tr class="text-center">
                    <td>{{ \Carbon\Carbon::parse($history->created_at)->translatedFormat('l j F Y') }}</td>
                    <td>{{ $history->student->name }}</td>
                    <td>{!! $history->getAbsen() !!}</td>
                    <td>{{ $history->description??'' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@push('js')
    <script>
        $('#history-absen').addClass('active').parent().parent().addClass('active')
        $('#histories_table').DataTable()
    </script>
@endpush
