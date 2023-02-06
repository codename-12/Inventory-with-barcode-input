@extends('layouts.mazer')

@section('content')
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
    <div class="page-heading">
      <div class="page-title">
        <div class="row">
          <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Data Kartu Order Proses</h3>
            <p class="text-subtitle text-muted">data ini terus ter update jika ada perubahan secara live.</p>
          </div>
        </div>
      </div>
    
      <div class="card">
        <div class="card-header">
          <a data-bs-toggle="modal"
        data-bs-target="#input" class="btn btn-success rounded-pill"
          >Tambah Data</a>
      <br/>
      <br/>
          <h4 class="card-title">Cari berdasarkan kondisi</h4>
        </div>
        <div class="card-body">
    <div class="container">
    <table class="table table-striped data-table">
        <thead>
        <tr>
            <th>No</th>
            <th>NOMOR KOP</th>
            <th>NO SSP / SJ</th>
            <th>Customer</th>
            <th>Tanggal</th>
            <th>Jenis Kain</th>
            <th>Lebar</th>
            <th>ROL</th>
            <th>KG</th>
            <th>LOT</th>
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
              ajax: "{{ route('KOP.index') }}",
              columns: [
                  {data: 'id', name: 'id'},
                  {data: 'NO_KOP', name: 'NO_KOP'},
                  {data: 'NO_SSP-SJ', name: 'NO_SSP-SJ'},
                  {data: 'customer.nama_customer', name: 'customer.nama_customer'},
                  {data: 'tanggal', name: 'tanggal'},
                  {data: 'jenis_kain', name: 'jenis_kain'},
                  {data: 'lebar', name: 'lebar'},
                  {data: 'ROL', name: 'ROL'},
                  {data: 'KG', name: 'KG'},
                  {data: 'LOT', name: 'LOT'},
                  {data: 'action', name: 'action', orderable: false, searchable: false},
              ]
          });
          
        });
      </script>
        </div>
      </div>
    </div>

  {{-- input form  --}}
@include('DF.KOP.create')
@endsection