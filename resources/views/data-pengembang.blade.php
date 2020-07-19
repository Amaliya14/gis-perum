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

    <title>Gis-Perum</title>

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
                            <a class="nav-link" href="{{url('/')}}">
                                Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/map')}}">
                                Peta
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown">
                                Info Perumahan
                            </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{url('/perumahan')}}">Perumahan</a>
                                    <a class="dropdown-item" href="{{url('/data-pengembang')}}">Data Pengembang</a>
                                </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/kontak')}}">
                                Contact 
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
       

        <!--CONTENT
            =========================================================================================================-->
        <section id="content">
            <div class="container">
                <div class="row flex-wrap-reverse">

                    <!--LEFT SIDE
                        =============================================================================================-->

                    <!--DETAILS
                            =========================================================================================-->
    <section id="page-title">
            <div class="container">
                <div class="ts-title">
                    <h1>Data Pengembang</h1>
                </div>
                <!--end ts-title-->
                <div class="box-body" class="text-dark">
      <table id="example1" class="table table-bordered table-hover table-striped" style="text-align:center">
                    <thead>
                        <tr>
                          <th>No.</th>
                          <th>Nama</th>
                          <th>Perumahan</th>
                          <th>Email</th>
                          <th>Alamat</th>
                          <th width="15%">No Telepon</th>
                      </tr>
                            </thead>
                            <tbody>
                            @php $no = 1; @endphp
                            @foreach($data as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{$item->nama}}</td>
                                <td>{{ $item->perumahan->nama_perumahan }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{$item->alamat}}</td>
                                <td>{{ $item->no_tlpn }}</td>
                            @endforeach
                        </tbody>
                    </tr>
                    </table>
            </div>
            <!--end container-->
        </section>
    
                        <!--LOCATION
                            =========================================================================================-->
                        
                        <!--ACTIONS
                        =============================================================================================-->


                    </div>
                    <!--end col-md-4-->

                    <!--RIGHT SIDE
                        =============================================================================================-->
                    <div class="col-md-7 col-lg-8">

                        <!--GALLERY CAROUSEL
                        =============================================================================================-->


                        <!--DESCRIPTION
                            =========================================================================================-->
                        

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
                    </div>

                    <!--Navigation-->
                    <div class="col-md-2">
                        <h4>Navigation</h4>
                        <nav class="nav flex-row flex-md-column mb-4">
                            <a href="{{url('/')}}" class="nav-link">Home</a>
                            <a href="{{url('/map')}}" class="nav-link">Peta</a>
                            <a href="{{url('/perumahan')}}" class="nav-link">Perumahan</a>
                            <a href="{{url('/data-pengembang')}}" class="nav-link">Data Pengembang</a>
                            <a href="{{url('/kontak')}}" class="nav-link">Contact Us</a>
                        </nav>
                    </div>

                    <!--Contact Info-->
                    <div class="col-md-4">
                        <h4>Contact Us</h4>
                        <address class="ts-text-color-light">
                            Dinas Perumahan Dan Kawasan Pemukiman Kota Tegal
                            <br>
                            Jl. Ki Gede Sebayu No.11 Tegal
                            <br>
                            <strong>Email: </strong>
                            <a href="#" class="btn-link">diskimtaru@tegalkota.go.id</a>
                            <br>
                            <strong>Phone:</strong>
                            +62283 358165
                            <br>
                            <strong>Website: </strong>
                            disperkim.tegalkota.go.id 
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
                <div class="ts-copyright"> 2020 Sistem Informasi Geografis Pemetaan Perumahan Di Kota Tegal</div>

                <!--Social Icons-->
               
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
</body>
</html>
