@extends('layouts.mazer')


@section('content')
<!--alert-->
@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
<!--end alert-->

<div class="page-heading">
  <div class="page-title">
    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Data BS Kain Printing</h3>
        <p class="text-subtitle text-muted">data ini terus ter update jika ada perubahan secara live.</p>
      </div>
    </div>
  </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Cari berdasarkan kondisi</h4>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-lg-12 margin-tb">
              <div class="pull-right">
                  @can('GJStock-create')
                  <a class="btn btn-success" href="{{ route('GJbspolos.create') }}"> Buat Penerimaan Benang baru</a>
                  @endcan
              </div>
          </div>
      </div>
      <br/>
      <div class="table-responsive">
        <table class="table table-bordered data-table">
            <thead>
            <tr>
                <th>No</th>
                <th>Customer</th>
                <th>Jenis Kain</th>
                <th>Warna</th>
                <th>KOP</th>
                <th>LOT</th>
                <th>ROL</th>
                <th>tanggal Masuk</th>
                <th>tanggal Keluar</th>
                <th>keterangan</th>
                <th width="200px">Action</th> 
            </tr>
        </thead>
        </table>
        </div>
        <script type="text/javascript">
            $(function () {
              var table = $('.data-table').DataTable({
                  processing: true,
                  serverSide: true,
                  scrollX: true,
                  ajax: "{{ route('GJbsprinting.index') }}",
                  columns: [
                      {data: 'id', name: 'id'},
                      {data: 'customer.nama_customer', name: 'customer.nama_customer'},
                      {data: 'jenis_kain', name: 'jenis_kain'},
                      {data: 'warna', name: 'warna'},
                      {data: 'kop.KOP', name: 'kop.KOP'},
                      {data: 'LOT', name: 'LOT'},
                      {data: 'ROL', name: 'ROL'},
                      {data: 'penerimaan.tanggal', name: 'penerimaan.tanggal'},
                      {data: 'pengiriman.tanggal', name: 'pengiriman.tanggal'},
                      {data: 'keterangan', name: 'keterangan'},
                      {data: 'action', name: 'action', orderable: false, searchable: false},
                  ]
              });
              
            });
          </script>
  
      </div>
    </div>
</div>
@endsection