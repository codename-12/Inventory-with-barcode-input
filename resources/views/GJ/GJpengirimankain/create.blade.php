{{-- input form  --}}
<div
  class="modal fade text-left"
  id="input"
  data-bs-backdrop="static" data-bs-keyboard="false"
  tabindex="-1"
  role="dialog"
  aria-labelledby="myModalLabel33"
  aria-hidden="true">
    <div
      class="modal-dialog modal-dialog-centered"
      role="document" >
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h4 class="modal-title" id="myModalLabel33">
            KAIN INPUT
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
     <form action="{{ route('GJpengirimankain.store') }}" method="POST" data-parsley-validate>
         @csrf
         <div class="modal-body">
          <label>SP NO : </label>
           <div class="form-group">
             <input
              type="text"
              placeholder="CVC/BABYTERRY etc"
              class="form-control"
              name="SP_NO"
              data-parsley-required="true"
              data-parsley-error-message="NOMOR KOP Harus diisi."
            />
          <label>Kode Barang</label>
          <div class="form-group">
            <select
              class="choices form-select multiple-remove"
              multiple="multiple"
              name="kode_kain[]"
            >
              <optgroup label="POLOS">
                @foreach ($stock_polos as $polos)
                  <option value="{{ $polos->kode_kain }}">{{ $polos->kode_kain }}</option>
                @endforeach
              </optgroup>
              <optgroup label="BS POLOS">
                @foreach ($bs_polos as $bspolos)
                  <option value="{{ $bspolos->kode_kain }}">{{ $bspolos->kode_kain }}</option>
                @endforeach
              </optgroup>

            </select>
          </div>
          <div class="form-group">
            <label for="tanggal_masuk">Tanggal Masuk</label>
            <input type="date" class="form-control @error('tanggal_masuk') is-invalid @enderror"
                id="tanggal_masuk" name="tanggal_masuk"
                value="{{ old('tanggal_masuk') ?? date('Y-m-d') }}">
            @error('tanggal_masuk')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>         
           <label>NO POL: </label>
           <div class="form-group">
             <input
              type="text"
              placeholder="CVC/BABYTERRY etc"
              class="form-control"
              name="NO_POL"
              data-parsley-required="true"
              data-parsley-error-message="NOMOR KOP Harus diisi."
            />
          </div>
          <label>TOTAL : </label>
          <div class="form-group">
            <input
             type="text"
             placeholder="CVC/BABYTERRY etc"
             class="form-control"
             name="TOTAL"
             data-parsley-required="true"
             data-parsley-error-message="NOMOR KOP Harus diisi."
           />
         </div>
         <label>NO PO : </label>
          <div class="form-group">
            <input
             type="text"
             placeholder="CVC/BABYTERRY etc"
             class="form-control"
             name="NO_PO"
             data-parsley-required="true"
             data-parsley-error-message="NOMOR KOP Harus diisi."
           />
         </div>
          <label>Keterangan: </label>
           <div class="form-group">
            <textarea name="keterangan" id="keterangan"  class="form-control"
               id="exampleFormControlTextarea1"
               rows="3"></textarea>
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
