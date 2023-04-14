
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
    KOPP INPUT
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
<form action="{{ route('KOPP.store') }}" method="POST" data-parsley-validate>
 @csrf
 <div class="modal-body">
   <label>NOMOR KOPP: </label>
   <div class="form-group">
     <input
      type="text"
      placeholder="NOMOR KOP"
      class="form-control"
      name="NO_KOPP"
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
      data-parsley-error-message="Pilih Customer">
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
      value="{{ date('Y-m-d') }}"
      data-parsley-required="true"
      data-parsley-error-message="Tanggal Harus diisi."
    />
  </div>
  <label>Jenis Kain: </label>
  <div class="form-group">
    <input
     type="text"
     placeholder="CVC/BABYTERRY etc"
     class="form-control"
     name="jenis_kain"
     data-parsley-required="true"
     data-parsley-error-message="NOMOR KOP Harus diisi."
   />
 </div>
 <label>Design: </label>
 <div class="form-group">
   <input
    type="text"
    placeholder="CVC/BABYTERRY etc"
    class="form-control"
    name="design"
    data-parsley-required="true"
    data-parsley-error-message="NOMOR KOP Harus diisi."
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