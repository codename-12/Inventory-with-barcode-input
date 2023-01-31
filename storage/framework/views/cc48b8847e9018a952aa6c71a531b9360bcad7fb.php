<form action="<?php echo e(route('obenang.destroy',$id)); ?>" method="POST">
    <a class="btn btn-info" href="<?php echo e(route('obenang.show',$id)); ?>">Show</a>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('obenang-edit')): ?>
    <a class="btn icon btn-primary" href="<?php echo e(route('obenang.edit',$id)); ?>"><i class="bi bi-pencil-square"></i></a>
    <?php endif; ?>

    <?php echo csrf_field(); ?>
    <?php echo method_field('DELETE'); ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('obenang-delete')): ?>
    <button type="submit" class="btn icon btn-danger"><i class="bi bi-x-square"></i></button>
    <?php endif; ?>
</form><?php /**PATH C:\laragon\www\TriCoba\resources\views\obenang\actions.blade.php ENDPATH**/ ?>