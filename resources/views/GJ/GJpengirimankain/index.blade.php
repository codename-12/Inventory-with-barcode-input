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
            <h3>Data Pengiriman Kain</h3>
            <p class="text-subtitle text-muted">data ini terus ter update jika ada perubahan secara live.</p>
          </div>
        </div>
      </div>
    
      <div class="card">
        <div class="card-header">
          {{-- <a data-bs-toggle="modal"
        data-bs-target="#input" class="btn btn-success rounded-pill"
          >Tambah Data</a> --}}
          <a href="{{ route('GJpengirimankain.create') }}" class="btn btn-success rounded-pill"
          >Tambah Data</a>
      <br/>
      <br/>
          <h4 class="card-title">Cari berdasarkan kondisi</h4>
        </div>
        <div class="card-body">
    <div class="container">
      <table class="table table-bordered data-table">
        <thead>
        <tr>
            <th>No</th>
            <th>NO PO</th>
            <th>KODE KAIN</th>
            <th>tanggal kirim</th>
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
              ajax: "{{ route('GJpengirimankain.index') }}",
              columns: [
                  {data: 'id', name: 'id'},
                  {data: 'no_po', name: 'no_po'},
                  {data: 'kode_kain', name: 'kode_kain'},
                  {data: 'tanggal_kirim', name: 'tanggal_kirim'},
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
