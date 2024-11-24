@extends('layouts.landing')
@section('content')
<section class="blog_area single-post-area section-padding">
    <div class="container">
       <div class="row">
          <!-- Main Content -->
          <div class="col-lg-8 posts-list">
             <div class="single-post">
                <div class="feature-img">
                   <img class="img-fluid" src="assets/landing/img/hero/kanan 3.png" alt="">
                </div>
                <div class="blog_details">
                   <h1>{{ $package->package_name }}</h1>
                   <br>
                   <img src="{{ asset($package->media_banner) }}" class="rounded mx-auto d-block" alt="Rundown umrah mina" width="80%">
                   <p class="excert">{{ $package->package_description }}</p>
                   
                   <table class="table table-striped">
                      <tbody>
                         <tr>
                            <th scope="row" class="col-3">Maskapai</th>
                            <td>{{ $package->maskapai }}</td>
                         </tr>
                         <tr>
                            <th scope="row">Durasi</th>
                            <td>{{ $package->duration }} Hari</td>
                         </tr>
                         <tr>
                            <th scope="row">Hotel Mekkah</th>
                            <td>{{ $package->hotel_makkah }}</td>
                         </tr>
                         <tr>
                            <th scope="row">Hotel Madinah</th>
                            <td>{{ $package->hotel_madinah }}</td>
                         </tr>
                         <tr>
                            <th scope="row">Quad</th>
                            <td>{{$package->harga_quad}}</td>
                         </tr>
                         <tr>
                            <th scope="row">Triple</th>
                            <td>{{$package->harga_triple}}</td>
                         </tr>
                         <tr>
                            <th scope="row">Double</th>
                            <td>{{ $package->harga_double }}</td>
                         </tr>
                      </tbody>
                   </table>

                   <!-- Accordion Section -->
                   <div id="accordion">
                      <div class="card">
                         <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                               <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                  Perlengkapan yang Didapat
                               </button>
                            </h5>
                         </div>
                         <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                               {!! htmlspecialchars_decode($package->perlengkapan) !!}
                            </div>
                         </div>
                      </div>

                      <div class="card">
                         <div class="card-header" id="headingTwo">
                            <h5 class="mb-0">
                               <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                  Dokumen Persyaratan
                               </button>
                            </h5>
                         </div>
                         <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="card-body">
                               {!! html_entity_decode($package->dokumen_persyaratan) !!}
                            </div>
                         </div>
                      </div>

                      <div class="card">
                         <div class="card-header" id="headingThree">
                            <h5 class="mb-0">
                               <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                  Fasilitas
                               </button>
                            </h5>
                         </div>
                         <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                            <div class="card-body">
                               {!! html_entity_decode($package->fasilitas) !!}
                            </div>
                         </div>
                      </div>

                      <div class="card">
                         <div class="card-header" id="headingFour">
                            <h5 class="mb-0">
                               <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                  Syarat dan Ketentuan
                               </button>
                            </h5>
                         </div>
                         <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                            <div class="card-body">
                               {!! html_entity_decode($package->syarat_ketentuan) !!}
                            </div>
                         </div>
                      </div>
                   </div>

                   <br>
                   <h2>Rundown</h2>
                   <img src="{{ asset($package->itenary_media) }}" class="rounded mx-auto d-block" alt="Rundown umrah mina" width="80%">
                </div>
             </div>

             <!-- Reservation Call-to-Action -->
             <div class="card text-center">
                <div class="card-body">
                   <h3 class="card-title">Segera Reservasi Perjalanan Umrah Anda</h3>
                   <p class="card-text">Dengan hubungi kontak kami 031-562 5566</p>
                   <a href="#" class="btn btn-primary">WhatsApp</a>
                </div>
                <div class="card-footer text-muted">Legalitas</div>
             </div>

             <!-- Social Icons -->
             <div class="navigation-top">
                <div class="d-sm-flex justify-content-between text-center">
                   <ul class="social-icons">
                      <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                      <li><a href="#"><i class="fab fa-whatsapp"></i></a></li>
                      <li><a href="#"><i class="fab fa-internet-explorer"></i></a></li>
                   </ul>
                </div>
             </div>
          </div>
          <!-- End Main Content -->

          <!-- Sidebar Content -->
          <div class="col-lg-4">
             <div class="blog_right_sidebar">
                <aside class="single_sidebar_widget post_category_widget">
                   <h4 class="widget_title">Kategori Paket</h4>
                     @foreach($package_category as $category)
                        <ul class="list cat-list">
                           <li><a href="{{route('package.index')}}" class="d-flex"><p>{{ $category->category_name }}</p></a></li>
                        </ul>
                     @endforeach
                  </aside>
                

                <aside class="single_sidebar_widget popular_post_widget">
                   <h3 class="widget_title">Paket Paling Laris</h3>
                   @foreach($popular_packages as $popular)
                   <div class="media post_item">
                      <img src="{{ asset($popular->media_banner) }}" alt="{{ $popular->package_name }} banner" width="100" height="100">
                      <div class="media-body">
                         <a href="{{ route('package.show', $popular->slug) }}">
                            <h3>{{ $popular->package_name }}</h3>
                         </a>
                         <p>Mulai dari Rp {{$popular->harga_mulai}} Jt</p>
                      </div>
                   </div>
                   @endforeach
                </aside>

                <aside class="single_sidebar_widget tag_cloud_widget">
                   <h4 class="widget_title">Informasi Kontak</h4>
                   <div class="media contact-info">
                      <span class="contact-info__icon"><i class="ti-home"></i></span>
                      <div class="media-body">
                          <h3>Jl Raya RA Kartini No. 123 E Surabaya 60246</h3>
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
                   <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn" type="button">Download Katalog</button>
                </aside>
             </div>
          </div>
          <!-- End Sidebar Content -->
       </div>
    </div>
</section>
@endsection
