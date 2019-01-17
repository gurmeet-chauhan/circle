<?php $__env->startSection('content'); ?>
    
    <div class="col-md-6 offset-md-3">
        <?php if($users->isEmpty()): ?>
            <h2>User does not exist.</h2>
        <?php else: ?>
            <h2 class="mb-4">Search result:</h2>
        <?php endif; ?>
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <div class="row">
            <div class="col-md-8">
                <a href="/user/profile/<?php echo e($user->id); ?>">
                    <?php echo e($user->name); ?>

                </a>
            </div>
            <div class="col-md-4">
                <a href="/chat/<?php echo e($user->id); ?>" class="btn btn-primary">
                    Message
                </a>
            </div>
        </div>                        


        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>