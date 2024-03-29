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
            <h3>Data Invoice Pembayaran BPB</h3>
            <p class="text-subtitle text-muted">data ini terus ter update jika ada perubahan secara live.</p>
          </div>
        </div>
      </div>
    
      <div class="card">
        <div class="card-header">
          <a data-bs-toggle="modal"
        data-bs-target="#inputinvoice" class="btn btn-success rounded-pill"
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
            <th>tanggal</th>
            <th>Bukti Penerimaan Barang</th>
            <th>Jumlah Pembayaran</th>
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
              ajax: "{{ route('invoicebenang.index') }}",
              columns: [
                  {data: 'id', name: 'id'},
                  {data: 'tanggal', name: 'tanggal'},
                  {data: 'bpb.no_bpb', name: 'bpb.no_bpb'},
                  {data: 'total_pembayaran', name: 'total_pembayaran'},
                  {data: 'action', name: 'action', orderable: false, searchable: false},
              ]
          });
        });
      </script>
        </div>
      </div>
    </div>

      {{-- input form  --}}
      <div
          class="modal fade text-left"
              id="inputinvoice"
              tabindex="-1"
              role="dialog"
              aria-labelledby="myModalLabel33"
              aria-hidden="true"
            >
      <div
        class="modal-dialog modal-dialog-centered modal-dialog-scrollable "
        role="document"
      >
        <div class="modal-content">
          <div class="modal-header bg-primary">
            <h4 class="modal-title" id="myModalLabel33">
              INVOICE INPUT
            </h4>
            <button
              type="button"
              class="close"
              data-bs-dismiss="modal"
              aria-label="Close"
            >
          <i data-feather="x"></i>
          </button>
        </div>
       <form action="{{ route('invoicebenang.store') }}" method="POST" data-parsley-validate>
           @csrf
           <div class="modal-body">
             <label>Tanggal Pembayaran: </label>
             <div class="form-group">
               <input
                type="date"
                placeholder="Email Address"
                class="form-control"
                name="tanggal"
                data-parsley-required="true"
                data-parsley-error-message="Tanggal Harus diisi."
              />
            </div>
             <label>BPB: </label>
           <div class="form-group">
             <select
                 class="choices form-select shadow-none"
                 style="width: 100%; height: 36px"
                 id="BPB" name="BPB"
                 data-parsley-required="true"
                data-parsley-error-message="Pilih BPB Terbaru">
                @foreach ($bpbs as $bpb)
                   <option value="{{ $bpb->id}}">{{ $bpb->no_bpb }}</option>
                @endforeach
            </select>
                 </div>
              <label>Total Pembayaran: </label>
              <div class="form-group">
                <input
                  type="decimal"
                 placeholder="10000000"
                    class="form-control"
                    name="total_pembayaran"
                    data-parsley-required="true"
                    data-parsley-error-message="Tanggal Harus diisi."
                  />
                </div>
             </div>
             <div class="modal-footer">
               <button
                 type="button"
                 class="btn btn-light-secondary"
                 data-bs-dismiss="modal"
               >
                 <i class="bx bx-x d-block d-sm-none"></i>
                 <span class="d-none d-sm-block">Batal</span>
               </button>
                <button
                  type="submit"
                  class="btn btn-primary ml-1"
                >
             <i
               class="bx bx-check d-block d-sm-none"
             ></i>
             <span class="d-none d-sm-block">Tambah</span>
           </button>
            </div>
       </form>
     </div>
   </div>
 </div>
@endsection