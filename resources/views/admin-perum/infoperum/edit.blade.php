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
    <div class="col-md-11">
        <div class="alert alert-danger">
          <strong>Oops!</strong>Ada beberapa masalah dengan input Anda.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="" action="{{route('admin-perum.update')}}" method="post" enctype="multipart/form-data">
        <div class="col-md-11">
        @csrf
        @method('PATCH')
        <div class="form-group">
          <label for="nama_perumahan">Nama Perumahan:</label>
            <input type="text" class="form-control" id="nama_perumahan" name="nama_perumahan" value="{{Auth::user()->perumahan->nama_perumahan}}" required>
        </div>

        <div class="input-group">
          <label for="rumah_tersedia">Rumah Tersedia:</label>
            <input type="text" class="form-control" id="rumah_tersedia" name="rumah_tersedia" value="{{Auth::user()->perumahan->info ? Auth::user()->perumahan->info->rumah_tersedia : ''}}" aria-describedby="basic-addon2">
                <span class="input-group-addon" id="basic-addon2">Unit</span>
            @if ($errors->has('rumah_tersedia'))
                <span class="text-danger">{{ $errors->first('rumah_tersedia') }}</span>
            @endif
        </div>

       <div class="form-group">
          <label for="tipe">Tipe:</label>
            <input type="text" class="form-control" id="tipe" name="tipe" value="{{Auth::user()->perumahan->info ? Auth::user()->perumahan->info->tipe : ''}}" >
            @if ($errors->has('tipe'))
                <span class="text-danger">{{ $errors->first('tipe') }}</span>
            @endif
        </div>

        <div class="form-group">
          <label for="harga">Harga:</label>
            <input type="text" class="form-control" id="harga" name="harga" value="{{Auth::user()->perumahan->info ? Auth::user()->perumahan->info->harga : ''}}">
            @if ($errors->has('harga'))
                <span class="text-danger">{{ $errors->first('harga') }}</span>
              @endif
        </div>

        <div class="form-group">
          <label for="keterangan">Keterangan:</label>
            <textarea class="form-control" id="keterangan" name="keterangan">{{Auth::user()->perumahan->info ? Auth::user()->perumahan->info->keterangan : ''}}</textarea>
            @if ($errors->has('keterangan'))
                <span class="text-danger">{{ $errors->first('keterangan') }}</span>
            @endif
        </div>

        <div class="form-group">
          @if(!Auth::user()->perumahan->info)
          Belum ada Foto
           <!-- <img src="{{asset('frontend/img/rumah.png')}}" alt="" width="200px" height="200px"> -->
           @else
           <img src="{{asset('picture/'.Auth::user()->perumahan->info->foto)}}" alt="" width="300px" height="200px">
           @endif
        </div>

        <div class="form-group">
          <label for="foto">Foto</label>
               <input type="file" class="form-control" name="foto" accept="image/jpeg,image/png,image/jpg">
               @if ($errors->has('foto'))
                <span class="text-danger">{{ $errors->first('foto') }}</span>
            @endif
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
