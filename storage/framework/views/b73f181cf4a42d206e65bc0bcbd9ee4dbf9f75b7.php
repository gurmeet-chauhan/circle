<?php $__env->startSection('content'); ?>

<div class="container">
    <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <h5><?php echo e($status->body); ?></h5> <?php echo e($status->owner->name); ?>

    <p>
            
            <?php if(auth()->user()->likes->where('status_id', $status->id)->first()): ?>
                <i class="fas fa-heart text-danger"></i>    
            <?php else: ?>
                <a href="/like/<?php echo e($status->id); ?>">
                    <i class="fas fa-heart"></i>
                </a>
            <?php endif; ?>
         <?php echo e($status->likes); ?> 
        &nbsp;&nbsp;
        <?php echo e($status->created_at->diffForHumans()); ?>

    </p>
    <hr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>