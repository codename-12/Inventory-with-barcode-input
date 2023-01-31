

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
            <h3>Data Supplier</h3>
            <p class="text-subtitle text-muted">data ini terus ter update jika ada perubahan secara live.</p>
          </div>
        </div>
      </div>
    
      <div class="card">
        <div class="card-header">
          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('supbenang-create')): ?>
      <a href="<?php echo e(route('supbenang.create')); ?>" class="btn btn-success rounded-pill"
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
            <th>Saldo</th>
            <th>Hutang</th>
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
              ajax: "<?php echo e(route('supbenang.index')); ?>",
              columns: [
                  {data: 'id', name: 'id'},
                  {data: 'nama_supplier', name: 'nama_supplier'},
                  {data: 'saldo', name: 'saldo'},
                  {data: 'hutang', name: 'hutang'},
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
<?php echo $__env->make('layouts.mazer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\TriCoba\resources\views\supbenang\index.blade.php ENDPATH**/ ?>