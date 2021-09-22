<div>
    <div class="widget recent-posts">
        <h3 class="widget-title">Berita Terkini</h3>
        <ul class="list-unstyled">
          @foreach (App\Models\Blog::latest()->take(3)->get() as $blog)
          <li class="d-flex align-items-center">
            <div class="posts-thumb">
              <a href="{{ url('blogs/'.$blog->slug) }}"><img loading="lazy" alt="img" src="{{ asset("images/banners/$blog->banner") }}"></a>
            </div>
            <div class="post-info">
              <h4 class="entry-title">
                <a href="{{ url('blogs/'.$blog->slug) }}">{{ $blog->title }}</a>
              </h4>
            </div>
          </li><!-- 1st post end-->
          @endforeach
        </ul>

    </div><!-- Recent post end -->
</div>
