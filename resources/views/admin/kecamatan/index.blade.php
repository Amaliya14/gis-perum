@extends('template1.app')

@section('content')
  <div class="content-header">
    <H3 class="alert alert-info" role="alert">Data Kecamatan</H3>
      <section class="box">
      <div class="container-fluid dashboard-content ">
        <br>
          <div class="pull-right">
            <a href="{{url('admin/kec/create')}}" type="button" class="btn btn-success glyphicon glyphicon-plus">Tambah</a>
          </div>
      </div>
        </br>

  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div>
  </br>
  @endif
  <style>
    th{
      text-align: center;
    }
  </style>
    <br>
    <div class="box-body">
      <table id="example1" class="table table-bordered table-condensed" style="text-align:center">
          <thead>
            <tr>
                <th>No.</th>
                <th>Nama Kecamatan</th>
                <th>Action</th>
            </tr>
            </thead>
                <tbody>
                @php $no = 1; @endphp
                @foreach($kecamatan as $kecamatan)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $kecamatan->kecamatan }}</td>
                        <td>
                <form action="{{ url('admin/kec/destroy', $kecamatan->id) }}" method="post">

                <a class="btn btn-warning glyphicon glyphicon-pencil" type="button" href="{{ url('admin/kec/edit', $kecamatan->id) }}"> Edit</a>

                @csrf
                    <button class="btn btn-danger glyphicon glyphicon-trash" type="submit" onclick="return confirm('Yakin ingin menghapus data?')"> Delete</button>
                </td>
              </tr>
             @endforeach
            </tbody>
        </table>
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
