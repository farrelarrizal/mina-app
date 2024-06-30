@extends('layouts.landing')
@section('content')
    <!-- Paket Umrah start-->
    <div class="what-we-do we-padding">
        <div class="container">
            <!-- Section-tittle -->
            <div class="row d-flex justify-content-center">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <div class="section-tittle text-center mb-80">
                            <span>Pilihan Paket</span>
                            <h2>Paket Perjalanan Umrah</h2>
                        </div>
                        
            </div>
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
    </div>
    <!-- Paket Umrah End-->

  <!-- Paket Haji start-->
  <div class="what-we-do we-padding">
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
</div>
<!-- Paket Haji End-->
<!-- Paket Umrah Hemat start-->
<div class="what-we-do we-padding">
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
</div>
<!-- Paket Umrah Hemat End-->
<!-- Paket Umrah Tour start-->
<div class="what-we-do we-padding">
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
</div>
<!-- Paket Umrah Tour End-->
<!-- have-project Start-->
<div class="have-project">
<div class="container">
    <div class="haveAproject" data-background="assets/landing/img/team/have.jpg">
        <div class="row d-flex align-items-center">
            <div class="col-xl-7 col-lg-9 col-md-12">
                <div class="wantToWork-caption">
                    <h2>Ingin Informasi Lebih?</h2>
                    <p>Raih informasi yang Anda butuhkan seputar perjalanan ke Baitullah dan wujudkan impian suci Anda. Hubungi kami sekarang!</p>
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
@endsection