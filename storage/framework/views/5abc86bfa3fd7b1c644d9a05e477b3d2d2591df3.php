<div
   class="modal fade text-left"
      id="edit"
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
              EDIT PENERIMAAN BENANG
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
        <form action="<?php echo e(route('benang.update',$benang->id)); ?>" method="POST" class="form-horizontal" data-parsley-validate>
          <?php echo csrf_field(); ?>
          <?php echo method_field('PUT'); ?>
        <div class="modal-body"  >
          <div class="form-group">
            <strong>Tanggal masuk</strong>
            <input type="DATE" name="tanggal" value="<?php echo e($benang->tanggal); ?>" class="form-control" placeholder="DD/MM/YYYY">
        </div>
    </div>
    <div class="form-group row">
      <label class="col-md-3 mt-3">Nama Supplier</label>
      <div class="col-md-9">
        <select
          class="select2 form-select shadow-none"
          style="width: 100%; height: 36px"
          id="id_supplier" name="id_supplier"
        >
            <option value="<?php echo e($benang->id_supplier); ?>"><?php echo e($benang->id_supplier); ?></option>
          <?php $__currentLoopData = $suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $supplier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <option value="<?php echo e($supplier->id); ?>"><?php echo e($supplier->nama_supplier); ?></option>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       </select>
        </select>
      </div>
    </div>
    <div class="form-group row">
        <label class="col-md-3 mt-3">Bukti Penerimaan Barang</label>
        <div class="col-md-9">
          <select
            class="select2 form-select shadow-none"
            style="width: 100%; height: 36px"
            id="BPB" name="BPB"
          >
              <option value="<?php echo e($benang->BPB); ?>"><?php echo e($benang->BPB); ?></option>
            <?php $__currentLoopData = $bpbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bpb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <option value="<?php echo e($bpb->id); ?>"><?php echo e($bpb->no_bpb); ?></option>
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
        <div class="col-sm-9">
          <input
            type="text"
            class="form-control"
            name="SJ"
            value="<?php echo e($benang->SJ); ?>"
            placeholder=" "
          />
        </div>
      </div>
    <div class="form-group row">
      <label
        for="lname"
        class="col-sm-3 text-end control-label col-form-label"
        >jenis Benang</label
      >
      <div class="col-sm-9">
        <input
          type="text"
          class="form-control"
          name="jenis_benang"
          value="<?php echo e($benang->jenis_benang); ?>"
          placeholder="CD-12 / PUE 12"
        />
      </div>
    </div>
    <div class="form-group row">
      <label class="col-md-3">Tipe Benang</label>
      <div class="col-md-9">
        <div class="form-check">
          <input
            type="radio"
            class="form-check-input"
            name="tipe_benang"
            value="COTTON"
            required
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
        <script type="text/javascript">
          document.forms['form'].elements['tipe_benang'].value='<?php echo e($benang->tipe_benang); ?>'
        </script>
      </div>
    </div>
    <div class="form-group row">
      <label
        for="email1"
        class="col-sm-3 text-end control-label col-form-label"
        >LOT</label
      >
      <div class="col-sm-9">
        <input
          type="text"
          class="form-control"
          name="LOT"
          value="<?php echo e($benang->LOT); ?>"
          placeholder="contoh 72223e"
        />
      </div>
    </div>
    <div class="form-group row">
      <label
        for="cono1"
        class="col-sm-3 text-end control-label col-form-label"
        >BOX / KRG</label
      >
      <div class="col-sm-9">
        <input
          type="text"
          class="form-control"
          name="BOX_KRG"
          value="<?php echo e($benang->BOX_KRG); ?>"
          placeholder="Contoh 21.09"
        />
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
          type="text"
          class="form-control"
          name="KG"
          value="<?php echo e($benang->KG); ?>"
          placeholder="Contoh 21.09"
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
          type="text"
          class="form-control"
          name="BALE"
          value="<?php echo e($benang->BALE); ?>"
          placeholder="Contoh 212.3"
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
        <textarea class="form-control" name="keterangan"><?php echo e($benang->keterangan); ?></textarea>
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
    <span class="d-none d-sm-block">edit</span>
    </button>
   </div>
</form>
</div>
</div>
</div>

<?php /**PATH C:\laragon\www\TriCoba\resources\views/benang/edit.blade.php ENDPATH**/ ?>