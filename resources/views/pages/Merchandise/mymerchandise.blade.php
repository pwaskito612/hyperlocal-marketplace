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
					<!-- Dashboard Links -->
					<div class="widget user-dashboard-menu">
						<ul>
							<li>
								<a href="{{url('/mymerchandise')}}"><i class="fa fa-user"></i> My merchandise</a></li>
							<li>
								<a href="{{url('/confirmed-order')}}"><i class="fa fa-file-archive-o"></i> Comfirmed order</a>
							</li>
							@if($total !=  0)
							<li >
								<a href="{{url('/unconfirmed-order')}}"><i class="fa fa-bolt"></i> Unconfirmed orders<span>{{$total}}</span></a>
							</li>
							@else
							<li >
								<a href="{{url('/unconfirmed-order')}}"><i class="fa fa-bolt"></i> Unconfirmed orders<span></span></a>
							</li>
							@endif
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
				<!-- Recently Favorited -->
				<div class="widget dashboard-container my-adslist">
					<h3 class="widget-header">My Merchandise</h3>
					<a href="{{url('/create-merchandise')}}" class="btn btn-primary"
					style="width:100%;">Insert new merchandise</a>
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
						<thead>
							<tr>
								<th>Image</th>
								<th>Product Title</th>
								<th class="text-center">Category</th>
								<th class="text-center">Action</th>
							</tr>
						</thead>
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
									<div class="">
										<ul class="list-inline justify-content-center">
											<li class="list-inline-item">
											<form action="{{url('/edit-merchandise')}}" method="get">
											@csrf
											<input type="hidden" name="id"  value="{{$m->id}}">
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
											<form action="{{url('/edit-merchandise-image')}}" method="get">
											@csrf
											<input type="number" name="id" class="d-none" value="{{$m->id}}">
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
												<form action="{{url('/delete-merchandise')}}" method="post">
												@csrf 
												@method('delete')
												<input type="number" value="{{$m->id}}" class="d-none "
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