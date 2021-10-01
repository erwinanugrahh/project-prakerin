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
                        <a href="#about-us" class="nav-link dropdown-toggle halaman-scroll" data-toggle="dropdown">Profil</a>
                        </li>

                        @can('smk')
                        <li class="nav-item dropdown">
                            <a href="#program-keahlian" class="nav-link dropdown-toggle halaman-scroll" data-toggle="dropdown">Keahlian</a>
                        </li>
                        @endcan

                        <li class="nav-item dropdown">
                            <a href="#gallery" class="nav-link dropdown-toggle halaman-scroll" data-toggle="dropdown">Gallery</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a href="#news" class="nav-link dropdown-toggle halaman-scroll" data-toggle="dropdown">Berita</a>
                        </li>
                        @can('open-pengumuman')
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle halaman-scroll" data-toggle="dropdown">PPDB <i class="fa fa-angle-down pl-2"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/ppdb') }}">Pengumuman</a></li>
                                @can('open-ppdb')
                                <li><a href="{{ url('/ppdb/daftar') }}">Daftar</a></li>
                                @endcan
                            </ul>
                        </li>
                        @endcan

                        <li class="nav-item"><a class="nav-item dropdown-toggle halaman-scroll"></a></li>

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
            <form action="" method="get">
                <label for="search-field" class="w-100 mb-0">
                    <input type="text" name="search" class="form-control" id="search-field" placeholder="Type what you want and enter">
                </label>
                <span class="search-close">&times;</span>
            </form>
        </div><!-- Site search end -->
    </div>
    <!--/ Container end -->

</div>
<!--/ Navigation end -->
