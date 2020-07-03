
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="ThemeStarz">

  <link rel="stylesheet" href="{{ asset('frontend/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{ asset('frontend/font-awesome/css/fontawesome-all.min.css')}}">
  <link rel="stylesheet" href="{{ asset('frontend/css/style.css')}}">

	<title>GIS-PERUM</title>

</head>

<body>

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
                        <li class="nav-item">
                          <a class="dropdown-toggle" data-toggle="dropdown">
                            Info Perumahan
                          </a>
                            <ul class="dropdown-menu">
                              <li><a href="{{url('/perumahan')}}">Perumahan</a></li>
                              <li><a href="{{url('/nama-pengembang')}}">Nama Pengembang</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{url('/kontak')}}">
                                Contact Us
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
    <!--************ MAIN ***************************************************************************************-->
    <!--*********************************************************************************************************-->

    <main id="ts-main">

        <!--BREADCRUMB ******************************************************************************************-->
        <section id="breadcrumb">
            <div class="container">
                <nav aria-label="breadcrumb">

                    <!--end breadcrumb-->
                </nav>
                <!--end nav-->
            </div>
            <!--end container-->
        </section>

        <!--PAGE TITLE ******************************************************************************************-->
        <section id="page-title">
            <div class="container">
                <div class="ts-title">
                    <h1>Contact Us</h1>
                </div>
                <!--end ts-title-->
            </div>
            <!--end container-->
        </section>

        <!--DESCRIPTION *****************************************************************************************-->
        <section id="about-us-description">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
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
                    <!--end col-md-8-->
                    <div class="col-md-4"></div>
                    <!--end col-md-4-->
                </div>
                <!--end row-->
                <hr class="my-5">
            </div>
            <!--end container-->
        </section>

        <!--TEAM
            =========================================================================================================-->


        <!--TESTIMONIALS ****************************************************************************************-->

    </main>
    <!--end #ts-main-->

    <!--*********************************************************************************************************-->
    <!--************ FOOTER *************************************************************************************-->
    <!--*********************************************************************************************************-->

    <footer id="ts-footer">

        <section id="ts-footer-main">
            <div class="container">
                <div class="row">
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
                            <a href="{{url('/kontak')}}" class="nav-link">Contact</a>
                        </nav>
                    </div>

                    <!--Contact Info-->
                    <div class="col-md-4">
                        <h4>Contact</h4>
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
                <div class="ts-copyright">Copyright &copy; 2020 Sistem Informasi Geografis Pemetaan Perumahan Di Kota Tegal.</div>
                <!--end ts-copyright-->
               
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
