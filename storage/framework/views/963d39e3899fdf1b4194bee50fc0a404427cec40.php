  

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Tambah Pengiriman Benang</h2>
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
        <div class="col-md-7">
          <div class="card">
        <form action="<?php echo e(route('obenang.store')); ?>" method="POST" class="form-horizontal">
            <?php echo csrf_field(); ?>
      <div class="card-body"  >
        <h4 class="card-title">Data Pengeluaran Benang</h4>
        
            <div class="form-group row">
                <label class="col-sm-3 text-end control-label col-form-label">Nama Rajut</label>
                <div class="col-md-9">
                  <select
                    class="select2 form-select shadow-none"
                    style="width: 100%; height: 36px"
                    id="id_rajut" name="id_rajut"
                  >
                    <?php $__currentLoopData = $rajuts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rajut): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       <option value="<?php echo e($rajut->id); ?>"><?php echo e($rajut->nama_rajut); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 </select>
                </div>
              </div>
            <div class="form-group row">
            <label class="col-sm-3 text-end control-label col-form-label">Tanggal Pengiriman</label>
                  <div class="col-md-9">
                    <input
                      type="Date"
                      class="form-control"
                      id="datepicker"
                      name="tanggal"
                      placeholder="mm/dd/yyyy"
                    />
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
                  />
                </div>
              </div>
            <div class="form-group row">
              <label class="col-sm-3 text-end control-label col-form-label">Nama Supplier</label>
              <div class="col-md-9">
                <select
                  class="choices form-select shadow-none"
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
                <select class="choices form-select shadow-none"
                  style="width: 100%; height: 36px"
                  id="jenis_benang" name="jenis_benang">
                    <?php $__currentLoopData = $masterbenangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jenisbenang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <option value="<?php echo e($jenisbenang->jenis_benang); ?>"><?php echo e($jenisbenang->jenis_benang); ?></option>
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
              </div>
            </div>
            <div class="form-group row">
              <label
                for="email1"
                class="col-sm-3 text-end control-label col-form-label"
                >LOT</label
              >
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
    function sum(){
    var valueKG = document.getElementById('KG').value;
    var result = parseFloat(valueKG) / parseFloat(181.44);
    if(!isNaN(result)){
        document.getElementById('BALE').value=result;
    }
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.mazer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\TriCoba\resources\views\obenang\create.blade.php ENDPATH**/ ?>