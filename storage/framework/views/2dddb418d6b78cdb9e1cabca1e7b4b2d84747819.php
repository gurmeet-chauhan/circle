    <?php $__env->startSection('content'); ?>

        <?php $__currentLoopData = $messages->reverse(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <?php if(auth()->user()->id == $msg->sender_id): ?>
            <div class="card bg-info mb-3 float-right" style="width:90%">            
                <div class="card-body">
                        <h5 class="text-right text-white">
                            <?php echo e($msg->body); ?>

                            <br>
                            <small><?php echo e($msg->created_at->diffForHumans()); ?></small>
                        </h5>
                </div>
            </div>    
        <?php else: ?>
            <div class="card bg-warning mb-3" style="width:90%">            
                <div class="card-body">
                        <h5 class="text-left text-white">
                            <?php echo e($msg->body); ?>

                            <br>
                            <small><?php echo e($msg->created_at->diffForHumans()); ?></small>
                        </h5>
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
                <label for="text">Write message</label>
                <textarea class="form-control" name="body" id="message" rows="3" style="border: 1px solid"></textarea>
            </div>

            <input type="submit" class="btn btn-success btn-block text-center" value="send">
        </form>

        <p><?php echo e($messages->links()); ?></p>

    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>