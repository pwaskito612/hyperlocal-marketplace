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
							<img src="{{Auth::user()->image_url}}" alt="" class="rounded-circle">
						</div>
						<!-- User Name -->
						<h5 class="text-center">{{Auth::user()->name}}</h5>
						<a href="{{url('/profil')}}" class="btn btn-main-sm">Edit Profile</a>
					</div>
				</div>
			</div>
			<div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
				<!-- Recently Favorited -->
				<div class="widget dashboard-container my-adslist">
					<h3>My Order</h3>
					<table class="table table-responsive product-dashboard-table">
						@foreach($merchandises as $m)
							<tr>
								<td class="product-thumb">
									<img width="80px" height="auto" src="{{$m->image_url}}" alt="image description"></td>
								<td class="product-details">
									<h3 class="title">{{$m->title}}</h3>
									<span class="add-id"><strong>Weight:</strong> {{$m->weight}}</span>
									<span><strong>Stock: </strong><time>{{$m->stock}}</time> </span>
									<span class="price"><strong>Price</strong>Rp{{$m->price}}</span>
									<span class="amount"><strong>Amount</strong>{{$m->amount}}</span>
									<span class="total"><strong>Total</strong>Rp{{$m->price * $m->amount}}</span>
									<span class="location"><strong>Location</strong>{{$m->location}}</span>
								</td>
								@if($m->confirmed != null)
								<td class="product-category"><span class="categories">Confirmed at {{$m->confirmed}}</span></td>
								@else 
								<td class="product-category"><span class="categories">Unconfirmed</span></td>
								@endif
								<td class="action" data-title="Action">
								</td>
							</tr>
							@endforeach
					</table>

				</div>

				<!-- pagination -->
				<center>
				{{$merchandises->links('includes.pagination')}}
				</center>
				<!-- pagination -->

			</div>
		</div>
		<!-- Row End -->
	</div>
	<!-- Container End -->
</section>