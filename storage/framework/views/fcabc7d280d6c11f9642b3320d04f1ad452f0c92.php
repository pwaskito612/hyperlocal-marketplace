<section>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<nav class="navbar navbar-expand-lg navbar-light navigation">
					<a class="navbar-brand" href="<?php echo e(url('/')); ?>">
						<?php echo e(env('APP_NAME')); ?>

					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav ml-auto main-nav ">
							<li class="nav-item active">
								<a class="nav-link" href="<?php echo e(url('/')); ?>">Home</a>
							</li>
							<?php if(auth()->guard()->check()): ?> 
                            <li class="nav-item">
								<a class="nav-link" href="<?php echo e(url('/mymerchandise')); ?>">My Merchandise</a>
							</li>
                            <li class="nav-item">
								<a class="nav-link" href="<?php echo e(url('/myorder')); ?>">My Order</a>
							</li>	
							<li class="nav-item">
								<a class="nav-link" href="<?php echo e(url('/chart')); ?>">Chart</a>
							</li>						
                            <li class="nav-item">
								<a class="nav-link" href="<?php echo e(url('/profil')); ?>">Profil</a>
							</li>                         
						   <li class="nav-item">
								<a class="nav-link" href="<?php echo e(url('/logout')); ?>"><b>Logout</b></a>
							</li>
							<?php endif; ?>
							<?php if(auth()->guard()->guest()): ?> 
							<li class="nav-item">
								<a class="nav-link" href="<?php echo e(url('/login')); ?>"><b>Login</b></a>
							</li>
							<?php endif; ?>
						</ul>
					</div>
				</nav>
			</div>
		</div>
	</div>
</section>
<?php /**PATH /home/pandu/Projek/market-place/blog/resources/views/includes/navbar.blade.php ENDPATH**/ ?>