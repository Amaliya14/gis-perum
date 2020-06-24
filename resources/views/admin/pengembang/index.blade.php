@extends('template1.app')

@section('content')
  <div class="content-header">
    <H3 class="alert alert-info" role="alert">Data Pengembang</H3>
      <section class="box">
      <div class="container-fluid dashboard-content ">
        <br>

  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div>
  </br>
  @endif

  <div class="form-group">
    <div class="text-left">
      <a href="{{url('admin/pengembang/create')}}" type="button" class="btn btn-success glyphicon glyphicon-plus">Tambah</a>
    </div>
  </div>

  <style>
    th{
      text-align: center;
    }
  </style>
    <br>
    <div class="box-body">
      <table id="example1" class="table table-bordered table-hover table-striped" style="text-align:center">
          <thead>
            <tr>
              <th>No.</th>
              <th>Nama</th>
              <th>Perumahan</th>
              <th>Email</th>
              <th>Alamat</th>
              <th width="15%">No Telepon</th>
              <th width="15%">Action</th>
          </tr>
            </thead>
            <tbody>
            @php $no = 1; @endphp
            @foreach($pengembang as $pengembang)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $pengembang->nama }}</td>
                    <td>{{ $pengembang->perumahan->nama_perumahan }}</td>
                    <td>{{ $pengembang->email }}</td>
                    <td>{{ $pengembang->alamat }}</td>
                    <td>{{ $pengembang->no_tlpn }}</td>
                    <td>
            <form action="{{ url('admin/pengembang/destroy', $pengembang->id) }}" method="post">

            <a class="btn btn-warning glyphicon glyphicon-pencil" type="button" href="{{ url('admin/pengembang/edit', $pengembang->id) }}"></a>

            @csrf
                <button class="btn btn-danger glyphicon glyphicon-trash" type="submit" onclick="return confirm('Yakin ingin menghapus data?')"></button>
            </td>
          </tr>
        </form>
       @endforeach
     </tbody>
    </table>
    </div>
    </div>
    </section>
  </div>
@endsection

@section('script')

<script>
$(function () {
  $('#example1').DataTable({
        "lengthMenu": [[5, 10, 25, 50, 100], [5, 10, 25, 50, 100]]
    } )
})
</script>
@endsection
