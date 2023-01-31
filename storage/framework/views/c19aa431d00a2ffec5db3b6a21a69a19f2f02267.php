<div
   class="modal fade text-left"
      id="inputinvoice"
       tabindex="-1"
      role="dialog"
     aria-labelledby="myModalLabel33"
      aria-hidden="true"
            >
      <div
        class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg"
        role="document"
      >
        <div class="modal-content">
          <div class="modal-header bg-primary">
            <h4 class="modal-title" id="myModalLabel33">
              BPB INPUT
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
        <form action="<?php echo e(route('BPBbenang.store')); ?>" method="POST" class="form-horizontal" data-parsley-validate>
          <?php echo csrf_field(); ?>
        <div class="modal-body"  >
          <div class="form-group row">
            <label
              for="lname"
              class="col-sm-3 text-end control-label col-form-label"
              >Nomor BPB</label
            >
            <div class="col-sm-7">
              <input
                type="text"
                class="form-control"
                name="no_bpb"
                placeholder="CD-12 / PUE 12"
              />
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 text-end control-label col-form-label">Nama Supplier</label>
            <div class="col-md-7">
              <select
                class="select2 form-select shadow-none"
                style="width: 100%; height: 36px"
                id="id_supplier" name="id_supplier"
              >
                <?php $__currentLoopData = $suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $supplier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <option value="<?php echo e($supplier->id); ?>"><?php echo e($supplier->nama_supplier); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             </select>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label
              for="lname"
              class="col-sm-3 text-end control-label col-form-label"
              >Surat Jalan</label
            >
            <div class="col-sm-7">
              <input
                type="text"
                class="form-control"
                name="surat_jalan"
                placeholder="CD-12 / PUE 12"
              />
            </div>
          </div>
          <?php if(! \Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'operatorjadi|operatorbenang')): ?>
          <div class="form-group row">
            <label
              for="email1"
              class="col-sm-3 text-end control-label col-form-label"
              >Harga</label>
            <div class="col-sm-7">
              <input
                type="text"
                class="form-control"
                name="harga"
                value="0"
                placeholder=""
              />
            </div>
          </div>
          <div class="form-group row">
            <label
              for="cono1"
              class="col-sm-3 text-end control-label col-form-label"
              >Pembayaran</label
            >
            <div class="col-sm-7">
              <input
                type="text"
                class="form-control"
                name="pembayaran"
                value="0"
                placeholder=""
              />
            </div>
          </div>
          <div class="form-group row">
            <label
              for="cono1"
              class="col-sm-3 text-end control-label col-form-label"
              >status</label
            >
            <div class="col-sm-7">
              <input
                type="text"
                class="form-control"
                name="status"
                value="belum lunas"
                readonly
              />
            </div>
          </div>
          <?php endif; ?>
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
 </div><?php /**PATH C:\laragon\www\TriCoba\resources\views/BPBbenang/create.blade.php ENDPATH**/ ?>