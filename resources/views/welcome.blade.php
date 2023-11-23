@extends('layouts.app')
@section('content')
    <!-- ======= Hero Section ======= -->
  <section id="carouselExampleCaptions" class="carousel slide carousel-fade shadow-2-strong hero
  d-flex flex-column justify-content-center align-items-center" 
  data-aos="fade" data-aos-delay="1500" data-mdb-ride="carousel">
  
  <!-- Indicators -->
   <!-- Indicators -->
   <div class="carousel-indicators">
       <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
       <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
       <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
     </div>
   <!-- Inner -->
   <div class="carousel-inner">
     <!-- Single item -->
     <div class="carousel-item active">
       <video
              style="min-width: 100%; min-height: 100%"
              playsinline
              autoplay
              muted
              loop
              >
         <source
                 class="h-100"
                 src="https://mdbootstrap.com/img/video/Tropical.mp4"
                 type="video/mp4"
                 />
       </video>
       <div class="mask" style="background-color: rgba(0, 0, 0, 0.3)">
           <div
              class=" carousel-caption d-flex justify-content-center align-items-center h-100"
              >
           <div class="text-white text-center">
             <h2> Mayorgraphix </h2>
         <p>A multimedia news that specifies in Cinematography , <span>Photography</span> and <span>Event Coverage</span> </p>
         <a href="contact.html" class="btn-get-started">Available for hire</a>
           </div>
       </div>
       </div>
       
     </div>

     <!-- Single item -->
     <div class="carousel-item">
       <video
              style="min-width: 100%; min-height: 100%"
              playsinline
              autoplay
              muted
              loop
              >
         <source
                 class="h-100"
                 src="https://mdbootstrap.com/img/video/forest.mp4"
                 type="video/mp4"
                 />
       </video>
       <div class="mask" style="background-color: rgba(0, 0, 0, 0.3)">
         <div
              class="carousel-caption d-flex justify-content-center align-items-center h-100"
              >
           <div class="text-white text-center">
             <h2> Mayorgraphix </h2>
         <p>A multimedia news that specifies in Cinematography , <span>Photography</span> and <span>Event Coverage</span> </p>
         <a href="contact.html" class="btn-get-started">Available for hire</a>
           </div>
         </div>
       </div>
     </div>

     <!-- Single item -->
     <div class="carousel-item">
       <video
              style="min-width: 100%; min-height: 100%"
              playsinline
              autoplay
              muted
              loop
              >
         <source
                 class="h-100"
                 src="https://mdbootstrap.com/img/video/Tropical.mp4"
                 type="video/mp4"
                 />
       </video>
       <div
            class="mask"
            style="
                   background: linear-gradient(
                   45deg,
                   rgba(29, 236, 197, 0.7),
                   rgba(91, 14, 214, 0.7) 100%
                   );
                   "
            >
         <div
              class="carousel-caption d-flex justify-content-center align-items-center h-100"
              >
           <div class="text-white text-center">
             <h2> Mayorgraphix </h2>
         <p>A multimedia news that specifies in Cinematography , <span>Photography</span> and <span>Event Coverage</span> </p>
         <a href="contact.html" class="btn-get-started">Available for hire</a>
           </div>
         </div>
       </div>
     </div>
   </div>
   <!-- Inner -->

   <!-- Controls -->
   <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
       <span class="carousel-control-prev-icon" aria-hidden="true"></span>
       <span class="visually-hidden">Previous</span>
     </button>
     <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
       <span class="carousel-control-next-icon" aria-hidden="true"></span>
       <span class="visually-hidden">Next</span>
     </button>
 </section><!-- End Hero Section -->

 <main id="main" data-aos="fade" data-aos-delay="1500">

   <!-- ======= Gallery Section ======= -->
   <section id="gallery" class="gallery">
     <ul id="gallery-flters" class="d-flex justify-content-center">
       <li data-filter="*" class="filter-active">All</li>
       @foreach ($categories as $category)
       <li data-filter=".{{$category->name}}">{{$category->name}}</li>
       @endforeach
     </ul>

    
     <div class="container-fluid gallery-container">
       
       <div class="row gy-5 justify-content-center">
        @foreach ($categories as $category)
          @foreach ($category->galleries as $gallery)
             <div class="col-xl-3 col-lg-4 col-md-6 gallery-entity Wedding">
           <div class="gallery-item h-100">
             <img src="{{asset('assets/img/gallery/gallery-1.jpg')}}" class="img-fluid" alt="">
             <div class="gallery-links d-flex align-items-center justify-content-center">
               <a href="{{route('gallery.show',$gallery->slug)}}" class="details-link">{{$gallery->name}}</i></a>
             </div>
           </div>
         </div><!-- End Gallery Item -->
          @endforeach
        @endforeach
       </div>

     </div>
   </section><!-- End Gallery Section -->

 </main><!-- End #main -->
@endsection
