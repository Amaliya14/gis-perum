
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
                            <a class="nav-link" href="{{url('/perumahan')}}">
                                Perumahan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{url('/kontak')}}">
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
                    <h1>Kontak</h1>
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
                        <p class="h3">
                            Phasellus quis scelerisque ligula. Sed gravida tincidunt purus at tincidunt. Etiam ac diam
                            eu purus aliquam vehicula eleifend eget turpis. In finibus vel elit eget suscipit.
                        </p>
                        <p class="mb-5">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec placerat tempor sapien. In
                            lobortis posuere tincidunt. Curabitur malesuada tempus ligula nec maximus. Nam tortor arcu,
                            tincidunt quis molestie non, sagittis dignissim ligula. Fusce est ipsum, pharetra in felis
                            ac,
                            lobortis volutpat diam.
                        </p>
                        <a href="contact.html" class="btn btn-primary">Contact us</a>
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
        <section id="about-us-testimonials-carousel">
            <div class="bg-white text-center py-5">
                <div class="container">
                    <div class="offset-lg-2 col-lg-8">
                        <div class="owl-carousel" data-owl-items="1" data-owl-dots="1">

                            <div class="ts-slide">
                                <div class="ts-circle__sm" data-bg-image="assets/img/img-person-01.jpg"></div>
                                <h5 class="my-3">Jane Doe</h5>
                                <p class="h5 font-weight-normal ts-text-color-light">
                                    Duis ac dolor et enim volutpat semper. Morbi placerat tempor ornare. Quisque
                                    bibendum
                                    ultrices diam, ac fermentum massa egestas quis.
                                </p>
                            </div>
                            <!--end ts-slide-->



                        </div>
                        <!--end owl-carousel-->
                    </div>
                    <!--end offset-lg-2-->
                </div>
                <!--end container-->
            </div>
            <!--end ts-block-->
        </section>

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
                    <!--end col-md-6-->
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
                    <!--end col-md-2-->
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
                        <!--end address-->
                    </div>
                    <!--end col-md-4-->
                </div>
                <!--end row-->
            </div>
            <!--end container-->
        </section>
        <!--end ts-footer-main-->

        <section id="ts-footer-secondary">
            <div class="container">
                <div class="ts-copyright">(C) 2018 ThemeStarz, All rights reserved</div>
                <!--end ts-copyright-->
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
                    <!--end nav-->
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
