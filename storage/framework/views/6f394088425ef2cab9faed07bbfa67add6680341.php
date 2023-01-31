  

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Tambah DATA</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="<?php echo e(route('BPBbenang.index')); ?>"> Back</a>
        </div>
    </div>
</div>


<?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>
  <div class="row">
    <div class="col-md-4">
      <div class="card">
    <form action="<?php echo e(route('BPBbenang.store')); ?>" method="POST" class="form-horizontal">
        <?php echo csrf_field(); ?>
      <div class="card-body"  >
        <h4 class="card-title">Data Bukti Penerimaan Barang</h4>
        <div class="form-group row">
          <label
            for="lname"
            class="col-sm-3 text-end control-label col-form-label"
            >Nomor BPB</label
          >
          <div class="col-sm-9">
            <input
              type="text"
              class="form-control"
              name="no_bpb"
              placeholder="CD-12 / PUE 12"
            />
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
          <div class="col-sm-9">
            <input
              type="text"
              class="form-control"
              name="surat_jalan"
              placeholder="CD-12 / PUE 12"
            />
          </div>
        </div>
        <?php if(! \Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'operator | operatorbenang')): ?>
        <div class="form-group row">
          <label
            for="email1"
            class="col-sm-3 text-end control-label col-form-label"
            >Harga</label>
          <div class="col-sm-9">
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
          <div class="col-sm-9">
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
          <div class="col-sm-9">
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
      </div>
      <div class="border-top">
        <div class="card-body">
          <button type="submit" class="btn btn-primary">
            Submit
          </button>
        </div>
      </div>
    </form>
  </div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.mazer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\TriCoba\resources\views\BPBbenang\create.blade.php ENDPATH**/ ?>