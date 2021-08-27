@extends('layouts.admin')

@section('title') Halaman Blogger @endsection
@section('page') Blogger @endsection
@section('action') Edit @endsection

@section('content')
    <div class="mt-4 mb-3 p-3 button-container bg-white border shadow-sm">
        <h6 class="mb-3">Edit Blogger</h6>
        <form action="{{ route('blogger.update', $blogger->id) }}" method="post">
            @csrf
            @method('put')
            @include('admin.blogger._form')
            <button class="btn btn-success">Edit</button>
        </form>
    </div>
@endsection

@push('js')
    <script>
        $('#password').attr('required', false).addClass('is-valid').parent().append(`<span style="right: 0" class="valid-tooltip" role="alert"> <strong>Kosongkan jika tidak ingin mengubah password</strong> </span>`);
        $('#password_confirmation').attr('required', false)
        $('#data-major').addClass('active').parent().parent().addClass('active');
    </script>
@endpush
