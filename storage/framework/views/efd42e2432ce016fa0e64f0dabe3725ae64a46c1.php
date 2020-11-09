<!--==================================
=            User Profile            =
===================================-->
<section class="dashboard section">
	<!-- Container Start -->
	<div class="container">
		<!-- Row Start -->
		<div class="row">
			<div class="col-md-10 offset-md-1 col-lg-4 offset-lg-0">
				<div class="sidebar">
					<!-- User Widget -->
					<div class="widget user-dashboard-profile">
						<!-- User Image -->
						<div class="profile-thumb">
							<img src="<?php echo e(Auth::user()->image_url); ?>" alt="" class="rounded-circle">
						</div>
						<!-- User Name -->
						<h5 class="text-center"><?php echo e(Auth::user()->name); ?></h5>
						<a href="<?php echo e(url('/profil')); ?>" class="btn btn-main-sm">Edit Profile</a>
					</div>
				</div>
			</div>
			<div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
				<!-- Recently Favorited -->
				<div class="widget dashboard-container my-adslist">
					<h3>My Chart</h3>
					<br><br>
					<?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
	<br>
<?php endif; ?>					
					<table class="table table-responsive product-dashboard-table">
						<tbody>
						
						<?php $__currentLoopData = $merchandises; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td class="product-thumb">
									<img width="80px" height="auto" src="<?php echo e($m->image_url); ?>" alt="image description"></td>
								<td class="product-details">
									<h3 class="title"><?php echo e($m->title); ?></h3>
									<span class="add-id"><strong>Weight:</strong> <?php echo e($m->weight); ?></span>
									<span><strong>Stock: </strong><time><?php echo e($m->stock); ?></time> </span>
									<span class="status active"><strong>Price</strong><?php echo e($m->price); ?></span>
									<span class="location"><strong>Location</strong><?php echo e($m->location); ?></span>
								</td>
								<td class="product-category"><span class="categories"><?php echo e($m->categories); ?></span></td>
								<td class="action" data-title="Action">
                                <form action="<?php echo e(url('/merchandise-detail')); ?>" method="get">
											<?php echo csrf_field(); ?>
											<input type="number" name="id" class="d-none" value="<?php echo e($m->id); ?>">
											<button type="submit" class="btn btn-info" 
											class="btn btn-info"
													>
														See detail
													</button>
											</form>  
								</td>
							</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

						</tbody>
					</table>

				</div>

				<!-- pagination -->
				<center>
				<?php echo e($merchandises->links('includes.pagination')); ?>

				</center>
				<!-- pagination -->

			</div>
		</div>
		<!-- Row End -->
	</div>
	<!-- Container End -->
</section><?php /**PATH /home/pandu/Projek/market-place/blog/resources/views/pages/Chart/chart.blade.php ENDPATH**/ ?>