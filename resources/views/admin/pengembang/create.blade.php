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
      <form action="{{url('admin/pengembang/simpan')}}" method="post">
        <div class="col-md-11">
        @csrf
        <div class="form-group">
          <label for="nama">Nama:</label>
            <input type="text" class="form-control" id="nama" name="nama">
        </div>

        <div class="form-group">
          <label for="perumahan">Perumahan:</label>
            <input type="text" class="form-control" id="perumahan" name="perumahan">
        </div>

        <div class="form-group">
          <label for="alamat">Alamat:</label>
            <textarea class="form-control" id="alamat" name="alamat"></textarea>
        </div>

        <div class="form-group">
          <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email">
                </div>

        <div class="form-group">
          <label for="no_tlpn">No Telepon:</label>
            <input type="text" class="form-control" id="no_tlpn" name="no_tlpn">
        </div>
                </br>
                <div class="form-group">
                    <button type="submit" class="btn btn-md btn-primary">Submit</button>
                    <a href="{{ url('admin/pengembang') }}" class="btn btn-md btn-danger" type="button">Cancel</a>
                </div>
              
      </form>
    </div>
  </body>
</div>
@endsection