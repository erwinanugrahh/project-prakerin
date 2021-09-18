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
  <link rel="icon" type="image/png" href="{{ url('user') }}/images/favicon.png">

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

</head>

<body>
  <div class="body-inner">

    <div id="top-bar" class="top-bar">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-8">
            <ul class="top-info text-center text-md-left">
              <li><i class="fas fa-map-marker-alt"></i>
                <p class="info-text">{{ $setting_web['zip'].' '.$setting_web['address'] }}</p>
              </li>
            </ul>
          </div>
          <!--/ Top info end -->

          <div class="col-lg-4 col-md-4 top-social text-center text-md-right">
            <ul class="list-unstyled">
              <li>
                <a title="Facebook" href="https://facebbok.com/erwinanugrah">
                  <span class="social-icon"><i class="fab fa-facebook-f"></i></span>
                </a>
                <a title="Twitter" href="https://twitter.com/erwinanugrah">
                  <span class="social-icon"><i class="fab fa-twitter"></i></span>
                </a>
                <a title="Instagram" href="https://instagram.com/instagram">
                  <span class="social-icon"><i class="fab fa-instagram"></i></span>
                </a>
                <a title="Youtube" href="https://youtube.com/bryanx19">
                  <span class="social-icon"><i class="fab fa-youtube"></i></span>
                </a>
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
      <div class="bg-white">
        <div class="container">
          <div class="logo-area">
            <div class="row align-items-center">
              <div class="logo col-lg-3 text-center text-lg-left mb-3 mb-md-5 mb-lg-0">
                <a class="d-block" href="{{ url('user') }}/index.html">
                    @if (file_exists(public_path('logo.png')))
                    <img loading="lazy" src="{{ url('logo.png') }}" alt="Constra">
                    @else
                    <img loading="lazy" src="{{ url('user') }}/images/logo.png" alt="Constra">
                    @endif
                </a>
              </div><!-- logo end -->

              <div class="col-lg-9 header-right">
                <ul class="top-info-box">
                  <li>
                    <div class="info-box">
                      <div class="info-box-content">
                        <p class="info-box-title">Telepon</p>
                        <p class="info-box-subtitle"><a href="{{ url('user') }}/tel: (+62)81234567890">{{ $setting_web['phone'] }}</a></p>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="info-box">
                      <div class="info-box-content">
                        <p class="info-box-title">Email</p>
                        <p class="info-box-subtitle"><a href="{{ url('user') }}/smkidean@gmail.com">{{ $setting_web['email'] }}</a></p>
                      </div>
                    </div>
                  </li>
                  <li class="last">
                    <div class="info-box last">
                      <div class="info-box-content">
                        <p class="info-box-title">Global Certificate</p>
                        <p class="info-box-subtitle">ISO 9001:2017</p>
                      </div>
                    </div>
                  </li>
                  <li class="header-get-a-quote">
                    <a class="btn btn-primary" href="{{ route('login') }}">Login</a>
                  </li>
                </ul><!-- Ul end -->
              </div><!-- header right end -->
            </div><!-- logo area end -->

          </div><!-- Row end -->
        </div><!-- Container end -->
      </div>

      <div class="site-navigation">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <nav class="navbar navbar-expand-lg navbar-dark p-0">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse"
                  aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>

                <div id="navbar-collapse" class="collapse navbar-collapse">
                  <ul class="nav navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                      <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Home</a>
                    </li>

                    <li class="nav-item dropdown">
                      <a href="{{ url('user') }}/#" class="nav-link dropdown-toggle" data-toggle="dropdown">Profil</a>
                      {{-- <i class="fa fa-angle-down"></i> --}}

                      {{-- <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ url('user') }}/faq.html">Sambutan Kepala Sekolah</a></li>
                        <li><a href="{{ url('user') }}/about.html">Sejarah SMK</a></li>
                        <li><a href="{{ url('user') }}/team.html">Visi & Misi SMK</a></li>
                        <li><a href="{{ url('user') }}/testimonials.html">Struktur Organisasi</a></li>
                      </ul> --}}
                    </li>

                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Keahlian</a>
                    </li>

                    <li class="nav-item dropdown">
                      <a href="{{ url('user') }}/#" class="nav-link dropdown-toggle" data-toggle="dropdown">Ekstrakulikuler<i
                          class="fa fa-angle-down"></i></a>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ url('user') }}/news-left-sidebar.html">Balap karung</a></li>
                        <li><a href="{{ url('user') }}/news-right-sidebar.html">Balap Sendok</a></li>
                        <li><a href="{{ url('user') }}/news-single.html">Balap Kaleci</a></li>
                      </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Gallery</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a href="#news" class="nav-link dropdown-toggle" data-toggle="dropdown">Berita</a>
                    </li>

                    </li>
                    <li class="nav-item"><a class="nav-item dropdown-toggle"></a></li>
                  </ul>
                </div>
              </nav>
            </div>
            <!--/ Col end -->
          </div>
          <!--/ Row end -->

          <div class="nav-search">
            <span id="search"><i class="fa fa-search"></i></span>
          </div><!-- Search end -->

          <div class="search-block" style="display: none;">
            <label for="search-field" class="w-100 mb-0">
              <input type="text" class="form-control" id="search-field" placeholder="Type what you want and enter">
            </label>
            <span class="search-close">&times;</span>
          </div><!-- Site search end -->
        </div>
        <!--/ Container end -->

      </div>
      <!--/ Navigation end -->
    </header>
    <!--/ Header end -->

    <div class="banner-carousel banner-carousel-1 mb-0">
      <div class="banner-carousel-item" style="background-image: url(user/images/santa.png">
        <div class="slider-content">
          <div class="container h-100">
            <div class="row align-items-center h-100">
              <div class="col-md-12 text-center">

                <h2 class="slide-title" data-animation-in="slideInLeft">Selamat Datang di</h2>
                <h3 class="slide-sub-title" data-animation-in="slideInRight">{{ $setting_web['website_name'] }}</h3>
                <p data-animation-in="slideInLeft" data-duration-in="1.2">
                  <a href="{{ url('user') }}/services.html" class="slider btn btn-primary">Selengkapnya</a>
                  <a href="{{ url('user') }}/contact.html" class="slider btn btn-primary border">Kontak Kami</a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="banner-carousel-item" style="background-image: url(user/images/confi.png">
        <div class="slider-content text-left">
          <div class="container h-100">
            <div class="row align-items-center h-100">
              <div class="col-md-12">

                <h2 class="slide-title-box" data-animation-in="slideInDown">Bingung menentukan Masa depan?</h2>
                <h3 class="slide-title" data-animation-in="fadeIn">Pilihan anda sederhana</h3>
                <h3 class="slide-sub-title" data-animation-in="slideInLeft">AYO ! MASUK SMK IDEAN</h3>
                <p class="slider-description lead" data-animation-in="slideInRight">Kami akan menangani kebingungan anda itu untuk menentukan bagaimana anda mencapai kesuksesan.</p>
                <p data-animation-in="slideInRight">
                  <a href="{{ url('user') }}/services.html" class="slider btn btn-primary border">Selengkapnya</a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="banner-carousel-item" style="background-image: url(user/images/map.png">
        <div class="slider-content text-right">
          <div class="container h-100">
            <div class="row align-items-center h-100">
              <div class="col-md-12">
                <h2 class="slide-title" data-animation-in="slideInDown">Meet Our Engineers</h2>
                <h3 class="slide-sub-title" data-animation-in="fadeIn">We believe sustainability</h3>
                <p class="slider-description lead" data-animation-in="slideInRight">Ayo ! bangunlah impianmu atau orang lain akan mempekerjakanmu untuk membangun impian mereka</p>
                <div data-animation-in="slideInLeft">
                  <a href="{{ url('user') }}/about.html" class="slider btn btn-primary border" aria-label="learn-more-about-us">Selengkapnya</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Action end -->

    <section id="ts-features" class="ts-features">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <div class="ts-intro">
              <h1 class="into-title">About Us</h1>
              <h3 class="into-sub-title">{{ $about_us['about_us'] }}</h3>
              <p>{{ $about_us['description'] }}</p>
            </div><!-- Intro box end -->

            <div class="gap-20"></div>

            <div class="row">
                @foreach ($about_us['skills'] as $skill)
                <div class="col-md-6">
                  <div class="ts-service-box">
                    <span class="ts-service-icon">
                      <i class="{{ $skill['icon'] }}"></i>
                    </span>
                    <div class="ts-service-box-content">
                      <h3 class="service-box-title">{{ $skill['title'] }}</h3>
                    </div>
                  </div><!-- Service 1 end -->
                </div><!-- col end -->
                @endforeach
            </div><!-- Content row 1 end -->
          </div><!-- Col end -->

          <div class="col-lg-6 mt-4 mt-lg-0">
            <h3 class="into-sub-title">Visi & Misi</h3>
            {{-- <p>Minim Austin 3 wolf moon scenester aesthetic, umami odio pariatur bitters. Pop-up occaecat taxidermy
              street art, tattooed beard literally.</p> --}}

            <div class="accordion accordion-group" id="our-values-accordion">
              <div class="card">
                <div class="card-header p-0 bg-transparent" id="headingOne">
                  <h2 class="mb-0">
                    <button class="btn btn-block text-left" type="button" data-toggle="collapse"
                      data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      Visi
                    </button>
                  </h2>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                  data-parent="#our-values-accordion">
                  <div class="card-body">
                      {{ $about_us['visi'] }}
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header p-0 bg-transparent" id="headingTwo">
                  <h2 class="mb-0">
                    <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse"
                      data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      Misi
                    </button>
                  </h2>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#our-values-accordion">
                  <div class="card-body">
                    {{ $about_us['misi'] }}
                  </div>
                </div>
              </div>
            </div>
            <!--/ Accordion end -->

          </div><!-- Col end -->
        </div><!-- Row end -->
      </div><!-- Container end -->
    </section><!-- Feature are end -->

    <section id="facts" class="facts-area dark-bg">
      <div class="container">
        <div class="facts-wrapper">
          <div class="row">
            <div class="col-md-3 col-sm-6 ts-facts">
              <div class="ts-facts-img">
                <img loading="lazy" src="{{ url('user') }}/images/icon-image/fact1.png" alt="facts-img">
              </div>
              <div class="ts-facts-content">
                <h2 class="ts-facts-num"><span class="counterUp" data-count="1789">0</span></h2>
                <h3 class="ts-facts-title">Total Projects</h3>
              </div>
            </div><!-- Col end -->

            <div class="col-md-3 col-sm-6 ts-facts mt-5 mt-sm-0">
              <div class="ts-facts-img">
                <img loading="lazy" src="{{ url('user') }}/images/icon-image/fact2.png" alt="facts-img">
              </div>
              <div class="ts-facts-content">
                <h2 class="ts-facts-num"><span class="counterUp" data-count="647">0</span></h2>
                <h3 class="ts-facts-title">Staff Members</h3>
              </div>
            </div><!-- Col end -->

            <div class="col-md-3 col-sm-6 ts-facts mt-5 mt-md-0">
              <div class="ts-facts-img">
                <img loading="lazy" src="{{ url('user') }}/images/icon-image/fact3.png" alt="facts-img">
              </div>
              <div class="ts-facts-content">
                <h2 class="ts-facts-num"><span class="counterUp" data-count="4000">0</span></h2>
                <h3 class="ts-facts-title">Hours of Work</h3>
              </div>
            </div><!-- Col end -->

            <div class="col-md-3 col-sm-6 ts-facts mt-5 mt-md-0">
              <div class="ts-facts-img">
                <img loading="lazy" src="{{ url('user') }}/images/icon-image/fact4.png" alt="facts-img">
              </div>
              <div class="ts-facts-content">
                <h2 class="ts-facts-num"><span class="counterUp" data-count="44">0</span></h2>
                <h3 class="ts-facts-title">Countries Experience</h3>
              </div>
            </div><!-- Col end -->

          </div> <!-- Facts end -->
        </div>
        <!--/ Content row end -->
      </div>
      <!--/ Container end -->
    </section><!-- Facts end -->

    <section id="ts-service-area" class="ts-service-area pb-0">
      <div class="container">
        <div class="row text-center">
          <div class="col-12">
            <h2 class="section-title">We Are Specialists In</h2>
            <h3 class="section-sub-title">Program Keahlian</h3>
          </div>
        </div>
        <!--/ Title row end -->

        <div class="row">
          <div class="col-lg-4">
            <div class="ts-service-box d-flex">
              <div class="ts-service-box-img">
                <img loading="lazy" src="{{ url('user') }}/images/icon-image/service-icon1.png" alt="service-icon">
              </div>
              <div class="ts-service-box-info">
                <h3 class="service-box-title"><a href="{{ url('user') }}/#">Desain Pemodelan Infromasi Bangunan</a></h3>
                <p>
                  Desain Pemodelan dan Informasi Bangunan adalah jurusan yang mempelajari tentang perencanaan bangunan, pelaksanaan pembuatan gedung dan perbaikan gedung. Kegiatannya adalah belajar menggambar rumah, gedung dan apartemen, menghitung biaya bangunan, melaksankan pembangunan dan memelihara kontruksi bangunan. <a href="instagram.com/indrabesset"> Selengkapnya</a></p>
              </div>
            </div><!-- Service 1 end -->

            <div class="ts-service-box d-flex">
              <div class="ts-service-box-img">
                <img loading="lazy" src="{{ url('user') }}/images/icon-image/service-icon2.png" alt="service-icon">
              </div>
              <div class="ts-service-box-info">
                <h3 class="service-box-title"><a href="{{ url('user') }}/#">Multimedia</a></h3>
                <p>Multimedia merupakan salah satu kompetensi keahlian di SMK yang termasuk dalam rumpun bidang keahlian Teknik Komputer dan Informatika. Multimedia sendiri mempelajari tentang kombinasi atau penggabungan dari beberapa media seperti teks, audio, video, animasi, gambar yang disajikan dalam penggunaan komputer dengan bantuan tools dan link sehingga menghasilkan presentasi yang menarik. <a href="instagram.com/indrabesset"> Selengkapnya</a></p>
              </div>
            </div><!-- Service 2 end -->

            <div class="ts-service-box d-flex">
              <div class="ts-service-box-img">
                <img loading="lazy" src="{{ url('user') }}/images/icon-image/service-icon3.png" alt="service-icon">
              </div>
              <div class="ts-service-box-info">
                <h3 class="service-box-title"><a href="{{ url('user') }}/#">Otomatisasi Tata Kelola Perkantoran</a></h3>
                <p>Otomatisasi & Tata Kelola Perkantoran atau biasa disingkat OTKP, dulu bernama Administrasi Perkantoran atau AP merupakan salah satu cabang bidang keahlian Bisnis dan Manajemen mempelajari tentang Pengetikan naskah atau dokumen, Penanganan telepon, Penataan dan pengelolaan surat atau dokumen, Penataan dan pengelolaan arsip, Penanganan perjalanan bisnis, Penanganan dana kas kecil, Penyiapan pertemuan atau rapat, Penanganan aplikasi, dan Penanganan informasi melalui internet. <a href="instagram.com/indrabesset"> Selengkapnya</a></p>
              </div>
            </div><!-- Service 3 end -->

            <div class="ts-service-box d-flex">
              <div class="ts-service-box-img">
                <img loading="lazy" src="{{ url('user') }}/images/icon-image/service-icon3.png" alt="service-icon">
              </div>
              <div class="ts-service-box-info">
                <h3 class="service-box-title"><a href="{{ url('user') }}/#">Rekayasa Perangkat Lunak</a></h3>
                <p>Rekayasa Perangkat Lunak merupakan pekerjaan yang berperan untuk anda agar mampu memenuhi kebutuhan klien salah satunya mengubah hasil photoshop menjadi file wordpress. Anda bisa bekerja sebagai IT consultant yang berperan dalam perencanaan dan pengevaluasian penerapan IT pada sebuah organisasi. <a href="instagram.com/indrabesset"> Selengkapnya</a></p>
              </div>
            </div><!-- Service 4 end -->

          </div><!-- Col end -->

          <div class="col-lg-4 text-center">
            <img loading="lazy" class="img-fluid" src="{{ url('user') }}/images/services/service-center.jpg" alt="service-avater-image">
          </div><!-- Col end -->

          <div class="col-lg-4 mt-5 mt-lg-0 mb-4 mb-lg-0">
            <div class="ts-service-box d-flex">
              <div class="ts-service-box-img">
                <img loading="lazy" src="{{ url('user') }}/images/icon-image/service-icon4.png" alt="service-icon">
              </div>
              <div class="ts-service-box-info">
                <h3 class="service-box-title"><a href="{{ url('user') }}/#">Teknik Bisnis Sepeda Motor</a></h3>
                <p>Teknis Bisnis Sepeda Motor merupakan pekerjaan yang berperan untuk anda agar mampu memenuhi konsumen salah satunya memperbaiki kerusakan yang ada pada motor konsumen dan juga dapat menciptakan produk baru pada sepeda motor. <a href="instagram.com/indrabesset"> Selengkapnya</a> </p>
              </div>
            </div><!-- Service 5 end -->

            <div class="ts-service-box d-flex">
              <div class="ts-service-box-img">
                <img loading="lazy" src="{{ url('user') }}/images/icon-image/service-icon5.png" alt="service-icon">
              </div>
              <div class="ts-service-box-info">
                <h3 class="service-box-title"><a href="{{ url('user') }}/#">Teknik Elektronika Industri</a></h3>
                <p>Mendidik tenaga kerja yang mampu bersaing baik tingkat nasional, regional, maupun global. Menciptakan tenaga yang mampu berwirausaha. Mendidik tenaga terampil yang mampu menciptakan lapangan kerja. Mengembangkan unit produksi yang professional. <a href="instagram.com/indrabesset"> Selengkapnya</a></p>
              </div>
            </div><!-- Service 6 end -->

            <div class="ts-service-box d-flex">
              <div class="ts-service-box-img">
                <img loading="lazy" src="{{ url('user') }}/images/icon-image/service-icon5.png" alt="service-icon">
              </div>
              <div class="ts-service-box-info">
                <h3 class="service-box-title"><a href="{{ url('user') }}/#">Teknik Komputer Jaringan</a></h3>
                <p>kompetensi keahlian teknik komputer dan jaringan adalah membekali peserta didik dengan keterampilan, pengetahuan dan sikap agar kompeten : ... Menginstalasi perangkat komputer, menginstall sistem operasi dan aplikasi. <a href="instagram.com/indrabesset"> Selengkapnya</a></p>
              </div>
            </div><!-- Service 7 end -->

            <div class="ts-service-box d-flex">
              <div class="ts-service-box-img">
                <img loading="lazy" src="{{ url('user') }}/images/icon-image/service-icon6.png" alt="service-icon">
              </div>
              <div class="ts-service-box-info">
                <h3 class="service-box-title"><a href="{{ url('user') }}/#">Teknik Kendaraan Ringan Otomotif</a></h3>
                <p>TekniK Kendaraan Ringan Otomotif bertujuan Mengembangkan dan mengaplikasikan dalam karyanya secara mandiri dan dapat mengisi lowongan pekerjaan di dunia usaha dan dunia industri sebagai tenaga kerja tingkat menengah yang handal. <a href="instagram.com/indrabesset"> Selengkapnya</a></p>
              </div>
            </div><!-- Service 8 end -->
          </div><!-- Col end -->
        </div><!-- Content row end -->

      </div>
      <!--/ Container end -->
    </section><!-- Service end -->

    <section id="project-area" class="project-area solid-bg">
      <div class="container">
        <div class="row text-center">
          <div class="col-lg-12">
            <h2 class="section-title">Work of Excellence</h2>
            <h3 class="section-sub-title">Galeri</h3>
          </div>
        </div>
        <!--/ Title row end -->

        <div class="row">
          <div class="col-12">
            <div class="shuffle-btn-group">
              <label class="active" for="all">
                <input type="radio" name="shuffle-filter" id="all" value="all" checked="checked">Tampilkan Semua
              </label>
              @foreach ($category_gallery as $category)
                <label for="{{ $category }}">
                    <input type="radio" name="shuffle-filter" id="{{ $category }}" value="{{ $category }}">{{ $category }}
                </label>
              @endforeach
            </div><!-- project filter end -->


            <div class="row shuffle-wrapper">
              <div class="col-1 shuffle-sizer"></div>

              @foreach ($galleries as $gallery)
              <div class="col-lg-4 col-sm-6 shuffle-item" data-groups="{{ json_encode(explode(',',$gallery->categories)) }}">
                <div class="project-img-container">
                  <a class="gallery-popup" href="{{ url("storage/galleries/$gallery->picture") }}" aria-label="project-img">
                    <img class="img-fluid" src="{{ url("storage/galleries/$gallery->picture") }}" alt="project-img">
                    <span class="gallery-icon"><i class="fa fa-plus"></i></span>
                  </a>
                  <div class="project-item-info">
                    <div class="project-item-info-content">
                      <h3 class="project-item-title">
                        <a href="javascript:void(0)">{{ $gallery->title }}</a>
                      </h3>
                      <p class="project-cat">{{ str_replace(',',', ',$gallery->categories) }}</p>
                    </div>
                  </div>
                </div>
              </div><!-- shuffle item 1 end -->
              @endforeach

            </div><!-- shuffle end -->
          </div>

          <div class="col-12">
            <div class="general-btn text-center">
              <a class="btn btn-primary" href="{{ url('user') }}/projects.html">View All Projects</a>
            </div>
          </div>

        </div><!-- Content row end -->
      </div>
      <!--/ Container end -->
    </section><!-- Project area end -->

    <section class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <h3 class="column-title">Testimonials</h3>

            <div id="testimonial-slide" class="testimonial-slide">
              <div class="item">
                <div class="quote-item">
                  <span class="quote-text">
                    Question ran over her cheek When she reached the first hills of the Italic Mountains, she had a last
                    view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the
                    subline of her own road.
                  </span>

                  <div class="quote-item-footer">
                    <img loading="lazy" class="testimonial-thumb" src="{{ url('user') }}/images/clients/testimonial1.png"
                      alt="testimonial">
                    <div class="quote-item-info">
                      <h3 class="quote-author">Gabriel Denis</h3>
                      <span class="quote-subtext">Chairman, OKT</span>
                    </div>
                  </div>
                </div><!-- Quote item end -->
              </div>
              <!--/ Item 1 end -->

              <div class="item">
                <div class="quote-item">
                  <span class="quote-text">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor inci done idunt ut
                    labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitoa tion ullamco laboris
                    nisi aliquip consequat.
                  </span>

                  <div class="quote-item-footer">
                    <img loading="lazy" class="testimonial-thumb" src="{{ url('user') }}/images/clients/testimonial2.png"
                      alt="testimonial">
                    <div class="quote-item-info">
                      <h3 class="quote-author">Weldon Cash</h3>
                      <span class="quote-subtext">CFO, First Choice</span>
                    </div>
                  </div>
                </div><!-- Quote item end -->
              </div>
              <!--/ Item 2 end -->

              <div class="item">
                <div class="quote-item">
                  <span class="quote-text">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor inci done idunt ut
                    labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitoa tion ullamco laboris
                    nisi ut commodo consequat.
                  </span>

                  <div class="quote-item-footer">
                    <img loading="lazy" class="testimonial-thumb" src="{{ url('user') }}/images/clients/testimonial3.png"
                      alt="testimonial">
                    <div class="quote-item-info">
                      <h3 class="quote-author">Minter Puchan</h3>
                      <span class="quote-subtext">Director, AKT</span>
                    </div>
                  </div>
                </div><!-- Quote item end -->
              </div>
              <!--/ Item 3 end -->

            </div>
            <!--/ Testimonial carousel end-->
          </div><!-- Col end -->

          <div class="col-lg-6 mt-5 mt-lg-0">

            <h3 class="column-title">Happy Clients</h3>

            <div class="row all-clients">
              <div class="col-sm-4 col-6">
                <figure class="clients-logo">
                  <a href="{{ url('user') }}/#!"><img loading="lazy" class="img-fluid" src="{{ url('user') }}/images/clients/client1.png"
                      alt="clients-logo" /></a>
                </figure>
              </div><!-- Client 1 end -->

              <div class="col-sm-4 col-6">
                <figure class="clients-logo">
                  <a href="{{ url('user') }}/#!"><img loading="lazy" class="img-fluid" src="{{ url('user') }}/images/clients/client2.png"
                      alt="clients-logo" /></a>
                </figure>
              </div><!-- Client 2 end -->

              <div class="col-sm-4 col-6">
                <figure class="clients-logo">
                  <a href="{{ url('user') }}/#!"><img loading="lazy" class="img-fluid" src="{{ url('user') }}/images/clients/client3.png"
                      alt="clients-logo" /></a>
                </figure>
              </div><!-- Client 3 end -->

              <div class="col-sm-4 col-6">
                <figure class="clients-logo">
                  <a href="{{ url('user') }}/#!"><img loading="lazy" class="img-fluid" src="{{ url('user') }}/images/clients/client4.png"
                      alt="clients-logo" /></a>
                </figure>
              </div><!-- Client 4 end -->

              <div class="col-sm-4 col-6">
                <figure class="clients-logo">
                  <a href="{{ url('user') }}/#!"><img loading="lazy" class="img-fluid" src="{{ url('user') }}/images/clients/client5.png"
                      alt="clients-logo" /></a>
                </figure>
              </div><!-- Client 5 end -->

              <div class="col-sm-4 col-6">
                <figure class="clients-logo">
                  <a href="{{ url('user') }}/#!"><img loading="lazy" class="img-fluid" src="{{ url('user') }}/images/clients/client6.png"
                      alt="clients-logo" /></a>
                </figure>
              </div><!-- Client 6 end -->

            </div><!-- Clients row end -->

          </div><!-- Col end -->

        </div>
        <!--/ Content row end -->
      </div>
      <!--/ Container end -->
    </section><!-- Content end -->

    <section class="subscribe no-padding">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <div class="subscribe-call-to-acton">
              <h3>Can We Help?</h3>
              <h4>(+9) 847-291-4353</h4>
            </div>
          </div><!-- Col end -->

          <div class="col-md-8">
            <div class="ts-newsletter row align-items-center">
              <div class="col-md-5 newsletter-introtext">
                <h4 class="text-white mb-0">Newsletter Sign-up</h4>
                <p class="text-white">Latest updates and news</p>
              </div>

              <div class="col-md-7 newsletter-form">
                <form action="#" method="post">
                  <div class="form-group">
                    <label for="newsletter-email" class="content-hidden">Newsletter Email</label>
                    <input type="email" name="email" id="newsletter-email" class="form-control form-control-lg"
                      placeholder="Your your email and hit enter" autocomplete="off">
                  </div>
                </form>
              </div>
            </div><!-- Newsletter end -->
          </div><!-- Col end -->

        </div><!-- Content row end -->
      </div>
      <!--/ Container end -->
    </section>
    <!--/ subscribe end -->

    <section id="news" class="news">
      <div class="container">
        <div class="row text-center">
          <div class="col-12">
            <h2 class="section-title">Work of Excellence</h2>
            <h3 class="section-sub-title">Berita terkini</h3>
          </div>
        </div>
        <!--/ Title row end -->

        <div class="row">
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="latest-post">
              <div class="latest-post-media">
                <a href="{{ url('user') }}/news-single.html" class="latest-post-img">
                  <img loading="lazy" class="img-fluid" src="{{ url('user') }}/images/news/news1.jpg" alt="img">
                </a>
              </div>
              <div class="post-body">
                <h4 class="post-title">
                  <a href="{{ url('user') }}/news-single.html" class="d-inline-block">We Just Completes $17.6 million Medical Clinic in
                    Mid-Missouri</a>
                </h4>
                <div class="latest-post-meta">
                  <span class="post-item-date">
                    <i class="fa fa-clock-o"></i> July 20, 2017
                  </span>
                </div>
              </div>
            </div><!-- Latest post end -->
          </div><!-- 1st post col end -->

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="latest-post">
              <div class="latest-post-media">
                <a href="{{ url('user') }}/news-single.html" class="latest-post-img">
                  <img loading="lazy" class="img-fluid" src="{{ url('user') }}/images/news/news2.jpg" alt="img">
                </a>
              </div>
              <div class="post-body">
                <h4 class="post-title">
                  <a href="{{ url('user') }}/news-single.html" class="d-inline-block">Thandler Airport Water Reclamation Facility
                    Expansion Project Named</a>
                </h4>
                <div class="latest-post-meta">
                  <span class="post-item-date">
                    <i class="fa fa-clock-o"></i> June 17, 2017
                  </span>
                </div>
              </div>
            </div><!-- Latest post end -->
          </div><!-- 2nd post col end -->

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="latest-post">
              <div class="latest-post-media">
                <a href="{{ url('user') }}/news-single.html" class="latest-post-img">
                  <img loading="lazy" class="img-fluid" src="{{ url('user') }}/images/news/news3.jpg" alt="img">
                </a>
              </div>
              <div class="post-body">
                <h4 class="post-title">
                  <a href="{{ url('user') }}/news-single.html" class="d-inline-block">Silicon Bench and Cornike Begin Construction Solar
                    Facilities</a>
                </h4>
                <div class="latest-post-meta">
                  <span class="post-item-date">
                    <i class="fa fa-clock-o"></i> Aug 13, 2017
                  </span>
                </div>
              </div>
            </div><!-- Latest post end -->
          </div><!-- 3rd post col end -->
        </div>
        <!--/ Content row end -->

        <div class="general-btn text-center mt-4">
          <a class="btn btn-primary" href="{{ url('user') }}/news-left-sidebar.html">See All Posts</a>
        </div>

      </div>
      <!--/ Container end -->
    </section>
    <!--/ News end -->

    <footer id="footer" class="footer bg-overlay">
      <div class="footer-main">
        <div class="container">
          <div class="row justify-content-between">
            <div class="col-lg-4 col-md-6 footer-widget footer-about">
              <h3 class="widget-title">Tentang Kami</h3>
              <img loading="lazy" width="200px" class="footer-logo" src="{{ url('user') }}/images/footer-logo.png" alt="Constra">
              <p>SMK IDEAN Tasikmalaya merupakan salah satu lembaga pendidikan menengah kejuruan di Kabupaten Tasikmalaya Jawa Barat yang menyelenggarakan Program Pendidikan Kejuruan selama 3 Tahun.</p>
              <div class="footer-social">
                <ul>
                  <li><a href="https://facebook.com/erwinanugrah" aria-label="Facebook"><i
                        class="fab fa-facebook-f"></i></a></li>
                  <li><a href="https://twitter.com/erwinanugrah" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                  </li>
                  <li><a href="https://instagram.com/indrabesset" aria-label="Instagram"><i
                        class="fab fa-instagram"></i></a></li>
                  <li><a href="https://youtube.com/bryanx19" aria-label="Youtube"><i class="fab fa-youtube"></i></a>
                  </li>
                </ul>
              </div><!-- Footer social end -->
            </div><!-- Col end -->

            <div class="col-lg-4 col-md-6 footer-widget mt-5 mt-md-0">
              <h3 class="widget-title">Waktu Sekolah</h3>
              <div class="working-hours">
                Waktu sekolah ialah 6 hari dari hari senin-sabtu, kecuali hari libur besar. Hubungi kami jika Anda memiliki keadaan darurat, seperti izin ataupun sakit.
                <br><br> Senin - Selasa: <span class="text-right"> 07:00 - 15:00 </span>
                <br> Rabu - Kamis: <span class="text-right"> 07:00 - 14:00 </span>
                <br> Jum'at: <span class="text-right"> 07:00 - 11:00 </span>
                <br> Sabtu: <span class="text-right"> 07:00 - 14:00 </span>
              </div>
            </div><!-- Col end -->

            <div class="col-lg-3 col-md-6 mt-5 mt-lg-0 footer-widget">
              <h3 class="widget-title">Services</h3>
              <ul class="list-arrow">
                <li><a href="{{ url('user') }}/service-single.html">Pre-Construction</a></li>
                <li><a href="{{ url('user') }}/service-single.html">General Contracting</a></li>
                <li><a href="{{ url('user') }}/service-single.html">Construction Management</a></li>
                <li><a href="{{ url('user') }}/service-single.html">Design and Build</a></li>
                <li><a href="{{ url('user') }}/service-single.html">Self-Perform Construction</a></li>
              </ul>
            </div><!-- Col end -->
          </div><!-- Row end -->
        </div><!-- Container end -->
      </div><!-- Footer main end -->

      <div class="copyright">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-6">
              <div class="copyright-info text-center text-md-left">
                <span>Copyright &copy;
                  <script>
                    document.write(new Date().getFullYear())
                  </script>, Designed &amp; Developed by <a href="https://instagram.com/indrabesset">BryanX</a>
                </span>
              </div>
            </div>

            <div class="col-md-6">
              <div class="footer-menu text-center text-md-right">
                <ul class="list-unstyled">
                  <li><a href="{{ url('user') }}/about.html">About</a></li>
                  <li><a href="{{ url('user') }}/team.html">Our people</a></li>
                  <li><a href="{{ url('user') }}/faq.html">Faq</a></li>
                  <li><a href="{{ url('user') }}/news-left-sidebar.html">Blog</a></li>
                  <li><a href="{{ url('user') }}/pricing.html">Pricing</a></li>
                </ul>
              </div>
            </div>
          </div><!-- Row end -->

          <div id="back-to-top" data-spy="affix" data-offset-top="10" class="back-to-top position-fixed">
            <button class="btn btn-primary" title="Back to Top">
              <i class="fa fa-angle-double-up"></i>
            </button>
          </div>

        </div><!-- Container end -->
      </div><!-- Copyright end -->
    </footer><!-- Footer end -->


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
    <script src="{{ url('user') }}/https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU" defer></script>
    <!-- Google Map Plugin-->
    <script src="{{ url('user') }}/plugins/google-map/map.js" defer></script>

    <!-- Template custom -->
    <script src="{{ url('user') }}/js/script.js"></script>

  </div><!-- Body inner end -->
</body>

</html>
