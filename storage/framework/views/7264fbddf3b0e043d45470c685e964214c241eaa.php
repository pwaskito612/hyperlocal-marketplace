<section>
<?php if($paginator->hasPages()): ?>
<div class="pagination justify-content-center">
					<nav aria-label="Page navigation example">
						<ul class="pagination">


    <?php if($paginator->onFirstPage()): ?>
                 <li class="page-item">
                 <a class="page-link"  aria-label="Previous" >
									<span aria-hidden="true">&laquo;</span>
									<span class="sr-only">Previous</span>
								</a>
                 </li>
    <?php else: ?>
                        <li class="page-item">
                        <a href="<?php echo e($paginator->previousPageUrl()); ?>" class="page-link">
                            <span aria-hidden="true">&laquo;</span>
							<span class="sr-only">Previous</span>	
                        </a>
                        </li>
    <?php endif; ?>


    <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(is_string($element)): ?>
                        <li class="page-item">
                            <a href="#" class="page-link">
                                <span><?php echo e($element); ?></span>
                            </a>
                        </li>
        <?php endif; ?>


        <?php if(is_array($element)): ?>

            <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($page == $paginator->currentPage()): ?>
                        <li class="page-item active"><a class="page-link" ><?php echo e($page); ?></a></li>
                <?php else: ?>
                        <li class="page-item"><a class="page-link" href="<?php echo e($url); ?>"><?php echo e($page); ?></a></li>
				<?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php if($paginator->hasMorePages()): ?>
							<li class="page-item">
								<a class="page-link" href="<?php echo e($paginator->nextPageUrl()); ?>" aria-label="Next">
									<span aria-hidden="true">&raquo;</span>
									<span class="sr-only">Next</span>
								</a>
							</li>
    <?php else: ?>
                        <li class="page-item">
								<a class="page-link"  aria-label="Next" >
									<span aria-hidden="true">&raquo;</span>
									<span class="sr-only">Next</span>
								</a>
							</li>
    <?php endif; ?>

						</ul>
					</nav>
				</div>
<?php endif; ?>

</section><?php /**PATH /home/pandu/Projek/market-place/blog/resources/views/includes/pagination.blade.php ENDPATH**/ ?>