@extends('template2.app')

@section('content')
  <div class="content-header">
    <H3 class="alert alert-info" role="alert">Detail Perumahan</H3>
      <section class="box">
      <div class="container-fluid dashboard-content ">
  <body>
    <br>
    <div class="container">
      <h2><i>Edit Info Perumahan</i></h2>
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

     <form action="{{ url('admin-perum/update', $infoperum->id) }}" method="post">
        <div class="col-md-11">
        @csrf 
        <div class="form-group">
          <label for="nama_perumahan">Nama Perumahan:</label>
            <input type="text" class="form-control" id="nama_perumahan" name="nama_perumahan" value="{{$infoperum->nama_perumahan}}">
        </div>

       <div class="form-group">
          <label for="tipe">Tipe:</label>
            <input type="text" class="form-control" id="tipe" name="tipe" value="{{$infoperum->tipe}}">
        </div>

        <div class="form-group">
          <label for="harga">Harga:</label>
            <input type="text" class="form-control" id="harga" name="harga" value="{{$infoperum->harga}}">
        </div>

        <div class="form-group">
          <label for="keterangan">Keterangan:</label>
            <textarea class="form-control" id="keterangan" name="keterangan">{{$infoperum->keterangan}}</textarea>
        </div>

        <div class="form-group">
          <label for="author">Foto:</label>
            <input type="file" class="form-control" name="foto">
          </div>
          
                <div class="form-group">
                    <button type="submit" class="btn btn-md btn-primary">Submit</button>
                    <a href="{{ url('admin-perum/infoperum') }}" class="btn btn-md btn-danger" type="button">Reset</a>
                </div>
      </form>
 
    </div>
</div>
</body>
</div>
</section>
</div>
@endsection