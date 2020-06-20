@extends('template1.app')

@section('content')
  <div class="content-header">
    <H3 class="alert alert-info" role="alert">Data Perumahan</H3>
      <section class="box">
      <div class="container-fluid dashboard-content ">
        <br>

  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  </br>
  @endif


        <div class="form-group">
    <div class="text-left">
            <a href="{{url('admin/create')}}" type="button" class="btn btn-success glyphicon glyphicon-plus">Tambah</a>
          </div>
      </div>

          <div class="text-right">
        <form action="/perumahan/cari" method="GET" class="form-inline">
          <input class="form-control" type="text" name="cari" placeholder="Cari Perumahan .." value="{{ old('cari') }}">
          <input class="btn btn-primary ml-3" type="submit" value="CARI">
        </form>

<style>
    th{
      text-align: center;
    }
  </style>
<br>

    <div class="box-body">
      <table class="table table-bordered table-hover table-striped" id="user_table" style="text-align:center">
          <thead>
            <tr>
                    <th>No.</th>
                    <th>Perumahan</th>
                    <th width="15%">Lokasi</th>
                    <th>Kecamatan</th>  
                    <th>Jumlah Rumah</th>
                    <th>Luas Bangunan</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    <th width="15%">Action</th>
                </tr>
                </thead>
                <tbody>
                @php $no = 1; @endphp
                @foreach($perumahan as $perumahan)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $perumahan->nama_perumahan }}</td>
                        <td>{{ $perumahan->lokasi }}</td>
                        <td>{{ $perumahan->kecamatan }}</td>
                        <td>{{ $perumahan->jumlah_rumah }}</td>
                        <td>{{ $perumahan->luas_lahan_bangunan }}</td>
                        <td>{{ $perumahan->latitude }}</td>
                        <td>{{ $perumahan->longitude }}</td>
                        <td>

                <form action="{{ url('admin/destroy', $perumahan->id) }}" method="post">
                
                <a class="btn btn-warning glyphicon glyphicon-pencil" type="button" href="{{ url('admin/edit', $perumahan->id) }}"></a>

                @csrf
                    <button class="btn btn-danger glyphicon glyphicon-trash" type="submit" onclick="return confirm('Yakin ingin menghapus data?')"></button>
                </td>
              </tr>
             @endforeach
           </form>
            </tbody>
        </table>
    </td>
  </br>
  <div class="pull-right">
                  1-50/200
                  <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                  </div>
      </div>
    </div>
  </div>
</section>
</div>

@endsection