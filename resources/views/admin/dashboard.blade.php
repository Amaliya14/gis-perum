@extends('template1.app')

@section('content')
  <section class="content-header">
    <h2><b>Sistem Informasi Geografis Pemetaan Perumahan</b> Di Kota Tegal</h2>
      <H3 class="alert alert-info" role="alert"><b>Dashboard</b></H3>
        <ol class="breadcrumb"></ol>

        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{ $jumlahkecamatan }}</h3>

              <p>Data Kecamatan</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{url('admin/kecamatan')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              <h3>{{ $jumlahkelurahan }}</h3>

              <p>Data Kelurahan</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{url('admin/kelurahan')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

         <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{ $jumlahpengembang }}</h3>

              <p>Data Pengembang</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{url('admin/pengembang')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{ $jumlahperumahan }}</h3>

              <p>Data Perumahan</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{url('admin/perumahan')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
       

<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <!-- Bar chart -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-bar-chart-o"></i>

              <h3 class="box-title"><b>Grafik Marker</b></h3>

            </div>
            <div class="box-body">
              
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
  @endsection
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
circle.strokeWidth = 3;

chart.data = data;

}); // end am4core.ready()
</script>

@endsection