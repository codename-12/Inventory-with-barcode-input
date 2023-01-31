<div
   class="modal fade text-left"
      id="input"
      data-bs-backdrop="static"
      data-bs-keyboard="false"
      tabindex="-1"
      role="dialog"
      aria-labelledby="myModalLabel33"
      aria-hidden="true">

      <div
        class="modal-dialog modal-dialog-centered"
        role="document">

        <div class="modal-content">
          <div class="modal-header bg-primary">
            <h4 class="modal-title" id="myModalLabel33">
              INPUT PENERIMAAN BENANG
            </h4>
            <button
              type="button"
              class="close"
              data-bs-dismiss="modal"
              aria-label="Close">

          <i data-feather="x"></i>
          </button>
        </div>
        <form action="<?php echo e(route('benang.store')); ?>" method="POST" class="form-horizontal" data-parsley-validate>
          <?php echo csrf_field(); ?>
        <div class="modal-body"  >
          <div class="form-group row">
            <label class="col-sm-3 text-end control-label col-form-label">Tanggal Penerimaan</label>
                  <div class="col-md-9">
                    <input
                      type="Date"
                      class="form-control"
                      id="datepicker"
                      name="tanggal"
                      placeholder="mm/dd/yyyy"
                      data-parsley-required="true"
                      data-parsley-error-message="Tanggal Harus diisi."/>
                  </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 text-end control-label col-form-label">Nama Supplier</label>
              <div class="col-md-9">
                <select
                  class="choices form-select shadow-none"
                  style="width: 100%; height: 36px"
                  id="id_supplier" name="id_supplier"
                  data-parsley-required="true"
                  data-parsley-error-message="Pilih Supplier."
                >
                  <?php $__currentLoopData = $suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $supplier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <option value="<?php echo e($supplier->id); ?>"><?php echo e($supplier->nama_supplier); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               </select>
                </select>
              </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 text-end control-label col-form-label">Bukti Penerimaan Barang</label>
                <div class="col-md-9">
                  <select
                    class="choices form-select shadow-none"
                    style="width: 100%; height: 36px"
                    id="BPB" name="BPB"
                    data-parsley-required="true"
                    data-parsley-error-message="Pilih BPB Terbaru"> 
                    <?php $__currentLoopData = $bpbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bpb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       <option value="<?php echo e($bpb->id); ?>"><?php echo e($bpb->no_bpb); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 </select>
                </div>
              </div>
              <div class="form-group row">
                <label
                  for="lname"
                  class="col-sm-3 text-end control-label col-form-label"
                  >Surat Jalan</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    name="SJ"
                    placeholder=" "
                    data-parsley-required="true"
                    data-parsley-error-message="Surat Jalan Harus diisi."/>
                </div>
              </div>
              <div class="form-group row">
                <label
                for="lname"
                class="col-sm-3 text-end control-label col-form-label"
                >Jenis Benang</label>
                <div class="col-sm-9" >
                  <select class="choices form-select shadow-none"
                  style="width: 100%; height: 36px"
                  id="jenis_benang" name="jenis_benang"
                  data-parsley-required="true"
                  data-parsley-error-message="Jenis benang harus diisi."
                  >
                    <?php $__currentLoopData = $masterbenangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jenisbenang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <option value="<?php echo e($jenisbenang->jenis_benang); ?>" ><?php echo e($jenisbenang->jenis_benang); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                  </select>
                </div>
              </div>
            <div class="form-group row">
              <label class="col-sm-3 text-end control-label col-form-label">Tipe Benang</label>
              <div class="col-md-9">
                <div class="form-check">
                  <input
                    type="radio"
                    class="form-check-input"
                    name="tipe_benang"
                    value="COTTON"
                    data-parsley-required="true"
                  />
                  <label
                    class="form-check-label mb-0"
                    for="COTTON"
                    >COTTON</label
                  >
                </div>
                <div class="form-check">
                  <input
                    type="radio"
                    class="form-check-input"
                    name="tipe_benang"
                    value="POLYESTER"
                    required
                  />
                  <label
                    class="form-check-label mb-0"
                    for="POLYESTER"
                    >POLYESTER</label
                  >
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label
              class="col-sm-3 text-end control-label col-form-label"
              >LOT</label>
              <div class="col-sm-9">
                <select class="choices form-select shadow-none"
                style="width: 100%; height: 36px"
                id="LOT" name="LOT">
                  <?php $__currentLoopData = $masterbenangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $LOT): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <option value="<?php echo e($LOT->LOT); ?>"><?php echo e($LOT->LOT); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label
                for="cono1"
                class="col-sm-3 text-end control-label col-form-label">
                BOX / KRG
              </label>
              <div class="col-sm-9">
                <input
                  type="text"
                  class="form-control"
                  name="BOX_KRG"
                  placeholder="Contoh 21.09"
                  data-parsley-required="true"/>
              </div>
            </div>
            <div class="form-group row">
              <label
                for="cono1"
                class="col-sm-3 text-end control-label col-form-label"
                >KG</label
              >
              <div class="col-sm-9">
                <input
                  type="decimal"
                  class="form-control"
                  name="KG"
                  id="KG"
                  placeholder="Contoh 21.09"
                  onkeyup="sum();"
                  data-parsley-required="true"
                />
              </div>
            </div>
            <div class="form-group row">
              <label
                for="cono1"
                class="col-sm-3 text-end control-label col-form-label"
                >BALE</label
              >
              <div class="col-sm-9">
                <input
                  type="number"
                  class="form-control"
                  name="BALE"
                  id="BALE"
                  onkeyup="sum();"
                  readonly
                  
                />
              </div>
            </div>
            <div class="form-group row">
              <label
                for="cono1"
                class="col-sm-3 text-end control-label col-form-label"
                >Keterangan</label
              >
              <div class="col-sm-9">
                <textarea class="form-control" name="keterangan"></textarea>
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
<script>
    function sum(){
    var valueKG = document.getElementById('KG').value;
    var result = parseFloat(valueKG) / parseFloat(181.44);
    if(!isNaN(result)){
        document.getElementById('BALE').value=result;
    }
}
</script>
<?php /**PATH C:\laragon\www\TriCoba\resources\views/benang/create.blade.php ENDPATH**/ ?>