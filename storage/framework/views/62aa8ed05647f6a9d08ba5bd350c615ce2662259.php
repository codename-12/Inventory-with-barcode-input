<form action="<?php echo e(route('invoicebenang.destroy',$id)); ?>" method="POST">
    <a class="btn btn-info" href="<?php echo e(route('invoicebenang.show',$id)); ?>">Show</a>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('invoicebenang-edit')): ?>
    <a class="btn btn-primary" href="<?php echo e(route('invoicebenang.edit',$id)); ?>">Edit</a>
    <?php endif; ?>

    <?php echo csrf_field(); ?>
    <?php echo method_field('DELETE'); ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('invoicebenang-delete')): ?>
    <button type="submit" class="btn btn-danger">Delete</button>
    <?php endif; ?>
</form><?php /**PATH C:\laragon\www\TriCoba\resources\views\GJstockpolos\action.blade.php ENDPATH**/ ?>