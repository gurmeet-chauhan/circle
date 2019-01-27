

<?php $__env->startSection('content'); ?>
    <form action="/message" method="post">
        <?php echo csrf_field(); ?>            

        <input type="hidden" name="chat_id" value="<?php echo e($chat_id); ?>" >
        <input type="hidden" name="reciever_id" value="<?php echo e($reciever_id); ?>">

        <div class="form-group">                
            <label for="message">Write message</label>              
            <textarea class="form-control" name="body" id="message" rows="3"></textarea>
        </div>

        <input type="submit" class="btn bg-dark text-light btn-block" value="send">
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>