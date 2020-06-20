@extends('template1.app')

@section('content')
  <div class="content-header">
    <H3 class="alert alert-info" role="alert">Data Perumahan</H3>
      <section class="box">
      <div class="container-fluid dashboard-content ">
    <div class="container">
      <h2><i>Tambah Data Perumahan</i></h2>
      <br/>
      <form action="{{url('admin/simpan')}}" method="post" enctype="multipart/form-data" >
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

        <div class="row">
          <div class="col-sm-4">
             <div class="form-group">
          <label for="kecamatan">Kecamatan:</label>
            <!-- <input type="text" class="form-control" id="kecamatan" name="kecamatan"> -->
            <select class="form-control" name="kecamatan">
              @foreach($kecamatan as $k)
              <option>
                {{$k->kecamatan}}
              </option>
              @endforeach
            </select>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
            <label for="jumlah_rumah">Jumlah Rumah:</label>
            <input type="number" class="form-control" id="jumlah_rumah" name="jumlah_rumah">
            </div>
          </div>
           <div class="col-sm-4">
           <label>Luas Lahan Bangunan:</label>    
            <div class="input-group">
            <input type="number" name="luas_lahan_bangunan" class="form-control" aria-describedby="basic-addon2">
            <span class="input-group-addon" id="basic-addon2">M<sup>2</sup></span>
          </div>
            </div>
             <div class="col-sm-6">
            <label>Gambar :</label>    
            <div class="input-group">
            <input type="file" name="gambar" class="form-control mb-2" accept="image/*">
           
          </div>
            </div>
        </div>

     
      <div class="row" style="margin-top: 5px">
        <div class="col-sm-6">
           <div class="form-group">
          <label for="latitude">Latitude:</label>
            <input type="text" class="form-control" id="latitude" name="latitude">
        </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
          <label for="longitude">Longitude:</label>
            <input type="text" class="form-control" id="longitude" name="longitude">
        </div>
        </div>
      </div>
        <div id="map" style="width: 1020px; height: 400px; margin-bottom: 10px"></div>

          <div class="form-group">
          <a href="{{ url('admin/perumahan') }}" class="btn btn-md btn-danger" type="button">Batal</a>
            <button type="submit" class="btn btn-md btn-primary">Simpan</button>
          </div> 

      </form>
    </div>
  </div>
@endsection
@section('script')
<script>
  const lat = document.querySelector('#latitude');
  const long = document.querySelector('#longitude');

  mapboxgl.accessToken = 'pk.eyJ1IjoiaXNuYS1hbWFsaXlhIiwiYSI6ImNrYmkyZ2tlMDBiMjczMW15eHVlYXBhZW4ifQ.uqVd8rK5Oe49IjUREFnfgw';
    const map = new mapboxgl.Map({
      container: 'map', // container id
      style: 'mapbox://styles/mapbox/streets-v11', // stylesheet location
      center: [109.125595, -6.879704], // starting position [lng, lat]
      zoom: 11 // starting zoom
    });

    const marker = new mapboxgl.Marker();
    map.on('click', function(e){
     // console.log(e.lngLat);
     lat.value = e.lngLat.lat;
     long.value = e.lngLat.lng;


    marker.setLngLat(e.lngLat)
    .addTo(map);
  // }

});
</script>
@endsection