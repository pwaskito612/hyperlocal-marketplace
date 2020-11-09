<!-- Advance Search -->
<br>
<div class="advance-search">
						<div class="container">
							<div class="row justify-content-center">
								<div class="col-lg-12 col-md-12 align-content-center">
								<center>
								<form action="<?php echo e(url('/search-result')); ?>" method="get">
										<?php echo csrf_field(); ?>
											<div class="form-row">
												<div class="form-group col-md-4">
													<input type="text" class="form-control my-2 my-lg-1" name="search" id="inputtext4" placeholder="What are you looking for?">
												</div>
												<div class="form-group col-md-3">
													<select class="w-100 form-control mt-lg-1 mt-md-2" name="sort">
														<option value="DefaultSearch">Sort</option>
														<option value="OrderByRate">Top rated</option>
														<option value="OrderByLowestPrice">Lowest Price</option>
														<option value="OrderByHighestPrice">Highest Price</option>
													</select>
												</div>
												<div class="form-group col-md-3">
													<input type="text" class="form-control my-2 my-lg-1" name="location" id="inputLocation4" placeholder="Location">
												</div>
												<div class="form-group col-md-2 align-self-center">
													<button type="submit" class="btn btn-primary">Search Now</button>
												</div>
											</div>
										</form>
										</center>
									</div>
								</div>
							
					</div>
				</div>

           <div class="container">
		   		<div class="widget dashboard-container my-adslist">
					<h3 class="widget-header text-center">Search result</h3>
					<div class="row">
					<?php $__empty_1 = true; $__currentLoopData = $merchandise; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
					<div class="col-lg-6">
					<table class="table table-responsive product-dashboard-table"
					>	
							<tr>
								<td class="product-thumb">
									<img width="80px" height="auto" src="<?php echo e($m->image_url); ?>" alt="image description"></td>
								<td class="product-details">
									<h3 class="title"><?php echo e($m->title); ?></h3>
									<span class="add-id"><strong>Stock</strong> 10</span>
									<?php if($m->rate != null): ?>
									<span><strong>Rate: </strong><time> <?php echo e($m->rate/1.000); ?> / 5 (<?php echo e($m->total); ?>)</time> </span>
									<?php else: ?> 
									<span><strong>Rate: </strong><time> 0 / 5 (<?php echo e($m->total); ?>)</time> </span>
									<?php endif; ?>
									<span class="status active"><strong>Price</strong>Rp <?php echo e($m->price); ?></span>
									<span class="location"><strong>Location</strong><?php echo e($m->location); ?></span>
								</td>								
								<td class="product-category"><span class="categories"><?php echo e($m->categories); ?></span></td>
								<td class="action" data-title="Action">
									<div class="">
										<ul class="list-inline justify-content-center">
											<li class="list-inline-item">
												<form action="<?php echo e(url('/merchandise-detail')); ?>" method="get">
												<input type="number" class="d-none" name="id" value="<?php echo e($m->id); ?>">
												<button class="btn btn-info" type="submit">
													See detail
												</button>
												</form>
											</li>
										</ul>
									</div>
								</td>
							</tr>
					</table>
					</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
					<h3 class="text-center">Oops, the results you're looking for don't exist</h3>
					<?php endif; ?>
					</div>
					<center>
					<?php echo e($merchandise->links('includes.pagination')); ?>

					</center>

				</div>
                
            </div><?php /**PATH /home/pandu/Projek/market-place/blog/resources/views/pages/SearchResult/searchresult.blade.php ENDPATH**/ ?>