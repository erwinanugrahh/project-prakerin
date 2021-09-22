@extends('layouts.guest')

@section('content')
<div id="banner-area" class="banner-area" style="background-image:url(/user/images/banner/banner1.jpg)">
    <div class="banner-text">
      <div class="container">
          <div class="row">
            <div class="col-lg-12">
                <div class="banner-heading">
                  <h1 class="banner-title">Portal Berita</h1>
                  <nav aria-label="breadcrumb">
                      <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Berita</li>
                      </ol>
                  </nav>
                </div>
            </div><!-- Col end -->
          </div><!-- Row end -->
      </div><!-- Container end -->
    </div><!-- Banner text end -->
  </div><!-- Banner area end -->

  <section id="main-container" class="main-container">
    <div class="container">
      <div class="row">
        @livewire('blog-index', ['mBlogs'=>$blogs])

        <div class="col-lg-4">

          <div class="sidebar sidebar-right">
            @livewire('recent-post')

            @livewire('list-category')

            {{-- <div class="widget">
              <h3 class="widget-title">Archives </h3>
              <ul class="arrow nav nav-tabs">
                <li><a href="#">Feburay 2016</a></li>
                <li><a href="#">January 2016</a></li>
                <li><a href="#">December 2015</a></li>
                <li><a href="#">November 2015</a></li>
                <li><a href="#">October 2015</a></li>
              </ul>
            </div><!-- Archives end -->

            <div class="widget widget-tags">
              <h3 class="widget-title">Tags </h3>

              <ul class="list-unstyled">
                <li><a href="#">Construction</a></li>
                <li><a href="#">Design</a></li>
                <li><a href="#">Project</a></li>
                <li><a href="#">Building</a></li>
                <li><a href="#">Finance</a></li>
                <li><a href="#">Safety</a></li>
                <li><a href="#">Contracting</a></li>
                <li><a href="#">Planning</a></li>
              </ul>
            </div><!-- Tags end --> --}}


          </div><!-- Sidebar end -->
        </div><!-- Sidebar Col end -->

      </div><!-- Main row end -->

    </div><!-- Container end -->
  </section><!-- Main container end -->
@endsection
