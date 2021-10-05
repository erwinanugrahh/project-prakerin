@extends('layouts.guest')

@section('content')
    <div class="container mb-4">
        <h3 class="mt-4 text-center"><strong>PENGUMUMAN PPDB</strong></h3>
        <div class="card p-4 mb-3 text-center">
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iure suscipit perferendis amet alias, illum quidem omnis fugiat voluptatum error sunt quia eligendi hic exercitationem quo itaque assumenda excepturi tempore aliquid.
            <form action="" method="get">
                <div class="input-group w-25 pt-3 mx-auto">
                    <input type="text" name="nisn" class="form-control" placeholder="Cari NISN anda" aria-label="" aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" id="search-nisn">Cari</button>
                    </div>
                </div>
            </form>
        </div>
        @if (request()->has('nisn'))
            @if (request('nisn')!=''&&App\Models\Student::where('nisn', request()->nisn)->exists())
                <div class="alert alert-success text-center"><h3 class="text-success my-0">Selamat! anda telah diterima</h3></div>
            @else
                <div class="alert alert-danger text-center"><h3 class="text-danger my-0">Mohon maaf, anda belum bisa diterima.</h3></div>
            @endif
        @endif
    </div>
@endsection
