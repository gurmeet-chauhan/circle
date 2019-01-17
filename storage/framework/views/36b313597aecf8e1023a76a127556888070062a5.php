<?php $__env->startSection('content'); ?>
    
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <div class="card mb-4">
                <div class="card-header">
                    <h3><?php echo e($user->name); ?></h3>
                    <p><?php echo e($user->bio); ?></p>
                    <a href="/chat/<?php echo e($user->id); ?>" class="btn btn-primary">Message</a>
                </div>
            </div>
            
            <?php echo $__env->make('partials.statuses', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                
        </div>
    </div>
</div>             
            
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>