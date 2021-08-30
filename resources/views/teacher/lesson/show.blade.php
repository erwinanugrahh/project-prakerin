@extends('layouts.admin')

@section('title') Halaman Materi @endsection
@section('page') Materi @endsection
@section('action') Detail @endsection

@push('css')
    <style>
        a .attachment{
            display:inline-block;
            padding-top:100px;
            background: red;
            white-space: nowrap;
        }
        a[href$='.pdf'] {
            display:inline-block;
            padding-top:100px;
            background: url('/icons/pdf.png')  center left no-repeat;
            white-space: nowrap;
        }
        a[href$='.pptx'], a[href$='.ppt'] {
            display:inline-block;
            padding-top:130px;
            background: url('/icons/pptx.png')  center left no-repeat;
            white-space: nowrap;
        }
        a[href$='.doc'], a[href$='.docx'] {
            display:inline-block;
            padding-top:130px;
            background: url('/icons/docx-file.png')  center left no-repeat;
            white-space: nowrap;
        }
    </style>
@endpush

@section('content')
    <input type="hidden" id="url" value="{{ route("lesson.show", $lesson->slug) }}">
    <h3 class="title text-center">{{ $lesson->title }}</h3>
    {!! $lesson->content !!}

    @if (!is_null($lesson->attachment))
        <a class="attachment" download="{{ $lesson->attachment }}" href="{{ url('images/attachments/'.$lesson->attachment) }}">{{ $lesson->attachment }}</a>
    @endif

    <hr>

    <div class="d-flex justify-content-between">
        <select name="" id="filter_status" class="filter_select mb-3">
            <option value="" data-display="Filter Status"></option>
            <option value="done">Selesai</option>
            <option value="dont">Belum</option>
        </select>
        <h3 class="subtitle">Tugas Siswa</h3>
        <select name="" id="filter_major" class="filter_select mb-3">
            <option value="" data-display="Filter Kelas"></option>
            @foreach ($lesson->majors as $major)
                <option value="{{ $major->major->name }}">{{ $major->major->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="table-responsive product-list">

        <table class="table table-bordered table-striped mt-3" id="tasks_table">
            <thead>
                <tr>
                    <th style="width: 1%;">No</th>
                    <th style="width: 30%">Nama</th>
                    <th style="width: 30%">Kelas</th>
                    <th style="width: 1%">Nilai</th>
                    <th style="width: 1%">Selesai</th>
                    <th style="width: 1%;">Action</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
@endsection

@push('js')
    <script src="{{ url('js/teacher/lesson-detail.js') }}"></script>
@endpush
