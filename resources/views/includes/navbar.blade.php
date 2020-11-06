<section>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<nav class="navbar navbar-expand-lg navbar-light navigation">
					<a class="navbar-brand" href="{{url('/')}}">
						{{env('APP_NAME')}}
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav ml-auto main-nav ">
							<li class="nav-item active">
								<a class="nav-link" href="{{url('/')}}">Home</a>
							</li>
							@auth 
                            <li class="nav-item">
								<a class="nav-link" href="{{url('/mymerchandise')}}">My Merchandise</a>
							</li>
                            <li class="nav-item">
								<a class="nav-link" href="{{url('/myorder')}}">My Order</a>
							</li>	
							<li class="nav-item">
								<a class="nav-link" href="{{url('/chart')}}">Chart</a>
							</li>						
                            <li class="nav-item">
								<a class="nav-link" href="{{url('/profil')}}">Profil</a>
							</li>                         
						   <li class="nav-item">
								<a class="nav-link" href="{{url('/logout')}}"><b>Logout</b></a>
							</li>
							@endauth
							@guest 
							<li class="nav-item">
								<a class="nav-link" href="{{url('/login')}}"><b>Login</b></a>
							</li>
							@endguest
						</ul>
					</div>
				</nav>
			</div>
		</div>
	</div>
</section>
