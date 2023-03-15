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
    @endif

    <div class="page-heading">
      <div class="page-title">
        <div class="row">
          <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Data Customer</h3>
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
            <th>Nama Customer</th>
            <th>NO TLP</th>
            <th>Email</th>
            <th>PT</th>
            <th>Alamat</th>
            <th>Keterangan</th>
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
              ajax: "{{ route('customerkain.index') }}",
              columns: [
                  {data: 'id', name: 'id'},
                  {data: 'nama_customer', name: 'nama_customer'},
                  {data: 'no_tlp', name: 'no_tlp'},
                  {data: 'email', name: 'email'},
                  {data: 'PT', name: 'PT'},
                  {data: 'alamat', name: 'alamat'},
                  {data: 'keterangan', name: 'keterangan'},
                  {data: 'action', name: 'action', orderable: false, searchable: false},
              ]
          });
          
        });
      </script>
        </div>
      </div>
    </div>

    @include('DF.customerkain.create')
@endsection
