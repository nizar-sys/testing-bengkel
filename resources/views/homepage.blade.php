@extends('layouts.main')

@section('container')
<section class="hero">
  <div class="container">
    <div class="row justify-content-center">
      <div class="hero-left col-lg-6" xxxstyle="background-color: aqua">
        <div class="hero-header">
          <p>Butuh Lokasi Bengkel Terdekat ? <br>Cari di SIBENG Aja</p>
        </div>
        <div class="hero-text">
          <p>Lorem ipsum dolor sit amet consectetur. Duis nullam posuere nunc in. Sem rhoncus lobortis id non ornare duis adipiscing dui. Suspendisse ultricies purus phasellus aliquam commodo venenatis neque. </p>
        </div>
        <a href="/bengkels" class="btn btn-master btn-primary">
          Search Now!
        </a>
      </div>
      <div class="col-lg-6 text-center" xxxstyle="background-color: rgb(18, 21, 214)">
        <div class="hero-image">
          <img src="/photos/automobile.png" class="img-fluid" alt="">
        </div>
      </div>
    </div>
  </div>
</section>

<section class="benefit">
  <div class="container">
      <div class="row justify-content-center">
          <div class="col text-center">
              <div class="benefit-header">
                  <p>Apa Manfaat dari SIBENG ?</p>
              </div>
          </div>
      </div>
      <div class="row justify-content-center">
          <div class="col-lg-6">
              <div class="benefit-image">
                  <img src="/photos/beep.png" class="img-fluid" alt="">
              </div>
          </div>
          <div class="benefit-left col-lg-6">
              <div class="benefit-text">
                  <p>Mempermudah dalam mencari <br> lokasi bengkel</p>
              </div>
              <div class="benefit-subtext">
                  <p>Lorem ipsum dolor sit amet consectetur. Duis nullam posuere nunc in. Sem rhoncus lobortis id non ornare duis adipiscing dui. Suspendisse ultricies purus phasellus aliquam commodo venenatis neque. </p>
              </div>
          </div>
      </div>
      <div class="row justify-content-center">
          <div class="benefit-left col-lg-6">
              <div class="benefit-text pt-4">
                  <p>Memberikan keuntungan bagi <br>bengkel sekitar</p>
              </div>
              <div class="benefit-subtext">
                  <p>Lorem ipsum dolor sit amet consectetur. Duis nullam posuere nunc in. Sem rhoncus lobortis id non ornare duis adipiscing dui. Suspendisse ultricies purus phasellus aliquam commodo venenatis neque. </p>
              </div>
          </div>
          <div class="col-lg-6 text-center">
              <div class="benefit-image">
                  <img src="/photos/money.png" class="img-fluid" alt="">
              </div>
          </div>
      </div>
  </div>
</section>

<section class="contact">
  <div class="container">
      <div class="row">
          <div class="col">
              <div class="contact-header">
                  <p>Contact Us</p>
                  <img src="/photos/coretan.svg" class="contact-img" alt="">
              </div>
          </div>
      </div>
      {{-- <div class="row justify-content-center">
          <div class="col-lg-1">
              <img src="/photos/Location.png" alt="">
              <img src="/photos/Email.png" alt="">
              <img src="/photos/Telp.png" alt="">
          </div>
          <div class="col-lg-5">
              <div class="benefit-subtext">
                  <p>Lorem ipsum dolor sit amet consectetur. Duis nullam posuere nunc in. Sem rhoncus lobortis id non ornare duis adipiscing dui. Suspendisse ultricies purus phasellus aliquam commodo venenatis neque. </p>
              </div>
              <div class="benefit-subtext">
                  <p>Lorem ipsum dolor sit amet consectetur. Duis nullam posuere nunc in. Sem rhoncus lobortis id non ornare duis adipiscing dui. Suspendisse ultricies purus phasellus aliquam commodo venenatis neque. </p>
              </div>
              <div class="benefit-subtext">
                  <p>Lorem ipsum dolor sit amet consectetur. Duis nullam posuere nunc in. Sem rhoncus lobortis id non ornare duis adipiscing dui. Suspendisse ultricies purus phasellus aliquam commodo venenatis neque. </p>
              </div>
          </div>
          <div class="col-lg-6">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d247.88504837870835!2d106.98437445737393!3d-6.242531579828961!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698db5068a3feb%3A0x2938beb8ef384635!2sSeblak%20Jupe%20Kayuringin!5e0!3m2!1sid!2sid!4v1678953971830!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
      </div> --}}
      <div class="row">
        <div class="col section-left">
            <div class="contact-info-location">
                <img src="/photos/Location.png" alt="">
                <div class="location">
                    <p class="location-header">
                        Alamat
                    </p>
                    <p class="location-text">
                        Jl. Letnan Arsyad, RT.004/RW.024, Kayuringin Jaya,<br> Kec. Bekasi Selatan
                    </p>
                </div>
            </div>
            <div class="contact-info">
                <img src="/photos/Email.png" alt="">
                <div class="location">
                    <p class="location-header">
                        Email
                    </p>
                    <p class="location-text">
                        mfakhrizm18@gmail.com
                    </p>
                </div>
            </div>
            <div class="contact-info-location">
                <img src="/photos/Telp.png" alt="">
                <div class="location">
                    <p class="location-header">
                        Telephone
                    </p>
                    <p class="location-text">
                        (+62)81380312949
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d247.88504837870835!2d106.98437445737393!3d-6.242531579828961!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698db5068a3feb%3A0x2938beb8ef384635!2sSeblak%20Jupe%20Kayuringin!5e0!3m2!1sid!2sid!4v1678953971830!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
  </div>
</section>
@endsection