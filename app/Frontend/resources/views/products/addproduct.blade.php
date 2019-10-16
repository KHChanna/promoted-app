@extends('frontend::layouts.main')

@section('content')

<!-- ========================= SECTION MAIN ========================= -->
<hr>

<!-- ========================= SECTION ITEMS ========================= -->
<section class="section-request padding-y-sm">
<div class="container">


</div> <!-- container .//  -->

<div class="container">
<div class="row">
  <div class="col-md-6 offset-md-3" style="padding:20px;">
  <header class="section-heading heading-line1">
	<h4 class="title-section bg1 text-uppercase">Add Product</h4>
</header>
	<form action="{{url('addproduct')}}" method="POST" enctype="multipart/form-data">
	<input name="_method" type="hidden" value="post">
	{{ csrf_field() }}
	<div class="form-group">
		<label for="inputProductName">Product Name</label>
		<input type="text" class="form-control" id="product-name"name="product_name" placeholder="Enter Product name">
	</div>
	
	<div class="form-group">
		<label for="inputProductCategory">Category</label>
		<input type="text" class="form-control" id="category" name="category" placeholder="ChooseCategory">
	</div>

	<div class="form-group">
		<label for="exampleInputPassword1">Quantity </label>
		<input type="text" class="form-control" id="quantity" name="quantity" placeholder="Enter quantity ">
	</div>

	<div class="form-group">
		<label for="exampleInputPassword1">Price</label>
		<input type="text" class="form-control" id="price" name="price" placeholder="Enter product price">
	</div>

	<div class="form-group">
		<label for="exampleInputPassword1">Discount</label>
		<input type="text" class="form-control" id="discount" name="discount" placeholder="Enter dicount product">
	</div>

	<div class="form-group">
		<label for="exampleInputPassword1">Description</label>
		<input type="text" class="form-control" id="exampleInputPassword1" name="description" placeholder="Password">
	</div>

	<div class="form-group">
		<label for="exampleInputPassword1">Address</label>
		<input type="text" class="form-control" name="address" id="exampleInputPassword1" placeholder="Password">
	</div>

	<p>Image file</p>
	<div class="form-group">
        <input type="file" class="form-control-file" name="fileToUpload" id="exampleInputFile" aria-describedby="fileHelp">
        <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>
    </div>
	<br><br>
	<button type="submit" class="btn btn-info">Submit</button>
	</form>
  </div>
</div>

</div>
    </div><!-- /.container -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->


@endsection
