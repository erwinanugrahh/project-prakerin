<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="description" content="" >
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!--Meta Responsive tag-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="{{ url('admin/') }}/css/bootstrap.min.css">
    <!--Custom style.css-->
    <link rel="stylesheet" href="{{ url('admin/') }}/css/quicksand.css">
    <link rel="stylesheet" href="{{ url('admin/') }}/css/style.css">
    <!--Font Awesome-->
    <link rel="stylesheet" href="{{ url('admin/') }}/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="{{ url('admin/') }}/css/fontawesome.css">
    <!--Chartist CSS-->
    <link rel="stylesheet" href="{{ url('admin/') }}/css/chartist.min.css">
    <!--Datatable-->
    <link rel="stylesheet" href="{{ url('admin/') }}/css/dataTables.bootstrap4.min.css">
    <!--Nice select -->
    <link rel="stylesheet" href="{{ url('admin/') }}/css/nice-select.css">
    <!--Bootstrap Calendar-->
    <link rel="stylesheet" href="{{ url('admin/') }}/js/calendar/bootstrap_calendar.css">
    {{-- Select 2 --}}
    <link rel="stylesheet" href="{{ url('plugins/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ url('plugins/select2/dist/css/select2-bootstrap4.min.css') }}">

    @stack('css')

    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
        .invalid-tooltip{
            right: 0;
        }
        .parent.active{
            background: lightblue;
        }
        .parent.active>a{
            color: blue;
        }
        .child.active>a{
            color: royalblue;
        }
    </style>
    @livewireStyles
    <title>Dashboard</title>
  </head>
  <body>
    <div class="loader-wrapper">
        <div class="loader-circle">
            <div class="loader-wave"></div>
        </div>
    </div>

    <!--Page Wrapper-->

    <div class="container-fluid">

        @include('partials.header')

        <!--Main Content-->

        <div class="row main-content">
            <!--Sidebar left-->
            @include('partials.sidebar')
            <!--Sidebar left-->

            <!--Content right-->
            <div class="col-sm-9 col-xs-12 content pt-3 pl-0">
                <h5 class="mb-0" ><strong>@yield('title')</strong></h5>
                <span class="text-secondary">@yield('page') <i class="fa fa-angle-right"></i> @yield('action')</span>

                @if (isset($noCard))
                @yield('content')
                @else
                <div class="mt-4 mb-4 p-3 bg-white border shadow-sm lh-sm">
                    @yield('content')
                </div>
                @endif
                <!--Footer-->
                <div class="row mt-5 mb-4 footer">
                    <div class="col-sm-8">
                        <span>&copy; All rights reserved 2021 designed by <a class="text-info" href="http://instagram.com/indrabesset">Bryan X</a></span>
                    </div>
                    <div class="col-sm-4 text-right">
                        <a href="#" class="ml-2">Contact Us</a>
                        <a href="#" class="ml-2">Support</a>
                    </div>
                </div>
                <!--Footer-->

            </div>
        </div>

        <!--Main Content-->

    </div>

    <!--Page Wrapper-->

    <!-- Page JavaScript Files-->
    <script src="{{ url('admin/') }}/js/jquery.min.js"></script>
    <script src="{{ url('admin/') }}/js/jquery-1.12.4.min.js"></script>
    <!--Popper JS-->
    <script src="{{ url('admin/') }}/js/popper.min.js"></script>
    <!--Bootstrap-->
    <script src="{{ url('admin/') }}/js/bootstrap.min.js"></script>
    <!--Sweet alert JS-->
    <script src="{{ url('admin/') }}/js/sweetalert.js"></script>
    <!--Progressbar JS-->
    <script src="{{ url('admin/') }}/js/progressbar.min.js"></script>
    <!--Datatable-->
    <script src="{{ url('admin/') }}/js/jquery.dataTables.min.js"></script>
    <script src="{{ url('admin/') }}/js/dataTables.bootstrap4.min.js"></script>
    <!--Bootstrap Calendar JS-->
    <script src="{{ url('admin/') }}/js/calendar/bootstrap_calendar.js"></script>
    {{-- <script src="{{ url('admin/') }}/js/calendar/demo.js"></script> --}}
    <!--Nice select-->
    <script src="{{ url('admin/') }}/js/jquery.nice-select.min.js"></script>
    {{-- Select 2 --}}
    <script src="{{ url('plugins/select2/dist/js/select2.full.min.js') }}"></script>

    <!--Custom Js Script-->
    @stack('js')
    <script src="{{ url('admin/') }}/js/custom.js"></script>
    <!--Custom Js Script-->
    <script>
        //Order list dataTable
        $("#productList").DataTable();
        //Nice select
        $('.bulk-actions').niceSelect();
        //select2
        $('.select2').select2({
            theme: 'bootstrap4'
        });

        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
    </script>
    @if (session()->has('success'))
        <script>
            Toast.fire({
                icon: 'success',
                title: '{{ session()->get("success") }}'
            })
        </script>
    @elseif(session()->has('alert'))
        <script>
            Swal.fire({
                title: 'Password anda masih default',
                text: "Apakah ingin mengubahnya sekarang?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Ganti sekarang'
            }).then((result) => {
                if (result.isConfirmed) {
                   window.location.href ='/profile#custom-contact'
                }
            })
        </script>
    @endif
    <script>
        $(document).on('click', '.delete', function(e){
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    let id = $(this).data('id');
                    $.ajax({
                        url: id,
                        method: 'DELETE',
                        data: {_token: $('input[name=_token]').val()},
                        success: function(result){
                            table.draw()
                            Toast.fire({
                                icon: 'success',
                                title: result.message
                            })
                        }
                    })
                }
            })
        })
    </script>
    @livewireScripts
  </body>
</html>
