

<?php $__env->startSection('content'); ?>
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

    <?php if($message = Session::get('success')): ?>
        <div class="alert alert-success">
            <p><?php echo e($message); ?></p>
        </div>
    <?php endif; ?>
    <div class="page-heading">
      <div class="page-title">
        <div class="row">
          <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Form Penerimaan Kain</h3>
            <p class="text-subtitle text-muted">data ini terus ter update jika ada perubahan secara live.</p>
          </div>
        </div>
      </div>
    
      <div class="card">
        <div class="card-header">
          <a data-bs-toggle="modal"
        data-bs-target="#input" class="btn btn-success rounded-pill"
          >Tambah Data</a>
      <br/>
      <br/>
          <h4 class="card-title">Cari berdasarkan kondisi</h4>
        </div>
        <div class="card-body">
    <div class="container">
    <table class="table table-striped data-table">
        <thead>
        <tr>
            <th>No</th>
            <th>tanggal masuk</th>
            <th>Customer</th>
            <th>Jenis Kain</th>
            <th>Warna</th>
            <th>KOP</th>
            <th>LOT</th>
            <th>ROL</th>
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
              ajax: "<?php echo e(route('GJpenerimaankainpolos.index')); ?>",
              columns: [
                  {data: 'id', name: 'id'},
                  {data: 'tanggal', name: 'tanggal'},
                  {data: 'customer.nama_customer', name: 'customer.nama_customer'},
                  {data: 'jenis_kain', name: 'jenis_kain'},
                  {data: 'warna', name: 'warna'},
                  {data: 'kop.NO_KOP', name: 'kop.NO_KOP'},
                  {data: 'LOT', name: 'LOT'},
                  {data: 'ROL', name: 'ROL'},
                  {data: 'keterangan', name: 'keterangan'},
                  {data: 'action', name: 'action', orderable: false, searchable: false},
              ]
          });
          
        });
      </script>
        </div>
      </div>
    </div>

      
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
        class="modal-dialog modal-dialog-centered"
        role="document"
      >
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
       <form action="<?php echo e(route('GJpenerimaankainpolos.store')); ?>" method="POST" data-parsley-validate>
           <?php echo csrf_field(); ?>
           <div class="modal-body">
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
             <label>Warna: </label>
             <div class="form-group">
               <input
                type="text"
                placeholder="BENHUR/MAROON"
                class="form-control"
                name="warna"
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
            
             <label>LOT: </label>
             <div class="form-group">
               <input
                type="text"
                placeholder="LOT"
                class="form-control"
                name="LOT"
                data-parsley-required="true"
                data-parsley-error-message="NOMOR KOP Harus diisi."
              />
            </div>
            <label>ROL: </label>
             <div class="form-group">
               <input
                type="text"
                placeholder="NOMOR KOP"
                class="form-control"
                name="ROL"
                data-parsley-required="true"
                data-parsley-error-message="NOMOR KOP Harus diisi."
              />
            </div>
            <label>KG: </label>
             <div class="form-group">
               <input
                type="decimal"
                placeholder="NOMOR KOP"
                class="form-control"
                name="KG"
                data-parsley-required="true"
                data-parsley-error-message="NOMOR KOP Harus diisi."
              />
            </div>
            <label>Jenis Stock: </label>
            <div class="form-check form-check-success">
              <input
                class="form-check-input"
                type="radio"
                name="jenis_stock"
                id="Success"
                value="stock_polos"
                checked
              />
              <label class="form-check-label" for="Success">
                Stock Polos
              </label>
            </div>
            <div class="form-check form-check-danger">
              <input
                class="form-check-input"
                type="radio"
                name="jenis_stock"
                id="Danger"
                value="bs_polos"
                checked
              />
              <label class="form-check-label" for="Danger">
                BS POLOS
              </label>
            </div>
            <label>Keterangan: </label>
             <div class="form-group">
               <textarea name="keterangan" id="keterangan" cols="30" rows="10"></textarea>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.mazer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\TriCoba\resources\views/GJpenerimaankainpolos/index.blade.php ENDPATH**/ ?>