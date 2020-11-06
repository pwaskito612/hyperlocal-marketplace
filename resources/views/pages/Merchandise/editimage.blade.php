<section>
	<center>

	@if ($errors->any())
    	<div class="alert alert-danger">
        	<ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        	</ul>
    	</div>
	@endif

	<br>
	<a href="{{url('/mymerchandise')}}" class="btn btn-transparent">Back</a><br><br>

	<form action="{{url('/insert-new-image')}}" method="post"  enctype="multipart/form-data">
		@csrf 
		<div class="form-group choose-file d-inline-flex">
			<label for="image">Insert New Image</label>
			<input type="number" name="id" class="d-none" value="{{$id}}"> 
			<input type="file" name="image" class="form-control-file mt-2 pt-1" id="image">
			<input type="submit" value="submit" class="btn btn-info">
		</div>
	</form>

	<table class="table table-responsive product-dashboard-table">
		<thead>
			<tr>
				<th>Image</th>
					<th class="text-center">Action</th>
				</tr>
		</thead>
                        
		@foreach($image as $i)
        <tr>
            <td>
                <img src="{{$i->image_url}}" alt="" style="max-width : 300px; height: auto;">
            </td>
            <td>
                <form action="{{url('/delete-image-merchandise')}}" method="post">
					@csrf 
					@method('delete')
					<input type="number" value="{{$i->id}}" class="d-none "name="id">
					<button class="btn btn-danger"
					style="padding-top : 12px;
						padding-left : 16px;
						padding-bottom : 12px;
						padding-right : 16px;">
                    	<i class="fa fa-trash"></i>
                    </button>
                </form>
            </td> 
        <tr>
    @endforeach
    </table>
</center>
</section>