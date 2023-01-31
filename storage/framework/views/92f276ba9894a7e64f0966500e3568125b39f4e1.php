

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
    <div class="table-responsive">
    <table class="table table-bordered data-table">
        <thead>
        <tr>
            <th>No</th>
            <th>QR CODE</th>
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
              ajax: "<?php echo e(route('GJpenerimaankain.index')); ?>",
              columns: [
                  {data: 'id', name: 'id'},
                  {data: 'qr_code', name: 'qr_code'},
                  {data: 'tanggal', name: 'tanggal'},
                  {data: 'customer.nama_customer', name: 'customer.nama_customer'},
                  {data: 'jenis_kain', name: 'jenis_kain'},
                  {data: 'warna', name: 'warna'},
                  {data: 'kops.NO_KOP', name: 'kops.NO_KOP'},
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


 <?php echo $__env->make('GJpenerimaankain.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>     
 <?php echo $__env->make('GJpenerimaankain.edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.mazer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\TriCoba\resources\views/GJpenerimaankain/index.blade.php ENDPATH**/ ?>