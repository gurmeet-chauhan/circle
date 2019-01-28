<?php $__env->startSection('content'); ?>
    <div class="card">

        <div class="card-header">
            <div class="row">
                <div class="col-md-4">
                    <img src="/images/profile/nodp.png" alt="no profile picture found" class="img-thumbnail img-fluid rounded-circle">
                </div>
                <div class="col-md-8 my-auto">
                    <h2><?php echo e(auth()->user()->name); ?></h2>
                    <h5><?php echo e(auth()->user()->bio); ?></h5>
                    <div class="form-group">
                      <label for="profile_picture">Profile picture</label>
                      <input type="file" class="form-control-file" name="profile_picture" id="profile_picture" placeholder="" aria-describedby="fileHelpId">
                    </div>
                </div>
            </div>            
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
                    <textarea class="form-control" name="body" id="body" rows="3" style="border: solid 1px"></textarea>
                </div>

                <input type="submit" value="Post" class="btn btn-primary btn-block">
            </form>

        </div>

    </div>            
    
    <div class="card my-2">
        <?php if(count($statuses)): ?>
            <h3 class="card-body mt-2">Your recent posts</h3>
        <?php else: ?>
            <h3 class="card-body mt-2">Update your status using above form</h3>
        <?php endif; ?>
    </div>

    <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="card">
        <div class="card-body">            
            <h4 class="card-title"><?php echo e($status->body); ?></h4>
            
            <?php echo $__env->make('partials.likes', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <form action="/status/<?php echo e($status->id); ?>" method="post">
                <?php echo method_field('DELETE'); ?>
                <?php echo csrf_field(); ?>
                <button type="submit" class="btn btn-danger float-right">
                    <i class="fas fa-trash"></i>
                </button>
            </form>

        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>