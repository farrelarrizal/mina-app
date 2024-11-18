<!DOCTYPE html>
    <html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Mina Wisata Tour & Travel </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/landing/img/logo/lowgo.png')}}">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('assets/landing/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/landing/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/landing/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/landing/css/slicknav.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/landing/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/landing/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/landing/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/landing/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/landing/css/slick.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/landing/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/landing/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/landing/css/animated.css')}}">
</head>

<body>

    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="{{ asset('assets/landing/img/logo/lowgo.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->

    <header>
        <!-- Header Start -->
        <div class="header-area header-transparrent ">
            <div class="main-header header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-2 col-lg-2 col-md-1">
                            <div class="logo">
                                <a href="{{route('landing.index')}}"><img src="{{ asset('assets/landing/img/logo/logo mina ver2.png')}}" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-8 col-md-8">
                            <!-- Main-menu -->
                            <div class="main-menu f-right d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="{{ route('landing.index') }}"> Beranda</a></li>
                                        <li><a href="{{ route('landing.about')}}">Tentang Kami</a></li>
                                        <li><a href="{{ route('package.index') }}">Paket</a>
                                            <ul class="submenu">
                                                {{-- <li><a href="{{ route('package.index') }}">Umrah Reguler</a></li>
                                                <li><a href="{{ route('package.index') }}">Haji Plus</a></li>
                                                <li><a href="{{ route('package.index') }}">Umrah Hemat</a></li>
                                                <li><a href="{{ route('package.index') }}">Umrah & Tour</a></li> --}}
                                                @foreach ($package_category as $category)
                                                    <li><a href="{{ route('package.index') }}">{{ $category->category_name }}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li><a href="{{ route('landing.contact') }}">Kontak</a></li>
                                        <li><a href="{{ route('articles.index')}}">Artikel</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-3">
                            <div class="header-right-btn f-right d-none d-lg-block">
                                <a href="https://wa.me/6281333550157?Assalamualaikum%20Mina%20Wisata%2C%20saya%20ingin%20bertanya%20terkait%20dengan%20perjalanan%20Umrah%2FHaji.%20Mohon%20informasinya.%20%0A%0ATerima%20kasih." class="btn header-btn">Hubungi Kami</a>
                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>

    <main>
        @yield('content')

    </main>
    <footer>

        <!-- Footer Start-->
        <div class="footer-main" data-background="{{ asset('assets/landing/img/shape/footer_bg.png')}}">
            <div class="footer-area footer-padding">
                <div class="container">
                    <div class="row d-flex justify-content-between">
                        <div class="col-lg-3 col-md-4 col-sm-8">
                            <div class="single-footer-caption mb-50">
                                <div class="single-footer-caption mb-30">
                                    <!-- logo -->
                                    <div class="footer-logo">
                                        <a href="{{route('landing.index')}}"><img src="{{ asset('assets/landing/img/logo/logo mina ver2.png')}}" alt=""></a>
                                    </div>
                                    <div class="footer-tittle">
                                        <div class="footer-pera">
                                            <p class="info1">
                                            <h5>Office Surabaya 1</h5>
                                            Mina Wisata Kantor Pusat Jl Raya RA Kartini No. 123 E Surabaya 60246
                                            Telp : 031-562 5566/5280</p>
                                            <p class="info2">mariumrah@minawisata.com</p>
                                        </div>
                                    </div>
                                    <div class="footer-social">
                                        <a href="https://www.instagram.com/hajiumrohminawisata?igsh=aGJ6em12ZTk4bGFv"><i class="fab fa-instagram"></i></a>
                                        <a href="https://youtube.com/@minawisataislami7685?si=M6ORsOHdZz21wnqq"><i class="fab fa-youtube"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-5 col-sm-5">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <div class="footer-pera">
                                        <p class="info1">
                                        <h6>Office Surabaya 2</h6>
                                        Ketintang Ruko Lotus Regency Blok D-8 Jl. Ketintang Baru Selatan I No. 52
                                        Surabaya 60231 Telp : 031-82707.81/82
                                        </p>
                                        <p class="info1">
                                        <h6>Office Surabaya 3 </h6>
                                        Office Surabaya 3 Mina Wisata Cab. Royal Plaza Royal Plaza Lt. UG F3/11 Surabaya
                                        60231 Telp : 031-827 1444 </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 col-sm-7">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <ul>
                                        <p class="info1">
                                        <h6>Visit Our Exclusive Stand </h6>
                                        Mina Wisata Tunjungan Plaza Tunjungan Plaza 2 Lantai 3 Taj Tunjungan Muslim
                                        Center Surabaya 60261 Telp : 081 7521 6175 </p>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-5">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Halaman</h4>
                                    <ul>
                                        <li><a href="{{route('landing.index')}}">Beranda</a></li>
                                        <li><a href="{{route('landing.about')}}">Tentang Kami</a></li>
                                        <li><a href="{{route('package.index')}}">Paket</a></li>
                                        <li><a href="{{route('landing.contact')}}">Kontak</a></li>
                                        <li><a href="{{route('articles.index')}}">Artikel</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- footer-bottom aera -->
            <div class="footer-bottom-area footer-bg">
                <div class="container">
                    <div class="footer-border">
                        <div class="row d-flex align-items-center">
                            <div class="col-xl-12 ">
                                <div class="footer-copy-right text-center">
                                    <p>
                                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                        Copyright &copy;
                                        <script>
                                            document.write(new Date().getFullYear());
                                        </script> All rights reserved |
                                        MINA WISATA ISLAMI</a>
                                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End-->

    </footer>

    <!-- JS here -->
    <script src="{{ asset('assets/landing/js/animation.js')}}"></script>
    <!-- All JS Custom Plugins Link Here here -->
    <script src="{{asset('assets/landing/js/vendor/modernizr-3.5.0.min.js')}}"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="{{asset('assets/landing/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <script src="{{asset('assets/landing/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/landing/js/bootstrap.min.js')}}"></script>
    <!-- Jquery Mobile Menu -->
    <script src="{{ asset('assets/landing/js/jquery.slicknav.min.js')}}"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="{{ asset('assets/landing/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/landing/js/slick.min.js')}}"></script>
    <!-- Date Picker -->
    <script src="{{asset('assets/landing/js/gijgo.min.js')}}"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="{{asset('assets/landing/js/wow.min.js')}}"></script>
    <script src="{{asset('assets/landing/js/animated.headline.js')}}"></script>
    <script src="{{asset('assets/landing/js/jquery.magnific-popup.js')}}"></script>

    <!-- Scrollup, nice-select, sticky -->
    <script src="{{asset('assets/landing/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('assets/landing/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('assets/landing/js/jquery.sticky.js')}}"></script>

    <!-- contact js -->
    <script src="{{asset('assets/landing/js/contact.js')}}"></script>
    <script src="{{asset('assets/landing/js/jquery.form.js')}}"></script>
    <script src="{{asset('assets/landing/js/jquery.validate.min.js')}}"></script>
    <script src="{{asset('assets/landing/js/mail-script.js')}}"></script>
    <script src="{{asset('assets/landing/js/jquery.ajaxchimp.min.js')}}"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="{{asset('assets/landing/js/plugins.js')}}"></script>
    <script src="{{asset('assets/landing/js/main.js')}}"></script>

</body>

</html>