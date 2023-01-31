

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
      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('masterbenang-create')): ?>
      <a href="<?php echo e(route('masterbenang.create')); ?>" class="btn btn-success rounded-pill"
          >Tambah Data</a>            
      <?php endif; ?>
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.mazer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\TriCoba\resources\views\masterbenang\index.blade.php ENDPATH**/ ?>