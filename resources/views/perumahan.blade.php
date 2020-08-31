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
        <nav id="ts-primary-navigation" class="navbar navbar-expand-md navbar-dark">
            <div class="container">

                <!--Brand Logo-->
                <a class="navbar-brand" href="index-map-leaflet-fullscreen.html">
                  <img src="https://www.clipartkey.com/mpngs/m/82-827919_gambar-rumah-vector-png-grah-pravesh-logo-png.png" width="40px" height="30px" alt="">
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
                    
                    <ul class="navbar-nav ml-auto">
                    
                        @auth('pengguna')
                        <li class="nav-item-dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown">
                           {{ Auth::user()->nama }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{route('users.logout')}}">Logout</a>
                                </div>
</li>
                        @endauth

                        @guest('pengguna')
                        <li class="nav-item">
                        <a class="nav-link" data-toggle="modal" data-target="#modalLoginForm">
                                Login
                            </a>
                           
                            </li>
                        @endguest
                        
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
    <main id="ts-main">

       <!--BREADCRUMB
           =========================================================================================================-->
       <section id="breadcrumb">
           <div class="container">
               <nav aria-label="breadcrumb">

               </nav>
           </div>
       </section>

       <!--PAGE TITLE
           =========================================================================================================-->
       <section id="page-title">
           <div class="container">

               <div class="ts-title">
                   <h1>Search Results</h1>
               </div>

           </div>
       </section>

       <!--SEARCH FORM
           =========================================================================================================-->
       <section id="search-form">
           <div class="container">

               <form id="form-search" class="ts-form" method="GET" action="{{route('cari')}}">

                   <section class="ts-box p-0">

                       <!--PRIMARY SEARCH INPUTS
                           =========================================================================================-->
                       <div class="form-row px-4 py-3">

                           <!--Keyword-->
                           <div class="col-sm-12 col-md-4">
                               <div class="form-group my-2">
                                   <input type="text" class="form-control" name="keyword" placeholder="Nama Perumahan">
                               </div>
                           </div>
                           <div class="col-sm-2">
                               <div class="form-group my-2">
                                   <button type="submit" class="btn btn-primary w-100" id="search-btn">Cari
                                   </button>
                               </div>
                           </div>


                       </div>
                       <!--end form-row-->
                   </section>

               </form>
               <!--end #form-search-->

           </div>
           <!--end container-->
       </section>
       <!--end #search-form-->

       <!--DISPLAY CONTROL
           =========================================================================================================-->

       <!--ITEMS LISTING
           =========================================================================================================-->
       <section id="items-grid">
           <div class="container">

               <!--Row-->
               <div class="row">

                   <!--Item-->

                   @foreach($perumahan as $perum)

                   <div class="col-sm-6 col-lg-4">

                       <div class="card ts-item ts-card ts-item__lg">

                           <!--Ribbon-->
                           <!-- <div class="ts-ribbon">
                               <i class="fa fa-thumbs-up"></i>
                           </div> -->

                           <!--Card Image-->
                          <!--Card Image-->
                            <a class="card-img ts-item__image" data-bg-image="{{asset('picture/'.$perum->info->foto)}}">
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
                                      <dt>Total Rumah</dt>
                                      <dd>{{$perum->jumlah_rumah}} Unit</dd>
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
                   <!--end Item col-md-4-->

                   @endforeach
               </div>
               <!--end row-->
           </div>
           <!--end container-->
       </section>

       <!--PAGINATION
           =========================================================================================================-->
       <section id="pagination">
           <div class="container">

               <!--Pagination-->
               <nav aria-label="Page navigation">
                   <ul class="pagination ts-center__horizontal">
                     {{$perumahan->links()}}

                   </ul>
               </nav>

           </div>
       </section>

   </main>

   @include('modal')

    <footer id="ts-footer">

        <!--MAIN FOOTER CONTENT
        =============================================================================================================-->
        <section id="ts-footer-main">
            <div class="container">
                <div class="row">

                    <!--Brand and description-->
                    <div class="col-md-6">
                        <a href="#" class="brand">
                            <img src="adminlte/dist/img/animasi-rumah.jpg" alt="">
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
        =============================================================================================================-->
        <section id="ts-footer-secondary">
            <div class="container">

                <!--Copyright-->
                <div class="ts-copyright">Copyright &copy; 2020 Sistem Informasi Geografis Pemetaan Perumahan Di Kota Tegal</div>

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
<script src="{{ asset('frontend/js/owl.carousel.min.js')}}"></script>
<script src="{{ asset('frontend/js/custom.js')}}"></script>

</body>
</html>
