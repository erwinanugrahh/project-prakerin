<div class="bg-white">
    <div class="container">
        <div class="logo-area">
            <div class="row align-items-center">
                <div class="logo col-lg-3 text-center text-lg-left mb-3 mb-md-5 mb-lg-0">
                    <a class="d-block" href="{{ url('user') }}/index.html">
                        @if (file_exists(public_path('logo.png')))
                        <img loading="lazy" src="{{ url('logo.png') }}" alt="Constra">
                        @else
                        <img loading="lazy" src="{{ url('user') }}/images/logo.png" alt="Constra">
                        @endif
                    </a>
                </div><!-- logo end -->

                <div class="col-lg-9 header-right">
                    <ul class="top-info-box">
                        <li>
                            <div class="info-box">
                                <div class="info-box-content">
                                    <p class="info-box-title">Telepon</p>
                                    <p class="info-box-subtitle"><a href="{{ url('user') }}/tel: (+62)81234567890">{{ setting('setting_web')['phone'] }}</a></p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="info-box">
                                <div class="info-box-content">
                                    <p class="info-box-title">Email</p>
                                    <p class="info-box-subtitle"><a href="{{ url('user') }}/smkidean@gmail.com">{{ setting('setting_web')['email'] }}</a></p>
                                </div>
                            </div>
                        </li>
                        <li class="last">
                            <div class="info-box last">
                                <div class="info-box-content">
                                    <p class="info-box-title">Global Certificate</p>
                                    <p class="info-box-subtitle">ISO 9001:2017</p>
                                </div>
                            </div>
                        </li>
                        <li class="header-get-a-quote">
                            <a class="btn btn-primary" href="{{ route('login') }}">Login</a>
                        </li>
                    </ul><!-- Ul end -->
                </div><!-- header right end -->
            </div><!-- logo area end -->
        </div><!-- Row end -->
    </div><!-- Container end -->
</div>
