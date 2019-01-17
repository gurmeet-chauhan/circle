    <?php $__env->startSection('content'); ?>
    <div class="col-md-6 offset-md-3">
            <?php echo e($messages->links()); ?>

        <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <?php if(auth()->user()->id == $msg->sender_id): ?>
            <div class="card text-white bg-secondary mb-3 float-right" style="width:90%">            
                <div class="card-body">
                        <p class="text-right">
                            <?php echo e($msg->body); ?>

                            <br>
                            <small class="text-muted"><?php echo e($msg->created_at->diffForHumans()); ?></small>
                        </p>
                </div>
            </div>    
        <?php else: ?>
            <div class="card text-white bg-primary mb-3" style="width:90%">            
                <div class="card-body">
                        <p class="text-left">
                            <?php echo e($msg->body); ?>

                            <br>
                            <small class="text-muted"><?php echo e($msg->created_at->diffForHumans()); ?></small>
                        </p>
                </div>
            </div>
        <?php endif; ?>

                    

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    


        <form action="/message" method="post">
            <?php echo csrf_field(); ?>
            
            <?php
                $data = $messages->first()
            ?>

            <input type="hidden" name="chat_id" value="<?php echo e($data->chat_id); ?>" >
            <input type="hidden" name="reciever_id" 
                value="<?php echo e(auth()->user()->id == $data->sender_id ? $data->reciever_id : $data->sender_id); ?>">

            <div class="form-group">                

              <textarea class="form-control" name="body" id="message" rows="3" placeholder="write message here..."></textarea>
            </div>

            <input type="submit" class="btn btn-success btn-block text-center" value="send">
        </form>


    </div>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>