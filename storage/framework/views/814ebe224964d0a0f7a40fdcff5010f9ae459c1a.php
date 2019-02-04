<?php $__env->startSection('content'); ?>

    <?php $__currentLoopData = $peoples; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(auth()->user()->id != $user->id): ?>
            <div class="row mb-4">
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
        <?php endif; ?>        
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php echo e($peoples->links()); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>