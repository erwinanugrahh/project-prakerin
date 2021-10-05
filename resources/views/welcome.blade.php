@extends('layouts.guest')

@section('content')
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
                <a href="{{ url('/contact') }}" class="slider btn btn-primary border">Kontak Kami</a>
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
              <h3 class="slide-sub-title" data-animation-in="slideInLeft">AYO ! MASUK {{ $setting_web['website_name'] }}</h3>
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
  <section id="about-us" class="about-us">
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
  <section id="projects" class="projects-area dark-bg">
    <div class="container">
      <div class="facts-wrapper">
        <div class="row">
          <div class="col-md-3 col-sm-6 ts-facts">
            <div class="ts-facts-img">
              <img loading="lazy" src="{{ url('user') }}/images/icon-image/fact1.png" alt="facts-img">
            </div>
            <div class="ts-facts-content">
              <h2 class="ts-facts-num"><span class="counterUp" data-count="{{ App\Models\User::where('role', 'teacher')->count() }}">0</span></h2>
              <h3 class="ts-facts-title">Total Guru</h3>
            </div>
          </div><!-- Col end -->

          <div class="col-md-3 col-sm-6 ts-facts mt-5 mt-sm-0">
            <div class="ts-facts-img">
              <img loading="lazy" src="{{ url('user') }}/images/icon-image/fact2.png" alt="facts-img">
            </div>
            <div class="ts-facts-content">
              <h2 class="ts-facts-num"><span class="counterUp" data-count="{{ App\Models\User::where('role', 'student')->count() }}">0</span></h2>
              <h3 class="ts-facts-title">Total Murid</h3>
            </div>
          </div><!-- Col end -->

          <div class="col-md-3 col-sm-6 ts-facts mt-5 mt-md-0">
            <div class="ts-facts-img">
              <img loading="lazy" src="{{ url('user') }}/images/icon-image/fact3.png" alt="facts-img">
            </div>
            <div class="ts-facts-content">
              <h2 class="ts-facts-num"><span class="counterUp" data-count="{{ App\Models\Major::get()->count() }}">0</span></h2>
              <h3 class="ts-facts-title">Total Kelas</h3>
            </div>
          </div><!-- Col end -->

          <div class="col-md-3 col-sm-6 ts-facts mt-5 mt-md-0">
            <div class="ts-facts-img">
              <img loading="lazy" src="{{ url('user') }}/images/icon-image/fact4.png" alt="facts-img">
            </div>
            <div class="ts-facts-content">
              <h2 class="ts-facts-num"><span class="counterUp" data-count="{{ App\Models\Blog::where('status', 'accepted')->count() }}">0</span></h2>
              <h3 class="ts-facts-title">Total Blog</h3>
            </div>
          </div><!-- Col end -->
        </div> <!-- Facts end -->
      </div>
      <!--/ Content row end -->
    </div>
    <!--/ Container end -->
  </section><!-- Facts end -->

  <section id="program-keahlian" class="program-keahlian pb-0">
    <div class="container">
      <div class="row text-center">
        <div class="col-12">
          <h2 class="section-title">We Are Specialists In</h2>
          <h3 class="section-sub-title">Program Keahlian</h3>
        </div>
      </div>
      <!--/ Title row end -->

      <div class="row">
        @foreach (App\Models\Skill::all() as $skill)
            <div class="col-lg-4">
                <div class="ts-service-box d-flex">
                    <div class="ts-service-box-img">
                        <img loading="lazy" src="{{ url($skill->logo) }}" width="80" alt="service-icon">
                    </div>
                    <div class="ts-service-box-info">
                    <h3 class="service-box-title"><a>{{ $skill->name }}</a></h3>
                    <p>
                        {{ \Str::limit($skill->description, 50, '...') }}
                        @if (strlen(strip_tags($skill->description)) > 50)
                        <a href="/skill/{{ $skill->id }}" class="btn btn-primary btn-sm">selengkapnya</a>
                        @endif
                    </p>
                    </div>
                </div><!-- Service 1 end -->
            </div><!-- Col end -->
        @endforeach
      </div><!-- Content row end -->
    </div>
    <!--/ Container end -->
  </section><!-- Service end -->

  <section id="gallery" class="gallery solid-bg">
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
          <h3 class="column-title">Testimoni Alumni</h3>

          <div id="testimonial-slide" class="testimonial-slide">
              @foreach (App\Models\Testimonial::all() as $testimonial)
              <div class="item">
                <div class="quote-item">
                  <span class="quote-text">{{ $testimonial->quote }}</span>

                  <div class="quote-item-footer">
                    <img loading="lazy" class="testimonial-thumb" src="{{ asset('storage/testimonials/'.$testimonial->photo) }}"
                      alt="testimonial">
                    <div class="quote-item-info">
                      <h3 class="quote-author">{{ $testimonial->name }}</h3>
                      <span class="quote-subtext">{{ $testimonial->title.', '.$testimonial->company }}</span>
                    </div>
                  </div>
                </div><!-- Quote item end -->
              </div>
              <!--/ Item end -->
              @endforeach
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
          @foreach (App\Models\Blog::latest()->take(3)->get() as $blog)
          <div class="col-lg-4 col-md-6 mb-4">
              <div class="latest-post">
              <div class="latest-post-media">
                  <a href="{{ url("/blogs/{$blog->category->slug}/$blog->slug") }}" class="latest-post-img">
                  <img loading="lazy" class="img-fluid" src="{{ asset("images/banners/$blog->banner") }}" alt="img">
                  </a>
              </div>
              <div class="post-body">
                  <h4 class="post-title">
                  <a href="{{ url("/blogs/{$blog->category->slug}/$blog->slug") }}" class="d-inline-block">{{ $blog->title }}</a>
                  </h4>
                  <div class="latest-post-meta">
                  <span class="post-item-date">
                      <i class="fa fa-clock-o"></i> {{ $blog->getCreatedDate() }}
                  </span>
                  </div>
              </div>
              </div><!-- Latest post end -->
          </div><!-- 1st post col end -->
          @endforeach
      </div>
      <!--/ Content row end -->

      <div class="general-btn text-center mt-4">
        <a class="btn btn-primary" href="{{ url('blogs') }}">Lihat Semua Berita</a>
      </div>

    </div>
    <!--/ Container end -->
  </section>
  <!--/ News end -->
@endsection

@push('js')
<script>
    $('.halaman-scroll').on('click', function(e){
        var tujuan = $(this).attr('href');
        var element = $(tujuan);
        $('html, body').animate({
            scrollTop: element.offset().top-10
        });
        $('#navbar-collapse').removeClass('show')
        e.preventDefault();
    });
</script>
@endpush
