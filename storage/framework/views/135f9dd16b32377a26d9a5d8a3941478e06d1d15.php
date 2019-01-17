<?php $__env->startSection('content'); ?>

<div class="col-md-6 offset-md-3">
    <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="card mb-4">
        <div class="card-body">
            <h5><?php echo e($status->body); ?></h5> 
            
            <a href="/user/profile/<?php echo e($status->owner->id); ?>" class="card-link ">
                <?php echo e($status->owner->name); ?>

            </a>
            
            <?php echo $__env->make('partials.likes', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            
        </div>
      </div>
    
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php echo e($statuses->links()); ?>

</div>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>