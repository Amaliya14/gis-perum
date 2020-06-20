@extends('template1.app')

@section('content')
  <div class="content-header">
    <H3 class="alert alert-info" role="alert">Data Perumahan</H3>
      <section class="box">
      <div class="container-fluid dashboard-content ">
  <body>
    <div class="container">
      <h2><i>Tambah Data Perumahan</i></h2>
      <br/>
      <form action="{{url('admin/simpan')}}" method="post">
        <div class="col-md-11">
        @csrf
        <div class="form-group">
          <label for="nama_perumahan">Nama Perumahan:</label>
          <input type="text" class="form-control" id="nama_perumahan" name="nama_perumahan">
        </div>

        <div class="form-group">
          <label for="lokasi">Lokasi:</label>
            <textarea class="form-control" id="lokasi" name="lokasi"></textarea>
        </div>

        <div class="form-group">
          <label for="kecamatan">Kecamatan:</label>
            <input type="text" class="form-control" id="kecamatan" name="kecamatan">
        </div>

        <div class="form-group">
          <label for="jumlah_rumah">Jumlah Rumah:</label>
            <input type="textarea" class="form-control" id="jumlah_rumah" name="jumlah_rumah">
        </div>

        <div class="form-group">
          <label for="luas_lahan_bangunan">Luas Lahan Bangunan:</label>
          <input type="text" class="form-control" id="luas_lahan_bangunan" name="luas_lahan_bangunan">
        </div>

        <div class="form-group">
          <label for="latitude">Latitude:</label>
            <input type="text" class="form-control" id="latitude" name="latitude">
        </div>

        <div class="form-group">
          <label for="longitude">Longitude:</label>
            <input type="text" class="form-control" id="longitude" name="longitude">
        </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-md btn-primary">Submit</button>
                    <a href="{{ url('admin/perumahan') }}" class="btn btn-md btn-danger" type="button">Cancel</a>
                </div>
      </form>
    </div>
  </body>
</div>
@endsection