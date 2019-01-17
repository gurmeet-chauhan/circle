<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3><?php echo e(auth()->user()->name); ?></h3>
                    <p><?php echo e(auth()->user()->bio); ?></p>
                </div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    <form action="/status" method="POST">
                        <?php echo csrf_field(); ?>

                        <div class="form-group">
                          <label for="body"><strong>Update status</strong></label>
                          <textarea class="form-control" name="body" id="body" rows="3"></textarea>
                        </div>

                        <input type="submit" value="Post" class="btn btn-primary btn-block">
                    </form>


                </div>
            </div>

            <hr>
            <h3 class="card-body mt-2">Your recent posts</h3>
            <hr>

            <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"><?php echo e($status->body); ?></h4>
                    
                    <?php echo $__env->make('partials.likes', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                    <form action="/status/<?php echo e($status->id); ?>" method="post">
                        <?php echo method_field('DELETE'); ?>
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>

                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>