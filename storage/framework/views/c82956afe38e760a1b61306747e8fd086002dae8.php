<?php $__env->startSection('content'); ?>            
    <div class="card mb-2">
        <div class="card-header">
            <div class="row">
                <div class="col-md-4 my-auto">
                    <?php if($user->profile_picture == null): ?>
                        <img src="/images/profile/nodp.png" alt="no profile picture found" class="img-thumbnail img-fluid rounded-circle">                           
                    <?php else: ?>
                        <img src="<?php echo e(\Storage::url($user->profile_picture)); ?>" alt="profile picture" class="img-thumbnail img-fluid">
                    <?php endif; ?>                    
                </div>
                <div class="col-md-8 text-center my-auto">
                    <h2><?php echo e($user->name); ?></h2>            
                    <h5><?php echo nl2br(e($user->bio)); ?></h5>
                </div>                
            </div>
            
            <hr>
            <a href="/chat/<?php echo e($user->id); ?>" class="btn btn-primary">Message</a>
        </div>
    </div>

    <div class="card mb-2">
        <div class="card-body">
            <h3>Recent posts :</h3>
        </div>
    </div>    
    
    <?php echo $__env->make('partials.statuses', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>