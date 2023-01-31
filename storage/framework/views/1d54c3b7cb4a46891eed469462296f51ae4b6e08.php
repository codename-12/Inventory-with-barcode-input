  


<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Pengiriman</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="<?php echo e(route('obenang.index')); ?>"> Back</a>
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
        <form action="<?php echo e(route('obenang.update',$obenang->id)); ?>" method="POST" class="form-horizontal">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
          <div class="card-body"  >
            <h4 class="card-title">Data Benang</h4>
            <div class="col-xs-12 col-sm-12 col-md-12">W
                <div class="form-group">
                    <strong>Tanggal masuk</strong>
                    <input type="DATE" name="tanggal" value="<?php echo e($obenang->tanggal); ?>" class="form-control" placeholder="DD/MM/YYYY">
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
                    <option value="<?php echo e($obenang->id_supplier); ?>"><?php echo e($obenang->id_supplier); ?></option>
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
                    name="SJ"
                    value="<?php echo e($obenang->SJ); ?>"
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
                  value="<?php echo e($obenang->jenis_benang); ?>"
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
                  document.forms['form'].elements['tipe_benang'].value='<?php echo e($obenang->tipe_benang); ?>'
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
                  value="<?php echo e($obenang->LOT); ?>"
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
                  value="<?php echo e($obenang->BOX_KRG); ?>"
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
                  value="<?php echo e($obenang->KG); ?>"
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
                  value="<?php echo e($obenang->BALE); ?>"
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
                <textarea class="form-control" name="keterangan"><?php echo e($obenang->keterangan); ?></textarea>
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
<?php echo $__env->make('layouts.mazer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\TriCoba\resources\views\obenang\edit.blade.php ENDPATH**/ ?>