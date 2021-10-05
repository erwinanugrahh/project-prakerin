@extends('layouts.admin', ['noCard'=>true])

@section('title') Daftar Materi @endsection
@section('page') Siswa @endsection
@section('action') Materi @endsection

@section('content')
    @livewire('task-index')
@endsection

@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function(){
            $('#search').on('keyup', function(){
                window.livewire.emit('setSearch', $(this).val())
            })
        })
    </script>
@endpush
