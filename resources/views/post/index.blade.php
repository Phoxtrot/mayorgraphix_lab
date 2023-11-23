@extends('layouts.app')
@section('content')
<main id="main" data-aos="fade" data-aos-delay="1500">
    <!-- ======= StartPage Header ======= -->
    <div class="page-header d-flex align-items-center">
       <div class="container position-relative">
         <div class="row d-flex justify-content-center">
           <div class="col-lg-6 text-center">
             <h2>Blog</h2>
             <p>Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.</p>
           </div>
         </div>
       </div>
     </div><!-- End Page Header -->
     <!-- ======= Blog Section ======= -->
   <section id="blog" class="blog">
       <div class="container" data-aos="fade-up">
 
         <div class="row gy-4 posts-list">
            @foreach ($posts as $post)
            <div class="col-xl-4 col-md-6">
                <article>
    
                  <div class="post-img">
                    <img src="assets/img/blog/blog-1.jpg" alt="" class="img-fluid">
                  </div>
    
                  <p class="post-category">{{$post->category->title}}</p>
    
                  <h2 class="title">
                    <a href="blog-details.html">{{$post->title}}</a>
                  </h2>
    
                  <div class="d-flex align-items-center">
                    <img src="{{asset('storage/blog/'.$post->image)?? asset('assets/img/blog/blog-author.jpg')}}" alt="" class="img-fluid post-author-img flex-shrink-0">
                    <div class="post-meta">
                      <p class="post-author-list">{{Auth::user()->name()}}</p>
                      <p class="post-date">
                        <time datetime="2023-01-01">Jan 1, 2023</time>
                      </p>
                    </div>
                  </div>
    
                </article>
              </div><!-- End post list item -->
            @endforeach
           
 
           
 
         </div><!-- End blog posts list -->
 
         <div class="blog-pagination">
           <ul class="justify-content-center">
             <li><a href="#">1</a></li>
             <li class="active"><a href="#">2</a></li>
             <li><a href="#">3</a></li>
           </ul>
         </div><!-- End blog pagination -->
 
       </div>
     </section><!-- End Blog Section -->
 </main><!-- End #main -->
@endsection