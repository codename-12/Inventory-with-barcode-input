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
    <div
     class="alert alert-success alert-dismissible show fade">
        <p>{{ $message }}</p>
             <button
             type="button"
             class="btn-close"
             data-bs-dismiss="alert"
             aria-label="Close"
        ></button>
      </div>
    @endif
    
    <div class="page-heading">
      <div class="page-title">
        <div class="row">
          <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Bukti Penerimaan Benang</h3>
            <p class="text-subtitle text-muted">data ini terus ter update jika ada perubahan secara live.</p>
          </div>
        </div>
      </div>
    
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Cari berdasarkan kondisi</h4>
        </div>
        <div class="card-body">
        <button
    type="button"
    class="btn btn-outline-success"
    data-bs-toggle="modal"
    data-bs-target="#inputinvoice">
    Buat BPB
  </button>
  <br/>
  <br/>
    <div class="container">
    <table class="table table-striped data-table">
        <thead>
        <tr>
            <th>No</th>
            <th>BPB</th>
            <th>Nama Supplier</th>
            <th>Surat Jalan</th>
            @unlessrole('operatorjadi|operatorbenang')
            <th>Harga</th>
            <th>Pembayaran</th>
            <th>status</th>
            @endunlessrole
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
              ajax: "{{ route('BPBbenang.index') }}",
              columns: [
                  {data: 'id', name: 'id'},
                  {data: 'no_bpb', name: 'no_bpb'},
                  {data: 'bsuppliers.nama_supplier', name: 'bsuppliers.nama_supplier'},
                  {data: 'surat_jalan', name: 'surat_jalan'},
                  @unlessrole('operatorjadi|operatorbenang')
                  {data: 'harga', name: 'harga'},
                  {data: 'pembayaran', name: 'pembayaran'},
                  {data: 'status', name: 'status'},
                  @endunlessrole
                  {data: 'action', name: 'action', orderable: false, searchable: false},
              ]
          });
          
        });
      </script>
        </div>
      </div>
    </div>
<!-- MODALS input FORM -->
@include('BPBbenang.create')

@endsection