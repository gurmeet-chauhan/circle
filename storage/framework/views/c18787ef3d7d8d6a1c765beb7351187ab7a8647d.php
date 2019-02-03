

<?php $__env->startSection('content'); ?>
    <h1>Inbox</h1>

    <?php if($chats->isEmpty()): ?>
        <p>No chats found.</p>
    <?php endif; ?>

    <?php $__currentLoopData = $chats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
        <?php
            $chatRecipient = auth()->user()::find($chat->recipient_id);
            $chatInitiator = auth()->user()::find($chat->initiator_id);
        ?>
        
        <div class="card mb-4 <?php echo e($chat->messages->last()->read != true ? "bg-dark" : ""); ?>">
            <div class="card-body"> 
                <?php if($chatInitiator == auth()->user()): ?>
                    <a href="/messages/<?php echo e($chat->id); ?>"><?php echo e($chatRecipient->name); ?></a>    
                <?php else: ?>
                    <a href="/messages/<?php echo e($chat->id); ?>"><?php echo e($chatInitiator->name); ?></a>
                <?php endif; ?>
                <p><?php echo e($chat->messages->last()->created_at->diffForHumans()); ?></p>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php echo e($chats->links()); ?>

    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>