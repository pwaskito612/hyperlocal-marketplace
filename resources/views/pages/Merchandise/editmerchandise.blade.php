<div class="container">
<br>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
	<h3 class="widget-header user">Insert new merchandise</h3>
	<form action="{{url('/update-merchandise')}}" method="POST" enctype="multipart/form-data">
		@csrf 
		@method('put')
		<!-- Name -->
		<input type="hidden"  name="id" value="{{$merchandise->id}}">
		<div class="form-group">
			<label for="title">Tittle</label>
			<input type="text" class="form-control" name="title" id="tittle" 
			value="{{$merchandise->title}}">
		</div>
           <div class="form-group">
			<label for="weight">Weight</label>
			<input type="number" class="form-control" name="weight" id="weight" 
			value="{{$merchandise->weight}}">
		</div>
           <div class="form-group">
			<label for="stock">Stock</label>
			<input type="number" class="form-control" name="stock" id="stock" 
			value="{{$merchandise->stock}}">
		</div>
           <div class="form-group">
			<label for="price">Price</label>
			<input type="number" class="form-control" name="price" id="price" 
			value="{{$merchandise->price}}">
		</div>
           <div class="form-group">
			<label for="location">Location</label>
			<input type="text" class="form-control" name="location" id="location" 
			value="{{$merchandise->location}}">
		</div>
           <div class="form-group">
			<label for="categories">Category</label>
			<input type="text" class="form-control" name="categories" id="categories" 
			value="{{$merchandise->categories}}">
		</div>
           <div class="form-group">
			<label for="descrition">Descrition</label><br>
			<textarea name="description" id="description" cols="100" rows="50">
				{{$merchandise->description}}
			</textarea>
		</div>
		
		<!-- Submit button -->
		<button class="btn btn-transparent" type="submit" >Save My Changes</button>
           <a href="{{url('/mymerchandise')}}" class="btn btn-transparent">Cancel</a>
	</form>
</div>