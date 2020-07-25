@extends('template1.app')

@section('content')
  <div class="content-header">
    <H3 class="alert alert-info" role="alert">Data Kecamatan</H3>
      <section class="box">
      <div class="container-fluid dashboard-content ">
  <body>
    <br>
    <div class="container">
      <h2><i>Edit Data Kecamatan</i></h2>
      <br/>

      @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong>Ada beberapa masalah dengan input Anda.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

     <form action="{{url('admin/kec/update', $kecamatan->id)}}" method="post">
        <div class="col-md-11">
        @csrf 
       
        <div class="form-group">
          <label for="kecamatan">Nama Kecamatan:</label>
            <input type="text" class="form-control" id="kecamatan" name="kecamatan" value="{{$kecamatan->kecamatan}}">
              @if ($errors->has('kecamatan'))
                <span class="text-danger">{{ $errors->first('kecamatan') }}</span>
              @endif
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-md btn-primary">Submit</button>
            <a href="{{ url('admin/kecamatan') }}" class="btn btn-md btn-danger" type="button">Reset</a>
        </div>
      </form>
 
    </div>
</div>
</body>
</div>
</section>
</div>
@endsection