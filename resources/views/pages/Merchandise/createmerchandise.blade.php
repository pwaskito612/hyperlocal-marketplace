<div class="container">
<br> 

@if ($errors->any() )
    <div class="alert alert-danger">
   		<ul>
    
		@foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
  
	@endforeach
    
	    </ul>
    </div>
@endif

	<h3 class="widget-header user">Insert new merchandise</h3>
	<form action="{{url('/store-merchandise')}}" method="POST" enctype="multipart/form-data">
	@csrf 
		<!-- Name -->
		<div class="form-group">
			<label for="title">Tittle</label>
			<input type="text" class="form-control" name="title" id="tittle" value="">
		</div>
        <div class="form-group">
			<label for="weight">Weight</label>
			<input type="number" class="form-control" name="weight" id="weight" value="">
		</div>
        <div class="form-group">
			<label for="stock">Stock</label>
			<input type="number" class="form-control" name="stock" id="stock" value="">
		</div>
        <div class="form-group">
			<label for="price">Price</label>
			<input type="number" class="form-control" name="price" id="price" value="">
		</div>
        <div class="form-group">
			<label for="location">Location</label>
			<input type="text" class="form-control" name="location" id="location" value="">
		</div>
        <div class="form-group">
			<label for="categories">Category</label>
			<input type="text" class="form-control" name="categories" id="categories" value="">
		</div>
        <div class="form-group">
			<label for="descrition">Descrition</label><br>
			<textarea name="description" id="description" cols="100" rows="50"></textarea>
		</div>
		<!-- File chooser -->
		<div class="form-group choose-file d-inline-flex">
			<label for="image">Product image (must be liquidated)</label>
			<input type="file" name="image-1" class="form-control-file mt-2 pt-1" id="image">
		 </div>
		 <br>
		 <div class="form-group choose-file d-inline-flex">
			<label for="image">Product image</label>
			<input type="file" name="image-2" class="form-control-file mt-2 pt-1" id="image">
		 </div>
		 <br>
		 <div class="form-group choose-file d-inline-flex">
			<label for="image">Product image</label>
			<input type="file" name="image-3" class="form-control-file mt-2 pt-1" id="image">
		 </div>
		 <br>
		 <div class="form-group choose-file d-inline-flex">
			<label for="image">Product image</label>
			<input type="file" name="image-4" class="form-control-file mt-2 pt-1" id="image">
		 </div>
		 <br>
		 <div class="form-group choose-file d-inline-flex">
			<label for="image">Product image</label>
			<input type="file" name="image-5" class="form-control-file mt-2 pt-1" id="image">
		 </div>
		 <br>
		<!-- Submit button -->
		<button class="btn btn-transparent" type="submit" >Save My Changes</button>
        <a href="{{url('/mymerchandise')}}" class="btn btn-transparent">Cancel</a>
	</form>
</div>