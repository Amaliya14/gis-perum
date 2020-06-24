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

     <form action="{{ url('admin/perumahan/update', $perumahan->id) }}" method="post" enctype="multipart/form-data">
        <div class="col-md-11">
        @csrf
        @method('PATCH')

        <div class="form-group">
          <label for="nama_perumahan">Nama Perumahan:</label>
          <input type="text" class="form-control" id="nama_perumahan" name="nama_perumahan" value="{{old('nama_perumahan',$perumahan->nama_perumahan)}}">
        </div>

       <div class="form-group">
          <label for="lokasi">Lokasi:</label>
            <textarea class="form-control" id="lokasi" name="lokasi">{{old('lokasi',$perumahan->lokasi)}}</textarea>
        </div>

        <div class="row">
          <div class="col-sm-4">
             <div class="form-group">
          <label for="kecamatan">Kecamatan:</label>
            <!-- <input type="text" class="form-control" id="kecamatan" name="kecamatan"> -->
            <select class="form-control" name="kecamatan">
              @foreach($kecamatan as $k)
              <option value="{{$k->kecamatan}}"
                {{$k->kecamatan === $perumahan->kecamatan ? 'selected' : ''}}
                {{old('kecamatan') === $k->kecamatan ? 'selected' : ''}}
                >
                {{$k->kecamatan}}
              </option>
              @endforeach
            </select>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
            <label for="jumlah_rumah">Jumlah Rumah:</label>
            <input type="number" class="form-control" value="{{old('jumlah_rumah', $perumahan->jumlah_rumah)}}" name="jumlah_rumah">
            </div>
          </div>
           <div class="col-sm-4">
           <label>Luas Lahan Bangunan:</label>
            <div class="input-group">
            <input type="number" name="luas_lahan_bangunan" value="{{old('luas_lahan_bangunan', $perumahan->luas_lahan_bangunan)}}" class="form-control" aria-describedby="basic-addon2">
            <span class="input-group-addon" id="basic-addon2">M<sup>2</sup></span>
          </div>
        </div>
      </div>
        <div class="row" style="margin-top: 5px">
          <div class="col-sm-6">
             <div class="form-group">
            <label for="latitude">Latitude:</label>
              <input type="text" class="form-control" value="{{old('latitude', $perumahan->latitude)}}" id="latitude" name="latitude">
          </div>
          </div>
          <div class="col-sm-6">
              <div class="form-group">
            <label for="longitude">Longitude:</label>
              <input type="text" class="form-control" value="{{old('longitude', $perumahan->longitude)}}" id="longitude" name="longitude">
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
</body>
</div>
</section>
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
    // if(lat.value !== '' && long.value !== ''){
    //   marker.setLngLat({lng: long.value,lat: lat.value}).addTo(map);
    // }

    map.on('click', function(e){
     lat.value = e.lngLat.lat;
     long.value = e.lngLat.lng;
    marker.setLngLat(e.lngLat).addTo(map);
    });
</script>
@endsection
