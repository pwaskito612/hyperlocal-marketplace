<div class="container">
<br>

<?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>
	<h3 class="widget-header user">Insert new merchandise</h3>
	<form action="<?php echo e(url('/update-merchandise')); ?>" method="POST" enctype="multipart/form-data">
		<?php echo csrf_field(); ?> 
		<?php echo method_field('put'); ?>
		<!-- Name -->
		<input type="hidden"  name="id" value="<?php echo e($merchandise->id); ?>">
		<div class="form-group">
			<label for="title">Tittle</label>
			<input type="text" class="form-control" name="title" id="tittle" 
			value="<?php echo e($merchandise->title); ?>">
		</div>
           <div class="form-group">
			<label for="weight">Weight</label>
			<input type="number" class="form-control" name="weight" id="weight" 
			value="<?php echo e($merchandise->weight); ?>">
		</div>
           <div class="form-group">
			<label for="stock">Stock</label>
			<input type="number" class="form-control" name="stock" id="stock" 
			value="<?php echo e($merchandise->stock); ?>">
		</div>
           <div class="form-group">
			<label for="price">Price</label>
			<input type="number" class="form-control" name="price" id="price" 
			value="<?php echo e($merchandise->price); ?>">
		</div>
           <div class="form-group">
			<label for="location">Location</label>
			<input type="text" class="form-control" name="location" id="location" 
			value="<?php echo e($merchandise->location); ?>">
		</div>
           <div class="form-group">
			<label for="categories">Category</label>
			<input type="text" class="form-control" name="categories" id="categories" 
			value="<?php echo e($merchandise->categories); ?>">
		</div>
           <div class="form-group">
			<label for="descrition">Descrition</label><br>
			<textarea name="description" id="description" cols="100" rows="50">
				<?php echo e($merchandise->description); ?>

			</textarea>
		</div>
		
		<!-- Submit button -->
		<button class="btn btn-transparent" type="submit" >Save My Changes</button>
           <a href="<?php echo e(url('/mymerchandise')); ?>" class="btn btn-transparent">Cancel</a>
	</form>
</div><?php /**PATH /home/pandu/Projek/market-place/blog/resources/views/pages/Merchandise/editmerchandise.blade.php ENDPATH**/ ?>