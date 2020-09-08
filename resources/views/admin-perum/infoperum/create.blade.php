@extends('template2.app')

@section('content')
  <div class="content-header">
    <H3 class="alert alert-info" role="alert">Detail Perumahan</H3>
      <section class="box">
      <div class="container-fluid dashboard-content ">
  <body>
    <div class="container">
      <h2><i>Tambah Info Perumahan</i></h2>
      <br/>
      <form action="{{url('admin-perum/simpan')}}" method="post">
        <div class="col-md-11">
        @csrf
        <div class="form-group">
          <label for="nama_perumahan">Nama Perumahan:</label>
            <input type="text" class="form-control" id="nama_perumahan" name="nama_perumahan">
        </div>

       <div class="input-group">
          <label for="rumah_tersedia">Rumah Tersedia:</label>
            <input type="text" class="form-control" id="rumah_tersedia" name="rumah_tersedia" aria-describedby="basic-addon2">
                <span class="input-group-addon" id="basic-addon2">Unit</span>>
        </div>

        <div class="form-group">
          <label for="tipe">Tipe:</label>
            <input type="text" class="form-control" id="tipe" name="tipe">
        </div>

        <div class="form-group">
          <label for="harga">Harga:</label>
            <input type="text" class="form-control" id="harga" name="harga">
        </div>

         <div class="form-group">
          <label for="keterangan">Keterangan:</label>
            <textarea class="form-control" id="keterangan" name="keterangan"></textarea>
        </div>

        <div class="form-group">
          <label for="foto">Foto:</label>
            <input type="file" class="form-control" name="foto">
        </div>
        
              </br>
                <div class="form-group">
                    <button type="submit" class="btn btn-md btn-primary">Submit</button>
                    <a href="{{ url('admin-perum/infoperum') }}" class="btn btn-md btn-danger" type="button">Cancel</a>
                </div>
              
      </form>
    </div>
  </body>
</div>
@endsection