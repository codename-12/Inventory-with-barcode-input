@extends('layouts.mazer')

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="page-heading">
      <div class="page-title">
        <div class="row">
          <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Data Supplier</h3>
            <p class="text-subtitle text-muted">data ini terus ter update jika ada perubahan secara live.</p>
          </div>
        </div>
      </div>
    
      <div class="card">
        <div class="card-header">
          @can('supbenang-create')
      <a href="{{ route('supbenang.create') }}" class="btn btn-success rounded-pill"
          >Tambah Data</a>            
      @endcan
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
            <th>Nama Supplier</th>
            <th>Saldo</th>
            <th>Hutang</th>
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
              ajax: "{{ route('supbenang.index') }}",
              columns: [
                  {data: 'id', name: 'id'},
                  {data: 'nama_supplier', name: 'nama_supplier'},
                  {data: 'saldo', name: 'saldo'},
                  {data: 'hutang', name: 'hutang'},
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