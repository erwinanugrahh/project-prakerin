@extends('layouts.guest')

@section('content')
<  <div class="container">

    <div class="row text-center">
      <div class="col-12">
        <h2 class="section-title">Reaching our Office</h2>
        <h3 class="section-sub-title">Find Our Location</h3>
      </div>
    </div>
    <!--/ Title row end -->

    <div class="row">
      <div class="col-md-4">
        <div class="ts-service-box-bg text-center h-100">
          <span class="ts-service-icon icon-round">
            <i class="fas fa-map-marker-alt mr-0"></i>
          </span>
          <div class="ts-service-box-content">
            <h4>Visit Our Office</h4>
            <p>9051 Constra Incorporate, USA</p>
          </div>
        </div>
      </div><!-- Col 1 end -->

      <div class="col-md-4">
        <div class="ts-service-box-bg text-center h-100">
          <span class="ts-service-icon icon-round">
            <i class="fa fa-envelope mr-0"></i>
          </span>
          <div class="ts-service-box-content">
            <h4>Email Us</h4>
            <p>office@Constra.com</p>
          </div>
        </div>
      </div><!-- Col 2 end -->

      <div class="col-md-4">
        <div class="ts-service-box-bg text-center h-100">
          <span class="ts-service-icon icon-round">
            <i class="fa fa-phone-square mr-0"></i>
          </span>
          <div class="ts-service-box-content">
            <h4>Call Us</h4>
            <p>(+9) 847-291-4353</p>
          </div>
        </div>
      </div><!-- Col 3 end -->
      <header id="header" class="header-one">
      <div class="bg-white">
        <div class="container">
          <div class="logo-area">
              <div class="row align-items-center">
                <div class="logo col-lg-3 text-center text-lg-left mb-3 mb-md-5 mb-lg-0">
                    <a class="d-block" href="index.html">
                      <img loading="lazy" src="images/logo.png" alt="Constra">
                    </a>
                </div>
            </div>
        </div>
    </div>
  </div>
  @endsection
  @push('js')
<script>
    $('.halaman-scroll').on('click', function(){
        var tujuan = $(this).attr('href');
        window.location.href = '/'+tujuan
    })
</script>
@endpush
@push('js')
<script>
    $('.halaman-scroll').on('click', function(){
        var tujuan = $(this).attr('href');
        window.location.href = '/'+tujuan
    })
</script>
@endpush

  