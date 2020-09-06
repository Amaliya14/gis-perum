<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="ThemeStarz">

    <link rel="stylesheet" href="{{ asset('frontend/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/font-awesome/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery.scrollbar.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css')}}">
    <script src="https://api.mapbox.com/mapbox-gl-js/v1.11.0/mapbox-gl.js"></script>
  <link href="https://api.mapbox.com/mapbox-gl-js/v1.11.0/mapbox-gl.css" rel="stylesheet" />

    <title>GIS-PERUM</title>
  <style>
  legend {
  color: white;
  padding: 10px 10px;
  width : 5px;
}
</style>
</head>

<body>

<div class="ts-page-wrapper ts-homepage" id="page-top">
    <header id="ts-header" class="fixed-top">
      <nav id="ts-secondary-navigation" class="navbar" style="margin-bottom: -20px">
            <div class="container justify-content-center mt-3">
              <h2 class="text-dark">Sistem Informasi Geografis Pemetaan Perumahan Di Kota Tegal</h2>
            </div>
        </nav>
        <nav id="ts-primary-navigation" class="navbar navbar-expand-md navbar-dark">
            <div class="container">


                <a class="navbar-brand" href="index-map-leaflet-fullscreen.html">
                  <img src="https://www.clipartkey.com/mpngs/m/82-827919_gambar-rumah-vector-png-grah-pravesh-logo-png.png" width="40px" height="30px" alt="">
                </a>


                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarPrimary" aria-controls="navbarPrimary" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>


                <div class="collapse navbar-collapse" id="navbarPrimary">


                    <ul class="navbar-nav">

                        <!--HOME (Main level)
                        =============================================================================================-->
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/')}}">
                                Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{url('/map')}}">
                                Peta
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown">
                                Info Perumahan
                            </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{url('/perumahan')}}">Perumahan</a>
                                    <a class="dropdown-item" href="{{url('/data-pengembang')}}">Data Pengembang</a>
                                </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/kontak')}}">
                                Contact 
                            </a>
                        </li>

                        
                    </ul>
                    <ul class="navbar-nav ml-auto">
                    
                    @auth('pengguna')
                    <li class="nav-item-dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown">
                       {{ Auth::user()->nama }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{route('users.logout')}}">Logout</a>
                            </div>
                    </li>
                    @endauth

                    @guest('pengguna')
                    <li class="nav-item">
                    <a class="nav-link" data-toggle="modal" data-target="#modalLoginForm">
                            Login
                        </a>
                       
                        </li>
                    @endguest
                    
                </ul>
                </div>
                <!--end navbar-collapse-->
            </div>
            <!--end container-->
        </nav>
        <!--end #ts-primary-navigation.navbar-->

    </header>
    <!--end Header-->

    <!-- HERO SLIDER

      </main> -->

      <section id="ts-hero" class="mb-0">

      <!--Fullscreen mode-->
      <div class="ts-full-screen ts-has-horizontal-results d-flex1 flex-column1">

          <!-- MAP
          =========================================================================================================-->
          <div class="ts-map ts-shadow__sm">

              <!-- FORM
              =====================================================================================================-->
              <div class="ts-form__map-search ts-z-index__2">
                  <!--Form-->
                  <div class="ts-form">

                      <!--Collapse button-->
                      <a href=".ts-form-collapse" data-toggle="collapse" class="ts-center__vertical justify-content-between">
                          <h5 class="mb-0">Filter</h5>
                      </a>

                      <!--Form-->
                      <div class="ts-form-collapse ts-xs-hide-collapse collapse show">

                          <!--Keyword-->
                          <select class="custom-select my-2" id="kecamatan" name="category">
                              <option value="">Kecamatan</option>
                              @foreach($kecamatan as $k)
                              <option value="{{$k->kecamatan}}">{{$k->kecamatan}}</option>
                              @endforeach
                          </select>
                           
                          <div class="form-group my-2">
                              <input type="text" class="form-control" id="keyword" name="keyword" placeholder="Nama Perumahan">
                          </div>
                          <br>
                          <div>Legend : 
                          <table>
                          <tr>
                            <td><legend style="background-color: #11ff00;"></legend></td>
                            <td>  Sawah</td>
                          </tr>
                          <tr>
                            <td><legend style="background-color: lightblue;"></legend></td>
                            <td>  Sungai / Perairan</td>
                          </tr>
                          <tr>
                            <td><legend style="background-color: red;"></legend></td>
                            <td>  Area Perumahan</td>
                          </tr>
                          <tr>
                            <td><legend style="background-color: coral;"></legend></td>
                            <td>  Area Pemukiman</td>
                          </tr>
                          </table>
                          </div>
                          <!-- <div class="form-group mt-2 mb-3">
                              <button type="submit" class="btn btn-primary w-100" id="search-btn">Search</button>
                          </div> -->

                          <!--Category-->


                          <!--Submit button-->


                          <!--More Options Button-->

                      </div>
                      <!--end ts-form-collapse-->

                  </div>
                  <!--end ts-form-->
              </div>
              <!--end ts-form__map-search-->

              <div id="map" class="h-100 ts-z-index__1">
              </div>

          </div>

          @include('modal')

          <footer id="ts-footer">

              <!--MAIN FOOTER CONTENT
              =============================================================================================================-->
              <section id="ts-footer-main">

                  <!--end container-->
              </section>
              <!--end ts-footer-main-->

              <!--SECONDARY FOOTER CONTENT
              =============================================================================================================-->
              <section id="ts-footer-secondary">

              </section>
              <!--end ts-footer-secondary-->

          </footer>
      </div>
      <!--end full-screen-->

  </section>
  <!--end ts-hero-->


</div>
<!--end page-->

<script src="{{ asset('frontend/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{ asset('frontend/js/popper.min.js')}}"></script>
<script src="{{ asset('frontend/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('frontend/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{ asset('frontend/js/owl.carousel.min.js')}}"></script>
<script src="{{ asset('frontend/js/sly.min.js')}}"></script>
<script src="{{ asset('frontend/js/dragscroll.js')}}"></script>
<script src="{{ asset('frontend/js/jquery.scrollbar.min.js')}}"></script>
<script src="{{ asset('frontend/js/leaflet.js')}}"></script>
<script src="{{ asset('frontend/js/leaflet.markercluster.js')}}"></script>
<script src="{{ asset('frontend/js/custom.js')}}"></script>
<!-- <script>
mapboxgl.accessToken = 'pk.eyJ1IjoiaXNuYS1hbWFsaXlhIiwiYSI6ImNrYmkyZ2tlMDBiMjczMW15eHVlYXBhZW4ifQ.uqVd8rK5Oe49IjUREFnfgw';
  const map = new mapboxgl.Map({
    container: 'map', // container id
    style: 'mapbox://styles/mapbox/streets-v11', // stylesheet location
    center: [109.125595, -6.879704], // starting position [lng, lat]
    zoom: 12 // starting zoom
  });

  

  map.addControl(new mapboxgl.NavigationControl());

  const url = '{{config('app.url')}}';
  const urlMap = '{{url('mapPerumahan')}}';
  const search = document.querySelector('#keyword');
  const kecamatan = document.querySelector('#kecamatan');
  let markers = [];

  async function showToMap(){
    const perumahan = await fetch(urlMap).then(res => res.json()).then(res => res);


    perumahan.forEach(p => {
      let marker = new mapboxgl.Marker();
        showMarker(p, marker);
    });

    search.addEventListener('input', function(){

      if(kecamatan.value === ''){
        const filter = perumahan.filter(f => {
            return f.nama_perumahan.toLowerCase().includes(this.value)
        });
        clearMarkers();
        filter.forEach(p => {
          let marker = new mapboxgl.Marker();
          showMarker(p, marker)
        })
      }else {
        clearMarkers();
        const filter = perumahan.filter(f => f.kecamatan === kecamatan.value);
        filter.forEach(p => {
          let marker = new mapboxgl.Marker();
          showMarker(p, marker)
        })
      }

    })

  kecamatan.addEventListener('click', function(){
    // alert(this.value)
    if(this.value !== ''){
      const filter = perumahan.filter(f => {
        if(f.info !== null){
          return f.kecamatan === this.value
        }
      });

      clearMarkers();
      filter.forEach(p => {
        let marker = new mapboxgl.Marker();
        showMarker(p, marker)
      });
      search.value = ''
    }else {
      clearMarkers();
      perumahan.forEach(p => {
        let marker = new mapboxgl.Marker();
        showMarker(p, marker);

      });
    }
  });
};


  function clearMarkers(){
    markers.forEach((marker) => marker.remove());
    markers = [];
  }


  function showMarker(p, marker){
    const popup = new mapboxgl.Popup({ offset: 25 })
    .setHTML(`
    <img style=" display: block; margin: 0 auto; width: 95%;"
    src="${url}picture/${p.info.foto}" alt="tidak ada foto">
    <div class="text-center"><a href="info-perumahan/${p.id}"><strong>${p.nama_perumahan}</strong></a>
    <p class="text-dark">${p.lokasi}</p></div>`);

    marker.setLngLat({lng: p.longitude, lat: p.latitude}).setPopup(popup).addTo(map);

    markers.push(marker)
  }


  showToMap();
</script> -->

<script>
var dataMap = "";
var maps = {"type": "FeatureCollection",
  "crs": {
    "type": "name",
    "properties": {
      "name": "urn:ogc:def:crs:OGC:1.3:CRS84"
    }
  }};

function retrieveData() {
  $.ajax({
            url: "/api/map-perumahan",
            type: "get",
            // data:{ 
            //     _token:'{{ csrf_token() }}'
            // },
            cache: false,
            async: false, 
            // dataType: 'json',
            success: function(dataResult){
                // console.log(dataResult.data);
                // var dataChat = dataResult.data
                // dataChat.map(chat=>{
                //     console.log(chat);
                // })

                var resultData = dataResult.data;
                dataMap = resultData;
                // var bodyData = '';
                // // var i=1;
                // $.each(resultData,function(index,row){
                //     // var editUrl = url+'/'+row.id+"/edit";
                //     var tanggal = new Date(row.created_at);
                //     let formatted_date = tanggal.getDate() + "-" + (tanggal.getMonth() + 1) + "-" + tanggal.getFullYear() + " | " + tanggal.getHours() + ":" + tanggal.getMinutes();
                //     var pengirim;
                //     if (row.pengirim == 'user') {
                //         pengirim = 'incoming_message';
                //         bodyData +="<div class='outgoing_msg'><div class='sent_msg'> <p>"+row.isi_chat+"</p><span class='time_date'>"+formatted_date+"</span> </div></div>"
                //     }else{
                //     bodyData+="<div class='incoming_msg'>"
                //     bodyData+="<div class='incoming_msg_img'> <img src='https://ptetutorials.com/images/user-profile.png' alt='sunil'> </div>"
                //     bodyData+="<div class='received_msg'>"
                //     bodyData+="<div class='received_withd_msg'>"
                //     bodyData+="<p>"+row.isi_chat+"</p>"
                //     bodyData+="<span class='time_date'>" + formatted_date +"</span></div>";
                //     bodyData+="</div></div>";
                //     }
                    
                    
                // })
               
              
            }

        });

    var dataFeatures = [];
    // $.each(dataMap,function(index,row){
    //   var features = {};
    //   features.type = "Feature";   
    //   // features.properties = {};
    //   features.properties.id = row.id 
                    
                    
    // });
    dataMap.map(row => {
      var features = {};
      features.type = "Feature";   
      features.properties = {};
      features.properties.id = row.id 
      features.properties.iconSize = [60, 60] 
      features.properties.foto = row.info.foto 
      features.properties.nama_perumahan = row.nama_perumahan 
      features.properties.kecamatan = row.kecamatan 
      features.properties.lokasi = row.lokasi 
      features.geometry={}
      features.geometry.type = "point"
      
      features.geometry.coordinates = [row.longitude,row.latitude]


      dataFeatures.push(features)
    });

    maps.features = dataFeatures;

}
retrieveData();
    const mapsArea = maps;
    console.log("dataaa", mapsArea);



   


	// TO MAKE THE MAP APPEAR YOU MUST
	// ADD YOUR ACCESS TOKEN FROM
	// https://account.mapbox.com
	function mapRender() {
    mapboxgl.accessToken = 'pk.eyJ1IjoiaXNuYS1hbWFsaXlhIiwiYSI6ImNrYmkyZ2tlMDBiMjczMW15eHVlYXBhZW4ifQ.uqVd8rK5Oe49IjUREFnfgw';
var map = new mapboxgl.Map({
container: 'map',
style: 'mapbox://styles/mapbox/streets-v11', // stylesheet location
    center: [109.125595, -6.879704], // starting position [lng, lat]
    zoom: 12 // starting zoom
});
 
map.on('load', function() {
  var hoveredStateId = null;
var colorMargadanaDefault = '#FA8072';
var colorSelatanDefault = '#FA8072';
var colorBaratDefault = '#FA8072';
var colorTimurDefault = '#FA8072';


const margadanaExist = mapsArea.features.find(p => p.properties.kecamatan === 'Margadana');
    const baratExist = mapsArea.features.find(p => p.properties.kecamatan === 'Tegal Barat');
    const selatanExist = mapsArea.features.find(p => p.properties.kecamatan === 'Tegal Selatan');
    const timurExist = mapsArea.features.find(p => p.properties.kecamatan === 'Tegal Timur');
  console.log("margadana",margadanaExist);
    if (margadanaExist) {
      colorMargadanaDefault = '#00FA9A'; 
    }

    if (baratExist) {
      colorBaratDefault = '#00FA9A'; 
    }

    if (selatanExist) {
      colorSelatanDefault = '#00FA9A'; 
    }

    if (timurExist) {
      colorTimurDefault = '#00FA9A'; 
    }


// Add a new source from our GeoJSON data and
// set the 'cluster' option to true. GL-JS will
// add the point_count property to your source data.
map.addSource('earthquakes', 
{
type: 'geojson',
// Point to GeoJSON data. This example visualizes all M1.0+ earthquakes
// from 12/22/15 to 1/21/16 as logged by USGS' Earthquake hazards program.
data:maps,
cluster: true,
clusterMaxZoom: 15, // Max zoom to cluster points on
clusterRadius: 50 // Radius of each cluster when clustering points (defaults to 50)
}
);

map.addSource('maine', {
'type': 'geojson',
'data': '{{asset('margadana.geojson')}}'
});

map.addSource('selatan', {
'type': 'geojson',
'data': '{{asset('selatan.geojson')}}'
});

map.addSource('barat', {
'type': 'geojson',
'data': '{{asset('barat.geojson')}}'
});

map.addSource('timur', {
'type': 'geojson',
'data': '{{asset('timur.geojson')}}'
});

map.addSource('perumahanSelatan', {
'type': 'geojson',
'data': '{{asset('selatan-perumahan.geojson')}}'
});

map.addSource('perumahanBarat', {
'type': 'geojson',
'data': '{{asset('barat-perumahan.geojson')}}'
});

map.addSource('perumahanTimur', {
'type': 'geojson',
'data': '{{asset('timur-perumahan.geojson')}}'
});

map.addSource('perumahanMargadana', {
'type': 'geojson',
'data': '{{asset('margadana-perumahan.geojson')}}'
});

map.addSource('sawah', {
'type': 'geojson',
'data': '{{asset('sawah.geojson')}}'
});




map.addLayer({
'id': 'maine',
'type': 'fill',
'source': 'maine',
'layout': {},
'paint': {
'fill-color': colorMargadanaDefault,
'fill-opacity': 0.5
}
});

map.addLayer({
'id': 'selatan',
'type': 'fill',
'source': 'selatan',
'layout': {},
'paint': {
'fill-color': colorSelatanDefault,
'fill-opacity': 0.5
}
});

map.addLayer({
'id': 'timur',
'type': 'fill',
'source': 'timur',
'layout': {},
'paint': {
'fill-color': colorTimurDefault,
'fill-opacity': 0.5
}
});

map.addLayer({
'id': 'barat',
'type': 'fill',
'source': 'barat',
'layout': {},
'paint': {
'fill-color': colorBaratDefault,
'fill-opacity': 0.5
}
});

map.addLayer({
'id': 'perumahanMargadana',
'type': 'fill',
'source': 'perumahanMargadana',
'layout': {},
'paint': {
'fill-color': '#FF0000',
'fill-opacity': 0.5
}
});

map.addLayer({
'id': 'perumahanBarat',
'type': 'fill',
'source': 'perumahanBarat',
'layout': {},
'paint': {
'fill-color': '#FF0000',
'fill-opacity': 0.5
}
});

map.addLayer({
'id': 'perumahanSelatan',
'type': 'fill',
'source': 'perumahanSelatan',
'layout': {},
'paint': {
'fill-color': '#FF0000',
'fill-opacity': 0.5
}
});

map.addLayer({
'id': 'perumahanTimur',
'type': 'fill',
'source': 'perumahanTimur',
'layout': {},
'paint': {
'fill-color': '#FF0000',
'fill-opacity': 0.5
}
});

map.addLayer({
'id': 'sawah',
'type': 'fill',
'source': 'sawah',
'layout': {},
'paint': {
'fill-color': '#11ff00',
'fill-opacity': 1
}
});

map.on('click', 'maine', function(e) {
  renderback('Margadana')
});

var filtered = false;
function renderback(kecamatan) {
  if (!filtered) {
  if (kecamatan === 'Margadana') {
    map.setLayoutProperty('selatan', 'visibility', 'none');
  map.setLayoutProperty('perumahanSelatan', 'visibility', 'none');
  map.setLayoutProperty('barat', 'visibility', 'none');
  map.setLayoutProperty('perumahanBarat', 'visibility', 'none');
  map.setLayoutProperty('timur', 'visibility', 'none');
  map.setLayoutProperty('perumahanTimur', 'visibility', 'none');
  }else if(kecamatan==='Tegal Barat'){
    map.setLayoutProperty('maine', 'visibility', 'none');
  map.setLayoutProperty('perumahanMargadana', 'visibility', 'none');
  map.setLayoutProperty('selatan', 'visibility', 'none');
  map.setLayoutProperty('perumahanSelatan', 'visibility', 'none');
  map.setLayoutProperty('timur', 'visibility', 'none');
  map.setLayoutProperty('perumahanTimur', 'visibility', 'none');
  }else if(kecamatan==='Tegal Selatan'){
    map.setLayoutProperty('maine', 'visibility', 'none');
  map.setLayoutProperty('perumahanMargadana', 'visibility', 'none');
  map.setLayoutProperty('barat', 'visibility', 'none');
  map.setLayoutProperty('perumahanBarat', 'visibility', 'none');
  map.setLayoutProperty('timur', 'visibility', 'none');
  map.setLayoutProperty('perumahanTimur', 'visibility', 'none');
  }else if(kecamatan==='Tegal Timur'){
    map.setLayoutProperty('maine', 'visibility', 'none');
  map.setLayoutProperty('perumahanMargadana', 'visibility', 'none');
  map.setLayoutProperty('barat', 'visibility', 'none');
  map.setLayoutProperty('perumahanBarat', 'visibility', 'none');
  map.setLayoutProperty('selatan', 'visibility', 'none');
  map.setLayoutProperty('perumahanSelatan', 'visibility', 'none');
  }else{
    mapRender();
  }

  const filter = maps.features.filter(f => {
      return f.properties.kecamatan.includes(kecamatan)
  });
  console.log("filter",filter);
  maps.features = filter;

  map.addSource('perumahancluster', 
{
type: 'geojson',
// Point to GeoJSON data. This example visualizes all M1.0+ earthquakes
// from 12/22/15 to 1/21/16 as logged by USGS' Earthquake hazards program.
data:maps,
cluster: true,
clusterMaxZoom: 15, // Max zoom to cluster points on
clusterRadius: 50 // Radius of each cluster when clustering points (defaults to 50)
}
);

  map.removeLayer('clusters');
  map.removeLayer('cluster-count');
  map.addLayer({
id: 'clusters',
type: 'circle',
source: 'perumahancluster',
filter: ['has', 'point_count'],
paint: {
// Use step expressions (https://docs.mapbox.com/mapbox-gl-js/style-spec/#expressions-step)
// with three steps to implement three types of circles:
//   * Blue, 20px circles when point count is less than 100
//   * Yellow, 30px circles when point count is between 100 and 750
//   * Pink, 40px circles when point count is greater than or equal to 750
'circle-color': [
'step',
['get', 'point_count'],
'#51bbd6',
100,
'#f1f075',
750,
'#f28cb1'
],
'circle-radius': [
'step',
['get', 'point_count'],
20,
100,
30,
750,
40
]
}
});
 
map.addLayer({
id: 'cluster-count',
type: 'symbol',
source: 'perumahancluster',
filter: ['has', 'point_count'],
layout: {
'text-field': '{point_count_abbreviated}',
'text-font': ['DIN Offc Pro Medium', 'Arial Unicode MS Bold'],
'text-size': 12
}
});
filtered = true;
  }
  // console.log("aaa",filter);
  // mapRender();
  
}


map.on('click', 'selatan', function(e) {
  renderback('Tegal Selatan')
});

map.on('click', 'barat', function(e) {
  renderback('Tegal Barat')
});

map.on('click', 'timur', function(e) {
  renderback('Tegal Timur');
});

 
map.addLayer({
id: 'clusters',
type: 'circle',
source: 'earthquakes',
filter: ['has', 'point_count'],
paint: {
// Use step expressions (https://docs.mapbox.com/mapbox-gl-js/style-spec/#expressions-step)
// with three steps to implement three types of circles:
//   * Blue, 20px circles when point count is less than 100
//   * Yellow, 30px circles when point count is between 100 and 750
//   * Pink, 40px circles when point count is greater than or equal to 750
'circle-color': [
'step',
['get', 'point_count'],
'#51bbd6',
100,
'#f1f075',
750,
'#f28cb1'
],
'circle-radius': [
'step',
['get', 'point_count'],
20,
100,
30,
750,
40
]
}
});
 
map.addLayer({
id: 'cluster-count',
type: 'symbol',
source: 'earthquakes',
filter: ['has', 'point_count'],
layout: {
'text-field': '{point_count_abbreviated}',
'text-font': ['DIN Offc Pro Medium', 'Arial Unicode MS Bold'],
'text-size': 12
}
});
 
map.addLayer({
id: 'unclustered-point',
type: 'circle',
source: 'earthquakes',
filter: ['!', ['has', 'point_count']],
paint: {
'circle-color': '#11b4da',
'circle-radius': 4,
'circle-stroke-width': 1,
'circle-stroke-color': '#fff'
}
});
 
// inspect a cluster on click
map.on('click', 'clusters', function(e) {
var features = map.queryRenderedFeatures(e.point, {
layers: ['clusters']
});
var clusterId = features[0].properties.cluster_id;
map.getSource('earthquakes').getClusterExpansionZoom(
clusterId,
function(err, zoom) {
if (err) return;
 
map.easeTo({
center: features[0].geometry.coordinates,
zoom: zoom
});
}
);
});
 
// When a click event occurs on a feature in
// the unclustered-point layer, open a popup at
// the location of the feature, with
// description HTML from its properties.
map.on('click', 'unclustered-point', function(e) {
var coordinates = e.features[0].geometry.coordinates.slice();
var mag = e.features[0].properties.mag;
var tsunami;
const url = '{{config('app.url')}}';
if (e.features[0].properties.tsunami === 1) {
tsunami = 'yes';
} else {
tsunami = 'no';
}


 
// Ensure that if the map is zoomed out such that
// multiple copies of the feature are visible, the
// popup appears over the copy being pointed to.
while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
}

new mapboxgl.Popup()
.setLngLat(coordinates)
.setHTML(
'magnitude: ' + mag + '<br>Was there a tsunami?: ' + tsunami
).setHTML(`
    <img style=" display: block; margin: 0 auto; width: 95%;"
    src="${url}picture/${e.features[0].properties.foto}" alt="tidak ada foto">
    <div class="text-center"><a href="info-perumahan/${e.features[0].properties.id}"><strong>${e.features[0].properties.nama_perumahan}</strong></a>
    <p class="text-dark">${e.features[0].properties.lokasi}</p></div>`)
.addTo(map);
});
 
map.on('mouseenter', 'clusters', function() {
map.getCanvas().style.cursor = 'pointer';
});
map.on('mouseleave', 'clusters', function() {
map.getCanvas().style.cursor = '';
});
});
  }

  mapRender();

  const search = document.querySelector('#keyword');
  
  search.addEventListener('keypress', function(e){
    if (e.key === 'Enter') {
      console.log("aaaa",this.value)
      if(kecamatan.value === ''){
  const filter = maps.features.filter(f => {
      return f.properties.nama_perumahan.toLowerCase().includes(this.value.toLowerCase())
  });
  maps.features = filter;
  // console.log("aaa",filter);
  mapRender();
}else {
  var filter = maps.features.filter(f => f.properties.kecamatan === kecamatan.value);
  filter = filter.filter(f => {
      return f.properties.nama_perumahan.toLowerCase().includes(this.value)
  });
  maps.features = filter;
  // console.log("aaa",filter);
  mapRender();
}
    }


})

  const kecamatan = document.querySelector('#kecamatan');
  kecamatan.addEventListener('change', function(){
    retrieveData();
    console.log("anc",this.value)
    if(this.value !== ''){
      const filter = maps.features.filter(f => {
        if(f.properties !== null){
          return f.properties.kecamatan === this.value
        }
      });

      maps.features = filter;
      mapRender();
      // console.log("anc",this.value)
    }else {
      retrieveData();
      mapRender();
    }
  });

</script>


<!-- <script>
	// TO MAKE THE MAP APPEAR YOU MUST
	// ADD YOUR ACCESS TOKEN FROM
	// https://account.mapbox.com
mapboxgl.accessToken = 'pk.eyJ1IjoiaXNuYS1hbWFsaXlhIiwiYSI6ImNrYmkyZ2tlMDBiMjczMW15eHVlYXBhZW4ifQ.uqVd8rK5Oe49IjUREFnfgw';
var map = new mapboxgl.Map({
container: 'map',
style: 'mapbox://styles/mapbox/streets-v11',
center: [109.125595, -6.879704], // starting position [lng, lat]
zoom: 13
});
var hoveredStateId = null;
var colorMargadanaDefault = '#FA8072';
var colorSelatanDefault = '#FA8072';
var colorBaratDefault = '#FA8072';
var colorTimurDefault = '#FA8072';
map.on('load', function() {

map.addSource('maine', {
'type': 'geojson',
'data': '{{asset('margadana.geojson')}}'
});

map.addSource('selatan', {
'type': 'geojson',
'data': '{{asset('selatan.geojson')}}'
});

map.addSource('barat', {
'type': 'geojson',
'data': '{{asset('barat.geojson')}}'
});

map.addSource('timur', {
'type': 'geojson',
'data': '{{asset('timur.geojson')}}'
});




map.addLayer({
'id': 'maine',
'type': 'fill',
'source': 'maine',
'layout': {},
'paint': {
'fill-color': colorMargadanaDefault,
'fill-opacity': 0.5
}
});

map.addLayer({
'id': 'selatan',
'type': 'fill',
'source': 'selatan',
'layout': {},
'paint': {
'fill-color': colorSelatanDefault,
'fill-opacity': 0.5
}
});

map.addLayer({
'id': 'timur',
'type': 'fill',
'source': 'timur',
'layout': {},
'paint': {
'fill-color': colorTimurDefault,
'fill-opacity': 0.5
}
});

map.addLayer({
'id': 'barat',
'type': 'fill',
'source': 'barat',
'layout': {},
'paint': {
'fill-color': colorBaratDefault,
'fill-opacity': 0.5
}
});


// map.on('mousemove', 'maine', function(e) {
// if (e.features.length > 0) {
// if (hoveredStateId) {
// map.setFeatureState(
// { source: 'maine', id: hoveredStateId },
// { hover: false }
// );
// }
// hoveredStateId = e.features[0].id;
// map.setFeatureState(
// { source: 'maine', id: hoveredStateId },
// { hover: true }
// );
// }
// });

// map.on('mouseleave', 'maine', function() {
// if (hoveredStateId) {
// map.setFeatureState(
// { source: 'maine', id: hoveredStateId },
// { hover: false }
// );
// }
// hoveredStateId = null;
// });


// map.on('mousemove', 'selatan', function(e) {
// if (e.features.length > 0) {
// if (hoveredStateId) {
// map.setFeatureState(
// { source: 'selatan', id: hoveredStateId },
// { hover: false }
// );
// }
// hoveredStateId = e.features[0].id;
// map.setFeatureState(
// { source: 'selatan', id: hoveredStateId },
// { hover: true }
// );
// }
// });

// map.on('mouseleave', 'selatan', function() {
// if (hoveredStateId) {
// map.setFeatureState(
// { source: 'selatan', id: hoveredStateId },
// { hover: false }
// );
// }
// hoveredStateId = null;
// });

});

// map.addControl(new mapboxgl.NavigationControl());

//   const url = '{{config('app.url')}}';
//   const urlMap = '{{url('mapPerumahan')}}';
//   const search = document.querySelector('#keyword');
//   const kecamatan = document.querySelector('#kecamatan');
//   let markers = [];

//   async function showToMap(){
//     const perumahan = await fetch(urlMap).then(res => res.json()).then(res => res);

//     const margadanaExist = perumahan.find(p => p.kecamatan === 'Margadana');
//     const baratExist = perumahan.find(p => p.kecamatan === 'Tegal Barat');
//     const selatanExist = perumahan.find(p => p.kecamatan === 'Tegal Selatan');
//     const timurExist = perumahan.find(p => p.kecamatan === 'Tegal Timur');

//     if (margadanaExist) {
//       colorMargadanaDefault = '#00FA9A'; 
//     }

//     if (baratExist) {
//       colorBaratDefault = '#00FA9A'; 
//     }

//     if (selatanExist) {
//       colorSelatanDefault = '#00FA9A'; 
//     }

//     if (timurExist) {
//       colorTimurDefault = '#00FA9A'; 
//     }

//     perumahan.forEach(p => {
//       let marker = new mapboxgl.Marker();
//         showMarker(p, marker);
//     });

//     search.addEventListener('input', function(){

//       if(kecamatan.value === ''){
//         const filter = perumahan.filter(f => {
//             return f.nama_perumahan.toLowerCase().includes(this.value)
//         });
//         clearMarkers();
//         filter.forEach(p => {
//           let marker = new mapboxgl.Marker();
//           showMarker(p, marker)
//         })
//       }else {
//         clearMarkers();
//         const filter = perumahan.filter(f => f.kecamatan === kecamatan.value);
//         filter.forEach(p => {
//           let marker = new mapboxgl.Marker();
//           showMarker(p, marker)
//         })
//       }

//     })

//   kecamatan.addEventListener('click', function(){
//     // alert(this.value)
//     if(this.value !== ''){
//       const filter = perumahan.filter(f => {
//         if(f.info !== null){
//           return f.kecamatan === this.value
//         }
//       });

//       clearMarkers();
//       filter.forEach(p => {
//         let marker = new mapboxgl.Marker();
//         showMarker(p, marker)
//       });
//       search.value = ''
//     }else {
//       clearMarkers();
//       perumahan.forEach(p => {
//         let marker = new mapboxgl.Marker();
//         showMarker(p, marker);

//       });
//     }
//   });
// };


//   function clearMarkers(){
//     markers.forEach((marker) => marker.remove());
//     markers = [];
//   }


//   function showMarker(p, marker){
//     const popup = new mapboxgl.Popup({ offset: 25 })
//     .setHTML(`
//     <img style=" display: block; margin: 0 auto; width: 95%;"
//     src="${url}picture/${p.info.foto}" alt="tidak ada foto">
//     <div class="text-center"><a href="info-perumahan/${p.id}"><strong>${p.nama_perumahan}</strong></a>
//     <p class="text-dark">${p.lokasi}</p></div>`);

//     marker.setLngLat({lng: p.longitude, lat: p.latitude}).setPopup(popup).addTo(map);

//     markers.push(marker)
//   }


//   showToMap();

</script> -->
</body>
