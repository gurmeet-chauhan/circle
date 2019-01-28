<?php if(count($errors)): ?>
    <div class="container alert alert-danger">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <p><?php echo e($error); ?></p>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php endif; ?>

<?php if(session('statusCreated')): ?>
    <div class="container alert alert-success">
        <p><?php echo e(session('statusCreated')); ?></p>
    </div>
<?php endif; ?>

<?php if(session('statusDeleted')): ?>
    <div class="container alert alert-info">
        <p><?php echo e(session('statusDeleted')); ?></p>
    </div>
<?php endif; ?>