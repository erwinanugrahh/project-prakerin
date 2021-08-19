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
    <link rel="stylesheet" href="{{ url('/') }}/css/bootstrap.min.css">
    <!--Custom style.css-->
    <link rel="stylesheet" href="{{ url('/') }}/css/quicksand.css">
    <link rel="stylesheet" href="{{ url('/') }}/css/style.css">
    <!--Font Awesome-->
    <link rel="stylesheet" href="{{ url('/') }}/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/css/fontawesome.css">
    
    <!--[if lt IE 9]>
        <script src="{{ url('/') }}/https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="{{ url('/') }}/https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <title>Login</title>
  </head>

  <body class="login-body">
    
    <!--Login Wrapper-->

    <div class="container-fluid login-wrapper">
        <div class="login-box">
            <h1 class="text-center mb-5"><i class="fab fa-xing text-primary"></i> @yield('title') </h1>    
            <div class="row">
                <div class="col-md-6 col-sm-6 col-12 login-box-info">
                    @yield('another')
                </div>
                <div class="col-md-6 col-sm-6 col-12 login-box-form p-4">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>    

    <!--Login Wrapper-->

    <!-- Page JavaScript Files-->
    <script src="{{ url('/') }}/js/jquery.min.js"></script>
    <script src="{{ url('/') }}/js/jquery-1.12.4.min.js"></script>
    <!--Popper JS-->
    <script src="{{ url('/') }}/js/popper.min.js"></script>
    <!--Bootstrap-->
    <script src="{{ url('/') }}/js/bootstrap.min.js"></script>

    <!--Custom Js Script-->
    <script src="{{ url('/') }}/js/custom.js"></script>
    <!--Custom Js Script-->
  </body>
</html>