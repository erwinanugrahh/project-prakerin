<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Basic Page Needs
================================================== -->
  <meta charset="utf-8">
  <title>Home</title>

  <!-- Mobile Specific Metas
================================================== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Construction Html5 Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">

  <!-- Favicon
================================================== -->
  <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

  <!-- CSS
================================================== -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href="{{ url('user') }}/plugins/bootstrap/bootstrap.min.css">
  <!-- FontAwesome -->
  <link rel="stylesheet" href="{{ url('user') }}/plugins/fontawesome/css/all.min.css">
  <!-- Animation -->
  <link rel="stylesheet" href="{{ url('user') }}/plugins/animate-css/animate.css">
  <!-- slick Carousel -->
  <link rel="stylesheet" href="{{ url('user') }}/plugins/slick/slick.css">
  <link rel="stylesheet" href="{{ url('user') }}/plugins/slick/slick-theme.css">
  <!-- Colorbox -->
  <link rel="stylesheet" href="{{ url('user') }}/plugins/colorbox/colorbox.css">
  <!-- Template styles-->
  <link rel="stylesheet" href="{{ url('user') }}/css/style.css">
  @livewireStyles
</head>

<body>
  <div class="body-inner">

    <div id="top-bar" class="top-bar">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-8">
            <ul class="top-info text-center text-md-left">
              <li><i class="fas fa-map-marker-alt"></i>
                <p class="info-text">{{ setting('setting_web')['zip'].' '.setting('setting_web')['address'] }}</p>
              </li>
            </ul>
          </div>
          <!--/ Top info end -->

          <div class="col-lg-4 col-md-4 top-social text-center text-md-right">
            <ul class="list-unstyled">
              <li>
                @foreach (setting('social_media')['items'] as $item)
                  <a title="{{ $item['name'] }}" target="_blank" href="{{ $item['url'] }}">
                    <span class="social-icon"><i class="{{ $item['icon'] }}"></i></span>
                  </a>
                @endforeach
              </li>
            </ul>
          </div>
          <!--/ Top social end -->
        </div>
        <!--/ Content row end -->
      </div>
      <!--/ Container end -->
    </div>
    <!--/ Topbar end -->
    <!-- Header start -->
    <header id="header" class="header-one">
      @include('partials.guest.header')

      @include('partials.guest.site-navigation')
    </header>
    <!--/ Header end -->

    @yield('content')

    @include('partials.guest.footer')


    <!-- Javascript Files
  ================================================== -->

    <!-- initialize jQuery Library -->
    <script src="{{ url('user') }}/plugins/jQuery/jquery.min.js"></script>
    <!-- Bootstrap jQuery -->
    <script src="{{ url('user') }}/plugins/bootstrap/bootstrap.min.js" defer></script>
    <!-- Slick Carousel -->
    <script src="{{ url('user') }}/plugins/slick/slick.min.js"></script>
    <script src="{{ url('user') }}/plugins/slick/slick-animation.min.js"></script>
    <!-- Color box -->
    <script src="{{ url('user') }}/plugins/colorbox/jquery.colorbox.js"></script>
    <!-- shuffle -->
    <script src="{{ url('user') }}/plugins/shuffle/shuffle.min.js" defer></script>


    <!-- Google Map API Key-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU" defer></script>
    <!-- Google Map Plugin-->
    <script src="{{ url('user') }}/plugins/google-map/map.js" defer></script>

    <!-- Template custom -->
    <script src="{{ url('user') }}/js/script.js"></script>
    @livewireScripts
    <script src="{{ url('admin/') }}/js/sweetalert.js"></script>
    @stack('js')
    <script>
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
    @endif
  </div><!-- Body inner end -->
</body>

</html>
