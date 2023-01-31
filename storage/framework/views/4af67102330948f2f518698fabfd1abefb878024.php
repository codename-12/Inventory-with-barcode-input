


<?php $__env->startSection('content'); ?>
<!--alert-->
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
<!--end alert-->

<div class="page-heading">
  <div class="page-title">
    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Data Gudang Jadi</h3>
        <p class="text-subtitle text-muted">data ini terus ter update jika ada perubahan secara live.</p>
      </div>
    </div>
  </div>
    <div class="card">
      <div class="card-header">
        <h5 class="card-title">DATA STOCK</h5>
      </div>
      <div class="card-body">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item" role="presentation">
            <a
              class="nav-link active"
              id="polos-tab"
              data-bs-toggle="tab"
              href="#polos"
              role="tab"
              aria-controls="polos"
              aria-selected="true"
              >POLOS</a
            >
          </li>
          <li class="nav-item" role="presentation">
            <a
              class="nav-link"
              id="bspolos-tab"
              data-bs-toggle="tab"
              href="#bspolos"
              role="tab"
              aria-controls="bspolos"
              aria-selected="false"
              >BS POLOS</a
            >
          </li>
          <li class="nav-item" role="presentation">
            <a
              class="nav-link"
              id="printing-tab"
              data-bs-toggle="tab"
              href="#printing"
              role="tab"
              aria-controls="printing"
              aria-selected="false"
              >PRINTING</a
            >
          </li>
          <li class="nav-item" role="presentation">
            <a
              class="nav-link"
              id="bsprinting-tab"
              data-bs-toggle="tab"
              href="#bsprinting"
              role="tab"
              aria-controls="bsprinting"
              aria-selected="false"
              >BS PRINTING</a
            >
          </li>
        </ul>
        <div class="tab-content" id="myTabContent">
          <div
            class="tab-pane fade show active"
            id="polos"
            role="tabpanel"
            aria-labelledby="polos-tab"
          >
          <?php echo $__env->make('GJstock.polos', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          </div>
          <div
            class="tab-pane fade"
            id="bspolos"
            role="tabpanel"
            aria-labelledby="bspolos-tab"
          >
          <?php echo $__env->make('GJstock.bspolos', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          </div>
          <div
            class="tab-pane fade"
            id="contact"
            role="tabpanel"
            aria-labelledby="contact-tab"
          >
            
          </div>
        </div>
      </div>
    </div>
    <?php echo $__env->make('GJstock.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.mazer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\TriCoba\resources\views/GJstock/index.blade.php ENDPATH**/ ?>