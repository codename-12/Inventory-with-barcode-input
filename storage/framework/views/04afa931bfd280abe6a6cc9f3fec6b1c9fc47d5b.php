

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
        <h3>Data Penerimaan Kain</h3>
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
                  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('GJstock-create')): ?>
                  <a class="btn btn-success" href="#"> Buat Penerimaan Benang baru</a>
                  <?php endif; ?>
              </div>
          </div>
      </div>
      <br/>
      <div class="container">
        <table class="table table-bordered data-table">
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
                  ajax: "<?php echo e(route('GJpenerimaankainpolos.index')); ?>",
                  columns: [
                      {data: 'id', name: 'id'},
                      {data: 'tanggal', name: 'tanggal'},
                      {data: 'customer.nama_customer', name: 'customer.nama_customer'},
                      {data: 'jenis_kain', name: 'jenis_kain'},
                      {data: 'warna', name: 'warna'},
                      {data: 'kop.KOP', name: 'kop.KOP'},
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.mazer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\TriCoba\resources\views\GJpenerimaankainpolos\index.blade.php ENDPATH**/ ?>