<!-- Advance Search -->
<br>
<div class="advance-search">
						<div class="container">
							<div class="row justify-content-center">
								<div class="col-lg-12 col-md-12 align-content-center">
								<center>
								<form action="{{url('/search-result')}}" method="get">
										@csrf
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
					@forelse($merchandise as $m)
					<div class="col-lg-6">
					<table class="table table-responsive product-dashboard-table"
					>	
							<tr>
								<td class="product-thumb">
									<img width="80px" height="auto" src="{{$m->image_url}}" alt="image description"></td>
								<td class="product-details">
									<h3 class="title">{{$m->title}}</h3>
									<span class="add-id"><strong>Stock</strong> 10</span>
									@if($m->rate != null)
									<span><strong>Rate: </strong><time> {{$m->rate/1.000}} / 5 ({{$m->total}})</time> </span>
									@else 
									<span><strong>Rate: </strong><time> 0 / 5 ({{$m->total}})</time> </span>
									@endif
									<span class="status active"><strong>Price</strong>Rp {{$m->price}}</span>
									<span class="location"><strong>Location</strong>{{$m->location}}</span>
								</td>								
								<td class="product-category"><span class="categories">{{$m->categories}}</span></td>
								<td class="action" data-title="Action">
									<div class="">
										<ul class="list-inline justify-content-center">
											<li class="list-inline-item">
												<form action="{{url('/merchandise-detail')}}" method="get">
												<input type="number" class="d-none" name="id" value="{{$m->id}}">
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
					@empty
					<h3 class="text-center">Oops, the results you're looking for don't exist</h3>
					@endforelse
					</div>
					<center>
					{{$merchandise->links('includes.pagination')}}
					</center>

				</div>
                
            </div>