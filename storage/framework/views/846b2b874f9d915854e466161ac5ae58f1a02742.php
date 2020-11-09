<section class="blog section">
	<div class="container">
		<div class="row">
			<div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
				<!-- Article 01 -->
				<article>
	<!-- Post Image -->
	<div class="image">
		<img src="<?php echo e($image[0]->image_url); ?>" alt="article-01" id="main-picture">
	</div>
	<div class="small-image row">
		<?php $__currentLoopData = $image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<img src="<?php echo e($a->image_url); ?>"  class="other-image col-lg-3 col-md-4 col-sm-6" 
		style="max-width : 100%; height : auto;" onclick="image(this)">		
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</div>
	<!-- Post Title -->
	<h3><?php echo e($data->title); ?></h3>
	<!-- Post Description -->
	<p style="white-space : pre;"
		><span><?php echo e($data->description); ?></span>
	</p>

	<?php if($everBought != null): ?>
	<!-- rate -->
	<div class="rate">
	<form action="<?php echo e(url('/store-assessment')); ?>" method="post">
	<?php echo csrf_field(); ?>
	<input type="number" class="d-none" value="<?php echo e($data->id); ?>" name="id">
	<label>Rate this merchandise 1 - 5</label><br>
		<?php for($i = 1; $i <= 5 ; $i++): ?>
			<?php if($rate != null): ?>
				<?php if($rate->rate == $i): ?>
			<input type="radio" name="rate" id="rate-<?php echo e($i); ?>" value="<?php echo e($i); ?>" checked="checked">
			<label for="rate-<?php echo e($i); ?>"><?php echo e($i); ?></label>
				<?php else: ?>
			<input type="radio" name="rate" id="rate-<?php echo e($i); ?>" value="<?php echo e($i); ?>">
			<label for="rate-<?php echo e($i); ?>"><?php echo e($i); ?></label>
				<?php endif; ?>
			<?php else: ?>
			<input type="radio" name="rate" id="rate-<?php echo e($i); ?>" value="<?php echo e($i); ?>">
			<label for="rate-<?php echo e($i); ?>"><?php echo e($i); ?></label>
			<?php endif; ?>
		<?php endfor; ?>
	<br>
	<br>
	<?php if($rate != null): ?>
	<button class="btn btn-info" type="submit">Update an assessment</button>
	<?php else: ?>
	<button class="btn btn-info" type="submit">Submit an assessment</button>
	<?php endif; ?>
	</form>

	</div>
	<?php endif; ?>
</article>

	<!--comments-->

<article>
<form action="<?php echo e(url('/post-comment')); ?>" method="post">
<?php echo csrf_field(); ?>
<div class="form-group">
	<input type="number" class="d-none" name="merchandise_id" value="<?php echo e($data->id); ?>">
	<textarea name="comment" id="comment"  rows="5"
	placeholder="submit a comment"
	style="width: calc(100% - 45px);"></textarea>
	<button class="btn btn-info"type="submit">
		Post
	</button>
</div>
</form>
<br>
<div class="comment-posted">
<?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="row">
	<div class="col-2">
		<div class="image justify-content-center">
		<img src="<?php echo e($c->image_url); ?>" class="rounded-circle">
		</div>
	</div>
	<div class="col-10">
		<div class="column">
			<div class="comment-name">
				<h6><?php echo e($c->name); ?></h6>
			</div>
			<div class="comment-content">
				<p><span><?php echo e($c->comment); ?></span</p>
			</div>
		</div>
	</div>
</div>
<br>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<center>
<?php echo e($comments->links('includes.pagination')); ?>

</center>

</div>
</article>




</div>
<div class="col-md-10 offset-md-1 col-lg-4 offset-lg-0">
		<div class="sidebar">
        <div class="widget category">
						<!-- Widget Header -->
						<h5 class="widget-header">Merchandise Information</h5>
						<ul class="category-list">
							<li><p>Stock <span class="float-right"><?php echo e($data->stock); ?></span></p></li>
							<li><p href="">Price <span class="float-right">Rp <?php echo e($data->price); ?></span></p></li>
							<li><p href="">Weight<span class="float-right"><?php echo e($data->weight); ?> kg</span></p></li>
							<li><p href="">Location<span class="float-right"><?php echo e($data->location); ?></span></p></li>
						</ul>
						<br>
                       <?php if(!Auth::check() || Auth::user()->id != $data->seller_id): ?>
					   <form action="<?php echo e(url('checkout')); ?>" method="get">
					   <?php echo csrf_field(); ?>
					   <input type="number" class="d-none" name="id" value="<?php echo e($data->id); ?>">
					  <div class="form-group">
					  	<label for="quantity">Quantity</label>
					  	<input type="number" name="quantity" id="quantity" value="1">
					  </div>
					   <button class="btn btn-primary"
                        style="padding-top : 5px;
                        padding-bottom : 5px;
						width : 100%;
                        margin-top : 5;"
                        type="submit">
							Buy
						</button>
					   </form>
					   <?php if($chart == null): ?>
					   <form action="<?php echo e(url('/add-chart')); ?>" method="post">
					   <?php echo csrf_field(); ?>
					   <input type="number" class="d-none" name="id" value="<?php echo e($data->id); ?>">
					   <button class="btn btn-success"
                        style="padding-top : 5px;
                        padding-bottom : 5px;
						width : 100%;
                        margin-top : 5px;"
                        type="submit">
							Add to chart
						</button>
					   </form>
					   <?php else: ?> 
					   <form action="<?php echo e(url('/delete-chart')); ?>" method="post">
					   <?php echo csrf_field(); ?>
					   <?php echo method_field('delete'); ?>
					   <input type="number" class="d-none" name="id" value="<?php echo e($data->id); ?>">
					   <button class="btn btn-danger"
                        style="padding-top : 5px;
                        padding-bottom : 5px;
						width : 100%;
                        margin-top : 5px;"
                        type="submit">
							Remove from chart
						</button>
					   </form>
					   <?php endif; ?>
					   <?php endif; ?>
					</div>
                                </div>
                                </div>
                                </section>

<script>
function image(img) {
        var src = img.src;
        document.getElementById("main-picture").src = src;
    }

</script><?php /**PATH /home/pandu/Projek/market-place/blog/resources/views/pages/MerchandiseDetail/merchandisedetail.blade.php ENDPATH**/ ?>