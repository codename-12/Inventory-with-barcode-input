      {{-- input form  --}}
      <div
      class="modal fade text-left"
          id="input"
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
   <form action="{{ route('customerkain.store') }}" method="POST" data-parsley-validate>
       @csrf
       <div class="modal-body">
         <label>Nama Customer </label>
         <div class="form-group">
           <input
            type="text"
            placeholder="Nama Customer"
            class="form-control"
            name="nama_customer"
            data-parsley-required="true"
            data-parsley-error-message="Nama Customer Harus diisi"
          />
        </div>
        <label>NO TLP </label>
         <div class="form-group">
           <input
            type="text"
            placeholder="+62809xxx"
            class="form-control"
            name="no_tlp"
            data-parsley-required="true"
            data-parsley-error-message="NO TLP Harus diisi"
          />
        </div>
        <label>Email </label>
         <div class="form-group">
           <input
            type="text"
            placeholder="user@email.com"
            class="form-control"
            name="email"
            data-parsley-required="true"
            data-parsley-error-message="Email Harus diisi"
          />
        </div>
        <label>PT </label>
         <div class="form-group">
           <input
            type="text"
            placeholder="PT sejahtra"
            class="form-control"
            name="PT"
            data-parsley-required="true"
            data-parsley-error-message="PT Harus diisi"
          />
        </div>
        <label>Alamat </label>
         <div class="form-group">
           <input
            type="text"
            placeholder="Alamat"
            class="form-control"
            name="alamat"
            data-parsley-required="true"
            data-parsley-error-message="Alamat Harus diisi"
          />
        </div>
        <label>Keterangan: </label>
         <div class="form-group">
         <textarea name="keterangan" class="form-control" placeholder="isi keterangan"></textarea>
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