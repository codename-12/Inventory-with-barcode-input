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
      <div
          class="modal fade text-left"
              id="input"
              data-bs-backdrop="static" data-bs-keyboard="false"
              tabindex="-1"
              role="dialog"
              aria-labelledby="myModalLabel33"
              aria-hidden="true"
            >
      <div
        class="modal-dialog modal-dialog-centered"
        role="document"
      >
        <div class="modal-content">
          <div class="modal-header bg-primary">
            <h4 class="modal-title" id="myModalLabel33">
              KOP INPUT
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
       <form action="{{ route('KOP.store') }}" method="POST" data-parsley-validate>
           @csrf
           <div class="modal-body">
             <label>NOMOR KOP: </label>
             <div class="form-group">
               <input
                type="text"
                placeholder="NOMOR KOP"
                class="form-control"
                name="NO_KOP"
                data-parsley-required="true"
                data-parsley-error-message="NOMOR KOP Harus diisi."
              />
            </div>
            <label>NOMOR SSP/SJ: </label>
             <div class="form-group">
               <input
                type="text"
                placeholder="NOMOR KOP"
                class="form-control"
                name="NO_SSP-SJ"
                data-parsley-required="true"
                data-parsley-error-message="NOMOR KOP Harus diisi."
              />
            </div>
             <label>Customer / langganan: </label>
           <div class="form-group">
             <select
                 class="choices form-select shadow-none"
                 style="width: 100%; height: 36px"
                 id="id_customer" name="id_customer"
                 data-parsley-required="true"
                data-parsley-error-message="Pilih BPB Terbaru">
                @foreach ($customers as $customer)
                   <option value="{{ $customer->id}}">{{ $customer->nama_customer }}</option>
                @endforeach
            </select>
                 </div>
             <label>Tanggal: </label>
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
             <label>Lebar: </label>
             <div class="form-group">
               <input
                type="text"
                placeholder="NOMOR KOP"
                class="form-control"
                name="lebar"
                data-parsley-required="true"
                data-parsley-error-message="NOMOR KOP Harus diisi."
              />
            </div>
            <label>ROL: </label>
             <div class="form-group">
               <input
                type="text"
                placeholder="NOMOR KOP"
                class="form-control"
                name="ROL"
                data-parsley-required="true"
                data-parsley-error-message="NOMOR KOP Harus diisi."
              />
            </div>
            <label>KG: </label>
             <div class="form-group">
               <input
                type="text"
                placeholder="NOMOR KOP"
                class="form-control"
                name="KG"
                data-parsley-required="true"
                data-parsley-error-message="NOMOR KOP Harus diisi."
              />
            </div>
            <label>LOT: </label>
             <div class="form-group">
               <input
                type="text"
                placeholder="NOMOR KOP"
                class="form-control"
                name="LOT"
                data-parsley-required="true"
                data-parsley-error-message="NOMOR KOP Harus diisi."
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