@extends('layouts.admin')

@section('title') Halaman Materi @endsection
@section('page') Materi @endsection
@section('action') Edit @endsection

@section('content')
    <form action="{{ route('lesson.update', $lesson->slug) }}" enctype="multipart/form-data" method="post" class="needs-validation" novalidate>
        @csrf
        @method('put')
        @include('teacher.lesson._form')
    </form>
@endsection

@push('js')
    <script>
        $.ajax({
            url: '',
            success: function(task) {
                task.forEach((v,i)=>{
                    $('.start_at')[i].value = v.start_at
                    $('.end_at')[i].value = v.end_at
                })
            }
        })
    </script>
@endpush
