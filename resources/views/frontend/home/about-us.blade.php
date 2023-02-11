@php 
  $aboutUsDetails = App\Models\AboutUs::find(1);
@endphp

<section id="aboutSection" class="about">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6">
        <ul class="about__icons__wrap">
          @foreach(json_decode($aboutUsDetails['about_us_multi_images']) as $multiImage)
            <li>
              <img class="light" src="{{ $multiImage }}" alt="XD">
            </li>
          @endforeach
        </ul>
      </div>
      <div class="col-lg-6">
        <div class="about__content">
          <div class="section__title">
            <span class="sub-title">01 - About me</span>
            <h2 class="title">{{ $aboutUsDetails->title }}</h2>
          </div>
          <div class="about__exp">
            <div class="about__exp__icon">
              <img src="{{ asset('frontend/assets/img/icons/about_icon.png') }}" alt="">
            </div>
            <div class="about__exp__content">
              <p>{{ $aboutUsDetails->short_title }}</p>
            </div>
          </div>
          <p class="desc">{{ $aboutUsDetails->short_description }}</p>
          <a href="about.html" class="btn">Download my resume</a>
        </div>
      </div>
    </div>
  </div>
</section>