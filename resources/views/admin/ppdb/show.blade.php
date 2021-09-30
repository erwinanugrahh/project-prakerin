@extends('layouts.admin', [
    'searchbar' => false
])

@section('title') Detail Siswa PPDB @endsection
@section('page') PPDB @endsection
@section('action') Detail @endsection

@section('content')

    <p>Nama : {{ $ppdb->name }}</p>
    <p>NISN : {{ $ppdb->nisn }}</p>
    <p>Tanggal Lahir : {{ $ppdb->dob }}</p>
    <p>Jenis Kelamin : {{ $ppdb->gender }}</p>
    <p>Anak ke : {{ $ppdb->child }} Dari : {{ $ppdb->child_from }}</p>
    <p>Alamat : {{ $ppdb->address }}</p>
    @can('smk')
        <p>Jurusan : {{ $ppdb->skill->name??'' }}</p>
    @endcan
    <p>No Telp : {{ $ppdb->phone }}</p>
    <p>Kode Pos : {{ $ppdb->zip }}</p>
    <p>Nama Orang Tua/Wali : {{ $ppdb->parents_name }}</p>
    <p>Pekerjaan Orang Tua/Wali : {{ $ppdb->parents_job }}</p>
    <p>Alamat Orang Tua/Wali : {{ $ppdb->parents_address }}</p>
    <p>No Telp Orang Tua/Wali : {{ $ppdb->parents_phone }}</p>

@endsection

@push('js')
    <script>

    </script>
@endpush
