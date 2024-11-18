@extends('layouts.landing')
@section('content')
    <!-- Paket Umrah start-->
    <div class="container we-padding">
        <div class="section-tittle text-center mb-0">
            <span>Pilihan Paket</span>
        </div>
        @if(is_countable($package_category) && count($package_category) == 0)
            <div class="section-tittle text-center mb-20">
                <h4 class="text-italic">Mohon Maaf untuk saat ini belum ada paket tersedia.</h4>
                <!-- italic hubungi kami -->
                <p class="text-italic">Harap cek secara berkala atau hubungi kami untuk informasi lebih lanjut.</p>
                
            </div>
        @else
            <div class="row">
                @foreach($package_category as $category)
                    <div class="container">
                        <div class="section-tittle text-center mt-20">
                            <h4 id="category-{{ $category->id }}">{{ $category->category_name }}</h4>
                            
                            <!-- Filter packages by matching category_id with the current category's ID -->
                            @php
                                $filtered_packages = $packages->where('category_id', $category->id);
                            @endphp

                            @if($filtered_packages->isEmpty())
                                <p>Paket untuk kategori ini belum tersedia.</p>
                            @else
                                <div class="row">
                                    @foreach($filtered_packages as $package)
                                        <div class="col-md-4 mb-4">
                                            <!-- Make the entire card clickable by wrapping it in an anchor tag -->
                                            <a href="{{ route('package.show', $package->slug) }}" class="text-decoration-none">
                                                <div class="single-do text-center mb-30 position-relative d-flex flex-column align-items-center justify-content-center" style="height: 100%;">
                                                    <div class="do-icon">
                                                        <img class="card-img-top" src="{{ asset($package->media_banner) }}" alt="{{ $package->package_name }}" style="width: 100%; height: auto;">
                                                    </div>
                                                    <div class="do-caption mt-3">
                                                        <h4>{{ $package->package_name }}</h4>
                                                        <p><i class="fas fa-calendar-alt"></i> {{ $package->duration }} Hari</p>
                                                    </div>
                                                    <!-- Use Bootstrap's stretched-link class to make the whole card clickable -->
                                                    {{-- <span class="text-center stretched-link"> Selengkapnya</span> --}}
                                                    <!-- icon selengkapnya -->
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
                            @endif
                        </div>
                    </div>
                @endforeach


        @endif
    </div>
    <!-- if package category length = 0 , then maaf untuk saat ini belum ada paket umrah -->
    

    {{-- <div class="what-we-do we-padding">
        <div class="container">
            <!-- Section-tittle -->
            
            <div class="row">
                @foreach($package_umroh_reguler as $package)
                <div class="col-lg-4 col-md-6">
                    <div class="single-do text-center mb-30">
                        <div class="do-icon">
                            <img class="card-img-top" src="{{ asset($package->media_banner) }}" alt="Paket Mina">
                        </div>
                        <div class="do-caption
                        ">
                            <br>
                            <!-- Small gap -->
                            <h4>{{ $package->package_name }}</h4>
                            <p><i class="fas fa-calendar-alt"></i> {{ $package->duration }} Hari</p>
                        </div>
                        <div class="do-btn">
                            <a href="{{ route('package.show', $package->slug) }}"><i class="ti-arrow-right"></i> Selengkapnya</a>
                        </div>
                    </div>
                </div>
                @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Paket Umrah End-->

  <!-- Paket Haji start-->
  {{-- <div class="what-we-do we-padding">
    <div class="container">
        <!-- Section-tittle -->
        <div class="row d-flex justify-content-center">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <div class="section-tittle text-center mb-80">
                        <h2>Paket Perjalanan Haji Plus</h2>
                    </div>
            <div class="col-lg-8">
            </div>
        </div>
        <div class="row">
            @foreach($package_haji_plus as $package)
            <div class="col-lg-4 col-md-6">
                <div class="single-do text-center mb-30">
                    <div class="do-icon">
                        <img class="card-img-top" src="{{ asset($package->media_banner) }}" alt="Paket Mina">
                    </div>
                    <div class="do-caption
                    ">
                        <br>
                        <!-- Small gap -->
                        <h4>{{ $package->package_name }}</h4>
                        <p><i class="fas fa-calendar-alt"></i> {{ $package->duration }} Hari</p>
                    </div>
                    <div class="do-btn">
                        <a href="{{ route('package.show', $package->slug) }}"><i class="ti-arrow-right"></i> Selengkapnya</a>
                    </div>
                </div>
            </div>
            @endforeach
                </div>
            </div>
        </div>
    </div>
</div> --}}
<!-- Paket Haji End-->
<!-- Paket Umrah Hemat start-->
{{-- <div class="what-we-do we-padding">
    <div class="container">
        <!-- Section-tittle -->
        <div class="row d-flex justify-content-center">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <div class="section-tittle text-center mb-80">
                        <h2>Paket Umrah Hemat</h2>
                    </div>
            <div class="col-lg-8">
            </div>
        </div>
        <div class="row">
            @foreach($package_umroh_hemat as $package)
            <div class="col-lg-4 col-md-6">
                <div class="single-do text-center mb-30">
                    <div class="do-icon">
                        <img class="card-img-top" src="{{ asset($package->media_banner) }}" alt="Paket Mina">
                    </div>
                    <div class="do-caption
                    ">
                        <br>
                        <!-- Small gap -->
                        <h4>{{ $package->package_name }}</h4>
                        <p><i class="fas fa-calendar-alt"></i> {{ $package->duration }} Hari</p>
                    </div>
                    <div class="do-btn">
                        <a href="{{ route('package.show', $package->slug) }}"><i class="ti-arrow-right"></i> Selengkapnya</a>
                    </div>
                </div>
            </div>
            @endforeach
                </div>
            </div>
        </div>
    </div>
</div> --}}
<!-- Paket Umrah Hemat End-->
<!-- Paket Umrah Tour start-->
{{-- <div class="what-we-do we-padding">
    <div class="container">
        <!-- Section-tittle -->
        <div class="row d-flex justify-content-center">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <div class="section-tittle text-center mb-80">
                        <h2>Paket Umrah Tour</h2>
                    </div>
            <div class="col-lg-8">
            </div>
        </div>
        <div class="row">
            @foreach($package_umroh_tour as $package)
            <div class="col-lg-4 col-md-6">
                <div class="single-do text-center mb-30">
                    <div class="do-icon">
                        <img class="card-img-top" src="{{ asset($package->media_banner) }}" alt="Paket Mina">
                    </div>
                    <div class="do-caption
                    ">
                        <br>
                        <!-- Small gap -->
                        <h4>{{ $package->package_name }}</h4>
                        <p><i class="fas fa-calendar-alt"></i> {{ $package->duration }} Hari</p>
                    </div>
                    <div class="do-btn">
                        <a href="{{ route('package.show', $package->slug) }}"><i class="ti-arrow-right"></i> Selengkapnya</a>
                    </div>
                </div>
            </div>
            @endforeach
                </div>
            </div>
        </div>
    </div>
</div> --}}
<!-- Paket Umrah Tour End-->
<!-- have-project Start-->
<div class="have-project">
    <div class="container">
        <div class="haveAproject" data-background="assets/landing/img/team/have.jpg">
            <div class="row d-flex align-items-center">
                <div class="col-xl-7 col-lg-9 col-md-12">
                    <div class="wantToWork-caption">
                        <h2>Ingin Informasi Lebih?</h2>
                        <p>Raih informasi yang Anda butuhkan seputar perjalanan ke Baitullah dan wujudkan impian suci Anda bersama Mina Wisata. <br>Hubungi kami sekarang!</p>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-3 col-md-12">
                    <div class="wantToWork-btn f-right">
                        <a href="https://api.whatsapp.com/send/?phone=6281333550157&text=Assalamualaikum%20Mina%20Wisata%2C%20saya%20ingin%20bertanya%20terkait%20dengan%20perjalanan%20Umrah%2FHaji.%20Mohon%20informasinya.%20Terima%20kasih.&type=phone_number&app_absent=0" 
                           class="btn btn-ans" 
                           target="_blank">
                            Hubungi kami <i class="fab fa-whatsapp"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection