@extends('layouts.admin', ['noCard'=>true])

@section('title') Daftar Materi @endsection
@section('page') Siswa @endsection
@section('action') Materi @endsection

@section('content')
    <div class="row">
        @foreach ($lessons as $lesson)
            <div class="col-12 col-md-6">
                <div class="mt-4 mb-4 p-2 bg-white border shadow lh-sm">
                    <div class="row no-gutters">
                        <div class="col-1 col-md-2">
                            <div class="card shadow radius-5 bg-info text-center" style="height: 100%;">
                                <i class="fas fa-lg fa-book text-white my-auto"></i>
                            </div>
                        </div>
                        <div class="col-11 col-md-10 pl-2">
                            <p class="font-weight-bold">{{ $lesson->lesson->title }}</p>
                            <p>{{ $lesson->lesson->teacher->getFullName() }}</p>
                            <p>Batas Upload Tugas: {{ $lesson->end_at }}</p>
                            <p>Nilai Tugas: {{ $lesson->lesson->getMyValue() }}</p>
                            <a class="btn btn-sm py-0 text-white btn-primary font-weight-bold" href="{{ route('task.show', $lesson->lesson->slug??'') }}">MASUK PEMBELAJARAN</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
