<form action="<?php echo e(route('GJpenerimaankain.destroy',$id)); ?>" method="POST">
    <a class="btn btn-info" href="<?php echo e(route('GJpenerimaankain.show',$id)); ?>">Show</a>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('GJstock-edit')): ?>
    <a class="btn icon btn-primary" href="<?php echo e(route('GJpenerimaankain.edit',$id)); ?>"><i class="bi bi-pencil-square"></i></a>
    <?php endif; ?>

    <?php echo csrf_field(); ?>
    <?php echo method_field('DELETE'); ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('GJstock-delete')): ?>
    <button type="submit" class="btn icon btn-danger"><i class="bi bi-x-square"></i></button>
    <?php endif; ?>
</form> <?php /**PATH C:\laragon\www\TriCoba\resources\views/GJpenerimaankain/actions.blade.php ENDPATH**/ ?>