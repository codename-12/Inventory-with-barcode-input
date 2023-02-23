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
            <h3>Form Register Kain Polos</h3>
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
    <div class="table-responsive">
    <table class="table table-bordered data-table">
        <thead>
        <tr>
            <th>QR CODE</th>
            <th>tanggal</th>
            <th>Customer</th>
            <th>Jenis Kain</th>
            <th>Warna</th>  
            <th>KOP</th>
            <th>LOT</th>
            <th>ROL</th>
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
              ajax: "{{ route('regkain_polos.index') }}",
              columns: [
                  {data: 'qr_code', name: 'qr_code'},
                  {data: 'tanggal', name: 'tanggal'},
                  {data: 'no_kop.customer.nama_customer', name: 'no_kop.customer.nama_customer'},
                  {data: 'no_kop.jenis_kain', name: 'no_kop.jenis_kain'},
                  {data: 'warna', name: 'warna'},
                  {data: 'no_kop.NO_KOP', name: 'no_kop.NO_KOP'},
                  {data: 'LOT', name: 'LOT'},
                  {data: 'ROL', name: 'ROL'},
                  {data: 'keterangan', name: 'keterangan'},
                  {data: 'action', name: 'action', orderable: false, searchable: false},
              ]
          });
          
        });
      </script>
        </div>
      </div>
    </div>

{{-- FORM  --}}
@include('DF.regkain_polos.create')
@include('DF.regkain_polos.edit')
@endsection
@section('script')
  
@endsection