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
					<h3>My Order</h3>
					<table class="table table-responsive product-dashboard-table">
						<?php $__currentLoopData = $merchandises; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td class="product-thumb">
									<img width="80px" height="auto" src="<?php echo e($m->image_url); ?>" alt="image description"></td>
								<td class="product-details">
									<h3 class="title"><?php echo e($m->title); ?></h3>
									<span class="add-id"><strong>Weight:</strong> <?php echo e($m->weight); ?></span>
									<span><strong>Stock: </strong><time><?php echo e($m->stock); ?></time> </span>
									<span class="price"><strong>Price</strong>Rp<?php echo e($m->price); ?></span>
									<span class="amount"><strong>Amount</strong><?php echo e($m->amount); ?></span>
									<span class="total"><strong>Total</strong>Rp<?php echo e($m->price * $m->amount); ?></span>
									<span class="location"><strong>Location</strong><?php echo e($m->location); ?></span>
								</td>
								<?php if($m->confirmed != null): ?>
								<td class="product-category"><span class="categories">Confirmed at <?php echo e($m->confirmed); ?></span></td>
								<?php else: ?> 
								<td class="product-category"><span class="categories">Unconfirmed</span></td>
								<?php endif; ?>
								<td class="action" data-title="Action">
								</td>
							</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
</section><?php /**PATH /home/pandu/Projek/market-place/blog/resources/views/pages/Order/myorder.blade.php ENDPATH**/ ?>