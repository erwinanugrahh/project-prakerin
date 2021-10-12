@extends('layouts.guest')

@section('content')
<div id="banner-area" class="banner-area" style="background-image:url(/user/images/banner/banner-1.jpg)">
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

          </div><!-- Sidebar end -->
        </div><!-- Sidebar Col end -->

      </div><!-- Main row end -->

    </div><!-- Container end -->
  </section><!-- Main container end -->
@endsection

@push('js')
<script>
    $('.halaman-scroll').on('click', function(){
        var tujuan = $(this).attr('href');
        window.location.href = '/'+tujuan
    })
</script>
@endpush
