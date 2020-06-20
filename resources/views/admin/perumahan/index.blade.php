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
                    <th>Gambar</th>
                    <th>Perumahan</th>
                    <th width="15%">Lokasi</th>
                    <th>Kecamatan</th>  
                    <th>Jumlah Rumah</th>
                    <th>Luas Bangunan</th>
                   <!--  <th>Latitude</th>
                    <th>Longitude</th> -->
                    <th width="15%">Action</th>
                </tr>
                </thead>
                <tbody>
                @php $no = 1; @endphp
                @foreach($perumahan as $perumahan)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td><img src="{{asset('/picture/'.$perumahan->gambar)}}" width="100px" height="100px"></td>
                        <td>{{ $perumahan->nama_perumahan }}</td>
                        <td>{{ $perumahan->lokasi }}</td>
                        <td>{{ $perumahan->kecamatan }}</td>
                        <td>{{ $perumahan->jumlah_rumah }} Unit</td>
                        <td>{{ $perumahan->luas_lahan_bangunan }} M<sup>2</sup></td>
                       <!--  <td>{{ $perumahan->latitude }}</td>
                        <td>{{ $perumahan->longitude }}</td> -->
                        <td>
                  <a class="btn btn-warning glyphicon glyphicon-pencil" type="button" href="{{ url('admin/edit', $perumahan->id) }}"></a>

             
                    <button class="btn btn-danger glyphicon glyphicon-trash" type="button" data-toggle="modal" data-target="#hapus{{$perumahan->id}}"></button>

                    <div class="modal fade" id="hapus{{$perumahan->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header bg-danger">
                          <h5 class="modal-title" id="exampleModalLongTitle">Hapus Perumahan</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form method="post" action="{{route('admin.destroy', $perumahan->id)}}">
                          @csrf
                          @method('DELETE')
                        <div class="modal-body">
                          Hapus Perumahan {{$perumahan->nama_perumahan}} ?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                          <button type="submit" class="btn btn-danger">Hapus</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
             @endforeach
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