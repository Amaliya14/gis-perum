@extends('template2.app')

@section('content')
  <div class="content-header">
    <H3 class="alert alert-info" role="alert">Detail Perumahan</H3>
      <section class="box">
      <div class="container-fluid dashboard-content ">
        <br>
          <div class="pull-right">
            <a href="{{ url('admin-perum/create') }}" type="button" class="btn btn-success glyphicon glyphicon-plus">Tambah</a>
          </div>
      </div>
        </br>

  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  </br>
  @endif
  <style>
    th{
      text-align: center;
    }
  </style>
    <br>
      <table class="table table-bordered table-hover table-striped" style="text-align:center">
          <thead>
            <tr>
                    <th>No.</th>
                    <th>Nama Perumahan</th>
                    <th>Tipe</th>
                    <th>Harga</th>
                    <th>Keterangan</th>
                    <th>Foto</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php $no = 1; @endphp
                @foreach($infoperum as $infoperum)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $infoperum->nama_perumahan }}</td>
                        <td>{{ $infoperum->tipe }}</td>
                        <td>{{ $infoperum->harga }}</td>
                        <td>{{ $infoperum->keterangan }}</td>
                        <td><img width="70px" src="{{ url('picture', $infoperum->foto) }}"></td>
                        
                <form action="{{ url('admin-perum/destroy', $infoperum->id) }}" method="post">
                  <a class="btn btn-primary glyphicon glyphicon-edit" type="button" href="{{ url('admin-perum/edit', $infoperum->id) }}">Edit</a>

                @csrf
                  <button class="btn btn-danger glyphicon glyphicon-trash" type="submit" onclick="return confirm('Yakin ingin menghapus data?')">Delete</button>
                </td>
              </tr>
             @endforeach
            </tbody>
        </table>
</br>
      </div>
    </div>
  </div>
</section>
</div>

@endsection