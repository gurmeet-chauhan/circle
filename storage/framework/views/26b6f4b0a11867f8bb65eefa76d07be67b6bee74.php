<form action="/status/<?php echo e($status->id); ?>" method="post">
    <?php echo method_field('DELETE'); ?>
    <?php echo csrf_field(); ?>
    <button type="submit" class="btn btn-danger float-right">
        <i class="fas fa-trash"></i>
    </button>
</form>