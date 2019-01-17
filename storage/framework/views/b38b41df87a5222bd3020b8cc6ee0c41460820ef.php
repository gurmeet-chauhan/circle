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


            
                <?php $__currentLoopData = $userStatuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="card">
                        <div class="card-header">
                            <p><?php echo e($status->body); ?></p>
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
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
        </div>
    </div>
</div>             
            
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>