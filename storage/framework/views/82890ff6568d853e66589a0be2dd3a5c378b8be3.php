  

<?php $__env->startSection('bread'); ?>
<div class="page-breadcrumb">
    <div class="row">
      <div class="col-12 d-flex no-block align-items-center">
        <div class="ms-auto text-end">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item "><a href="<?php echo e(route('masterbenang.index')); ?>">STOCK</a></li>
                <li class="breadcrumb-item active" aria-current="page">Penerimaan</li>
                <li class="breadcrumb-item "><a href="<?php echo e(route('obenang.index')); ?>">Pengiriman</a></li>
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
<div class="page-heading">
  <div class="page-title">
    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Data Penerimaan Benang</h3>
        <p class="text-subtitle text-muted">data ini terus ter update jika ada perubahan secara live.</p>
      </div>
    </div>
  </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Cari berdasarkan kondisi</h4>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-lg-12 margin-tb">
              <div class="pull-right">
                  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('benang-create')): ?>
                  <button
                  type="button"
                  class="btn btn-outline-success"
                  data-bs-toggle="modal"
                  data-bs-target="#input">
                  Buat Penerimaan Benang
                </button>
                <br/>
                <br/>
                  <?php endif; ?>
              </div>
          </div>
      </div>
      <br/>
        <div class="container">
          <table class="table table-striped data-table">
              <thead>
          <tr>
              <th>No</th>
              <th>tanggal</th>
              <th>Nama Supplier</th>
              <th>BPB</th>
              <th>Surat Jalan</th>
              <th>Jenis Benang</th>
              <th>Tipe Benang</th>
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
            ajax: "<?php echo e(route('benang.index')); ?>",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'tanggal', name: 'tanggal'},
                {data: 'bsuppliers.nama_supplier', name: 'bsuppliers.nama_supplier'},
                {data: 'bpb.no_bpb', name: 'bpb.no_bpb'},
                {data: 'SJ', name: 'SJ'},
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
<?php $__env->startSection('modal'); ?>
<?php echo $__env->make('benang.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('benang.edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.mazer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\TriCoba\resources\views/benang/index.blade.php ENDPATH**/ ?>