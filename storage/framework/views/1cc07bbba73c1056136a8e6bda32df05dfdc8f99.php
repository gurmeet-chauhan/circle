<p>            
    <?php if(auth()->user()->likes->where('status_id', $status->id)->first()): ?>
        <i class="fas fa-heart text-danger"></i>    
    <?php else: ?>
        <a href="/like/<?php echo e($status->id); ?>">
            <i class="fas fa-heart"></i>
        </a>
    <?php endif; ?>
        <?php echo e($status->likes); ?> 
    <span class="float-right">
        <?php echo e($status->created_at->diffForHumans()); ?>

    </span>
</p>