@extends('layouts.admin', ['noCard'=>true])

@section('title') Daftar Materi @endsection
@section('page') Siswa @endsection
@section('action') Materi @endsection

@section('content')
    <div class="row">
        <div class="col-12 mt-3 d-flex justify-content-center">
            <form action="" method="get">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text bg-white border-right-0">
                            <i class="fas fa-search"></i>
                        </div>
                    </div>
                    <input type="text" class="form-control border-left-0 pl-0" autocomplete="false" name="search" placeholder="Cari materi..." value="{{ old('search') }}">
                </div>
            </form>
        </div>
        <div class="col-12 my-3 d-flex justify-content-center">
            {{ $lessons->links() }}
        </div>
        <div class="row col-12 lessons">

        </div>
        <div class="col-12 mt-3 d-flex justify-content-center">
            {{ $lessons->links() }}
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ url('js/student/task.js') }}"></script>
@endpush
