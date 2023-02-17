@php 
  $footerDetails = App\Models\Footer::find(1);
@endphp

<footer class="footer">
  <div class="container">
    <div class="row justify-content-between">
      <div class="col-lg-4">
        <div class="footer__widget">
          <div class="fw-title">
            <h5 class="sub-title">Contact us</h5>
            <h4 class="title">{{ $footerDetails->phone_num }}</h4>
          </div>
          <div class="footer__widget__text">
            <p>{{ $footerDetails->contact_us_desc }}
            </p>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-lg-4 col-sm-6">
        <div class="footer__widget">
          <div class="fw-title">
            <h5 class="sub-title">my address</h5>
            <h4 class="title">{{ $footerDetails->country }}</h4>
          </div>
          <div class="footer__widget__address">
            <p>{{ $footerDetails->address }}</p>
            <a href="mailto:{{ $footerDetails->email }}" class="mail">{{ $footerDetails->email }}</a>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-lg-4 col-sm-6">
        <div class="footer__widget">
          <div class="fw-title">
            <h5 class="sub-title">Follow me</h5>
            <h4 class="title">socially connect</h4>
          </div>
          <div class="footer__widget__social">
            <p>{{ $footerDetails->socially_connect_desc }}</p>
            <ul class="footer__social__list">
              <li><a href="{{ $footerDetails->facebook_url }}"><i class="fab fa-facebook-f"></i></a></li>
              <li><a href="{{ $footerDetails->twitter_url }}"><i class="fab fa-twitter"></i></a></li>
              <li><a href="{{ $footerDetails->behance_url }}"><i class="fab fa-behance"></i></a></li>
              <li><a href="{{ $footerDetails->linkedin_url }}"><i class="fab fa-linkedin-in"></i></a></li>
              <li><a href="{{ $footerDetails->instagram_url }}"><i class="fab fa-instagram"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="copyright__wrap">
      <div class="row">
        <div class="col-12">
          <div class="copyright__text text-center">
            <p>Copyright @ Theme_Pure 2021 All right Reserved</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>