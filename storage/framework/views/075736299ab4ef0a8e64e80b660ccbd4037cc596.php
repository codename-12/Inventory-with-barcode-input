
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
     <form action="<?php echo e(route('GJpengirimankain.store')); ?>" method="POST" data-parsley-validate>
         <?php echo csrf_field(); ?>
         <div class="modal-body">
          <label>Customer / langganan: </label>
          <div class="form-group">
            <select
                class="choices form-select shadow-none"
                style="width: 100%; height: 36px"
                id="id_customer" name="id_customer"
                data-parsley-required="true"
               data-parsley-error-message="Pilih BPB Terbaru">
               <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($customer->id); ?>"><?php echo e($customer->nama_customer); ?></option>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           </select>
          </div>
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
          <label>KOP: </label>
          <div class="form-group">
            <select
                class="choices form-select shadow-none"
                style="width: 100%; height: 36px"
                id="KOP" name="KOP"
                data-parsley-required="true"
               data-parsley-error-message="Pilih BPB Terbaru">
               <?php $__currentLoopData = $kops; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($kop->id); ?>"><?php echo e($kop->NO_KOP); ?></option>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           </select>
          </div>
          <label>Jenis Stock: </label>
          <div class="form-check form-check-success">
            <input
              class="form-check-input"
              type="radio"
              name="jenis_kain"
              id="Success"
              value="stock_polos"
              checked
            />
            <label class="form-check-label" for="Success">
              Stock POLOS
            </label>
          </div>
          <div class="form-check form-check-success">
            <input
              class="form-check-input"
              type="radio"
              name="jenis_kain"
              id="Success"
              value="stock_printing"
              checked
            />
            <label class="form-check-label" for="Success">
              Stock PRINTING
            </label>
          </div>
          <div class="form-check form-check-danger">
            <input
              class="form-check-input"
              type="radio"
              name="jenis_kain"
              id="Danger"
              value="bs_polos"
              checked
            />
            <label class="form-check-label" for="Danger">
              BS POLOS
            </label>
          </div>
            <div class="form-check form-check-danger">
              <input
                class="form-check-input"
                type="radio"
                name="jenis_kain"
                id="Danger"
                value="bs_printing"
                checked
              />
              <label class="form-check-label" for="Danger">
                BS PRINTING
              </label>
          </div>
          <label>Kode Barang</label>
          <div class="form-group">
            <select
              class="choices form-select multiple-remove"
              multiple="multiple"
              name="kode_barang"
            >
              <optgroup label="POLOS">
                <?php $__currentLoopData = $stock_polos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $polos): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($polos->kode_barang); ?>"><?php echo e($polos->kode_barang); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </optgroup>
              <optgroup label="PRINTING">
                <?php $__currentLoopData = $stock_printing; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $printing): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($printing->kode_barang); ?>"><?php echo e($printing->kode_barang); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </optgroup>
              <optgroup label="BS POLOS">
                <?php $__currentLoopData = $bs_polos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bspolos): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($bspolos->kode_barang); ?>"><?php echo e($bspolos->kode_barang); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </optgroup>
              <optgroup label="BS PRINTING">
                <?php $__currentLoopData = $bs_printing; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bsprinting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($bsprinting->kode_barang); ?>"><?php echo e($bsprinting->kode_barang); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </optgroup>
            </select>
          </div>
          <label>Tanggal: </label>
           <div class="form-group">
             <input
              type="date"
              placeholder="DD/MM/YY"
              class="form-control"
              name="tanggal"
              data-parsley-required="true"
              data-parsley-error-message="Tanggal Harus diisi."
            />
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
<?php /**PATH C:\laragon\www\TriCoba\resources\views/GJpengirimankain/create.blade.php ENDPATH**/ ?>