@extends('layouts.landing')
@section('content')
<!-- Slider Area Start-->
<div class="services-area">
    <div class="container">
        <!-- Section-tittle -->
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
                <div class="section-tittle text-center mb-80">
                    <span>Artikel</span>
                    <h2>Artikel Mina Wisata​</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Slider Area End-->

<!--================Blog Area =================-->
<section class="blog_area section-paddingr">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="blog_left_sidebar">
                    @foreach ($articles as $article)
                        <article class="blog_item mb-80">
                            <div class="blog_item_img">
                                <img class="card-img rounded-0" src="{{ asset($article->image) }}" alt="Gambar Artikel">
                                <a href="{{ route('articles.show', $article->url) }}" class="blog_item_date">
                                    <h3>{{ $article->day }}</h3>
                                    <p>{{ $article->month }}</p>
                                </a>
                            </div>
            
                            <div class="blog_details">
                                <a class="d-inline-block" href="{{ route('articles.show', $article->url) }}">
                                    <h2>{{ $article->title }}</h2>
                                </a>
                                
                                <p>
                                    @if(strlen($article->desc) > 250)
                                        {{ substr($article->desc, 0, 255) }}...
                                    @else
                                        {{ $article->desc }}
                                    @endif
                                </p>
            
                                <ul class="blog-info-link">
                                    <li class="do-btn">
                                        <a href="{{ route('articles.show', $article->url) }}">
                                            <i class="ti-arrow-right"></i> Lanjutkan Membaca
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </article>
                    @endforeach

                    <!-- Pagination Links -->
                    <div class="container">
                        <div class="row mt-4 justify-content-center">
                            <!-- Pagination Wrapper -->
                            <div class="col-auto text-center">
                                <!-- Custom Summary Text Above Pagination -->
                                <div class="mb-2 text-muted">
                                    Showing {{ $articles->firstItem() }} to {{ $articles->lastItem() }} of {{ $articles->total() }} results
                                </div>
                    
                                <!-- Inline CSS to Hide Default Laravel Summary Text -->
                                <style>
                                    /* Hide the default summary text from pagination component */
                                    .d-none.flex-sm-fill.d-sm-flex.align-items-sm-center.justify-content-sm-between > div:first-child {
                                        display: none;
                                    }
                                    /* Style for red pagination links */
                                    .pagination .page-link {
                                        color: #790000; /* Dark red text */
                                        border-color: #790000; /* Dark red border */
                                    }
                                    .pagination .page-item.active .page-link {
                                        background-color: #790000; /* Dark red background for active page */
                                        color: #fff; /* White text for active page */
                                        border-color: #790000; /* Dark red border for active page */
                                    }
                                    .pagination .page-link:hover {
                                        background-color: #f2b6b6; /* Light red background on hover */
                                        color: #790000; /* Dark red text on hover */
                                    }
                                </style>
                    
                                <!-- Pagination Links -->
                                {{ $articles->withQueryString()->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                    
                    
                    
                    
                </div>
            </div>
          
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
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-home"></i></span>
                            <div class="media-body">
                                <h3>Jl Raya RA Kartini No. 123 E Surabaya 60246.</h3>
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
                        <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn" type="download">Download Katalog</button>
                    </aside>
                </div>
            </div>
            <!-- End Konten samping kanan -->
        </div>
    </div>
</section>
<!--================ Blog Area end =================-->
@endsection
