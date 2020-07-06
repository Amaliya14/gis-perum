@extends('template2.app')

@section('content')
  <div class="content-header">
    <H3 class="alert alert-info" role="alert">Data Info Perumahan</H3>
      <section class="box">
      <div class="container-fluid dashboard-content ">

<div class="form-group">
  <style>
    th{
      text-align: center;
    }
  </style>
    <br>
    <div class="box-body">
      <table id="example1" class="table table-bordered table-condensed" style="text-align:center">
          <thead>
            <tr>
                <th>No.</th>
                <th>Foto</th>
                <th>Nama Perumahan</th>
                <th>Tipe</th>
                <th>Harga</th>
                <th>Keterangan</th>
                <th>Action</th>
            </tr>
            </thead>
              <tbody>
                <!-- @if(Auth::user()->perumahan->info) -->
                  <tr>
                    <td>1</td>
                    @if(Auth::user()->perumahan->info)
                    <td> <img width="70" height="70" src="{{asset('picture/'.Auth::user()->perumahan->info->foto)}}" alt=""> </td>
                    @else
                    <td> <img width="70" height="70" src="{{asset('frontend/img/rumah.png')}}" alt=""> </td>
                    @endif
                    <td>{{Auth::user()->perumahan->nama_perumahan}}</td>
                    <td>{{Auth::user()->perumahan->info ? Auth::user()->perumahan->info->tipe : ''}}</td>
                    <td>{{Auth::user()->perumahan->info ? Auth::user()->perumahan->info->harga : ''}}</td>
                    <td>{{Auth::user()->perumahan->info ? Auth::user()->perumahan->info->katerangan : ''}}</td>
                    <td>
                      <button type="button" class="btn btn-primary" name="button" onclick="window.location='{{route('info-edit')}}'"> <i class="fa fa-edit"></i> </button>
                    </td>
                  </tr>
                <!-- @endif -->
              </tbody>
        </table>
      </div>
    </section>
  </div>

@endsection

@section('script')

<script>
$(function () {
  $('#example1').DataTable({
        "lengthMenu": [[5, 10, 25, 50, 100], [5, 10, 25, 50, 100]]
    } )
})
</script>
@endsection
