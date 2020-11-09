<section>
	<center>

	<?php if($errors->any()): ?>
    	<div class="alert alert-danger">
        	<ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        	</ul>
    	</div>
	<?php endif; ?>

	<br>
	<a href="<?php echo e(url('/mymerchandise')); ?>" class="btn btn-transparent">Back</a><br><br>

	<form action="<?php echo e(url('/insert-new-image')); ?>" method="post"  enctype="multipart/form-data">
		<?php echo csrf_field(); ?> 
		<div class="form-group choose-file d-inline-flex">
			<label for="image">Insert New Image</label>
			<input type="number" name="id" class="d-none" value="<?php echo e($id); ?>"> 
			<input type="file" name="image" class="form-control-file mt-2 pt-1" id="image">
			<input type="submit" value="submit" class="btn btn-info">
		</div>
	</form>

	<table class="table table-responsive product-dashboard-table">
		<thead>
			<tr>
				<th>Image</th>
					<th class="text-center">Action</th>
				</tr>
		</thead>
                        
		<?php $__currentLoopData = $image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td>
                <img src="<?php echo e($i->image_url); ?>" alt="" style="max-width : 300px; height: auto;">
            </td>
            <td>
                <?php if(sizeof($image) > 1): ?>
				<form action="<?php echo e(url('/delete-image-merchandise')); ?>" method="post">
					<?php echo csrf_field(); ?> 
					<?php echo method_field('delete'); ?>
					<input type="number" value="<?php echo e($i->id); ?>" class="d-none "name="id">
					<button class="btn btn-danger"
					style="padding-top : 12px;
						padding-left : 16px;
						padding-bottom : 12px;
						padding-right : 16px;">
                    	<i class="fa fa-trash"></i>
                    </button>
                </form>
				<?php endif; ?>
            </td> 
        <tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
</center>
</section><?php /**PATH /home/pandu/Projek/market-place/blog/resources/views/pages/Merchandise/editimage.blade.php ENDPATH**/ ?>