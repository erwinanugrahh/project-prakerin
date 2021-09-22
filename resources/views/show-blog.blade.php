@extends('layouts.guest')

@section('content')
    <!--/ Header end -->
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

              <div class="tags-area d-flex align-items-center justify-content-between">
                <div class="share-items">
                  <ul class="post-social-icons list-unstyled">
                    <li class="social-icons-head">Share:</li>
                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                  </ul>
                </div>
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

          {{-- <div class="comments-form border-box">
            <h3 class="title-normal">Add a comment</h3>

            <form role="form">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="message" class="w-100"><textarea class="form-control required-field" id="message" placeholder="Your Comment" rows="10" required></textarea></label>
                  </div>
                </div><!-- Col 12 end -->

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="name" class="w-100"><input class="form-control" name="name" id="name" placeholder="Your Name" type="text" required></label>
                  </div>
                </div><!-- Col 4 end -->

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="email" class="w-100"><input class="form-control" name="email" id="email" placeholder="Your Email" type="email" required></label>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="website" class="w-100"><input class="form-control" id="website" placeholder="Your Website" type="text" required></label>
                  </div>
                </div>

              </div><!-- Form row end -->
              <div class="clearfix">
                <button class="btn btn-primary" type="submit" aria-label="post-comment">Post Comment</button>
              </div>
            </form><!-- Form end -->
          </div><!-- Comments form end --> --}}

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
