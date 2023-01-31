

<?php $__env->startSection('content'); ?>
<div class="page-heading">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
          <h3>HOME </h3>
          <p class="text-subtitle text-muted">
            Grafik Data TRIDAYAMAS SINAR PUSAKA
          </p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
          <nav
            aria-label="breadcrumb"
            class="breadcrumb-header float-start float-lg-end"
          >
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="<?php echo e(route('home')); ?>">Dashboard</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                Apexcharts
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>

    <section class="section">
      <div class="row">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h4>Produksi</h4>
            </div>
            <div class="card-body">
              <div class="chart-container">
            </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card">  
            <div class="card-header">
              <h4>Penjualan</h4>
            </div>
            <div class="card-body">
              <div id="bar"></div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('assets/extensions/dayjs/dayjs.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/extensions/apexcharts/apexcharts.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/pages/ui-apexchart.js')); ?>"></script>
<script src="assets/js/pages/dashboard.js"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.mazer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\TriCoba\resources\views/home.blade.php ENDPATH**/ ?>