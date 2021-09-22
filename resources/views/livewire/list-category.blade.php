<div>
    <style>
        .widget .nav-tabs li a.active{
            color: #ffb600;
        }
    </style>
    <div class="widget">
        <h3 class="widget-title">Kategori</h3>
        <ul class="arrow nav nav-tabs">
          <li><a href="{{ url('blogs') }}" class="{{ $categorySlug==''?'active':'' }}">Semua</a></li>
          @foreach ($categories as $category)
              <li><a href="{{ url('blogs/'.$category->slug) }}" class="{{ $categorySlug==$category->slug?'active':'' }}">{{ $category->name }}</a></li>
          @endforeach
        </ul>
    </div><!-- Categories end -->
</div>
