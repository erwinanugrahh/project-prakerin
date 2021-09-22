<div class="col-lg-8 mb-5 mb-lg-0">
    @if ($blogs->count()==0)
        <div class="alert alert-warning">Berita tidak ada.</div>
    @else
    @foreach ($blogs as $blog)
        <div class="post">
            <div class="post-media post-image">
                <img loading="lazy" src="{{ asset('images/banners/'.$blog->banner) }}" class="img-fluid" alt="post-image">
            </div>

            <div class="post-body">
            <div class="entry-header">
                <div class="post-meta">
                    <span class="post-author">
                        <i class="far fa-user"></i><a href="javascript:void(0)"> {{ $blog->blogger->name }}</a>
                    </span>
                    <span class="post-cat">
                        <i class="far fa-folder-open"></i><a href="#"> {{ $blog->category->name }}</a>
                    </span>
                    <span class="post-meta-date"><i class="far fa-calendar"></i> {{ $blog->getCreatedDate() }}</span>
                    <span class="post-meta-date"><i class="far fa-eye"></i> {{ views($blog)->count() }}</span>
                    <span class="post-comment"><i class="far fa-comment"></i> {{ $blog->comments->count() }}
                        <a href="javascript:void(0)" class="comments-link">Komentar</a>
                    </span>
                </div>
                <h2 class="entry-title">
                    <a href="{{ url("blogs/{$blog->category->slug}/$blog->slug") }}">{{ $blog->title }}</a>
                </h2>
            </div><!-- header end -->

            <div class="entry-content">
            <p>
                {{  \Str::limit(strip_tags($blog->content), 400, '...')  }}
            </p>
            </div>

            <div class="post-footer">
                <a href="{{ url("blogs/{$blog->category->slug}/$blog->slug") }}" class="btn btn-primary">Lanjutkan Baca</a>
            </div>

            </div><!-- post-body end -->
        </div><!-- 1st post end -->
    @endforeach
    @endif

    {{ $blogs->links('blog-pagination') }}
</div><!-- Content Col end -->
