@extends('template2.app')

@section('content')
  <div class="content-header">
    <H3 class="alert alert-info" role="alert">Detail Perumahan {{Auth::user()->perumahan->nama_perumahan}}</H3>
      <section class="box">
        <form class="" action="{{route('admin-perum.update')}}" method="post" enctype="multipart/form-data">
          @csrf
          @method('PATCh')
        <div class="box-body">
          <div class="row">
          <div class="col-sm-12">
            @if(!Auth::user()->perumahan->info)
            <img src="{{asset('frontend/img/rumah.png')}}" alt="" width="450px" height="300px">
            @else
            <img src="{{asset('picture/'.$infoPerum->foto)}}" alt="" width="800px" height="400px">
            @endif
          </div>
          <div class="col-sm-8">
            <div class="form-group">
              <label for="">Ganti Foto</label>
              <input type="file" class="form-control" name="foto" accept="image/jpeg,image/png,image/jpg">
            </div>
          </div>

          <div class="col-sm-8">
            <div class="form-group">
              <label for="">Tipe</label>
              <input type="text" class="form-control" name="tipe" value="{{$infoPerum ? $infoPerum->tipe : ''}}">
            </div>
          </div>
          <div class="col-sm-8">
            <div class="form-group">
              <label for="">Harga</label>
              <input type="text" class="form-control" name="harga" value="{{$infoPerum ? $infoPerum->harga : ''}}">
            </div>
          </div>
          <div class="col-sm-8">
            <div class="form-group">
              <label for="">Keterangan</label>
              <textarea class="form-control" name="keterangan">{{$infoPerum ? $infoPerum->keterangan : ''}}</textarea>
            </div>
          </div>

          <div class="col-sm-8">
            <div class="form-group">
              <button type="submit" class="btn btn-primary" name="button"> <i class="fa fa-plus"></i> Simpan </button>
            </div>
          </div>
        </div>
        </div>
      </form>
      </section>
    </div>

@endsection
