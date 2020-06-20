@extends('template2.app')

@section('content')
  <section class="content-header">
    <h2><b>Sistem Informasi Geografis Pemetaan Perumahan</b> Di Kota Tegal</h2>
      <H3 class="alert alert-info" role="alert"><i><b>Dashboard</b></i></H3>
        <ol class="breadcrumb"></ol>

        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{ $jumlahinfoperum }}</h3>

              <p>Info Perumahan</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{ url('admin-perum/infoperum') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
  </section>

@endsection