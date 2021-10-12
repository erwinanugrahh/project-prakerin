@extends('layouts.guest')

@section('content')
<style>
    div#social-links {
        padding-left: 0;
        max-width: 500px;
    }
    div#social-links ul{
        padding-left: 0;
    }
    div#social-links ul li {
        display: inline-block;
        list-style: none;
        margin-right: 5px;
        margin-top: 10px;
    }
    div#social-links ul li a {
        padding: 0px 7px;
        border: 1px solid #ccc;
        border-radius: 7px;
        margin: 1px;
        font-size: 30px;
        color: #222;
        background-color: #ccc;
    }
</style>
<!--/ Header end -->
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
                        <li class="breadcrumb-item"><a href="#">Berita</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $blog->title }}</li>
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

        <div class="col-lg-8 mb-5 mb-lg-0">

          <div class="post-content post-single">
            <div class="post-media post-image">
              <img loading="lazy" src="{{ asset('images/banners/'.$blog->banner) }}" class="img-fluid" alt="post-image">
            </div>

            <div class="post-body">
              <div class="entry-header">
                <div class="post-meta">
                  <span class="post-author">
                    <i class="far fa-user"></i><a href="#"> {{ $blog->blogger->name }}</a>
                  </span>
                  <span class="post-cat">
                    <i class="far fa-folder-open"></i><a href="#"> {{ $blog->category->name }}</a>
                  </span>
                  <span class="post-meta-date"><i class="far fa-calendar"></i> {{ $blog->getCreatedDate() }}</span>
                  <span class="post-meta-date"><i class="far fa-eye"></i> {{ views($blog)->count() }}</span>
                  <span class="post-comment"><i class="far fa-comment"></i> {{ $blog->comments->count() }}<a href="#"
                      class="comments-link">Komentar</a></span>
                </div>
                <h2 class="entry-title">
                  {{ $blog->title }}
                </h2>
              </div><!-- header end -->

              <div class="entry-content">
                  {!! $blog->content !!}
              </div>

              <div class="tags-area">
                <span class="font-weight-bold">Share : </span>
                {!! Share::page(url('/blogs/'. $blog->slug), 'Blog '.$blog->title)->facebook()->twitter()->whatsapp()->linkedin() !!}
                {{-- <div class="share-items">
                  <ul class="post-social-icons list-unstyled">
                    <li class="social-icons-head">Share:</li>
                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-whatsapp bg-success"></i></a></li>
                    <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                  </ul>
                </div> --}}
                @if ($blog->tags!='')
                <div class="post-tags">
                    @foreach (explode(',', $blog->tags) as $tag)
                    <a href="/blogs?tag={{ $tag }}">{{ $tag }}</a>
                    @endforeach
                </div>
                @endif
              </div>

            </div><!-- post-body end -->
          </div><!-- post content end -->

          <div class="author-box d-nlock d-sm-flex">
            <div class="author-img mb-4 mb-md-0">
              <img loading="lazy" src="{{ $blog->blogger->avatar }}" alt="author">
            </div>
            <div class="author-info">
              <h3>{{ $blog->blogger->name }}<span>{{ $blog->blogger->role }}</span></h3>
              <p class="mb-2">{{ $blog->blogger->about }}</p>
              <p class="author-url mb-0">Website: <span><a href="#">http://www.example.com</a></span></p>
            </div>
          </div> <!-- Author box end -->

          @comments(['model'=>$blog])
        </div><!-- Content Col end -->

        <div class="col-lg-4">

          <div class="sidebar sidebar-right">
            @livewire('recent-post')

            @livewire('list-category')

          </div><!-- Sidebar end -->
        </div><!-- Sidebar Col end -->

      </div><!-- Main row end -->

    </div><!-- Conatiner end -->
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
