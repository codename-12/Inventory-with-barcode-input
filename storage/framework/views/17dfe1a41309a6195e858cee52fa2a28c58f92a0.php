

<?php $__env->startSection('bread'); ?>
<div class="page-breadcrumb">
    <div class="row">
      <div class="col-12 d-flex no-block align-items-center">
        <div class="ms-auto text-end">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    STOCK
                  </li>
              <li class="breadcrumb-item"><a href="<?php echo e(route('benang.index')); ?>">Penerimaan</a></li>
              <li class="breadcrumb-item"><a href="<?php echo e(route('obenang.index')); ?>">Pengiriman</a></li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
        <?php if($message = Session::get('success')): ?>
        <div class="alert alert-success">
            <p><?php echo e($message); ?></p>
        </div>
    <?php endif; ?>


<div class="page-heading">
  <div class="page-title">
    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Data Stock Benang</h3>
        <p class="text-subtitle text-muted">data ini terus ter update jika ada perubahan secara live.</p>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Cari berdasarkan kondisi</h4>
    </div>
    <div class="card-body">
          <button
        type="button"
        class="btn btn-outline-success"
        data-bs-toggle="modal"
        data-bs-target="#input">
        Tambah Data
      </button>
<br/>
<br/>
    <div class="container">
    <table class="table table-striped data-table">
        <thead>
        <tr>
            <th>No</th>
            <th>Nama Supplier</th>
            <th>Jenis Benang</th>
            <th>Tipe</th>
            <th>LOT</th>
            <th>BOX / KRG</th>
            <th>KGS</th>
            <th>BALE</th>
            <th>keterangan</th>
            <th width="200px">Action</th> 
        </tr>
    </thead>
    </table>
    </div>
    <script type="text/javascript">
        $(function () {
          var table = $('.data-table').DataTable({
              processing: true,
              serverSide: true,
              scrollX: true,
              ajax: "<?php echo e(route('masterbenang.index')); ?>",
              columns: [
                  {data: 'id', name: 'id'},
                  {data: 'bsuppliers.nama_supplier', name: 'bsuppliers.nama_supplier'},
                  {data: 'jenis_benang', name: 'jenis_benang'},
                  {data: 'tipe_benang', name: 'tipe_benang'},
                  {data: 'LOT', name: 'LOT'},
                  {data: 'BOX_KRG', name: 'BOX_KRG'},
                  {data: 'KG', name: 'KG'},
                  {data: 'BALE', name: 'BALE'},
                  {data: 'keterangan', name: 'keterangan'},
                  {data: 'action', name: 'action', orderable: false, searchable: false},
              ]
          });
          
        });
      </script>
    </div>
  </div>
</div>

<!-- MODALS input FORM -->
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
        class="modal-dialog modal-dialog-centered modal-lg"
        role="document"
      >
        <div class="modal-content">
          <div class="modal-header bg-primary">
            <h4 class="modal-title" id="myModalLabel33">
              STOCK BENANG INPUT
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
              type="decimal"
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.mazer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\TriCoba\resources\views/masterbenang/index.blade.php ENDPATH**/ ?>