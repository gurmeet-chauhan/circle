<?php $__env->startSection('content'); ?>
    <div class="col-md-6 offset-md-3">
        <h1>Inbox</h1>

        <?php $__currentLoopData = $chats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
            <?php
                $chatRecipient = auth()->user()::find($chat->recipient_id);
                $chatInitiator = auth()->user()::find($chat->initiator_id);
            ?>

            <div class="card mb-4">
                <div class="card-body">
                    <?php if($chatInitiator == auth()->user()): ?>
                        <a href="/messages/<?php echo e($chat->id); ?>"><?php echo e($chatRecipient->name); ?></a>    
                    <?php else: ?>
                        <a href="/messages/<?php echo e($chat->id); ?>"><?php echo e($chatInitiator->name); ?></a>
                    <?php endif; ?>
                    <p><?php echo e($chat->created_at->diffForHumans()); ?></p>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php echo e($chats->links()); ?>

        
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>