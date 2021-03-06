<footer id="footer" class="footer bg-overlay">
    <div class="footer-main">
        <div class="container">
            <div class="row justify-content-between">
            <div class="col-lg-4 col-md-6 footer-widget footer-about">
                <h3 class="widget-title">Tentang Kami</h3>
                @if (file_exists(public_path('logo.png')))
                        <img loading="lazy" width="200px" class="footer-logo" src="{{ url('logo.png') }}" alt="Constra">
                    @else
                        <img loading="lazy" width="200px" class="footer-logo" src="{{ url('user') }}/images/logo.png" alt="Constra">
                    @endif
                <p>{{ setting('about_us')['description'] }}</p>
                <div class="footer-social">
                <ul>
                    @foreach (setting('social_media')['items'] as $item)
                    <li>
                        <a title="{{ $item['name'] }}" target="_blank" href="{{ $item['url'] }}">
                            <span class="social-icon"><i class="{{ $item['icon'] }}"></i></span>
                        </a>
                    </li>
                    @endforeach
                </ul>
                </div><!-- Footer social end -->
            </div><!-- Col end -->

            <div class="col-lg-4 col-md-6 footer-widget mt-5 mt-md-0">
                <h3 class="widget-title">Waktu Sekolah</h3>
                <div class="working-hours">
                Waktu sekolah ialah 6 hari dari hari senin-sabtu, kecuali hari libur besar. Hubungi kami jika Anda memiliki keadaan darurat, seperti izin ataupun sakit.
                <br><br> Senin - Selasa: <span class="text-right"> 07:00 - 15:00 </span>
                <br> Rabu - Kamis: <span class="text-right"> 07:00 - 14:00 </span>
                <br> Jum'at: <span class="text-right"> 07:00 - 11:00 </span>
                <br> Sabtu: <span class="text-right"> 07:00 - 14:00 </span>
                </div>
            </div><!-- Col end -->

            <div class="col-lg-3 col-md-6 mt-5 mt-lg-0 footer-widget">
                <h3 class="widget-title">Menu</h3>
                <ul class="list-arrow">
                    <li><a href="#about-us" class="halaman-scroll">Profil</a></li>
                    @can('smk')
                    <li><a href="#program-keahlian" class="halaman-scroll">Keahlian</a></li>
                    @endcan
                    <li><a href="#gallery" class="halaman-scroll">Gallery</a></li>
                    <li><a href="#news" class="halaman-scroll">Berita</a></li>
                    @can('open-pengumuman')
                    <li><a href="{{ url('/ppdb') }}">PPDB</a></li>
                    @endcan
                </ul>
            </div><!-- Col end -->
            </div><!-- Row end -->
        </div><!-- Container end -->
    </div><!-- Footer main end -->

    <div class="copyright">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6">
            <div class="copyright-info text-center text-md-left">
              <span>Copyright &copy;
                <script>
                  document.write(new Date().getFullYear())
                </script>, Designed &amp; Developed by <a href="https://instagram.com/indrabesset">SMK IDEAN</a>
              </span>
            </div>
          </div>

          <div class="col-md-6">
            <div class="footer-menu text-center text-md-right">
              {{-- <ul class="list-unstyled">
                <li><a href="{{ url('user') }}/about.html">About</a></li>
                <li><a href="{{ url('user') }}/team.html">Our people</a></li>
                <li><a href="{{ url('user') }}/faq.html">Faq</a></li>
                <li><a href="{{ url('user') }}/news-left-sidebar.html">Blog</a></li>
                <li><a href="{{ url('user') }}/pricing.html">Pricing</a></li>
              </ul> --}}
            </div>
          </div>
        </div><!-- Row end -->

        <div id="back-to-top" data-spy="affix" data-offset-top="10" class="back-to-top position-fixed">
          <button class="btn btn-primary" title="Back to Top">
            <i class="fa fa-angle-double-up"></i>
          </button>
        </div>

      </div><!-- Container end -->
    </div><!-- Copyright end -->
</footer><!-- Footer end -->
