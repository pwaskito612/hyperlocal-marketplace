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
					<!-- Dashboard Links -->
					<div class="widget user-dashboard-menu">
						<ul>
							<li>
								<a href="<?php echo e(url('/mymerchandise')); ?>"><i class="fa fa-user"></i> My merchandise</a></li>
							<li>
								<a href="<?php echo e(url('/confirmed-order')); ?>"><i class="fa fa-file-archive-o"></i> Comfirmed order</a>
							</li>
							<?php if($total !=  0): ?>
							<li >
								<a href="<?php echo e(url('/unconfirmed-order')); ?>"><i class="fa fa-bolt"></i> Unconfirmed orders<span><?php echo e($total); ?></span></a>
							</li>
							<?php else: ?>
							<li >
								<a href="<?php echo e(url('/unconfirmed-order')); ?>"><i class="fa fa-bolt"></i> Unconfirmed orders<span></span></a>
							</li>
							<?php endif; ?>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
				<!-- Recently Favorited -->
				<div class="widget dashboard-container my-adslist">
					<h3>Unconfirmed order</h3>
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
									<span><strong>Total: </strong><time>Rp <?php echo e($m->price * $m->amount); ?></time> </span>
                                    <span class="amount"><strong>Amount</strong><?php echo e($m->amount); ?></span>
									<span class="status"><strong>Phone</strong><?php echo e($m->buyer_phone); ?></span>
									<span class="address"><strong>Address</strong><?php echo e($m->buyer_address); ?></span>
								</td>
                                <td class="product-category"><span class="categories">Confirmed at <?php echo e($m->confirmed); ?></span></td>
								<td class="action" data-title="Action">
					
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
</section><?php /**PATH /home/pandu/Projek/market-place/blog/resources/views/pages/Order/confirmedorder.blade.php ENDPATH**/ ?>