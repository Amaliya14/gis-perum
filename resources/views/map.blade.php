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

</head>

<body>

<div class="ts-page-wrapper ts-homepage" id="page-top">
    <header id="ts-header" class="fixed-top">
      <nav id="ts-secondary-navigation" class="navbar" style="margin-bottom: -20px">
            <div class="container justify-content-center mt-3">
              <h2 class="text-dark">Sistem Informasi Geografis Pemetaan Perumahan Di Kota Tegal</h2>
            </div>
        </nav>
        <nav id="ts-primary-navigation" class="navbar navbar-expand-md navbar-light">
            <div class="container">


                <a class="navbar-brand" href="index-map-leaflet-fullscreen.html">
                  <img src="https://upload.wikimedia.org/wikipedia/commons/a/a5/Shield_of_the_city_of_Tegal.svg" width="30px" height="40px" alt="">
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
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/perumahan')}}">
                                Perumahan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                Kontak
                            </a>
                        </li>
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
                          <div class="form-group my-2">
                              <input type="text" class="form-control" id="keyword" name="keyword" placeholder="Nama Perumahan">
                          </div>
                          <!-- <div class="form-group mt-2 mb-3">
                              <button type="submit" class="btn btn-primary w-100" id="search-btn">Search</button>
                          </div> -->

                          <!--Category-->
                          <select class="custom-select my-2" id="kecamatan" name="category">
                              <option value="">Kecamatan</option>
                              @foreach($kecamatan as $k)
                              <option value="{{$k->kecamatan}}">{{$k->kecamatan}}</option>
                              @endforeach
                          </select>

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
<script>
mapboxgl.accessToken = 'pk.eyJ1IjoiaXNuYS1hbWFsaXlhIiwiYSI6ImNrYmkyZ2tlMDBiMjczMW15eHVlYXBhZW4ifQ.uqVd8rK5Oe49IjUREFnfgw';
  const map = new mapboxgl.Map({
    container: 'map', // container id
    style: 'mapbox://styles/mapbox/streets-v11', // stylesheet location
    center: [109.125595, -6.879704], // starting position [lng, lat]
    zoom: 12 // starting zoom
  });
  map.addControl(new mapboxgl.NavigationControl());
  const url = '{{config('app.url')}}';
  const search = document.querySelector('#keyword');
  const kecamatan = document.querySelector('#kecamatan');
  let markers = [];

  async function showToMap(){
    const perumahan = await fetch(url+'/mapPerumahan').then(res => res.json()).then(res => res);

    perumahan.forEach(p => {
      let marker = new mapboxgl.Marker();
      if(p.info !== null){
        showMarker(p, marker);
      }
    });

    search.addEventListener('input', function(){
        const filter = perumahan.filter(f => {
          if(f.info !== null){
            return f.nama_perumahan.toLowerCase().includes(this.value)
          }
        });

        clearMarkers();
        filter.forEach(p => {
          let marker = new mapboxgl.Marker();
          showMarker(p, marker)
        })
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
      })
    }else {
      perumahan.forEach(p => {
        let marker = new mapboxgl.Marker();
        if(p.info !== null){
          showMarker(p, marker);
        }
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
</script>

</body>
</html>
