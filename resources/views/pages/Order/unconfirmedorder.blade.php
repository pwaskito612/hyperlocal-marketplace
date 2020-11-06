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
								<a href="{{url('/unconfirmed-order')}}"><i class="fa fa-bolt"></i> Unconfirmed orders</a>
							</li>
							@endif
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
				<!-- Recently Favorited -->
				<div class="widget dashboard-container my-adslist">
					<h3>Unconfirmed order</h3>
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
									<span><strong>Total: </strong><time>Rp {{$m->price * $m->amount}}</time> </span>
                                    <span class="amount"><strong>Amount</strong>{{$m->amount}}</span>
									<span class="status"><strong>Phone</strong>{{$m->buyer_phone}}</span>
									<span class="address"><strong>Address</strong>{{$m->buyer_address}}</span>
								</td>  
								@if($m->confirmed == null)
                                <td class="product-category"><span class="categories">Unconfirmed</span></td>
                                @else 
                                <td class="product-category"><span class="categories">Confirmed</span></td>
                                @endif
								<td class="action" data-title="Action">
									<form action="{{url('/confirm-order')}}" method="post">
                                    @csrf 
                                    @method('put')
                                    <input type="number" name="id" value="{{$m->id}}" class="d-none">
                                    <button type="submit" class="btn btn-info">Confirm</button>
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