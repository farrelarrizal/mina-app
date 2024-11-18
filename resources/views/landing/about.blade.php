@extends('layouts.landing')
@section('content')
<!-- Section Title -->

<!-- Mengapa Memilih Mina Wisata Start -->
<div class="we-create-area create-padding">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-12">
                <div class="section-tittle text-center">
                    <span>Tentang Kami</span>
                    <h2>Lebih kenal dengan Mina Wisata</h2>
                </div>
            </div>
        </div>
        <div class="row d-flex align-items-end">
            <div class="col-lg-6 col-md-12">
                <div class="we-create-img">
                    <img src="assets/landing/img/hero/about_her.png" alt="About Mina Wisata">
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="we-create-cap">
                    <h3>Mengapa Memilih Mina Wisata?</h3>
                    <p>Kami adalah Penyelenggara Perjalanan Ibadah Umrah (PPIU) yang terdaftar secara resmi di
                        Kemenag RI dengan Jaminan 5 Pasti Umrah.</p>
                    <p>Sudah berpengalaman melayani Tamu Allah menuju Baitullah selama hampir 1 dekade dengan
                        ribuan Alumni Jamaah yang tersebar di seluruh Nusantara.</p>
                    <a href="#" class="btn">Lihat Katalog</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Mengapa Memilih Mina Wisata End -->

<!-- Video Mina Wisata Start -->
<div class="paddington">
    <div class="container">
        <div class="row d-flex align-items-end">
            <div class="col-lg-6 col-md-12">
                <div class="we-create-img">
                    <div class="embed-responsive embed-responsive-16by9 mbl-video">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/qquuhBjBBVE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="we-create-cap">
                    <h3>Video Mina Wisata</h3>
                    <p>Dalam rangkaian kegiatan perjalanan Umrah, beberapa kami abadikan disini potret dan videonya. Banyak canda dan tawa, serta tangisan religius yang penuh makna dibalut dengan hangatnya rasa kekeluargaan dari para Jamaah, yang senantiasa menemani kami dan menjadi sumber kekuatan Mina Wisata untuk bisa memberikan pelayanan yang terbaik bagi Para Tamu Allah. Silahkan lihat kami di YouTube Channel “Mina Wisata Islami”.</p>
                    <a href="#" class="btn">Lihat Youtube</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Video Mina Wisata End -->

<!-- Have Project Start -->
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

<!-- Have Project End -->
@endsection
