<?php if($paginator->hasPages()): ?>
    <ul class="pagination" role="navigation">
        
        <?php if($paginator->onFirstPage()): ?>
            <li class="page-item disabled" aria-disabled="true">
                <span class="page-link">newer</span>
            </li>
        <?php else: ?>
            <li class="page-item">
                <a class="page-link" href="<?php echo e($paginator->previousPageUrl()); ?>" rel="prev">newer</a>
            </li>
        <?php endif; ?>

        
        <?php if($paginator->hasMorePages()): ?>
            <li class="page-item">
                <a class="page-link" href="<?php echo e($paginator->nextPageUrl()); ?>" rel="next">older</a>
            </li>
        <?php else: ?>
            <li class="page-item disabled" aria-disabled="true">
                <span class="page-link">older</span>
            </li>
        <?php endif; ?>
    </ul>
<?php endif; ?>
