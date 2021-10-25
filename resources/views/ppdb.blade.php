@extends('layouts.guest')

@section('content')
    <div class="container mb-4">
        <h3 class="mt-4 text-center"><strong>PENGUMUMAN PPDB</strong></h3>
        <div class="card p-4 mb-3 text-center">
            Untuk calon pendaftar masuk {{ setting('setting_web')['website_name'] }} tahun ajaran {{ date('Y') }}/{{ date('Y')+1 }} bisa mendaftar lewat website ini atau langsung datang ke kampus {{ setting('setting_web')['website_name'] }}
            <form action="" method="get">
                <div class="input-group w-25 pt-3 mx-auto">
                    <input type="text" name="nisn" class="form-control" placeholder="Cari NISN anda" aria-label="" aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" id="search-nisn">Cari</button>
                    </div>
                </div>
            </form>
        </div>
        @if ($ppdb!=false)
            @if ($ppdb)
                <div class="alert alert-success text-center">
                    <h3 class="text-success my-0">Selamat <span class="text-primary">{{ $ppdb->name }}</span>! anda telah diterima.</h3>
                    <h4 class="text-success">Silahkan anda <a href="/login" class="text-primary">login</a> menggunakan NISN / Email anda dan tanggal lahir sebagai password nya</h4>
                </div>
            @else
                <div class="alert alert-danger text-center"><h3 class="text-danger my-0">Mohon maaf, anda belum bisa diterima.</h3></div>
            @endif
        @endif
    </div>
@endsection
