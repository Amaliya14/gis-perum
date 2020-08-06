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
                            <a class="nav-link active" href="{{url('/kontak')}}">
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
                    <h1>Grafik Marker</h1>
                </div>
                <!--end ts-title-->
            </div>
            <!--end container-->
        </section>

        <!--DESCRIPTION *****************************************************************************************-->
        <section id="about-us-description">
            <div class="container">
                <div class="row">
                    <div class="col-md-10">
            <!-- Bar chart -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-bar-chart-o"></i>
            </div>
            <div class="box-body">
              <h1>Grafik Marker</h1>
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
  height: 350px;
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


    @include('modal')
    <!--*********************************************************************************************************-->
    <!--************ FOOTER *************************************************************************************-->
    <!--*********************************************************************************************************-->

    <footer id="ts-footer">

        <section id="ts-footer-main">
            <div class="container">
                <div class="row">
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
                            <a href="{{url('/data-pengembang')}}" class="nav-link">Data Pengembang</a>
                            <a href="{{url('/perumahan')}}" class="nav-link">Perumahan</a>
                            <a href="{{url('/kontak')}}" class="nav-link">Contact Us</a>
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
