@extends('template1.app')

@section('content')
  <div class="content-header">
    <H3 class="alert alert-info" role="alert">Data Pengembang</H3>
      <section class="box">
      <div class="container-fluid dashboard-content ">
  <body>
    <div class="container">
      <h2><i>Tambah Data Pengembang</i></h2>
      <br/>

  @if ($errors->any())
    <div class="col-md-11">
        <div class="alert alert-danger">
            <strong>Whoops!</strong>Ada beberapa masalah dengan input Anda.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

      <form action="{{url('admin/pengembang/simpan')}}" method="post">
        <div class="col-md-11">
        @csrf
        <div class="form-group">
          <label for="nama">Nama:</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{old('nama')}}">
              @if ($errors->has('nama'))
                <span class="text-danger">{{ $errors->first('nama') }}</span>
              @endif
        </div>

        <div class="form-group">
          <label for="nama_perumahan">Perumahan:</label>
            <select class="form-control" name="id_perumahan" required="required">
              @foreach($perumahan as $p)
              <option value="{{$p->nama_perumahan}}" {{old('nama_perumahan') === $p->perumahan ? 'selected' : ''}}>
              {{$p->nama_perumahan}}
              </option>
              @endforeach
            </select>
        </div>

        <div class="form-group">
          <label for="alamat">Alamat:</label>
            <textarea class="form-control" id="alamat" name="alamat" value="{{old('alamat')}}"></textarea>
            @if ($errors->has('alamat'))
                <span class="text-danger">{{ $errors->first('alamat') }}</span>
            @endif
        </div>

        <div class="form-group">
          <label for="username">Username:</label>
            <input type="username" class="form-control" id="username" name="username" value="{{old('username')}}">
            @if ($errors->has('username'))
                <span class="text-danger">{{ $errors->first('username') }}</span>
            @endif
        </div>

        <div class="form-group">
          <label for="no_tlpn">No Telepon:</label>
            <input type="text" class="form-control" id="no_tlpn" name="no_tlpn" value="{{old('no_tlpn')}}">
            @if ($errors->has('no_tlpn'))
                <span class="text-danger">{{ $errors->first('no_tlpn') }}</span>
            @endif
        </div>
          </br>

          <div class="form-group">
            <a href="{{ url('admin/pengembang') }}" class="btn btn-md btn-danger" type="button">Batal</a>
              <button type="submit" class="btn btn-md btn-primary">Simpan</button>
          </div>

      </form>
    </div>
  </body>
</div>
@endsection
