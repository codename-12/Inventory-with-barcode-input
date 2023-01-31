<form action="<?php echo e(route('BPBbenang.destroy',$id)); ?>" method="POST">
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('BPBbenang-edit')): ?>
    <a href="<?php echo e(route('BPBbenang.edit',$id)); ?>" class="btn icon btn-primary">
        <i class="bi bi-pencil-square"></i></a>
    <?php endif; ?>

    <?php echo csrf_field(); ?>
    <?php echo method_field('DELETE'); ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('BPBbenang-delete')): ?>
    <button type="submit" class="btn icon btn-danger"><i class="bi bi-x-square"></i></button>
    <?php endif; ?>
</form><?php /**PATH C:\laragon\www\TriCoba\resources\views/BPBbenang/actions.blade.php ENDPATH**/ ?>