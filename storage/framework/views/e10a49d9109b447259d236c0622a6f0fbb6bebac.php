<?php $__env->startSection('content'); ?>
    
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <div class="card mb-4">
                <div class="card-header">
                    <h3><?php echo e($user->name); ?></h3>
                    <p><?php echo e($user->bio); ?></p>
                    <button class="btn btn-primary">Follow</button>
                </div>
            </div>


            
                <?php $__currentLoopData = $userStatuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="card">
                        <div class="card-header">
                            <p><?php echo e($status->body); ?></p>
                            <p><i class="fas fa-heart"></i> <?php echo e($status->likes); ?> &nbsp;&nbsp;<?php echo e($status->created_at->diffForHumans()); ?></p>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
        </div>
    </div>
</div>             
            
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>