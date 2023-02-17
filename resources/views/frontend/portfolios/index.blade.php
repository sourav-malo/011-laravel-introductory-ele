@extends('frontend/main-master') 
@section('main')

@section('title')
  Rasalina | Portfolio
@endsection('title')

<main>
  <!-- breadcrumb-area -->
  <section class="breadcrumb__wrap">
      <div class="container custom-container">
          <div class="row justify-content-center">
              <div class="col-xl-6 col-lg-8 col-md-10">
                  <div class="breadcrumb__wrap__content">
                      <h2 class="title">Portfolios</h2>
                      <nav aria-label="breadcrumb">
                          <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                              <li class="breadcrumb-item active" aria-current="page">Portfolio</li>
                          </ol>
                      </nav>
                  </div>
              </div>
          </div>
      </div>
      <div class="breadcrumb__wrap__icon">
          <ul>
              <li><img src="{{ asset('frontend/assets/img/icons/breadcrumb_icon01.png') }}" alt=""></li>
              <li><img src="{{ asset('frontend/assets/img/icons/breadcrumb_icon02.png') }}" alt=""></li>
              <li><img src="{{ asset('frontend/assets/img/icons/breadcrumb_icon03.png') }}" alt=""></li>
              <li><img src="{{ asset('frontend/assets/img/icons/breadcrumb_icon04.png') }}" alt=""></li>
              <li><img src="{{ asset('frontend/assets/img/icons/breadcrumb_icon05.png') }}" alt=""></li>
              <li><img src="{{ asset('frontend/assets/img/icons/breadcrumb_icon06.png') }}" alt=""></li>
          </ul>
      </div>
  </section>
  <!-- breadcrumb-area-end -->

  <!-- portfolio-area -->
  <section class="portfolio__inner">
      <div class="container">
          <div class="portfolio__inner__active" style="position: relative; height: 2452.56px;">
            @foreach($portfolios as $portfolio)
              <div class="portfolio__inner__item grid-item cat-two cat-three" style="position: absolute; left: 0%; top: 0px;">
                <div class="row gx-0 align-items-center">
                  <div class="col-lg-6 col-md-10">
                    <div class="portfolio__inner__thumb">
                      <a href="portfolio-details.html">
                        <img src="{{ $portfolio->image ? asset($portfolio->image) : asset('uploads/no_image.jpg') }}" alt="">
                      </a>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-10">
                    <div class="portfolio__inner__content">
                      <h2 class="title"><a href="portfolio-details.html">{{ $portfolio->title }}</a></h2>
                      <div>{!! $portfolio->description !!}</div>
                      <a href="{{ route('portfolios.show', $portfolio->id) }}" class="link">View Case Study</a>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
          <div class="pagination-wrap">
              <nav aria-label="Page navigation example">
                  <ul class="pagination">
                      {{ $portfolios->links('vendor.pagination.custom') }}
                  </ul>
              </nav>
          </div>
      </div>
  </section>
  <!-- portfolio-area-end -->


  <!-- contact-area -->
  <section class="homeContact homeContact__style__two">
      <div class="container">
          <div class="homeContact__wrap">
              <div class="row">
                  <div class="col-lg-6">
                      <div class="section__title">
                          <span class="sub-title">07 - Say hello</span>
                          <h2 class="title">Any questions? Feel free <br> to contact</h2>
                      </div>
                      <div class="homeContact__content">
                          <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
                          <h2 class="mail"><a href="mailto:Info@webmail.com">Info@webmail.com</a></h2>
                      </div>
                  </div>
                  <div class="col-lg-6">
                      <div class="homeContact__form">
                          <form action="#">
                              <input type="text" placeholder="Enter name*">
                              <input type="email" placeholder="Enter mail*">
                              <input type="number" placeholder="Enter number*">
                              <textarea name="message" placeholder="Enter Massage*"></textarea>
                              <button type="submit">Send Message</button>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!-- contact-area-end -->

</main>

@endsection('main')