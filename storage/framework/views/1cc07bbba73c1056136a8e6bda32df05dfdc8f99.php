<p>            
    <?php if(auth()->user()->likes->where('status_id', $status->id)->first()): ?>
        <i class="fas fa-heart text-danger"></i>    
    <?php else: ?>
        <a href="/like/<?php echo e($status->id); ?>" class="like-button">
            <i class="fas fa-heart"></i>            
        </a>
    <?php endif; ?>    
    <span><?php echo e($status->likes()->count()); ?></span>
    <a href="/status/<?php echo e($status->id); ?>" class="ml-4">
        <i class="fas fa-comment"></i> <?php echo e($status->comments()->count()); ?>

        
    </a>
    <span class="float-right text-muted">
        posted <?php echo e($status->created_at->diffForHumans()); ?>

    </span>
</p>