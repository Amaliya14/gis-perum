@extends('template1.app')

@section('content')
  <div class="content-header">
    <H3 class="alert alert-info" role="alert">Data Pengembang</H3>
      <section class="box">
      <div class="container-fluid dashboard-content ">
  <body>
    <br>
    <div class="container">
      <h2><i>Edit Data Pengembang</i></h2>
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

     <form action="{{url('admin/pengembang/update', $pengembang->id)}}" method="post">
        <div class="col-md-11">
        @csrf

      <div class="form-group">
        <label for="nama">Nama:</label>
        <input type="text" class="form-control" id="nama" name="nama" value="{{$pengembang->nama}}">
          @if ($errors->has('nama'))
            <span class="text-danger">{{ $errors->first('nama') }}</span>
          @endif
        </div>

        <div class="form-group">
          <label for="nama_perumahan">Nama Perumahan:</label>
          <select class="form-control" name="id_perumahan" required="required">
            @foreach($perumahan as $p)
            @if(!$p->pengembang || $p->pengembang->id == $pengembang->id)
            <option value="{{$p->id}}" {{$pengembang->id_perumahan === $p->id ? 'selected' : ''}}>
              {{$p->nama_perumahan}}
            </option>
            @endif
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="alamat">Alamat:</label>
            <textarea class="form-control" id="alamat" name="alamat">{{$pengembang->alamat}}</textarea>
            @if ($errors->has('alamat'))
                <span class="text-danger">{{ $errors->first('alamat') }}</span>
            @endif
        </div>

        <div class="form-group">
          <label for="username">Username:</label>
            <input type="text" class="form-control" id="username" name="username" value="{{$pengembang->username}}">
            @if ($errors->has('username'))
              <span class="text-danger">{{ $errors->first('username') }}</span>
            @endif
        </div>

        <div class="form-group">
          <label for="no_tlpn">No Telepon:</label>
            <input type="text" class="form-control" id="no_tlpn" name="no_tlpn" value="{{$pengembang->no_tlpn}}">
              @if ($errors->has('no_tlpn'))
                <span class="text-danger">{{ $errors->first('no_tlpn') }}</span>
              @endif
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-md btn-primary">Submit</button>
            <a href="{{ url('admin/pengembang') }}" class="btn btn-md btn-danger" type="button">Reset</a>
        </div>
      </form>
    </div>
</div>
</body>
</div>
</section>
</div>
@endsection
