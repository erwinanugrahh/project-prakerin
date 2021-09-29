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
                    <li><a href="https://facebook.com/erwinanugrah" aria-label="Facebook"><i
                        class="fab fa-facebook-f"></i></a></li>
                    <li><a href="https://twitter.com/erwinanugrah" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    </li>
                    <li><a href="https://instagram.com/indrabesset" aria-label="Instagram"><i
                        class="fab fa-instagram"></i></a></li>
                    <li><a href="https://youtube.com/bryanx19" aria-label="Youtube"><i class="fab fa-youtube"></i></a>
                    </li>
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
                <h3 class="widget-title">Services</h3>
                <ul class="list-arrow">
                <li><a href="{{ url('user') }}/service-single.html">Pre-Construction</a></li>
                <li><a href="{{ url('user') }}/service-single.html">General Contracting</a></li>
                <li><a href="{{ url('user') }}/service-single.html">Construction Management</a></li>
                <li><a href="{{ url('user') }}/service-single.html">Design and Build</a></li>
                <li><a href="{{ url('user') }}/service-single.html">Self-Perform Construction</a></li>
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
                </script>, Designed &amp; Developed by <a href="https://instagram.com/indrabesset">BryanX</a>
              </span>
            </div>
          </div>

          <div class="col-md-6">
            <div class="footer-menu text-center text-md-right">
              <ul class="list-unstyled">
                <li><a href="{{ url('user') }}/about.html">About</a></li>
                <li><a href="{{ url('user') }}/team.html">Our people</a></li>
                <li><a href="{{ url('user') }}/faq.html">Faq</a></li>
                <li><a href="{{ url('user') }}/news-left-sidebar.html">Blog</a></li>
                <li><a href="{{ url('user') }}/pricing.html">Pricing</a></li>
              </ul>
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
