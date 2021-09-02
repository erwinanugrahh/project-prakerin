@extends('layouts.admin')

@section('title') Halaman Absen @endsection
@section('page') Siswa @endsection
@section('action') Absen @endsection

@section('content')
<div class="table-responsive product-list">

    <table class="table table-bordered table-striped mt-3" id="histories_table">
        <thead>
            <tr class="text-center bg-theme">
                <th>Tanggal</th>
                <th>Absen</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($histories as $history)
                <tr class="text-center">
                    <td>{{ \Carbon\Carbon::parse($history->created_at)->translatedFormat('l j F Y') }}</td>
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
        $('#absen').addClass('active').parent().parent().addClass('active')
        $('#histories_table').DataTable()
    </script>
@endpush
