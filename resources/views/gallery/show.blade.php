@extends('layouts.app')
@section("content")
<main id="main" data-aos="fade" data-aos-delay="1500">

    <!-- ======= End Page Header ======= -->
    {{-- <div class="page-header d-flex align-items-center">
      <div class="container position-relative">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-6 text-center">
            <h2>{{$gallery->name}}</h2>
            <p>Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.</p>

            <a class="cta-btn" href="contact.html">Available for hire</a>

          </div>
        </div>
      </div>
    </div><!-- End Page Header --> --}}

    <!-- ======= Gallery Single Section ======= -->
    <section id="gallery-single" class="gallery-single">
      <div class="container">

        <div class="position-relative h-60">
          <div class="slides-1 portfolio-details-slider swiper">
            <div class="swiper-wrapper align-items-center">
              @foreach ($gallery->pictures as $picture)
              <div class="swiper-slide">
                <img src="{{asset('storage/'.$picture->image)}}" alt="">
              </div>
              <div class="swiper-slide">
                <img src="{{asset('assets/img/gallery/gallery-9.jpg')}}" alt="">
              </div>
              @endforeach
              

            </div>
            <div class="swiper-pagination"></div>
          </div>
          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>

        </div>

        <div class="row justify-content-between gy-4 mt-4">

          <div class="col-lg-8">
            <div class="portfolio-description">
              {{$gallery->description}}
            </div>

            
          </div>

          <div class="col-lg-3">
            <div class="portfolio-info">
              <h3>Project information</h3>
              <ul>
                <li><strong>Category</strong> <span>{{$gallery->category->name}}</span></li>
                <li><strong>Client</strong> <span>{{$gallery->name}}</span></li>
                <li><strong>Project date</strong> <span>{{$gallery->created_at->format('jS F Y')}}</span></li>
                <li><strong>Project URL</strong> <a href="#">{{$gallery->url ?? 'nil'}}</a></li>
                @if ($gallery->url)
                <li><a href="{{$gallery->url}}" class="btn-visit align-self-start">Visit Website</a></li>
                @endif
                
              </ul>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Gallery Single Section -->

  </main><!-- End #main -->
@endsection