@extends('layouts.admin',['noCard'=>true])

@section('title') Halaman Dashboard @endsection
@section('page') Dashboard @endsection
@section('action') Siswa @endsection

@section('content')

<div class="mt-1 mb-3 button-container">
    <div class="row pl-0">
        <div class="col-lg-4 col-md-4 col-sm-12 col-12 mb-3">
            <div class="bg-white border">
                <div class="media p-4">
                    <div class="align-self-center mr-3 rounded-circle notify-icon bg-primary">
                        <i class="fa fa-user"></i>
                    </div>
                    <div class="media-body pl-2">
                        <h3 class="mt-0 mb-0"><strong>50</strong></h3>
                        <p><small class="text-muted bc-description">Total Guru</small></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-12 col-12 mb-3">
            <div class="bg-white border">
                <div class="media p-4">
                    <div class="align-self-center mr-3 rounded-circle notify-icon bg-warning">
                        <i class="fas fa-eye"></i>
                    </div>
                    <div class="media-body pl-2">
                        <h3 class="mt-0 mb-0"><strong>3.1M</strong></h3>
                        <p><small class="text-muted bc-description">Total Blog Dilihat</small></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-12 col-12 mb-3">
            <div class="bg-white border">
                <div class="media p-4">
                    <div class="align-self-center mr-3 rounded-circle notify-icon bg-success">
                        <i class="fa fa-tasks"></i>
                    </div>
                    <div class="media-body pl-2">
                        <h3 class="mt-0 mb-0"><strong>1022</strong></h3>
                        <p><small class="text-muted bc-description">Total Tugas</small></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')
    <script>
        $('#dashboard').addClass('active')
    </script>
@endpush
