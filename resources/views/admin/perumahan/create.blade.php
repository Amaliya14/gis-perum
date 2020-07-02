@extends('template1.app')

@section('content')
  <div class="content-header">
    <H3 class="alert alert-info" role="alert">Data Perumahan</H3>
      <section class="box">
      <div class="container-fluid dashboard-content ">
    <div class="container">
      <h2><i>Tambah Data Perumahan</i></h2>
      <br/>
      <form action="{{url('admin/perumahan/simpan')}}" method="post" enctype="multipart/form-data" >
        <div class="col-md-11">
        @csrf
        <div class="form-group">
          <label for="nama_perumahan">Nama Perumahan:</label>
          <input type="text" class="form-control" value="{{old('nama_perumahan')}}" name="nama_perumahan">
        </div>

        <div class="form-group">
          <label for="lokasi">Lokasi:</label>
            <textarea class="form-control" value="{{old('lokasi')}}" name="lokasi"></textarea>
        </div>

        <div class="row">
          <div class="col-sm-4">
             <div class="form-group">
          <label for="kecamatan">Kecamatan:</label>
            <select class="form-control" name="kecamatan">
              @foreach($kecamatan as $k)
              <option value="{{$k->kecamatan}}" {{old('kecamatan') === $k->kecamatan ? 'selected' : ''}}>
                {{$k->kecamatan}}
              </option>
              @endforeach
            </select>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
            <label for="jumlah_rumah">Jumlah Rumah:</label>
            <input type="number" class="form-control" value="{{old('jumlah_rumah')}}" name="jumlah_rumah">
            </div>
          </div>
           <div class="col-sm-4">
           <label>Luas Lahan Bangunan:</label>
              <div class="input-group">
              <input type="number" name="luas_lahan_bangunan" value="{{old('luas_lahan_bangunan')}}" class="form-control" aria-describedby="basic-addon2">
              <span class="input-group-addon" id="basic-addon2">M<sup>2</sup></span>
            </div>
          </div>
        </div>

      <div class="row" style="margin-top: 5px">
        <div class="col-sm-6">
           <div class="form-group">
          <label for="latitude">Latitude:</label>
            <input type="text" class="form-control" value="{{old('latitude')}}" id="latitude" name="latitude">
        </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
          <label for="longitude">Longitude:</label>
            <input type="text" class="form-control" value="{{old('longitude')}}" id="longitude" name="longitude">
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

    map.addControl(new mapboxgl.NavigationControl());

    const marker = new mapboxgl.Marker();
    if(lat.value !== '' && long.value !== ''){
      marker.setLngLat({lng: long.value,lat: lat.value}).addTo(map);
    }

    map.on('click', async function(e){
     lat.value = e.lngLat.lat;
     long.value = e.lngLat.lng;
     const pos = await fetch(`https://api.mapbox.com/geocoding/v5/mapbox.places/${e.lngLat.lng},${e.lngLat.lat}.json?types=poi&lang=id&access_token=pk.eyJ1IjoiaXNuYS1hbWFsaXlhIiwiYSI6ImNrYmkyZ2tlMDBiMjczMW15eHVlYXBhZW4ifQ.uqVd8rK5Oe49IjUREFnfgw`)
      .then(res => res.json()).then(res => res.features[0]);
     const jl = pos.properties.address || '';
     const desa = "Desa "+pos.context[0].text;
     const Kecamatan = "Kecamatan "+pos.context[1].text;
     const Kabupaten = pos.context[3].text;
     const kode_pos = pos.context[2].text;
     const popup = new mapboxgl.Popup({ offset: 25 })
                  .setLngLat(e.lngLat)
                  .setHTML(`<p class="text-dark">${jl}, ${desa}, ${Kecamatan}, ${Kabupaten}, ${kode_pos}</p></div>`)
                  .addTo(map);

      marker.setLngLat(e.lngLat).addTo(map);
    });
</script>
@endsection
