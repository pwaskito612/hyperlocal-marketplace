<?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul>
            <?php $__empty_1 = true; $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
			<?php endif; ?>
        </ul>
    </div>
<?php endif; ?>
<center>
        <div class="row">

		  			<div class="col-lg-6 col-md-6 d-none d-md-block" 
                    style="margin-left : 23%;
                    margin-top : 5%">
						<div class="widget personal-info">
            <h3 class="widget-header user">Order</h3>
				<h4 id="total">Rp <?php echo e($item->price * $quantity); ?></h4>
				<br>
							<form action="<?php echo e(url('/store-purchase')); ?>" method="post">
							<?php echo csrf_field(); ?>
							<input type="number" class="d-none" value="<?php echo e($item->id); ?>" name="id">
							<input type="number" class="d-none" value="<?php echo e($quantity); ?>" name="amount">
								<div class="form-group">
									<label for="phone_number">Your phone number</label>
									<input type="text" name="phone_number" id="phone_number">
								</div>
								<div class="form-group">
									<label for="address">Your address</label>
									<textarea name="address" id="address" cols="30" rows="10"></textarea>
								</div>
								<div class="form-goup">
								<button type="submit" class="btn btn-info">
									Submit
								</button>
								<a class="btn btn-info" style="margin-top : -5px;"
								href="<?php echo e(url('/merchandise-detail?id='. $item->id)); ?>"
								>Cancel</a>
								</div>
							</form>
                            </div>
                            </div>
                            </div>
</center><?php /**PATH /home/pandu/Projek/market-place/blog/resources/views/pages/Checkout/checkout.blade.php ENDPATH**/ ?>