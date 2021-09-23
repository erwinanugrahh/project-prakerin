@extends('layouts.admin', ['noCard'=>true])

@section('title') Halaman Darhboard @endsection
@section('page') Dashboard @endsection
@section('action') Admin @endsection

@section('content')
<div class="row">
    <!--Visitors statistics card-->
    <div class="col-sm-4 custom-card">
        <div class="mt-1 mb-3 button-container p-3 bg-white border lh-sm">
            <div class="text-center mb-3">
                <h5 class="mb-0 mt-2"><small>Total User</small></h5>
                <h2>2,367</h2>
            </div>

            <svg viewBox="0 0 36 25" class="circular-chart blue">
                <path class="circle-bg"
                d="M18 2.0845
                    a 7.9567 7.9567 0 0 1 0 15.9134
                    a 7.9567 7.9567 0 0 1 0 -15.9134"
                />
                <path class="circle"
                stroke-dasharray="40, 60"
                d="M18 2.0845
                    a 7.9567 7.9567 0 0 1 0 15.9134
                    a 7.9567 7.9567 0 0 1 0 -15.9134"
                />
                <text x="18" y="12.00" class="percentage">&#xf0c0;</text>
            </svg>
            <div class="row mx-2">
                <div class="col-sm-6 col-12">
                    <h5>1,507</h5>
                    <span class="text-muted small"><strong>Guru</strong></span>
                </div>
                <div class="col-sm-6 col-12 text-right">
                    <h5>854</h5>
                    <span class="text-muted small"><strong>Siswa</strong></span>
                </div>
            </div>
        </div>
    </div>
    <!--/Visitors statistics card-->

    <!--Transaction statistics card-->
    <div class="col-sm-4 custom-card">
        <div class="mt-1 mb-3 button-container p-3 bg-white border lh-sm">
            <div class="text-center mb-3">
                <h5 class="mb-0 mt-2"><small>Total Blog</small></h5>
                <h2>15,367</h2>
            </div>

            <svg viewBox="0 0 36 25" class="circular-chart red">
                <path class="circle-bg"
                d="M18 2.0845
                    a 7.9567 7.9567 0 0 1 0 15.9134
                    a 7.9567 7.9567 0 0 1 0 -15.9134"
                />
                <path class="circle"
                stroke-dasharray="40, 60"
                d="M18 2.0845
                    a 7.9567 7.9567 0 0 1 0 15.9134
                    a 7.9567 7.9567 0 0 1 0 -15.9134"
                />
                <text x="18" y="12.00" class="percentage">&#xf1ed;</text>
            </svg>

            <div class="row mx-2">
                <div class="col-sm-6 col-12">
                    <h5>15,300</h5>
                    <span class="text-muted small"><strong>Dilihat</strong></span>
                </div>
                <div class="col-sm-6 col-12 text-right">
                    <h5>67</h5>
                    <span class="text-muted small"><strong>Belum dilihat</strong></span>
                </div>
            </div>
        </div>
    </div>
    <!--/Transaction statistics card-->

    <!--Tasks statistics card-->
    <div class="col-sm-4 custom-card">
        <div class="mt-1 mb-3 button-container p-3 bg-white border lh-sm">
            <div class="text-center mb-3">
                <h5 class="mb-0 mt-2"><small>Total Kelas</small></h5>
                <h2>585</h2>
            </div>

            <svg viewBox="0 0 36 25" class="circular-chart green">
                <path class="circle-bg"
                d="M18 2.0845
                    a 7.9567 7.9567 0 0 1 0 15.9134
                    a 7.9567 7.9567 0 0 1 0 -15.9134"
                />
                <path class="circle"
                stroke-dasharray="40, 60"
                d="M18 2.0845
                    a 7.9567 7.9567 0 0 1 0 15.9134
                    a 7.9567 7.9567 0 0 1 0 -15.9134"
                />
                <text x="18" y="12.00" class="percentage">&#xf0ae;</text>
            </svg>

            <div class="row mx-2">
                <div class="col-sm-6 col-12">
                    <h5>490</h5>
                    <span class="text-muted small"><strong>Naon</strong></span>
                </div>
                <div class="col-sm-6 col-12 text-right">
                    <h5>95</h5>
                    <span class="text-muted small"><strong>Naon</strong></span>
                </div>
            </div>
        </div>
    </div>
    <!--Transaction statistics card-->
</div>
@endsection

@push('js')
    <script>
        $('#dashboard').addClass('active')
    </script>
@endpush
