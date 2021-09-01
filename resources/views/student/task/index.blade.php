@extends('layouts.admin', ['noCard'=>true])

@section('title') Daftar Materi @endsection
@section('page') Siswa @endsection
@section('action') Materi @endsection

@section('content')
    <div class="row">
        <div class="col-12 mt-3 d-flex justify-content-center">
            <form action="" method="get">
                <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="Cari materi..." value="{{ old('search') }}">
                    <div class="input-group-append">
                        <button class="btn btn-theme"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-12 my-3 d-flex justify-content-center">
            {{ $lessons->links() }}
        </div>
        @foreach ($lessons as $lesson)
            @if (!is_null($lesson->lesson))
            <div class="col-12 col-md-6">
                <div class="mt-2 mb-2 p-2 bg-white border shadow lh-sm">
                    <div class="row no-gutters">
                        <div class="col-2">
                            <div class="card shadow radius-5 bg-info text-center" style="height: 100%;">
                                <i class="fas fa-lg fa-book text-white my-auto"></i>
                            </div>
                        </div>
                        <div class="col-10 pl-2">
                            <p class="font-weight-bold">{{ $lesson->lesson->title }}</p>
                            <p>{{ $lesson->lesson->teacher->getFullName() }}</p>
                            <p>Batas Upload Tugas: {{ $lesson->end_at }}</p>
                            <p>Nilai Tugas: {{ $lesson->lesson->getMyValue() }}</p>
                            <a class="btn btn-sm py-0 text-white btn-primary font-weight-bold" href="{{ route('task.show', $lesson->lesson->slug??'') }}">MASUK PEMBELAJARAN</a>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        @endforeach
        <div class="col-12 mt-3 d-flex justify-content-center">
            {{ $lessons->links() }}
        </div>
    </div>
@endsection
