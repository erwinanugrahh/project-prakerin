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
                        <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>

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
