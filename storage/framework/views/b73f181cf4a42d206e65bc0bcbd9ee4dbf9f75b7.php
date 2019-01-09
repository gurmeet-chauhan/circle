<?php $__env->startSection('content'); ?>

<div class="container">
    <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <h5><?php echo e($status->body); ?></h5> <?php echo e($status->owner->name); ?>

    <p><i class="fas fa-heart"></i> <?php echo e($status->likes); ?> &nbsp;&nbsp;
        <?php echo e($status->created_at->diffForHumans()); ?>

    </p>
    <hr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>