@extends('template1.app')

@section('content')
  <div class="content-header">
    <H3 class="alert alert-info" role="alert">Data Perumahan</H3>
      <section class="box">
      <div class="container-fluid dashboard-content ">
  <body>
    <br>
    <div class="container">
      <h2><i>Edit Data Perumahan</i></h2>
      <br/>

      @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong>Ada beberapa masalah dengan input Anda.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                       <li>{{'ada error'}}</li>
            </ul>
        </div>
    @endif

     <form action="{{ url('admin/update', $perumahan->id) }}" method="post">
        <div class="col-md-11">
        @csrf 
       
        <div class="form-group">
          <label for="nama_perumahan">Nama Perumahan:</label>
          <input type="text" class="form-control" id="nama_perumahan" name="nama_perumahan" value="{{$perumahan->nama_perumahan}}">
        </div>

       <div class="form-group">
          <label for="lokasi">Lokasi:</label>
            <textarea class="form-control" id="lokasi" name="lokasi">{{$perumahan->lokasi}}</textarea>
        </div>

        <div class="form-group">
          <label for="kecamatan">Kecamatan:</label>
            <input type="text" class="form-control" id="kecamatan" name="kecamatan" value="{{$perumahan->kecamatan}}">
          </div>
        
        <div class="form-group">
          <label for="jumlah_rumah">Jumlah Rumah:</label>
            <input type="text" class="form-control" id="jumlah_rumah" name="jumlah_rumah" value="{{$perumahan->jumlah_rumah}}">
          </div>

            <div class="form-group">
          <label for="luas_lahan_bangunan">Luas Lahan Bangunan:</label>
            <input type="text" class="form-control" id="luas_lahan_bangunan" name="luas_lahan_bangunan" value="{{$perumahan->luas_lahan_bangunan}}">
          </div>

            <div class="form-group">
          <label for="latitude">Latitude:</label>
            <input type="text" class="form-control" id="latitude" name="latitude" value="{{$perumahan->latitude}}">
          </div>

            <div class="form-group">
          <label for="longitude">Longitude:</label>
            <input type="text" class="form-control" id="longitude" name="longitude" value="{{$perumahan->longitude}}">
          </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-md btn-primary">Submit</button>
                    <a href="{{ url('admin/perumahan') }}" class="btn btn-md btn-danger" type="button">Reset</a>
                </div>
      </form>
 
    </div>
</div>
</body>
</div>
</section>
</div>
@endsection