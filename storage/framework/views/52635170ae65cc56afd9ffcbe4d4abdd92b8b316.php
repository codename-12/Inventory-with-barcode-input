


<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Supplier</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="<?php echo e(route('supbenang.index')); ?>"> Back</a>
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
        <form action="<?php echo e(route('supbenang.update',$supbenang->id)); ?>" method="POST" class="form-horizontal">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="card-body"  >
              <h4 class="card-title">Data Supplier</h4>
              <div class="form-group row">
                <label
                  for="lname"
                  class="col-sm-3 text-end control-label col-form-label"
                  >Nama Supplier</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    name="nama_supplier"
                    value="<?php echo e($supbenang->nama_supplier); ?>"
                    placeholder="CD-12 / PUE 12"
                  />
                </div>
              </div>
              <div class="form-group row">
                <label
                  for="cono1"
                  class="col-sm-3 text-end control-label col-form-label"
                  >Saldo Total</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    name="saldo"
                    value="<?php echo e($supbenang->saldo); ?>"
                    placeholder="Contoh 21.09"
                  />
                </div>
              </div>
              <div class="form-group row">
                <label
                  for="cono1"
                  class="col-sm-3 text-end control-label col-form-label"
                  >Hutang</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    name="hutang"
                    value="<?php echo e($supbenang->hutang); ?>"
                    placeholder="Contoh 21.092"
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
                  <textarea class="form-control" name="keterangan"><?php echo e($supbenang->keterangan); ?></textarea>
                </div>
              </div>
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
<?php echo $__env->make('layouts.mazer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\TriCoba\resources\views/supbenang/edit.blade.php ENDPATH**/ ?>