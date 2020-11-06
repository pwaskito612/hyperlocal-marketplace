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
					<h3>My Chart</h3>
					<br><br>
					@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
	<br>
@endif					
					<table class="table table-responsive product-dashboard-table">
						<tbody>
						
						@foreach($merchandises as $m)
							<tr>
								<td class="product-thumb">
									<img width="80px" height="auto" src="{{$m->image_url}}" alt="image description"></td>
								<td class="product-details">
									<h3 class="title">{{$m->title}}</h3>
									<span class="add-id"><strong>Weight:</strong> {{$m->weight}}</span>
									<span><strong>Stock: </strong><time>{{$m->stock}}</time> </span>
									<span class="status active"><strong>Price</strong>{{$m->price}}</span>
									<span class="location"><strong>Location</strong>{{$m->location}}</span>
								</td>
								<td class="product-category"><span class="categories">{{$m->categories}}</span></td>
								<td class="action" data-title="Action">
                                <form action="{{url('/merchandise-detail')}}" method="get">
											@csrf
											<input type="number" name="id" class="d-none" value="{{$m->id}}">
											<button type="submit" class="btn btn-info" 
											class="btn btn-info"
													>
														See detail
													</button>
											</form>  
								</td>
							</tr>
						@endforeach

						</tbody>
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