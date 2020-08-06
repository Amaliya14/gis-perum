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
                            <a class="nav-link active" href="{{url('/')}}">
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
                            <dd>{{$perum->jumlah_rumah}} Unit</dd>
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
    </section>

    <main id="ts-main">
      <section id="featured-properties" class="ts-block pt-5">
        <div class="container">
            <!--Title-->
            <div class="ts-title text-center">
              <h2><b>Grafik</b></h2>
            </div>
              <div class="row">
            </div>
              <div id="chartdiv"></div>
            </div>
            <!-- /.box-body-->
          </div>
          <!-- /.box -->
            </div>
            <!-- /.box-body -->
          </div>
      </div>
  </section>

@section('script')
<style>
#chartdiv {
  width: 100%;
  height: 400px;
}
</style>
<!-- Resources -->
<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>

<!-- Chart code -->
<script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

// Create chart instance
var chart = am4core.create("chartdiv", am4charts.XYChart);

// Export
chart.exporting.menu = new am4core.ExportMenu();

// Data for both series
chart.data = [
  <?php foreach ($perkecamatan as $per): ?>
    {
     "year" : "{{$per->kecamatan}}",
     "income"  : "{{$per->perkecamatan}}",
     "color": chart.colors.next()
    },
  <?php endforeach ?>
];


/* Create axes */
var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "year";
categoryAxis.renderer.minGridDistance = 30;

/* Create value axis */
var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

/* Create series */
var columnSeries = chart.series.push(new am4charts.ColumnSeries());
columnSeries.name = "Income";
columnSeries.dataFields.valueY = "income";
columnSeries.dataFields.categoryX = "year";

columnSeries.columns.template.tooltipText = "{categoryX} Terdapat {valueY} Perumahan";
columnSeries.columns.template.propertyFields.fillOpacity = "fillOpacity";
columnSeries.columns.template.propertyFields.stroke = "stroke";
columnSeries.columns.template.propertyFields.fill = "color";
columnSeries.columns.template.propertyFields.strokeWidth = "strokeWidth";
columnSeries.columns.template.propertyFields.strokeDasharray = "columnDash";
columnSeries.tooltip.label.textAlign = "middle";


var circle = bullet.createChild(am4core.Circle);
circle.radius = 4;

circle.fill = am4core.color("#fff");
circle.strokeWidth = 5;

chart.data = data;

}); // end am4core.ready()
</script>

@endsection
@yield('script')


        <!-- FEATURES
        =============================================================================================================-->
          <!-- Bar chart -->
    </main>

    @include('modal')
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
                <div class="ts-copyright">Copyright &copy; 2020 Sistem Informasi Geografis Pemetaan Perumahan Di Kota Tegal.</div>

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
