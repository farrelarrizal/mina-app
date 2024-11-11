
@extends('layouts.landing')
@section('content')
    <!--================Blog Area =================-->
   <section class="blog_area single-post-area section-padding">
    <div class="container">
       <div class="row">
          <div class="col-lg-8 posts-list">
             <div class="single-post">
                <div class="feature-img">
                   <img class="img-fluid" src="{{ asset($article->image) }}" alt="">
                </div>
                <div class="blog_details">
                   <h1>{{ $article->title }}</h1>
                     <ul class="blog-info-link mt-3 mb-4">
                        <li><a href="#"><i class="far fa-user"></i> {{ $article->author }}</a></li>
                        <!-- date posted will be formatted to human readable format -->
                        <li><a href="#"><i class="far fa-calendar"></i> Surabaya, {{ date('d F Y', strtotime($article->created_at)) }}</a></li>
                     </ul>
                   <!-- content of the article decoded from html entities -->
                     <p class="excert">
                        {!! html_entity_decode($article->content) !!}
                     </p>
             </div>
             <div class="card text-center">
                <div class="card-body">
                  <h3 class="card-title">Segera Reservasi Perjalanan Umrah Anda</h3>
                  <p class="card-text">Dengan hubungi kontak kami 031-562 5566</p>
                  <a href="#" class="btn btn-primary">WhatsApp</a>
                </div>
                <div class="card-footer text-muted">
                   Legalitas
                </div>
              </div>
             <div class="navigation-top">
                <div class="d-sm-flex justify-content-between text-center">
                   <div class="col-sm-4 text-center my-2 my-sm-0">
                      <!-- <p class="comment-count"><span class="align-middle"><i class="fa fa-comment"></i></span> 06 Comments</p> -->
                   </div>
                   <ul class="social-icons">
                      <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                      <li><a href="#"><i class="fab fa-whatsapp"></i></a></li>
                      <li><a href="#"><i class="fab fa-internet-explorer"></i></a></li>
                   </ul>
                </div>
             </div>
            </div>
          </div>
          <!-- End Konten samping kiri -->
           <!-- Start Konten samping kanan -->
           <div class="col-lg-4">
            <div class="blog_right_sidebar">
               <aside class="single_sidebar_widget post_category_widget">
                  <h4>Kategori Paket</h4>
                  <hr>
                  <ul class="list cat-list">
                     @foreach ($package_category as $category)
                        <li>
                           <a href="#" class="d-flex">
                              <p>{{ $category->category_name }}</p>
                           </a>
                        </li>
                     @endforeach
                  </ul>
               </aside>
               <aside class="single_sidebar_widget popular_post_widget">
                  <h3 class="widget_title">Paket Paling Laris</h3>
                  @foreach ($favorite_packages as $package)
                      <div class="media post_item">
                          <img src="{{ asset($package->media_banner) }}" alt="{{ $package->package_name }}" width="100" height="100">
                          <div class="media-body">
                              <a href="{{ route('package.show', $package->id) }}">
                                  <h3>{{ $package->package_name }}</h3>
                              </a>
                              <p>Mulai dari {{ $package->harga_mulai }} Jutaan</p>
                          </div>
                      </div>
                  @endforeach
              </aside>
               
               <aside class="single_sidebar_widget tag_cloud_widget">
                  <h4 class="widget_title">Informasi Kontak</h4>
                  <div class="card text-center" style="width: 18rem;">
                     <div class="card-body">
                       <h5 class="card-title">Alamat Kantor</h5>
                       <p class="card-text">Jl Raya RA Kartini No. 123 E Surabaya 60246.</p>
                     </div>
                   </div>
                   <div class="card text-center" style="width: 18rem;">
                     <div class="card-body">
                       <h5 class="card-title">Chat WhatsApp</h5>
                       <p class="card-text">+6281 333 550 157</p>
                     </div>
                   </div>
                   <div class="card text-center" style="width: 18rem;">
                     <div class="card-body">
                       <h5 class="card-title">Alamat E-mail</h5>
                       <p class="card-text">mariumrah@minawisata.com</p>
                     </div>
                   </div>
               </aside>
               <aside class="single_sidebar_widget tag_cloud_widget">
                 <h4 class="widget_title">Informasi Kontak</h4>
                 <div class="media contact-info">
                   <span class="contact-info__icon"><i class="ti-home"></i></span>
                   <div class="media-body">
                       <h3>Jl Raya RA Kartini No. 123 E Surabaya 60246. </h3>
                       <p>Surabaya, Jawa Timur</p>
                   </div>
               </div>
               <div class="media contact-info">
                   <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                   <div class="media-body">
                       <h3>+6281 357 852 189</h3>
                       <p>Hubungi WhatsApp</p>
                   </div>
               </div>
               <div class="media contact-info">
                   <span class="contact-info__icon"><i class="ti-email"></i></span>
                   <div class="media-body">
                       <h3>mariumrah@minawisata.com</h3>
                       <p>Alamat E-mail</p>
                   </div>
               </div>
               <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                        type="download">Download Katalog</button>
            </div>
           </div>
         </div>
         <!-- end konten samping kanan -->
@endsection