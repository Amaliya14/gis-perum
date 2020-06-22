
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
    <script src="https://api.mapbox.com/mapbox-gl-js/v1.11.0/mapbox-gl.js"></script>
    <link href="https://api.mapbox.com/mapbox-gl-js/v1.11.0/mapbox-gl.css" rel="stylesheet" />

    <title>Gis Perum</title>

</head>

<body>

<!-- WRAPPER
    =================================================================================================================-->
<div class="ts-page-wrapper ts-has-bokeh-bg" id="page-top">

    <!--*********************************************************************************************************-->
    <!--HEADER **************************************************************************************************-->
    <!--*********************************************************************************************************-->
    <header id="ts-header" class="fixed-top">
      <nav id="ts-secondary-navigation" class="navbar" style="margin-bottom: -20px">
            <div class="container justify-content-center mt-3">
              <h2 class="text-dark">Sistem Informasi Geografis Pemetaan Di Kota Tegal</h2>
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
                            <a class="nav-link" href="{{url('/')}}">
                                Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/map')}}">
                                Peta
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{url('/perumahan')}}">
                                Perumahan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
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

    <!--*********************************************************************************************************-->
    <!-- MAIN ***************************************************************************************************-->
    <!--*********************************************************************************************************-->

    <main id="ts-main">

        <!--PAGE TITLE
            =========================================================================================================-->
        <section id="page-title">
            <div class="container">

                <div class="d-block d-sm-flex justify-content-between">

                    <!--Title-->
                    <div class="ts-title mb-0">
                        <h1>{{$perumahan->nama_perumahan}}</h1>
                        <h5 class="ts-opacity__90">
                            <i class="fa fa-map-marker text-primary"></i>
                            {{$perumahan->lokasi}}
                        </h5>
                    </div>

                    <!--Price-->
                    <h3>
                        <span class="badge badge-primary p-3 font-weight-normal ts-shadow__sm">
                          Rp. {{number_format($perumahan->info->harga,0,',','.')}}</span>
                    </h3>

                </div>

            </div>
        </section>

        <!--CONTENT
            =========================================================================================================-->
        <section id="content">
            <div class="container">
                <div class="row flex-wrap-reverse">

                    <!--LEFT SIDE
                        =============================================================================================-->
                    <div class="col-md-5 col-lg-4">

                        <!--DETAILS
                            =========================================================================================-->
                        <section>
                            <h3>Detail</h3>
                            <div class="ts-box">

                                <dl class="ts-description-list__line mb-0">

                                    <dt>Luas Lahan Bangunan:</dt>
                                    <dd>{{$perumahan->luas_lahan_bangunan}} m<sup>2</sup></dd>

                                    <dt>Jumlah Rumah</dt>
                                    <dd>{{$perumahan->jumlah_rumah}}</dd>

                                    <dt>tipe</dt>
                                    <dd>{{$perumahan->info->tipe}}</dd>
                                </dl>

                            </div>
                        </section>

                        <!--LOCATION
                            =========================================================================================-->
                        <section id="location">
                            <h3>Lokasi</h3>

                            <div class="ts-box p-0">

                                <div class="ts-map ts-map__detail" id="map"></div>

                                <dl class="ts-description-list__line mb-0 p-4">

                                    <dt><i class="fa fa-map-marker ts-opacity__30 mr-2"></i>Address:</dt>
                                    <dd class="border-bottom pb-2">{{$perumahan->lokasi}}</dd>

                                    <dt><i class="fa fa-phone-square ts-opacity__30 mr-2"></i>Phone:</dt>
                                    <dd class="border-bottom pb-2">{{$perumahan->pengembang->no_tlpn}}</dd>

                                    <dt><i class="fa fa-envelope ts-opacity__30 mr-2"></i>Email:</dt>
                                    <dd class="border-bottom pb-2"><a href="#">{{$perumahan->pengembang->email}}</a></dd>


                                </dl>

                            </div>

                        </section>

                        <!--ACTIONS
                        =============================================================================================-->


                    </div>
                    <!--end col-md-4-->

                    <!--RIGHT SIDE
                        =============================================================================================-->
                    <div class="col-md-7 col-lg-8">

                        <!--GALLERY CAROUSEL
                        =============================================================================================-->
                        <section id="gallery-carousel position-relative">

                            <h3>Foto</h3>

                            <div class="owl-carousel ts-gallery-carousel" data-owl-auto-height="1" data-owl-dots="1">

                                <!--Slide-->
                                <div class="slide">
                                    <div class="ts-image" data-bg-image="{{asset('picture/'.$perumahan->info->foto)}}">
                                        <a href="{{asset('picture/'.$perumahan->info->foto)}}" class="ts-zoom popup-image"><i class="fa fa-search-plus"></i>Zoom</a>
                                    </div>
                                </div>

                            </div>

                        </section>

                        <!--DESCRIPTION
                            =========================================================================================-->
                        <section id="description">

                            <h3>Keterangan</h3>

                            <p>
                              {{$perumahan->info->keterangan}}
                            </p>

                        </section>

                        <!--FEATURES
                            =========================================================================================-->


                        <!--AMENITIES
                        =============================================================================================-->

                    </div>
                    <!--end col-md-8-->

                </div>
                <!--end row-->
            </div>
            <!--end container-->
        </section>


    </main>
    <!--end #ts-main-->

    <!--*********************************************************************************************************-->
    <!--************ FOOTER *************************************************************************************-->
    <!--*********************************************************************************************************-->

    <footer id="ts-footer">

        <!--MAIN FOOTER CONTENT
            =========================================================================================================-->
        <section id="ts-footer-main">
            <div class="container">
                <div class="row">

                    <!--Brand and description-->
                    <div class="col-md-6">
                        <a href="#" class="brand">
                            <img src="assets/img/logo.png" alt="">
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
            =========================================================================================================-->
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
<script src="{{ asset('frontend/js/jquery.magnific-popup.min.js')}}"></script>

<script src="{{ asset('frontend/js/owl.carousel.min.js')}}"></script>
<script src="{{ asset('frontend/js/custom.js')}}"></script>
<script>
const lat = {{$perumahan->latitude}};
const long = {{$perumahan->longitude}}

mapboxgl.accessToken = 'pk.eyJ1IjoiaXNuYS1hbWFsaXlhIiwiYSI6ImNrYmkyZ2tlMDBiMjczMW15eHVlYXBhZW4ifQ.uqVd8rK5Oe49IjUREFnfgw';
  const map = new mapboxgl.Map({
    container: 'map', // container id
    style: 'mapbox://styles/mapbox/streets-v11', // stylesheet location
    center: [long, lat], // starting position [lng, lat]
    zoom: 11 // starting zoom
  });

    const marker = new mapboxgl.Marker();
    marker.setLngLat({lng: long,lat: lat}).addTo(map);
</script>

</body>
</html>
