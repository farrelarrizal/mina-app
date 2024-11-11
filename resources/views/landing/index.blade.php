@extends('layouts.landing')
@section('content')
    <!-- Slider Area Start-->
    <div class="single-slider slider-height d-flex align-items-center" data-background="assets/landing/img/hero/lp1.png">
        <div class="container-fluid mt-2 mt-md-3 mt-lg-5">
            <div class="container px-3 px-md-5">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                    </ol>
                    <div class="carousel-inner">
                        @foreach($banners as $banner)
                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                            <img class="d-block w-100 img-fluid" src="{{ asset($banner->image_path) }}" alt="{{ $banner->title }}" style="height: 100%; object-fit: cover;">
                        </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
        
    
    <!-- Slider Area End-->

    <!-- Paket Umrah start-->
    <div class="">
        <div class="container">
            <!-- Section-tittle -->
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <div class="section-tittle text-center">
                        <h2>Paket Perjalanan</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($packages as $package)
                    <div class="col-lg-4 col-md-6">
                        <a href="{{ route('package.show', $package->slug) }}" class="text-decoration-none card-link">
                            <div class="single-do text-center mb-30">
                                <div class="do-icon">
                                    <img class="card-img-top" src="{{ asset($package->media_banner) }}" alt="Paket Mina">
                                </div>
                                <div class="do-caption">
                                    <br>
                                    <h4>{{ $package->package_name }}</h4>
                                    <p><i class="fas fa-calendar-alt"></i> {{ $package->duration }} Hari</p>
                                </div>
                                <div class="do-btn p-4">
                                    <a href="{{ route('package.show', $package->slug) }}" class="text-decoration-none" style="background-color: transparent; color: inherit;">
                                        <i class="ti-arrow-right" style="background-color: transparent;"></i> Selengkapnya
                                    </a>
                                </div> 
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="section-tittle text-center">
        <a href="{{ route('package.index')}}" class="btn">Informasi Paket Lainnya </a>
    </div>
    </div>
    </div>
    <!-- Paket Umrah End-->
    <!-- Slider Area End-->
    <!--Paket Haji start-->
    <!-- <div class="choose-best choose-padding">
        <div class="container"> -->
    <!-- Section-tittle -->
    <!-- <div class="row d-flex justify-content-center">
                <div class="col-lg-7">
                    <div class="section-tittle text-center">
                        <h2>Paket Haji Plus </h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-choose text-center mb-30">
                        <div class="do-icon">
                            <span  class="flaticon-growth"></span>
                        </div>
                        <a href="services.html">
                        <div class="do-caption">
                            <h4>$ 05.00</h4>
                            <ul>
                                <li>Increase traffic 50%</li>
                                <li>Social Media Marketing</li>
                                <li>10 Free Optimization</li>
                                <li>24/7  support</li>
                            </ul>
                        </div>
                    </a>
                    </div>
                </div>
                 <div class="col-lg-4 col-md-6">
                    <div class="single-choose active text-center mb-30">
                        <div class="do-icon">
                            <span class="flaticon-award"></span>
                        </div>
                        <div class="do-caption">
                            <h4>$ 20.00</h4>
                            <ul>
                                <li>Increase traffic 50%</li>
                                <li>Social Media Marketing</li>
                                <li>10 Free Optimization</li>
                                <li>24/7  support</li>
                            </ul>
                        </div>
                    </div>
                </div>
                 <div class="col-lg-4 col-md-6">
                    <div class="single-choose text-center mb-30">
                        <div class="do-icon">
                            <span  class="flaticon-project"></span>
                        </div>
                        <div class="do-caption">
                            <h4>$ 30.00</h4>
                            <ul>
                                <li>Increase traffic 50%</li>
                                <li>Social Media Marketing</li>
                                <li>10 Free Optimization</li>
                                <li>24/7  support</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Paket Haji End-->
    <!-- Mengapa Memilih Mina Wisata Start -->
    <div class="we-create-area create-padding">
        <div class="container">
            <div class="row d-flex align-items-end">
                <div class="col-lg-6 col-md-12">
                    <div class="we-create-img">
                        <img src="assets/landing/img/hero/about_her.png" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="we-create-cap">
                        <h3>Mengapa Memilih Mina Wisata?</h3>
                        <p>Kami adalah Penyelenggara Perjalanan Ibadah Umrah (PPIU) yang terdaftar secara resmi di
                            Kemenag RI dengan Jaminan 5 Pasti Umrah</p>
                        <p>Sudah berpengalaman melayani Tamu Allah menuju Baitullah selama hampir 1 dekade dengan
                            ribuan Alumni Jamaah yang tersebar di seluruh Nusantara</p>
                        <a href="#" class="btn">Lihat Katalog</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mengapa Memilih Mina Wisata End -->
    <!-- fasilitas Start -->
    <div class="generating-area ">
        <div class="container">
            <!-- Section-tittle -->
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <div class="section-tittle text-center">
                        <h2>Apa saja fasilitas yang disediakan?</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="single-generating d-flex mb-30">
                        <div class="generating-icon">
                            <span class="ti-briefcase"></span>
                        </div>
                        <div class="generating-cap">
                            <h4>Sudah Termasuk Handling Perlangkapan</h4>
                            <p>Bersama Mina Wisata, nikmati umrah tanpa kendala dengan handling perlengkapan yang sudah termasuk. </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="single-generating d-flex mb-30">
                        <div class="generating-icon">
                            <span class="ti-cup"></span>
                        </div>
                        <div class="generating-cap">
                            <h4>Izin Resmi Kemenag</h4>
                            <p> Dengan izin resmi Kemenag PPIU 1141/2019 dan PIHK 152/2021, Mina Wisata menjamin perjalanan umrah Anda aman dan terpercaya. </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="single-generating d-flex mb-30">
                        <div class="generating-icon">
                            <span class="ti-crown"></span>
                        </div>
                        <div class="generating-cap">
                            <h4>Free Executive Airport Lounge</h4>
                            <p>Dengan Mina Wisata, Anda mendapatkan akses Free Executive Airport Lounge untuk kenyamanan maksimal sebelum berangkat umrah. </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="single-generating d-flex mb-30">
                        <div class="generating-icon">
                            <span class="flaticon-award"></span>
                        </div>
                        <div class="generating-cap">
                            <h4>Tour Leader dan Muthowif Bersertifikat</h4>
                            <p>Dipandu oleh Tour Leader dan Muthowif Bersertifikat, Mina Wisata menjamin setiap langkah perjalanan umrah Anda dipandu dengan keahlian dan kepercayaan </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fasilitas End -->
    <!-- Galeri Start -->
    <div class="galeri ">
        <div class="container">
            <!-- Section-tittle -->
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <div class="section-tittle text-center">
                        <h2>Galeri</h2>
                    </div>
                </div>
            </div>
            <style type="text/css">
                .spasi {
                    width: 100%;
                    height: 1000px;
                }
            </style>
            <div class="spasi">
                <div class="foto">
                    <div class="kolom">
                        <div class="car">
                            <img src="assets/landing/img/gallery/1.jpg" width="300px" height="300px" alt="">
                        </div>
                        <div class="car">
                            <img src="assets/landing/img/gallery/2.jpg" width="300px" height="300px" alt="">
                        </div>
                    </div>
                    <div class="kolom">
                        <div class="car">
                            <img src="assets/landing/img/gallery/3.jpeg" width="300px" height="300px" alt="">
                        </div>
                        <div class="car">
                            <img src="assets/landing/img/gallery/4.jpg" width="300px" height="300px" alt="">
                        </div>
                    </div>
                    <div class="kolom">
                        <div class="car">
                            <img src="assets/landing/img/gallery/5.jpg" width="300px" height="300px" alt="">
                        </div>
                        <div class="car">
                            <img src="assets/landing/img/gallery/7.jpeg" width="300px" height="300px" alt="">
                        </div>
                    </div>
                    <div class="kolom">
                        <div class="car">
                            <img src="assets/landing/img/gallery/8.jpeg" width="300px" height="300px" alt="">
                        </div>
                        <div class="car">
                            <img src="assets/landing/img/gallery/6.jpg" width="300px" height="300px" alt="">
                        </div>
                    </div>
                    <div class="kolom">
                        <div class="car">
                            <img src="assets/landing/img/gallery/9.jpg" width="300px" height="300px" alt="">
                        </div>
                        <div class="car">
                            <img src="assets/landing/img/gallery/10.jpg" width="300px" height="300px" alt="">
                        </div>
                    </div>
                    <div class="kolom">
                        <div class="car">
                            <img src="assets/landing/img/gallery/11.jpg" width="300px" height="300px" alt="">
                        </div>
                        <div class="car">
                            <img src="assets/landing/img/gallery/umrah miqat 2.png" width="300px" height="300px" alt="">
                        </div>
                    </div>
                    <div class="kolom">
                        <div class="car">
                            <img src="assets/landing/img/gallery/umrah miqat.png" width="300px" height="300px" alt="">
                        </div>
                        <div class="car">
                            <img src="assets/landing/img/gallery/umrah turkey.jpg" width="300px" height="300px" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Galeri End -->
    <!-- Testimonial Start -->
    <div class="testimonial-area">
        <div class="container">
            <div class="testimonial-main">
                <!-- Section-tittle -->
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-5  col-md-8 pr-0">
                        <div class="section-tittle text-center">
                            <h2>Testimonial</h2>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-10 col-md-9">
                        <div class="h1-testimonial-active">
                            <!-- Single Testimonial -->
                            <div class="single-testimonial text-center">
                                <div class="testimonial-caption ">
                                    <div class="testimonial-top-cap">
                                        <p>Sebelum ikut Mina Wisata, saya sudah merasakan jasa 2 travel ternama di
                                            Jawa Timur, namun saya merasa lebih nyaman dengan Mina Wisata. karena
                                            harganya sesuai dan semua team mulai dari petugas lapangan sampai owner
                                            siap membantu melayani para jamaah </p>
                                    </div>
                                    <!-- founder -->
                                    <div class="testimonial-founder d-flex align-items-center justify-content-center">
                                        <div class="founder-img">
                                            <img src="assets/landing/img/testmonial/testimoni_mina1.png" alt="">
                                        </div>
                                        <div class="founder-text">
                                            <span>Prof. Dr. H. Suparyadi, S.IP,MM.</span>
                                            <p>Bupati Kediri (1995-2000) dan Mantan Rektor Universitas Kadiri</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Testimonial -->
                            <div class="testimonial-caption ">
                                <div class="testimonial-top-cap">
                                    <p>Sebelum ikut Mina Wisata, saya sudah merasakan jasa 2 travel ternama di Jawa
                                        Timur, namun saya merasa lebih nyaman dengan Mina Wisata. karena harganya
                                        sesuai dan semua team mulai dari petugas lapangan sampai owner siap membantu
                                        melayani para jamaah </p>
                                </div>
                                <!-- founder -->
                                <div class="testimonial-founder d-flex align-items-center justify-content-center">
                                    <div class="founder-img">
                                        <img src="assets/landing/img/testmonial/testimoni_mina1.png" alt="">
                                    </div>
                                    <div class="founder-text">
                                        <span>Prof. Dr. H. Suparyadi, S.IP,MM.</span>
                                        <p>Bupati Kediri (1995-2000) dan Mantan Rektor Universitas Kadiri</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->

    <!-- Tips Triks Start -->
    <div class="tips-triks-area tips-padding">
        <div class="container">
            <!-- Section-tittle -->
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6 col-md-8 pr-0">
                    <div class="section-tittle text-center">
                        <h2>Artikel</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($articles as $article)
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single-tips mb-50">
                        <div class="tips-img">
                            <!-- crop the image if it not fit -->
                            <img src="{{ asset($article->image) }}" alt="" height="250">
                        </div>
                        <div class="tips-caption">
                            <h4><a href="{{ route('articles.show', $article->url) }}">{{ $article->title }}</a></h4>
                            <span>Lanjutkan Membaca</span>
                            <p>{{ $article->created_at }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>
    </div>
    <!-- Tips Triks End -->
    <!-- have-project Start-->
    <div class="have-project">
        <div class="container">
            <div class="haveAproject" data-background="assets/landing/img/team/have.jpg">
                <div class="row d-flex align-items-center">
                    <div class="col-xl-7 col-lg-9 col-md-12">
                        <div class="wantToWork-caption">
                            <h2>Ingin Informasi Lebih?</h2>
                            <p>Hubungi kami agar kami dapat membantu anda memberikan informasi sesuai dengan apa
                                yang anda butuhkan</p>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-3 col-md-12">
                        <div class="wantToWork-btn f-right">
                            <a href="#" class="btn btn-ans">Hubungi kami</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- have-project End -->
@endsection