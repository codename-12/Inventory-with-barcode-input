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
<form action="{{ route('regkain_polos.store') }}" method="POST" data-parsley-validate>
 @csrf
 <div class="modal-body">
  <label>Kode Kain: </label>
   <div class="form-group">
    <input type="text" class="form-control" name="kode_kain" value="{{ bin2hex(random_bytes(3)) }}" readonly>
  </div>
  <label>Tanggal: </label>
   <div class="form-group">
     <input
      type="date"
      placeholder="DD/MM/YY"
      class="form-control"
      name="tanggal"
      value="{{ date('Y-m-d') }}"
      data-parsley-required="true"
      data-parsley-error-message="Tanggal Harus diisi."
    />
  </div>
   <label>Warna: </label>
   <div class="form-group">
     <input
      type="text"
      placeholder="BENHUR/MAROON"
      class="form-control"
      name="warna"
      data-parsley-required="true"
      data-parsley-error-message="Warna Harus diisi."
    />
  </div>
  <label>KOP: </label>
  <div class="form-group">
    <select
        class="choices form-select shadow-none"
        style="width: 100%; height: 36px"
        id="KOP" name="kop"
        data-parsley-required="true"
       data-parsley-error-message="Pilih BPB Terbaru">
       @foreach ($kops as $kop)
          <option value="{{ $kop->id}}">{{ $kop->NO_KOP }} LOT {{ $kop->LOT }}</option>
       @endforeach
   </select>
  </div>
   <label>LOT: </label>
   <div class="form-group">
     <input
      type="text"
      placeholder="LOT"
      class="form-control"
      name="LOT"
      data-parsley-required="true"
      data-parsley-error-message="NOMOR LOT Harus diisi."
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
      data-parsley-error-message="ROL Harus diisi."
    />
  </div>
  <label>KG: </label>
   <div class="form-group">
     <input
      type="decimal"
      placeholder="NOMOR KOP"
      class="form-control"
      name="KG"
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