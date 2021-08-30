@extends('layouts.admin')

@section('title') Halaman Materi @endsection
@section('page') Materi @endsection
@section('action') Tugas @endsection

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
    <div class="d-flex justify-content-between">
        <h3>Nama :  {{ $task->student->name }}</h3>
        <h3>Kelas :  {{ $task->student->major->name }}</h3>
    </div>
    {!! $task->content !!}
    @if (!is_null($task->attachment))
        <a class="attachment" download="{{ $task->attachment }}" href="{{ url('images/attachments/'.$task->attachment) }}">{{ $task->attachment }}</a>
    @endif

    <hr class="mt-4">
    <form action="" method="post">
        @csrf
        <div class="form-group form-row">
            <div class="col-12 col-md-3">
                <label for="">Nilai</label>
                <input type="number" name="value" value="{{ $task->value }}" class="form-control @error('value') is-invalid @enderror">
                @error('value')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-12 col-md-9">
                <label for="">Keterangan</label>
                <input type="text" name="description" value="{{ $task->description }}" class="form-control">
            </div>
        </div>
        <button class="btn btn-success">Submit</button>
    </form>
@endsection

@push('js')
    <script>
        $('#lesson').addClass('active')
    </script>
@endpush
