@extends('template1.app')

@section('content')
  <div class="content-header">
    <H3 class="alert alert-info" role="alert">Data Kecamatan</H3>
      <section class="box">
      <div class="container-fluid dashboard-content ">
  <body>
    <div class="container">
      <h2><i>Tambah Data Kecamatan</i></h2>
      <br/>
      <form action="{{url('admin/kec/simpan')}}" method="post">
        <div class="col-md-11">

        @csrf
        <div class="form-group">
          <label for="kecamatan">Nama Kecamatan:</label>
            <input type="text" class="form-control" id="kecamatan" name="kecamatan">
        </div>
        </br>

        <div class="form-group">
          <button type="submit" class="btn btn-md btn-primary">Submit</button>
            <a href="{{ url('admin/kecamatan') }}" class="btn btn-md btn-danger" type="button">Cancel</a>
        </div>
              
      </form>
    </div>
  </body>
</div>
@endsection