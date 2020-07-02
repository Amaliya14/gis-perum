
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="ThemeStarz">

    <!--CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/font-awesome/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css')}}">

    <title>GIS-PERUM</title>

</head>

<body>

<!-- WRAPPER
=====================================================================================================================-->
<div class="ts-page-wrapper ts-homepage" id="page-top">
    <header id="ts-header" class="fixed-top">
      <nav id="ts-secondary-navigation" class="navbar" style="margin-bottom: -20px">
            <div class="container justify-content-center mt-3">
              <h2 class="text-dark">Sistem Informasi Geografis Pemetaan Perumahan Di Kota Tegal</h2>
            </div>
        </nav>
        <nav id="ts-primary-navigation" class="navbar navbar-expand-md navbar-light">
            <div class="container">

                <!--Brand Logo-->
                <a class="navbar-brand" href="index-map-leaflet-fullscreen.html">
                  <img src="https://upload.wikimedia.org/wikipedia/commons/a/a5/Shield_of_the_city_of_Tegal.svg" width="30px" height="40px" alt="">
                </a>

                <!--Responsive Collapse Button-->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarPrimary" aria-controls="navbarPrimary" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!--Collapsing Navigation-->
                <div class="collapse navbar-collapse" id="navbarPrimary">

                    <!--LEFT NAVIGATION MAIN LEVEL
                    =================================================================================================-->
                    <ul class="navbar-nav">

                        <!--HOME (Main level)
                        =============================================================================================-->
                        <li class="nav-item">
                            <a class="nav-link active" href="{{url('/')}}">
                                Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/map')}}">
                                Peta
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/perumahan')}}">
                                Perumahan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/kontak')}}">
                                Kontak
                            </a>
                        </li>
                    </ul>

                </div>
                <!--end navbar-collapse-->
            </div>
            <!--end container-->
        </nav>
        <!--end #ts-primary-navigation.navbar-->

    </header>
    <!--end Header-->

    <!-- HERO SLIDER
    =================================================================================================================-->
    <section id="ts-hero" class="ts-hero-slider ts-bg-black mb-0 ">

        <div class="ts-min-h__70vh w-100">

            <!--Owl Carousel-->
            <div class="owl-carousel" data-owl-loop="1" data-owl-nav="1">

                <!-- SLIDE
                =====================================================================================================-->
                @foreach($perumahan->slice(0, 3) as $perum)
                @if($perum->info)
                <div class="ts-slide" data-bg-image="{{asset('picture/'.$perum->info->foto)}}">
                    <div class="ts-slide-description h-100 ts-center__vertical pb-0">
                        <div class="container">

                            <!--Title-->
                            <h1 class="mb-3">{{$perum->nama_perumahan}}</h1>

                            <!--Location-->
                            <figure class="ts-opacity__50">
                                <i class="fa fa-map-marker mr-2"></i>
                                {{$perum->lokasi}}
                            </figure>

                            <!--Features-->
                            <div class="ts-description-lists d-none d-md-block ts-responsive-block">
                                <dl>
                                    <dt>Luas Lahan Bangunan</dt>
                                    <dd>{{$perum->luas_lahan_bangunan}} M<sup>2</sup></dd>
                                </dl>
                                <dl>
                                    <dt>Jumlah Rumah</dt>
                                    <dd>{{$perum->jumlah_rumah}}</dd>
                                </dl>
                            </div>

                            <a href="{{route('info', $perum->id)}}" class="btn btn-primary ts-btn-arrow">Detail</a>

                        </div>
                    </div>
                </div>
                @endif
                @endforeach
                <!--end slide-->
            </div>
            <!--end owl-carousel-->

            <!--Hero slider control-->
            <div class="ts-hero-slider-control">
                <div class="container" id="owl-control"></div>
            </div>

        </div>

    </section>

    <main id="ts-main">
      <section id="featured-properties" class="ts-block pt-5">
            <div class="container">

                <!--Title-->
                <div class="ts-title text-center">
                    <h2>Terbaru</h2>
                </div>

                <div class="row">

                    <!--Item-->
                    @foreach($perumahan->slice(0, 3) as $perum)
                    @if($perum->info)
                    <div class="col-sm-6 col-lg-4">

                        <div class="card ts-item ts-card ts-item__lg">

                            <!--Ribbon-->
                            <div class="ts-ribbon">
                                <i class="fa fa-thumbs-up"></i>
                            </div>

                            <!--Card Image-->
                            <a href="detail-01.html" class="card-img ts-item__image" data-bg-image="{{asset('picture/'.$perum->info->foto)}}">
                                <div class="ts-item__info-badge">Rp. {{number_format($perum->info->harga, 0, ',','.')}} Juta</div>
                                <figure class="ts-item__info">
                                    <h4>{{$perum->nama_perumahan}}</h4>
                                    <aside>
                                        <i class="fa fa-map-marker mr-2"></i>
                                        {{$perum->lokasi}}
                                    </aside>
                                </figure>
                            </a>

                            <!--Card Body-->
                            <div class="card-body">
                                <div class="ts-description-lists">
                                  <dl>
                                      <dt>Luas Lahan Bangunan</dt>
                                      <dd>{{$perum->luas_lahan_bangunan}} M<sup>2</sup></dd>
                                  </dl>
                                  <dl>
                                      <dt>Jumlah Rumah</dt>
                                      <dd>{{$perum->jumlah_rumah}}</dd>
                                  </dl>
                                </div>
                            </div>

                            <!--Card Footer-->
                            <a href="{{route('info', $perum->id)}}" class="card-footer">
                                <span class="ts-btn-arrow">Detail</span>
                            </a>

                        </div>
                        <!--end ts-item-->
                    </div>
                    @endif
                    @endforeach
                    <!--end Item col-md-4-->

                </div>
                <!--end row-->

                <!--All properties button-->
                <div class="text-center mt-3">
                    <a href="{{url('/perumahan')}}" class="btn btn-outline-dark ts-btn-border-muted">Lihat Semua</a>
                </div>

            </div>
            <!--end container-->
        </section>

        <!-- FEATURES
        =============================================================================================================-->
        <section class="ts-block bg-white">
            <div class="container py-4">
                <div class="row">

                    <!--Feature-->
                    <div class="col-sm-6 col-md-3">
                        <div class="ts-feature">

                            <figure class="ts-feature__icon p-2">
                                    <span class="ts-circle">
                                        <i class="fa fa-check"></i>
                                    </span>
                                <img src="assets/img/icon-house.png" alt="">
                            </figure>

                            <h4>Properties at Great Prices</h4>

                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>

                        </div>
                    </div>

                    <!--Feature-->
                    <div class="col-sm-6 col-md-3">
                        <div class="ts-feature">

                            <figure class="ts-feature__icon p-2">
                                    <span class="ts-circle">
                                        <i class="fa fa-check"></i>
                                    </span>
                                <img src="assets/img/icon-pin.png" alt="">
                            </figure>

                            <h4>Everything on One Place</h4>

                            <p>In dictum ac augue et suscipit. Vivamus ac tellus ut massa</p>

                        </div>
                    </div>

                    <!--Feature-->
                    <div class="col-sm-6 col-md-3">
                        <div class="ts-feature">

                            <figure class="ts-feature__icon p-2">
                                    <span class="ts-circle">
                                        <i class="fa fa-check"></i>
                                    </span>
                                <img src="assets/img/icon-agent.png" alt="">
                            </figure>

                            <h4>Local Agents</h4>

                            <p>Vivamus ac tellus ut massa bibendum aliquam vitae ac diam. </p>

                        </div>
                    </div>

                    <!--Feature-->
                    <div class="col-sm-6 col-md-3">
                        <div class="ts-feature">

                            <figure class="ts-feature__icon p-2">
                                    <span class="ts-circle">
                                        <i class="fa fa-check"></i>
                                    </span>
                                <img src="assets/img/icon-calculator.png" alt="">
                            </figure>

                            <h4>Free Mortgage Calculation</h4>

                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>

                        </div>
                    </div>

                </div>
                <!--end row-->
            </div>
            <!--end container-->
        </section>

    </main>

    <!--*********************************************************************************************************-->
    <!--************ FOOTER *************************************************************************************-->
    <!--*********************************************************************************************************-->

    <footer id="ts-footer">

        <!--MAIN FOOTER CONTENT
        =============================================================================================================-->
        <section id="ts-footer-main">
            <div class="container">
                <div class="row">

                    <!--Brand and description-->
                    <div class="col-md-6">
                        <a href="#" class="brand">
                            <!-- <img src="assets/img/logo.png" alt=""> -->
                        </a>
                        <p class="mb-4">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec placerat tempor sapien.
                            In lobortis posuere tincidunt. Curabitur malesuada tempus ligula nec maximus. Nam tortor
                            arcu,
                            tincidunt quis molestie non, sagittis dignissim ligula. Fusce est ipsum, pharetra in felis
                            ac,
                            lobortis volutpat diam.
                        </p>
                        <a href="#" class="btn btn-outline-dark mb-4">Contact Us</a>
                    </div>

                    <!--Navigation-->
                    <div class="col-md-2">
                        <h4>Navigation</h4>
                        <nav class="nav flex-row flex-md-column mb-4">
                            <a href="#" class="nav-link">Home</a>
                            <a href="#" class="nav-link">Listing</a>
                            <a href="#" class="nav-link">About Us</a>
                            <a href="#" class="nav-link">Sign In</a>
                            <a href="#" class="nav-link">Register</a>
                            <a href="#" class="nav-link">Submit Property</a>
                        </nav>
                    </div>

                    <!--Contact Info-->
                    <div class="col-md-4">
                        <h4>Contact</h4>
                        <address class="ts-text-color-light">
                            2590 Rocky Road
                            <br>
                            Philadelphia, PA 19108
                            <br>
                            <strong>Email: </strong>
                            <a href="#" class="btn-link">office@example.com</a>
                            <br>
                            <strong>Phone:</strong>
                            +1 215-606-0391
                            <br>
                            <strong>Skype: </strong>
                            real.estate1
                        </address>
                    </div>

                </div>
                <!--end row-->
            </div>
            <!--end container-->
        </section>
        <!--end ts-footer-main-->

        <!--SECONDARY FOOTER CONTENT
        =============================================================================================================-->
        <section id="ts-footer-secondary">
            <div class="container">

                <!--Copyright-->
                <div class="ts-copyright">(C) 2018 ThemeStarz, All rights reserved</div>

                <!--Social Icons-->
                <div class="ts-footer-nav">
                    <nav class="nav">
                        <a href="#" class="nav-link">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="nav-link">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="nav-link">
                            <i class="fab fa-pinterest-p"></i>
                        </a>
                        <a href="#" class="nav-link">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </nav>
                </div>
                <!--end ts-footer-nav-->

            </div>
            <!--end container-->
        </section>
        <!--end ts-footer-secondary-->

    </footer>
    <!--end #ts-footer-->

</div>
<!--end page-->

<script src="{{ asset('frontend/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{ asset('frontend/js/popper.min.js')}}"></script>
<script src="{{ asset('frontend/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('frontend/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{ asset('frontend/js/owl.carousel.min.js')}}"></script>
<script src="{{ asset('frontend/js/custom.js')}}"></script>

</body>
</html>
