@extends('layouts.admin', [
    'searchbar' => false
])

@section('title') Detail Siswa PPDB @endsection
@section('page') PPDB @endsection
@section('action') Detail @endsection

@section('content')

<h3 class="text-center mb-3 bc-header">Detail Siswa PPDB</h3>

<div class="row">
    <div class="col-md-5 col-12">
        <table class="table table-striped">
            <tr>
                <td>Nama</td>
                <td>{{ $ppdb->name }}</td>
            </tr>
            <tr>
                <td>NISN</td>
                <td>{{ $ppdb->nisn }}</td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td>{{ $ppdb->dob }}</td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>{{ $ppdb->gender }}</td>
            </tr>
            <tr>
                <td>Anak Ke</td>
                <td>{{ $ppdb->child }}</td>
            </tr>
            <tr>
                <td>Dari</td>
                <td>{{ $ppdb->child_from }}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>{{ $ppdb->address }}</td>
            </tr>
        </table>
    </div>
    <div class="col-md-7 col-12">
        <table class="table table-striped">
            <tr>
                <td>Jurusan</td>
                <td>
                    @can('smk')
                        <p>{{ $ppdb->skill->name??'' }}</p>
                    @endcan
                </td>
            </tr>
            <tr>
                <td>No Telp</td>
                <td>{{ $ppdb->phone }}</td>
            </tr>
            <tr>
                <td>Kode Pos</td>
                <td>{{ $ppdb->zip }}</td>
            </tr>
            <tr>
                <td>Nama Orang Tua\Wali</td>
                <td>{{ $ppdb->parents_name }}</td>
            </tr>
            <tr>
                <td>Pekerjaan Orang Tua/Wali</td>
                <td>{{ $ppdb->parents_job }}</td>
            </tr>
            <tr>
                <td>Alamat Orang Tua/Wali</td>
                <td>{{ $ppdb->parents_address }}</td>
            </tr>
            <tr>
                <td>No Telp Orang Tua/Wali</td>
                <td>{{ $ppdb->parents_phone }}</td>
            </tr>
        </table>
    </div>
</div>

@endsection

@push('js')
    <script>

    </script>
@endpush
