  

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Benang</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="<?php echo e(route('benang.index')); ?>"> Back</a>
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
    <div class="col-md-7">
      <div class="card">
    <form action="<?php echo e(route('masterbenang.store')); ?>" method="POST" name="stockbenang" class="form-horizontal" data-parsley-validate>
        <?php echo csrf_field(); ?>
      <div class="card-body"  >
        <h4 class="card-title">Data Benang</h4>
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
            >jenis Benang</label
          >
          <div class="col-sm-9">
            <input
              type="text"
              class="form-control"
              name="jenis_benang"
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
                id="tipe_benang"
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
                id="tipe_benang"
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
            for="email1"
            class="col-sm-3 text-end control-label col-form-label"
            >LOT</label
          >
          <div class="col-sm-9">
            <input
              type="text"
              class="form-control"
              name="LOT"
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
<script>
  var tipe = document.getElementById('tipe_benang').value;
  if(tipe=="cotton"){
    function sum(){
    var valueKG = document.getElementById('KG').value;
    var result = parseFloat(valueKG) / parseFloat(181.44);
    if(!isNaN(result)){
        document.getElementById('BALE').value=result;
      }
    }
  }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.mazer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\TriCoba\resources\views/masterbenang/create.blade.php ENDPATH**/ ?>