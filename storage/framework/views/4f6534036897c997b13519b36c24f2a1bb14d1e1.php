<section class="user-profile section">
	<div class="container">
		<div class="row">
			<div class="col-md-10 offset-md-1 col-lg-3 offset-lg-0">
				<div class="sidebar">
					<!-- User Widget -->
					<div class="widget user">
						<!-- User Image -->
						<div class="image d-flex justify-content-center">
							<img src="<?php echo e(url(Auth::user()->image_url)); ?>" alt="" class="">
						</div>
						<!-- User Name -->
						<h5 class="text-center"><?php echo e(Auth::user()->name); ?></h5>
					</div>
				</div>
			</div>
			<div class="col-md-10 offset-md-1 col-lg-9 offset-lg-0">
				<!-- Edit Profile Welcome Text -->
				<div class="widget welcome-message">
					<h2>Edit profile</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
				</div>
<?php if($errors->any() || $wrongPassword == true || $passwordChanged == true): ?>
    <div class="alert alert-danger">
        <ul>
	<?php if($wrongPassword == true): ?>
			<li>You enter wrong password</li>
	<?php endif; ?>
		
	<?php if($passwordChanged == true): ?>
			<li>you have successfully changed your password</li>
	<?php endif; ?>
    
	<?php $__empty_1 = true; $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <li><?php echo e($error); ?></li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
	<?php endif; ?>
    
	    </ul>
    </div>
<?php endif; ?>
				<!-- Edit Personal Info -->
				<div class="row">
					<div class="col-lg-6 col-md-6">
						<div class="widget personal-info">
							<h3 class="widget-header user">Edit Personal Information</h3>
							<form action="<?php echo e(url('account/update/personalinformation')); ?>" method="POST" enctype="multipart/form-data">
							<?php echo csrf_field(); ?> 
							<?php echo method_field('put'); ?>
								<!-- Name -->
								<div class="form-group">
									<label for="name">Username</label>
									<input type="text" class="form-control" name="name" id="name" value="<?php echo e(Auth::user()->name); ?>">
								</div>
								<!-- File chooser -->
								<div class="form-group choose-file d-inline-flex">
									<i class="fa fa-user text-center px-3"></i>
									<input type="file" name="image" class="form-control-file mt-2 pt-1" id="image">
								 </div>
								<!-- Submit button -->
								<button class="btn btn-transparent" type="submit" >Save My Changes</button>
							</form>
						</div>
					</div>
					<div class="col-lg-6 col-md-6">
						<!-- Change Password -->
					<div class="widget change-password">
						<h3 class="widget-header user">Edit Password</h3>
						<form action="<?php echo e(url('/account/change-password')); ?>" method="POST">
						<?php echo csrf_field(); ?>
						<?php echo method_field('PUT'); ?>
							<!-- Current Password -->
							<div class="form-group">
								<label for="current-password">Current Password</label>
								<input type="password" class="form-control" name="current-password" id="current-password">
							</div>
							<!-- New Password -->
							<div class="form-group">
								<label for="new-password">New Password</label>
								<input type="password" class="form-control" name="new-password" id="new-password">
							</div>
							<!-- Confirm New Password -->
							<div class="form-group">
								<label for="confirm-password">Confirm New Password</label>
								<input type="password" class="form-control" name="confirm-password" id="confirm-password">
							</div>
							<!-- Submit Button -->
							<button class="btn btn-transparent">Change Password</button>
						</form>
					</div>
					</div>
					<div class="col-lg-6 col-md-6">
						<!-- Change Email Address -->
					<div class="widget change-email mb-0">
						<h3 class="widget-header user">Edit Email Address</h3>
						<form action="<?php echo e(url('/account/update/email')); ?>" method="POST">
						<?php echo csrf_field(); ?>
							<!-- Current Password -->
							<div class="form-group">
								<label for="email">Your email</label>
								<input type="email" class="form-control" name="email" id="email"
								value="<?php echo e(Auth::user()->email); ?>">
							</div>
							<!-- Submit Button -->
							<button class="btn btn-transparent" type="submit" >Change email</button>
						</form>
					</div>
					</div>
					<div class="col-lg-6 col-md-6">
						<!-- Change Email Address -->
					</div>
				</div>
			</div>
		</div>
	</div>
</section><?php /**PATH /home/pandu/Projek/market-place/blog/resources/views/pages/Account/userprofil.blade.php ENDPATH**/ ?>