


<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="<?php echo e(route('obenang.index')); ?>"> Back</a>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>ID Rajut:</strong>
                <?php echo e($obenang->id_rajut); ?>

            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tanggal:</strong>
                <?php echo e($obenang->tanggal); ?>

            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Supplier:</strong>
                <?php echo e($obenang->nama_supplier); ?>

            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Surat Jalan:</strong>
                <?php echo e($obenang->SJ); ?>

            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Jenis Benang:</strong>
                <?php echo e($obenang->jenis_benang); ?>

            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>LOT:</strong>
                <?php echo e($obenang->LOT); ?>

            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>BOX / KRG:</strong>
                <?php echo e($obenang->BOX_KRG); ?>

            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>KG:</strong>
                <?php echo e($obenang->KG); ?>

            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>BALE:</strong>
                <?php echo e($obenang->BALE); ?>

            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>keterangan:</strong>
                <?php echo e($obenang->keterangan); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<p class="text-center text-primary"><small>@Copyright Ryan Hidayat 2022</small></p>
<?php echo $__env->make('layouts.mazer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\TriCoba\resources\views\obenang\show.blade.php ENDPATH**/ ?>