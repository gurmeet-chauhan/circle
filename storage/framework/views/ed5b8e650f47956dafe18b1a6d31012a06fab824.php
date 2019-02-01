<?php $__env->startSection('content'); ?>
    <div class="card">
        
        <div class="card-body">

            <h4 class="card-title"><?php echo e($status->body); ?></h4>

            <?php if($status->image): ?>
                <img src="<?php echo e(\Storage::url($status->image)); ?>" alt="status image" class="img-fluid my-1">
            <?php endif; ?>
            <p>
                <a href="/user/profile/<?php echo e($status->owner->id); ?>" class="card-link ">
                    <?php echo e($status->owner->name); ?>

                </a>
            </p>
            
            <?php echo $__env->make('partials.likes', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            
            <form action="/comment/<?php echo e($status->id); ?>" method="post">
                <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <input type="text" name="body" id="body" class="form-control" placeholder="write here..." required>
                    </div>
                    <input type="submit" value="comment" class="btn btn-success mb-4">
            </form>            

            <div class="card-text">
                <?php if(count($comments)): ?>
                    <h4>comments: </h4>    
                <?php else: ?>
                    <h4>No comments found </h4>
                <?php endif; ?>
                    
                <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <p>
                        <hr>
                        <a href="/user/profile/<?php echo e($comment->user->id); ?>">
                            <?php echo e($comment->user->name); ?>

                        </a> : <?php echo e($comment->body); ?>

                        <span class="text-muted float-right">
                            <?php echo e($comment->created_at->diffForHumans()); ?>

                        </span>
                    </p>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>