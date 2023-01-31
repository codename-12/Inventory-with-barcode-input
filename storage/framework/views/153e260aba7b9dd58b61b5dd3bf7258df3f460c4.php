

<?php $__env->startSection('option'); ?>
<li class="nav-item dropdown">
    <a
      class="nav-link dropdown-toggle"
      href="#"
      id="navbarDropdown"
      role="button"
      data-bs-toggle="dropdown"
      aria-expanded="false"
    >
      <span class="d-none d-md-block"
        >Pilihan Data Gudang <i class="fa fa-angle-down"></i
      ></span>
      <span class="d-block d-md-none"
        ><i class="fa fa-plus"></i
      ></span>
    </a>
    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
      <li><a class="dropdown-item" href="<?php echo e(route('benang.index')); ?>">Data Penerimaan Benang</a></li>
      <li><a class="dropdown-item" href="<?php echo e(route('obenang.index')); ?>">Data Pengiriman Benang</a></li>
      <li><hr class="dropdown-divider" /></li>
      <li>
        <a class="dropdown-item" href="<?php echo e(route('supbenang.create')); ?>">Tambah Tambah Supplier</a>
      </li>
    </ul>
  </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php if($message = Session::get('success')): ?>
        <div class="alert alert-success">
            <p><?php echo e($message); ?></p>
        </div>
    <?php endif; ?>
    
    <div class="container">
    <table class="table table-striped data-table">
        <thead>
        <tr>
            <th>No</th>
            <th>Nama Rajut</th>
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
              ajax: "<?php echo e(route('rajut.index')); ?>",
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.mazer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\TriCoba\resources\views\rajut\index.blade.php ENDPATH**/ ?>