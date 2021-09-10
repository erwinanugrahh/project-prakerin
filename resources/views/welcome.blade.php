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
                <p class="info-text">46462 Singaparna, Tasikmalaya</p>
              </li>
            </ul>
          </div>
          <!--/ Top info end -->

          <div class="col-lg-4 col-md-4 top-social text-center text-md-right">
            <ul class="list-unstyled">
              <li>
                <a title="Facebook" href="{{ url('user') }}/https://facebbok.com/themefisher.com">
                  <span class="social-icon"><i class="fab fa-facebook-f"></i></span>
                </a>
                <a title="Twitter" href="{{ url('user') }}/https://twitter.com/themefisher.com">
                  <span class="social-icon"><i class="fab fa-twitter"></i></span>
                </a>
                <a title="Instagram" href="{{ url('user') }}/https://instagram.com/themefisher.com">
                  <span class="social-icon"><i class="fab fa-instagram"></i></span>
                </a>
                <a title="Linkdin" href="{{ url('user') }}/https://github.com/themefisher.com">
                  <span class="social-icon"><i class="fab fa-github"></i></span>
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
                  <img loading="lazy" src="{{ url('user') }}/images/logo.png" alt="Constra">
                </a>
              </div><!-- logo end -->

              <div class="col-lg-9 header-right">
                <ul class="top-info-box">
                  <li>
                    <div class="info-box">
                      <div class="info-box-content">
                        <p class="info-box-title">Telepon</p>
                        <p class="info-box-subtitle"><a href="{{ url('user') }}/tel: (+62)81234567890">(+62)81234567890</a></p>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="info-box">
                      <div class="info-box-content">
                        <p class="info-box-title">Email</p>
                        <p class="info-box-subtitle"><a href="{{ url('user') }}/smkidean@gmail.com">smkidean@gmail.com</a></p>
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
                    <a class="btn btn-info" href="{{ route('login') }}">Login</a>
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
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Berita</a>
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
                <h3 class="slide-sub-title" data-animation-in="slideInRight">SMK IDEAN TASIKMALAYA</h3>
                <p data-animation-in="slideInLeft" data-duration-in="1.2">
                  <a href="{{ url('user') }}/services.html" class="slider btn btn-primary">Our Services</a>
                  <a href="{{ url('user') }}/contact.html" class="slider btn btn-primary border">Contact Now</a>
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
                <h3 class="slide-title" data-animation-in="fadeIn">Pilihan anda sangat sederhana</h3>
                <h3 class="slide-sub-title" data-animation-in="slideInLeft">AYO ! MASUK SMK IDEAN</h3>
                <p class="slider-description lead" data-animation-in="slideInRight">Kami akan menangani kegagalan Anda itu menentukan bagaimana Anda mencapai kesuksesan.</p>
                <p data-animation-in="slideInRight">
                  <a href="{{ url('user') }}/services.html" class="slider btn btn-primary border">Our Services</a>
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
                  <a href="{{ url('user') }}/contact.html" class="slider btn btn-primary" aria-label="contact-with-us">Get Free Quote</a>
                  <a href="{{ url('user') }}/about.html" class="slider btn btn-primary border" aria-label="learn-more-about-us">Learn
                    more</a>
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
              <h3 class="into-sub-title">We deliver landmark projects</h3>
              <p>We are rethoric question ran over her cheek When she reached the first hills of the Italic Mountains,
                she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village
                and the subline of her own road, the Line Lane.</p>
            </div><!-- Intro box end -->

            <div class="gap-20"></div>

            <div class="row">
              <div class="col-md-6">
                <div class="ts-service-box">
                  <span class="ts-service-icon">
                    <i class="fas fa-trophy"></i>
                  </span>
                  <div class="ts-service-box-content">
                    <h3 class="service-box-title">We've Repution for Excellence</h3>
                  </div>
                </div><!-- Service 1 end -->
              </div><!-- col end -->

              <div class="col-md-6">
                <div class="ts-service-box">
                  <span class="ts-service-icon">
                    <i class="fas fa-sliders-h"></i>
                  </span>
                  <div class="ts-service-box-content">
                    <h3 class="service-box-title">We Build Partnerships</h3>
                  </div>
                </div><!-- Service 2 end -->
              </div><!-- col end -->
            </div><!-- Content row 1 end -->

            <div class="row">
              <div class="col-md-6">
                <div class="ts-service-box">
                  <span class="ts-service-icon">
                    <i class="fas fa-thumbs-up"></i>
                  </span>
                  <div class="ts-service-box-content">
                    <h3 class="service-box-title">Guided by Commitment</h3>
                  </div>
                </div><!-- Service 1 end -->
              </div><!-- col end -->

              <div class="col-md-6">
                <div class="ts-service-box">
                  <span class="ts-service-icon">
                    <i class="fas fa-users"></i>
                  </span>
                  <div class="ts-service-box-content">
                    <h3 class="service-box-title">A Team of Professionals</h3>
                  </div>
                </div><!-- Service 2 end -->
              </div><!-- col end -->
            </div><!-- Content row 1 end -->
          </div><!-- Col end -->

          <div class="col-lg-6 mt-4 mt-lg-0">
            <h3 class="into-sub-title">Our Values</h3>
            <p>Minim Austin 3 wolf moon scenester aesthetic, umami odio pariatur bitters. Pop-up occaecat taxidermy
              street art, tattooed beard literally.</p>

            <div class="accordion accordion-group" id="our-values-accordion">
              <div class="card">
                <div class="card-header p-0 bg-transparent" id="headingOne">
                  <h2 class="mb-0">
                    <button class="btn btn-block text-left" type="button" data-toggle="collapse"
                      data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      Safety
                    </button>
                  </h2>
                </div>

                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                  data-parent="#our-values-accordion">
                  <div class="card-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3
                    wolf moon officia aute, non cupidata
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header p-0 bg-transparent" id="headingTwo">
                  <h2 class="mb-0">
                    <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse"
                      data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      Customer Service
                    </button>
                  </h2>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#our-values-accordion">
                  <div class="card-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3
                    wolf moon officia aute, non cupidata
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header p-0 bg-transparent" id="headingThree">
                  <h2 class="mb-0">
                    <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse"
                      data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                      Integrity
                    </button>
                  </h2>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                  data-parent="#our-values-accordion">
                  <div class="card-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3
                    wolf moon officia aute, non cupidata
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
            <h3 class="section-sub-title">What We Do</h3>
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
                <h3 class="service-box-title"><a href="{{ url('user') }}/#">Home Construction</a></h3>
                <p>Lorem ipsum dolor sit amet consectetur adipiscing elit Integer adipiscing erat</p>
              </div>
            </div><!-- Service 1 end -->

            <div class="ts-service-box d-flex">
              <div class="ts-service-box-img">
                <img loading="lazy" src="{{ url('user') }}/images/icon-image/service-icon2.png" alt="service-icon">
              </div>
              <div class="ts-service-box-info">
                <h3 class="service-box-title"><a href="{{ url('user') }}/#">Building Remodels</a></h3>
                <p>Lorem ipsum dolor sit amet consectetur adipiscing elit Integer adipiscing erat</p>
              </div>
            </div><!-- Service 2 end -->

            <div class="ts-service-box d-flex">
              <div class="ts-service-box-img">
                <img loading="lazy" src="{{ url('user') }}/images/icon-image/service-icon3.png" alt="service-icon">
              </div>
              <div class="ts-service-box-info">
                <h3 class="service-box-title"><a href="{{ url('user') }}/#">Interior Design</a></h3>
                <p>Lorem ipsum dolor sit amet consectetur adipiscing elit Integer adipiscing erat</p>
              </div>
            </div><!-- Service 3 end -->

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
                <h3 class="service-box-title"><a href="{{ url('user') }}/#">Exterior Design</a></h3>
                <p>Lorem ipsum dolor sit amet consectetur adipiscing elit Integer adipiscing erat</p>
              </div>
            </div><!-- Service 4 end -->

            <div class="ts-service-box d-flex">
              <div class="ts-service-box-img">
                <img loading="lazy" src="{{ url('user') }}/images/icon-image/service-icon5.png" alt="service-icon">
              </div>
              <div class="ts-service-box-info">
                <h3 class="service-box-title"><a href="{{ url('user') }}/#">Renovation</a></h3>
                <p>Lorem ipsum dolor sit amet consectetur adipiscing elit Integer adipiscing erat</p>
              </div>
            </div><!-- Service 5 end -->

            <div class="ts-service-box d-flex">
              <div class="ts-service-box-img">
                <img loading="lazy" src="{{ url('user') }}/images/icon-image/service-icon6.png" alt="service-icon">
              </div>
              <div class="ts-service-box-info">
                <h3 class="service-box-title"><a href="{{ url('user') }}/#">Safety Management</a></h3>
                <p>Lorem ipsum dolor sit amet consectetur adipiscing elit Integer adipiscing erat</p>
              </div>
            </div><!-- Service 6 end -->
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
            <h3 class="section-sub-title">Recent Projects</h3>
          </div>
        </div>
        <!--/ Title row end -->

        <div class="row">
          <div class="col-12">
            <div class="shuffle-btn-group">
              <label class="active" for="all">
                <input type="radio" name="shuffle-filter" id="all" value="all" checked="checked">Show All
              </label>
              <label for="commercial">
                <input type="radio" name="shuffle-filter" id="commercial" value="commercial">Commercial
              </label>
              <label for="education">
                <input type="radio" name="shuffle-filter" id="education" value="education">Education
              </label>
              <label for="government">
                <input type="radio" name="shuffle-filter" id="government" value="government">Government
              </label>
              <label for="infrastructure">
                <input type="radio" name="shuffle-filter" id="infrastructure" value="infrastructure">Infrastructure
              </label>
              <label for="residential">
                <input type="radio" name="shuffle-filter" id="residential" value="residential">Residential
              </label>
              <label for="healthcare">
                <input type="radio" name="shuffle-filter" id="healthcare" value="healthcare">Healthcare
              </label>
            </div><!-- project filter end -->


            <div class="row shuffle-wrapper">
              <div class="col-1 shuffle-sizer"></div>

              <div class="col-lg-4 col-sm-6 shuffle-item" data-groups="[&quot;government&quot;,&quot;healthcare&quot;]">
                <div class="project-img-container">
                  <a class="gallery-popup" href="{{ url('user') }}/images/projects/project1.jpg" aria-label="project-img">
                    <img class="img-fluid" src="{{ url('user') }}/images/projects/project1.jpg" alt="project-img">
                    <span class="gallery-icon"><i class="fa fa-plus"></i></span>
                  </a>
                  <div class="project-item-info">
                    <div class="project-item-info-content">
                      <h3 class="project-item-title">
                        <a href="{{ url('user') }}/projects-single.html">Capital Teltway Building</a>
                      </h3>
                      <p class="project-cat">Commercial, Interiors</p>
                    </div>
                  </div>
                </div>
              </div><!-- shuffle item 1 end -->

              <div class="col-lg-4 col-sm-6 shuffle-item" data-groups="[&quot;healthcare&quot;]">
                <div class="project-img-container">
                  <a class="gallery-popup" href="{{ url('user') }}/images/projects/project2.jpg" aria-label="project-img">
                    <img class="img-fluid" src="{{ url('user') }}/images/projects/project2.jpg" alt="project-img">
                    <span class="gallery-icon"><i class="fa fa-plus"></i></span>
                  </a>
                  <div class="project-item-info">
                    <div class="project-item-info-content">
                      <h3 class="project-item-title">
                        <a href="{{ url('user') }}/projects-single.html">Ghum Touch Hospital</a>
                      </h3>
                      <p class="project-cat">Healthcare</p>
                    </div>
                  </div>
                </div>
              </div><!-- shuffle item 2 end -->

              <div class="col-lg-4 col-sm-6 shuffle-item"
                data-groups="[&quot;infrastructure&quot;,&quot;commercial&quot;]">
                <div class="project-img-container">
                  <a class="gallery-popup" href="{{ url('user') }}/images/projects/project3.jpg" aria-label="project-img">
                    <img class="img-fluid" src="{{ url('user') }}/images/projects/project3.jpg" alt="project-img">
                    <span class="gallery-icon"><i class="fa fa-plus"></i></span>
                  </a>
                  <div class="project-item-info">
                    <div class="project-item-info-content">
                      <h3 class="project-item-title">
                        <a href="{{ url('user') }}/projects-single.html">TNT East Facility</a>
                      </h3>
                      <p class="project-cat">Government</p>
                    </div>
                  </div>
                </div>
              </div><!-- shuffle item 3 end -->

              <div class="col-lg-4 col-sm-6 shuffle-item"
                data-groups="[&quot;education&quot;,&quot;infrastructure&quot;]">
                <div class="project-img-container">
                  <a class="gallery-popup" href="{{ url('user') }}/images/projects/project4.jpg" aria-label="project-img">
                    <img class="img-fluid" src="{{ url('user') }}/images/projects/project4.jpg" alt="project-img">
                    <span class="gallery-icon"><i class="fa fa-plus"></i></span>
                  </a>
                  <div class="project-item-info">
                    <div class="project-item-info-content">
                      <h3 class="project-item-title">
                        <a href="{{ url('user') }}/projects-single.html">Narriot Headquarters</a>
                      </h3>
                      <p class="project-cat">Infrastructure</p>
                    </div>
                  </div>
                </div>
              </div><!-- shuffle item 4 end -->

              <div class="col-lg-4 col-sm-6 shuffle-item"
                data-groups="[&quot;infrastructure&quot;,&quot;education&quot;]">
                <div class="project-img-container">
                  <a class="gallery-popup" href="{{ url('user') }}/images/projects/project5.jpg" aria-label="project-img">
                    <img class="img-fluid" src="{{ url('user') }}/images/projects/project5.jpg" alt="project-img">
                    <span class="gallery-icon"><i class="fa fa-plus"></i></span>
                  </a>
                  <div class="project-item-info">
                    <div class="project-item-info-content">
                      <h3 class="project-item-title">
                        <a href="{{ url('user') }}/projects-single.html">Kalas Metrorail</a>
                      </h3>
                      <p class="project-cat">Infrastructure</p>
                    </div>
                  </div>
                </div>
              </div><!-- shuffle item 5 end -->

              <div class="col-lg-4 col-sm-6 shuffle-item" data-groups="[&quot;residential&quot;]">
                <div class="project-img-container">
                  <a class="gallery-popup" href="{{ url('user') }}/images/projects/project6.jpg" aria-label="project-img">
                    <img class="img-fluid" src="{{ url('user') }}/images/projects/project6.jpg" alt="project-img">
                    <span class="gallery-icon"><i class="fa fa-plus"></i></span>
                  </a>
                  <div class="project-item-info">
                    <div class="project-item-info-content">
                      <h3 class="project-item-title">
                        <a href="{{ url('user') }}/projects-single.html">Ancraft Avenue House</a>
                      </h3>
                      <p class="project-cat">Residential</p>
                    </div>
                  </div>
                </div>
              </div><!-- shuffle item 6 end -->
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
            <h3 class="section-sub-title">Recent Projects</h3>
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
              <h3 class="widget-title">About Us</h3>
              <img loading="lazy" width="200px" class="footer-logo" src="{{ url('user') }}/images/footer-logo.png" alt="Constra">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor inci done idunt ut
                labore et dolore magna aliqua.</p>
              <div class="footer-social">
                <ul>
                  <li><a href="{{ url('user') }}/https://facebook.com/themefisher" aria-label="Facebook"><i
                        class="fab fa-facebook-f"></i></a></li>
                  <li><a href="{{ url('user') }}/https://twitter.com/themefisher" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                  </li>
                  <li><a href="{{ url('user') }}/https://instagram.com/themefisher" aria-label="Instagram"><i
                        class="fab fa-instagram"></i></a></li>
                  <li><a href="{{ url('user') }}/https://github.com/themefisher" aria-label="Github"><i class="fab fa-github"></i></a>
                  </li>
                </ul>
              </div><!-- Footer social end -->
            </div><!-- Col end -->

            <div class="col-lg-4 col-md-6 footer-widget mt-5 mt-md-0">
              <h3 class="widget-title">Working Hours</h3>
              <div class="working-hours">
                We work 7 days a week, every day excluding major holidays. Contact us if you have an emergency, with our
                Hotline and Contact form.
                <br><br> Monday - Friday: <span class="text-right">10:00 - 16:00 </span>
                <br> Saturday: <span class="text-right">12:00 - 15:00</span>
                <br> Sunday and holidays: <span class="text-right">09:00 - 12:00</span>
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
                  </script>, Designed &amp; Developed by <a href="{{ url('user') }}/https://themefisher.com">Themefisher</a>
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

{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>
                        @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>
                    @endauth
                </div>
            @endif

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                    <svg viewBox="0 0 651 192" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-16 w-auto text-gray-700 sm:h-20">
                        <g clip-path="url(#clip0)" fill="#EF3B2D">
                            <path d="M248.032 44.676h-16.466v100.23h47.394v-14.748h-30.928V44.676zM337.091 87.202c-2.101-3.341-5.083-5.965-8.949-7.875-3.865-1.909-7.756-2.864-11.669-2.864-5.062 0-9.69.931-13.89 2.792-4.201 1.861-7.804 4.417-10.811 7.661-3.007 3.246-5.347 6.993-7.016 11.239-1.672 4.249-2.506 8.713-2.506 13.389 0 4.774.834 9.26 2.506 13.459 1.669 4.202 4.009 7.925 7.016 11.169 3.007 3.246 6.609 5.799 10.811 7.66 4.199 1.861 8.828 2.792 13.89 2.792 3.913 0 7.804-.955 11.669-2.863 3.866-1.908 6.849-4.533 8.949-7.875v9.021h15.607V78.182h-15.607v9.02zm-1.431 32.503c-.955 2.578-2.291 4.821-4.009 6.73-1.719 1.91-3.795 3.437-6.229 4.582-2.435 1.146-5.133 1.718-8.091 1.718-2.96 0-5.633-.572-8.019-1.718-2.387-1.146-4.438-2.672-6.156-4.582-1.719-1.909-3.032-4.152-3.938-6.73-.909-2.577-1.36-5.298-1.36-8.161 0-2.864.451-5.585 1.36-8.162.905-2.577 2.219-4.819 3.938-6.729 1.718-1.908 3.77-3.437 6.156-4.582 2.386-1.146 5.059-1.718 8.019-1.718 2.958 0 5.656.572 8.091 1.718 2.434 1.146 4.51 2.674 6.229 4.582 1.718 1.91 3.054 4.152 4.009 6.729.953 2.577 1.432 5.298 1.432 8.162-.001 2.863-.479 5.584-1.432 8.161zM463.954 87.202c-2.101-3.341-5.083-5.965-8.949-7.875-3.865-1.909-7.756-2.864-11.669-2.864-5.062 0-9.69.931-13.89 2.792-4.201 1.861-7.804 4.417-10.811 7.661-3.007 3.246-5.347 6.993-7.016 11.239-1.672 4.249-2.506 8.713-2.506 13.389 0 4.774.834 9.26 2.506 13.459 1.669 4.202 4.009 7.925 7.016 11.169 3.007 3.246 6.609 5.799 10.811 7.66 4.199 1.861 8.828 2.792 13.89 2.792 3.913 0 7.804-.955 11.669-2.863 3.866-1.908 6.849-4.533 8.949-7.875v9.021h15.607V78.182h-15.607v9.02zm-1.432 32.503c-.955 2.578-2.291 4.821-4.009 6.73-1.719 1.91-3.795 3.437-6.229 4.582-2.435 1.146-5.133 1.718-8.091 1.718-2.96 0-5.633-.572-8.019-1.718-2.387-1.146-4.438-2.672-6.156-4.582-1.719-1.909-3.032-4.152-3.938-6.73-.909-2.577-1.36-5.298-1.36-8.161 0-2.864.451-5.585 1.36-8.162.905-2.577 2.219-4.819 3.938-6.729 1.718-1.908 3.77-3.437 6.156-4.582 2.386-1.146 5.059-1.718 8.019-1.718 2.958 0 5.656.572 8.091 1.718 2.434 1.146 4.51 2.674 6.229 4.582 1.718 1.91 3.054 4.152 4.009 6.729.953 2.577 1.432 5.298 1.432 8.162 0 2.863-.479 5.584-1.432 8.161zM650.772 44.676h-15.606v100.23h15.606V44.676zM365.013 144.906h15.607V93.538h26.776V78.182h-42.383v66.724zM542.133 78.182l-19.616 51.096-19.616-51.096h-15.808l25.617 66.724h19.614l25.617-66.724h-15.808zM591.98 76.466c-19.112 0-34.239 15.706-34.239 35.079 0 21.416 14.641 35.079 36.239 35.079 12.088 0 19.806-4.622 29.234-14.688l-10.544-8.158c-.006.008-7.958 10.449-19.832 10.449-13.802 0-19.612-11.127-19.612-16.884h51.777c2.72-22.043-11.772-40.877-33.023-40.877zm-18.713 29.28c.12-1.284 1.917-16.884 18.589-16.884 16.671 0 18.697 15.598 18.813 16.884h-37.402zM184.068 43.892c-.024-.088-.073-.165-.104-.25-.058-.157-.108-.316-.191-.46-.056-.097-.137-.176-.203-.265-.087-.117-.161-.242-.265-.345-.085-.086-.194-.148-.29-.223-.109-.085-.206-.182-.327-.252l-.002-.001-.002-.002-35.648-20.524a2.971 2.971 0 00-2.964 0l-35.647 20.522-.002.002-.002.001c-.121.07-.219.167-.327.252-.096.075-.205.138-.29.223-.103.103-.178.228-.265.345-.066.089-.147.169-.203.265-.083.144-.133.304-.191.46-.031.085-.08.162-.104.25-.067.249-.103.51-.103.776v38.979l-29.706 17.103V24.493a3 3 0 00-.103-.776c-.024-.088-.073-.165-.104-.25-.058-.157-.108-.316-.191-.46-.056-.097-.137-.176-.203-.265-.087-.117-.161-.242-.265-.345-.085-.086-.194-.148-.29-.223-.109-.085-.206-.182-.327-.252l-.002-.001-.002-.002L40.098 1.396a2.971 2.971 0 00-2.964 0L1.487 21.919l-.002.002-.002.001c-.121.07-.219.167-.327.252-.096.075-.205.138-.29.223-.103.103-.178.228-.265.345-.066.089-.147.169-.203.265-.083.144-.133.304-.191.46-.031.085-.08.162-.104.25-.067.249-.103.51-.103.776v122.09c0 1.063.568 2.044 1.489 2.575l71.293 41.045c.156.089.324.143.49.202.078.028.15.074.23.095a2.98 2.98 0 001.524 0c.069-.018.132-.059.2-.083.176-.061.354-.119.519-.214l71.293-41.045a2.971 2.971 0 001.489-2.575v-38.979l34.158-19.666a2.971 2.971 0 001.489-2.575V44.666a3.075 3.075 0 00-.106-.774zM74.255 143.167l-29.648-16.779 31.136-17.926.001-.001 34.164-19.669 29.674 17.084-21.772 12.428-43.555 24.863zm68.329-76.259v33.841l-12.475-7.182-17.231-9.92V49.806l12.475 7.182 17.231 9.92zm2.97-39.335l29.693 17.095-29.693 17.095-29.693-17.095 29.693-17.095zM54.06 114.089l-12.475 7.182V46.733l17.231-9.92 12.475-7.182v74.537l-17.231 9.921zM38.614 7.398l29.693 17.095-29.693 17.095L8.921 24.493 38.614 7.398zM5.938 29.632l12.475 7.182 17.231 9.92v79.676l.001.005-.001.006c0 .114.032.221.045.333.017.146.021.294.059.434l.002.007c.032.117.094.222.14.334.051.124.088.255.156.371a.036.036 0 00.004.009c.061.105.149.191.222.288.081.105.149.22.244.314l.008.01c.084.083.19.142.284.215.106.083.202.178.32.247l.013.005.011.008 34.139 19.321v34.175L5.939 144.867V29.632h-.001zm136.646 115.235l-65.352 37.625V148.31l48.399-27.628 16.953-9.677v33.862zm35.646-61.22l-29.706 17.102V66.908l17.231-9.92 12.475-7.182v33.841z"/>
                        </g>
                    </svg>
                </div>

                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        <div class="p-6">
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold"><a href="https://laravel.com/docs" class="underline text-gray-900 dark:text-white">Documentation</a></div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    Laravel has wonderful, thorough documentation covering every aspect of the framework. Whether you are new to the framework or have previous experience with Laravel, we recommend reading all of the documentation from beginning to end.
                                </div>
                            </div>
                        </div>

                        <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold"><a href="https://laracasts.com" class="underline text-gray-900 dark:text-white">Laracasts</a></div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    Laracasts offers thousands of video tutorials on Laravel, PHP, and JavaScript development. Check them out, see for yourself, and massively level up your development skills in the process.
                                </div>
                            </div>
                        </div>

                        <div class="p-6 border-t border-gray-200 dark:border-gray-700">
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold"><a href="https://laravel-news.com/" class="underline text-gray-900 dark:text-white">Laravel News</a></div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    Laravel News is a community driven portal and newsletter aggregating all of the latest and most important news in the Laravel ecosystem, including new package releases and tutorials.
                                </div>
                            </div>
                        </div>

                        <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-l">
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold text-gray-900 dark:text-white">Vibrant Ecosystem</div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    Laravel's robust library of first-party tools and libraries, such as <a href="https://forge.laravel.com" class="underline">Forge</a>, <a href="https://vapor.laravel.com" class="underline">Vapor</a>, <a href="https://nova.laravel.com" class="underline">Nova</a>, and <a href="https://envoyer.io" class="underline">Envoyer</a> help you take your projects to the next level. Pair them with powerful open source libraries like <a href="https://laravel.com/docs/billing" class="underline">Cashier</a>, <a href="https://laravel.com/docs/dusk" class="underline">Dusk</a>, <a href="https://laravel.com/docs/broadcasting" class="underline">Echo</a>, <a href="https://laravel.com/docs/horizon" class="underline">Horizon</a>, <a href="https://laravel.com/docs/sanctum" class="underline">Sanctum</a>, <a href="https://laravel.com/docs/telescope" class="underline">Telescope</a>, and more.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
                    <div class="text-center text-sm text-gray-500 sm:text-left">
                        <div class="flex items-center">
                            <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" class="-mt-px w-5 h-5 text-gray-400">
                                <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>

                            <a href="https://laravel.bigcartel.com" class="ml-1 underline">
                                Shop
                            </a>

                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="ml-4 -mt-px w-5 h-5 text-gray-400">
                                <path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>

                            <a href="https://github.com/sponsors/taylorotwell" class="ml-1 underline">
                                Sponsor
                            </a>
                        </div>
                    </div>

                    <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                    </div>
                </div>
            </div>
        </div>
    </body>
</html> --}}
