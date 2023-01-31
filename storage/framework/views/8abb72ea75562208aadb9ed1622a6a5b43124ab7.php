<form action="<?php echo e(route('GJstockpolos.destroy',$id)); ?>" method="POST">
    <a class="btn btn-info" href="<?php echo e(route('GJstockpolos.show',$id)); ?>">Show</a>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('GJstock-edit')): ?>
    <a class="btn btn-primary" href="<?php echo e(route('GJstockpolos.edit',$id)); ?>">Edit</a>
    <?php endif; ?>

    <?php echo csrf_field(); ?>
    <?php echo method_field('DELETE'); ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('GJstock-delete')): ?>
    <button type="submit" class="btn btn-danger">Delete</button>
    <?php endif; ?>
</form><?php /**PATH C:\laragon\www\TriCoba\resources\views/GJstockpolos/action.blade.php ENDPATH**/ ?>