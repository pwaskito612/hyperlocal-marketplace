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
					<h3 class="widget-header">My Merchandise</h3>
					<a href="<?php echo e(url('/create-merchandise')); ?>" class="btn btn-primary"
					style="width:100%;">Insert new merchandise</a>
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
						<thead>
							<tr>
								<th>Image</th>
								<th>Product Title</th>
								<th class="text-center">Category</th>
								<th class="text-center">Action</th>
							</tr>
						</thead>
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
									<div class="">
										<ul class="list-inline justify-content-center">
											<li class="list-inline-item">
											<form action="<?php echo e(url('/edit-merchandise')); ?>" method="get">
											<?php echo csrf_field(); ?>
											<input type="hidden" name="id"  value="<?php echo e($m->id); ?>">
											<button type="submit" 
											class="btn btn-info"
													style="padding-top : 3px;
													padding-left : 17px;
													padding-bottom : 4px;
													padding-right : 17px;
													">
														<i class="fa fa-pencil"></i>
													</button>
											</form>                               				 
											</li>
											<li>
											<form action="<?php echo e(url('/edit-merchandise-image')); ?>" method="get">
											<?php echo csrf_field(); ?>
											<input type="number" name="id" class="d-none" value="<?php echo e($m->id); ?>">
											<button type="submit" class="btn btn-success" 
											class="btn btn-info"
													style="padding-top : 3px;
													padding-left : 16px;
													padding-bottom : 4px;
													padding-right : 16px;
													">
														<i class="fa fa-envira"></i>
													</button>
											</form>  
											</li>
											<li class="list-inline-item">
												<form action="<?php echo e(url('/delete-merchandise')); ?>" method="post">
												<?php echo csrf_field(); ?> 
												<?php echo method_field('delete'); ?>
												<input type="number" value="<?php echo e($m->id); ?>" class="d-none "
												name="id">
												<button class="btn btn-danger"
												style="padding-top : 4px;
													padding-left : 17px;
													padding-bottom : 5px;
													padding-right : 17px;
													">
                                        			<i class="fa fa-trash"></i>
                                    			</button>
												</form>
											</li>
										</ul>
									</div>
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
</section><?php /**PATH /home/pandu/Projek/market-place/blog/resources/views/pages/Merchandise/mymerchandise.blade.php ENDPATH**/ ?>