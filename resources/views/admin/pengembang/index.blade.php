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
              <th>Username</th>
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
                    <td>{{ $pengembang->username }}</td>
                    <td>{{ $pengembang->alamat }}</td>
                    <td>{{ $pengembang->no_tlpn }}</td>
                    <td>
            <a class="btn btn-warning glyphicon glyphicon-pencil" type="button" href="{{ url('admin/pengembang/edit', $pengembang->id) }}"></a>

                  <button class="btn btn-danger glyphicon glyphicon-trash" type="button" data-toggle="modal" data-target="#hapus{{$pengembang->id}}"></button>

                  <div class="modal fade" id="hapus{{$pengembang->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header bg-danger">
                        <h5 class="modal-title" id="exampleModalLongTitle">Hapus Pengembang</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form method="post" action="{{route('admin.pengembang.destroy', $pengembang->id)}}">
                        @csrf
                        @method('DELETE')
                      <div class="modal-body">
                        Yakin Anda Ingin Menghapus Pengembang ?
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                      </div>
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
