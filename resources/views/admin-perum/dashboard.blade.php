@extends('template2.app')

@section('content')
  <section class="content-header">
    <h2><b>Sistem Informasi Geografis Pemetaan Perumahan</b> Di Kota Tegal</h2>
      <H3 class="alert alert-info" role="alert"><b>Dashboard</b></H3>
        <ol class="breadcrumb"></ol>

        <!-- ./col -->
          <!-- small box -->
          <div class="text-center">
            <h2><td>{{Auth::user()->perumahan->nama_perumahan}}</td></h2>
              @if(Auth::user()->perumahan->info)
                <td> <img width="550" height="300" src="{{asset('picture/'.Auth::user()->perumahan->info->foto)}}" alt=""> </td>
              @else
                <td> <img width="500" height="300" src="{{asset('img/icon-house.png')}}" alt=""> </td>
              @endif
          </div>
  </section>
@endsection