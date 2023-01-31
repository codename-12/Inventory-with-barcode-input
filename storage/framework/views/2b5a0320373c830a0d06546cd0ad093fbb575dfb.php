<form action="<?php echo e(route('customerkain.destroy',$id)); ?>" method="POST">
    <a class="btn btn-info" href="<?php echo e(route('customerkain.show',$id)); ?>">Show</a>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('customerkain-edit')): ?>
    <a class="btn btn-primary" href="<?php echo e(route('customerkain.edit',$id)); ?>">Edit</a>
    <?php endif; ?>

    <?php echo csrf_field(); ?>
    <?php echo method_field('DELETE'); ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('customerkain-delete')): ?>
    <button type="submit" class="btn btn-danger">Delete</button>
    <?php endif; ?>
</form><?php /**PATH C:\laragon\www\TriCoba\resources\views/customerkain/actions.blade.php ENDPATH**/ ?>