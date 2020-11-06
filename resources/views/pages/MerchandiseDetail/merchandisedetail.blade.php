<section class="blog section">
	<div class="container">
		<div class="row">
			<div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
				<!-- Article 01 -->
				<article>
	<!-- Post Image -->
	<div class="image">
		<img src="{{$image[0]->image_url}}" alt="article-01" id="main-picture">
	</div>
	<div class="small-image row">
		@foreach($image as $a)
		<img src="{{$a->image_url}}"  class="other-image col-lg-3 col-md-4 col-sm-6" 
		style="max-width : 100%; height : auto;" onclick="image(this)">		
		@endforeach
	</div>
	<!-- Post Title -->
	<h3>{{$data->title}}</h3>
	<!-- Post Description -->
	<p style="white-space : pre;"
		><span>{{$data->description}}</span>
	</p>

	@if($everBought != null)
	<!-- rate -->
	<div class="rate">
	<form action="{{url('/store-assessment')}}" method="post">
	@csrf
	<input type="number" class="d-none" value="{{$data->id}}" name="id">
	<label>Rate this merchandise 1 - 5</label><br>
		@for($i = 1; $i <= 5 ; $i++)
			@if($rate != null)
				@if($rate->rate == $i)
			<input type="radio" name="rate" id="rate-{{$i}}" value="{{$i}}" checked="checked">
			<label for="rate-{{$i}}">{{$i}}</label>
				@else
			<input type="radio" name="rate" id="rate-{{$i}}" value="{{$i}}">
			<label for="rate-{{$i}}">{{$i}}</label>
				@endif
			@else
			<input type="radio" name="rate" id="rate-{{$i}}" value="{{$i}}">
			<label for="rate-{{$i}}">{{$i}}</label>
			@endif
		@endfor
	<br>
	<br>
	@if($rate != null)
	<button class="btn btn-info" type="submit">Update an assessment</button>
	@else
	<button class="btn btn-info" type="submit">Submit an assessment</button>
	@endif
	</form>

	</div>
	@endif
</article>

	<!--comments-->

<article>
<form action="{{url('/post-comment')}}" method="post">
@csrf
<div class="form-group">
	<input type="number" class="d-none" name="merchandise_id" value="{{$data->id}}">
	<textarea name="comment" id="comment"  rows="5"
	placeholder="submit a comment"
	style="width: calc(100% - 45px);"></textarea>
	<button class="btn btn-info"type="submit">
		Post
	</button>
</div>
</form>
<br>
<div class="comment-posted">
@foreach($comments as $c)
<div class="row">
	<div class="col-2">
		<div class="image justify-content-center">
		<img src="{{$c->image_url}}" class="rounded-circle">
		</div>
	</div>
	<div class="col-10">
		<div class="column">
			<div class="comment-name">
				<h6>{{$c->name}}</h6>
			</div>
			<div class="comment-content">
				<p><span>{{$c->comment}}</span</p>
			</div>
		</div>
	</div>
</div>
<br>
@endforeach
<center>
{{$comments->links('includes.pagination')}}
</center>

</div>
</article>




</div>
<div class="col-md-10 offset-md-1 col-lg-4 offset-lg-0">
		<div class="sidebar">
        <div class="widget category">
						<!-- Widget Header -->
						<h5 class="widget-header">Merchandise Information</h5>
						<ul class="category-list">
							<li><p>Stock <span class="float-right">{{$data->stock}}</span></p></li>
							<li><p href="">Price <span class="float-right">Rp {{$data->price}}</span></p></li>
							<li><p href="">Weight<span class="float-right">{{$data->weight}} kg</span></p></li>
							<li><p href="">Location<span class="float-right">{{$data->location}}</span></p></li>
						</ul>
						<br>
                       @if(!Auth::check() || Auth::user()->id != $data->seller_id)
					   <form action="{{url('checkout')}}" method="get">
					   @csrf
					   <input type="number" class="d-none" name="id" value="{{$data->id}}">
					  <div class="form-group">
					  	<label for="quantity">Quantity</label>
					  	<input type="number" name="quantity" id="quantity" value="1">
					  </div>
					   <button class="btn btn-primary"
                        style="padding-top : 5px;
                        padding-bottom : 5px;
						width : 100%;
                        margin-top : 5;"
                        type="submit">
							Buy
						</button>
					   </form>
					   @if($chart == null)
					   <form action="{{url('/add-chart')}}" method="post">
					   @csrf
					   <input type="number" class="d-none" name="id" value="{{$data->id}}">
					   <button class="btn btn-success"
                        style="padding-top : 5px;
                        padding-bottom : 5px;
						width : 100%;
                        margin-top : 5px;"
                        type="submit">
							Add to chart
						</button>
					   </form>
					   @else 
					   <form action="{{url('/delete-chart')}}" method="post">
					   @csrf
					   @method('delete')
					   <input type="number" class="d-none" name="id" value="{{$data->id}}">
					   <button class="btn btn-danger"
                        style="padding-top : 5px;
                        padding-bottom : 5px;
						width : 100%;
                        margin-top : 5px;"
                        type="submit">
							Remove from chart
						</button>
					   </form>
					   @endif
					   @endif
					</div>
                                </div>
                                </div>
                                </section>

<script>
function image(img) {
        var src = img.src;
        document.getElementById("main-picture").src = src;
    }

</script>