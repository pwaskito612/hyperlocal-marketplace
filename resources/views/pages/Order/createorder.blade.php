@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @forelse ($errors->all() as $error)
                <li>{{ $error }}</li>
            @empty
			@endforelse
        </ul>
    </div>
@endif
<center>
    <div class="row">

		<div class="col-lg-6 col-md-6 d-none d-md-block" 
            style="margin-left : 23%;
            margin-top : 5%">
						
		<div class="widget personal-info">
            
			<h3 class="widget-header user">Order</h3>
			<h4 id="total">Rp {{$item->price * $quantity}}</h4>
			<br>
							
			<form action="{{url('/store-purchase')}}" method="post">
				@csrf
				<input type="number" class="d-none" value="{{$item->id}}" name="id">
				<input type="number" class="d-none" value="{{$quantity}}" name="amount">
					<div class="form-group">
						<label for="phone_number">Your phone number</label>
						<input type="text" name="phone_number" id="phone_number">
					</div>
					<div class="form-group">
						<label for="address">Your address</label>
						<textarea name="address" id="address" cols="30" rows="10"></textarea>
					</div>
					<div class="form-goup">
					<button type="submit" class="btn btn-info">
						Submit
					</button>
					<a class="btn btn-info" style="margin-top : -5px;"
					href="{{url('/merchandise-detail?id='. $item->id)}}"
					>Cancel</a>
					</div>
				</form>
            </div>
        </div>
    </div>
</center>