@extends('template1.app')

@section('content')
  <div class="content-header">
    <H3 class="alert alert-info" role="alert">Data Kelurahan</H3>
      <section class="box">
      <div class="container-fluid dashboard-content ">
  <body>
    <div class="container">
      <h2><i>Tambah Data Kelurahan</i></h2>
      <br/>

    @if ($errors->any())
    <div class="col-md-11">
        <div class="alert alert-danger">
          <strong>Whoops!</strong>Ada beberapa masalah dengan input Anda.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
      
      <form action="{{url('admin/kel/simpan')}}" method="post">
        <div class="col-md-11">

        @csrf
        <div class="form-group">
          <label for="kelurahan">Nama Kelurahan:</label>
            <input type="text" class="form-control" id="kelurahan" name="kelurahan">
            @if ($errors->has('kelurahan'))
             <span class="text-danger">{{ $errors->first('kelurahan') }}</span>
            @endif
        </div>
        </br>

        <div class="form-group">
          <button type="submit" class="btn btn-md btn-primary">Submit</button>
            <a href="{{ url('admin/kelurahan') }}" class="btn btn-md btn-danger" type="button">Cancel</a>
        </div>
              
      </form>
    </div>
  </body>
</div>
@endsection