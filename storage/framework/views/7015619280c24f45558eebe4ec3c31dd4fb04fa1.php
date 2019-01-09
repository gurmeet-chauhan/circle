<?php $__env->startSection('content'); ?>
    
    <div class="container">
        <?php if($users->isEmpty()): ?>
            <h2>User does not exist.</h2>
        <?php else: ?>
            <h2 class="mb-4">Search result:</h2>
        <?php endif; ?>
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <p>
            <a href=""><?php echo e($user->name); ?></a>
            <button class="btn btn-primary ml-5">Follow</button>
            </p>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>