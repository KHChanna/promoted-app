@extends('frontend::layouts.main')

@section('content')

<!-- ========================= SECTION MAIN ========================= -->

<div class=".container-fluid">
	<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
	<div class="carousel-inner">
		<div class="carousel-item active">
		<img class="d-block w-100" src="img/banners/banner1.jpg" alt="First slide">
		</div>
		<div class="carousel-item">
		<img class="d-block w-100" src="img/banners/banner2.jpg" alt="Second slide">
		</div>
	</div>
	<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
	</div>
</div>
<br>
<!-- ========================= SECTION MAIN END// ========================= -->

<div class="container">
<!-- search bar -->
<div class="col-lg-11-24 col-sm-12 order-3 order-lg-2 float-right">
		<form action="{{ route('search')}}" method="get">
			<div class="input-group w-100">
        
			    <input type="text" id="q" name="q" class="form-control" style="width:40%;" placeholder="Search">

			    <div class="input-group-append">
			      <button class="btn btn btn-info" type="submit">
			        <i class="fa fa-search"></i>
			      </button>
			    </div>
		    </div>
		</form> <!-- search-wrap .end// -->
	</div> <!-- col.// -->
</div>
</div>
<br>

<!-- ========================= SECTION ITEMS ========================= -->
<section class="section-request padding-y-sm">
<div class="container">

<!-- New Product -->
<header class="section-heading heading-line1">
		<h4 class="title-section bg1 text-uppercase head-cat">Category</h4>
	</header>

	<div class="row-sm d-flex justify-content-center">

		
			<button type="button" class="btn btn-outline-primary btn-rounded waves-effect">Computer</button>
			<button type="button" class="btn btn-outline-primary btn-rounded waves-effect">Fashion</button>
			<button type="button" class="btn btn-outline-primary btn-rounded waves-effect">Smart Watch</button>
			<button type="button" class="btn btn-outline-primary btn-rounded waves-effect">Smart Phone</button>
			<button type="button" class="btn btn-outline-primary btn-rounded waves-effect">Men</button>
			<button type="button" class="btn btn-outline-primary btn-rounded waves-effect">Women</button>
	

	</div> <!-- row.// -->

	<!-- New Product -->
	<header class="section-heading heading-line1">
		<h6 class="title-section bg1 text-uppercase">Top Sale <span style="color:red;">*</span></h6>
	</header>

	<div class="row-sm">

		<div class="col-md-2">
			<figure class="card card-product">
				{{--}}
			<span class="badge-new"> NEW </span>
			<span class="badge-offer"><b> -50%</b></span>
				--}}

				<a href="#">
					<div class="img-wrap">
						<img src="">
					</div>
				</a>
				<figcaption class="info-wrap">
					<h6 class="title "><a href="#"></a></h6>

					<div class="price-wrap h5">
					<form method="POST" action="">
						<input name="_method" type="hidden" value="post">
						{{ csrf_field() }}

						<button type="submit" class="btn btn btn-info btn-sm float-right">Add to cart</button>
					</form>
						<span class="price-new">$</span>
						
					</div> <!-- price-wrap.// -->

				</figcaption>
			</figure> <!-- card // -->
		</div> <!-- col // -->

	</div> <!-- row.// -->

	<!-- Promoted Product -->
	<header class="section-heading heading-line1">
		<h6 class="title-section bg1 text-uppercase">New Products <span style="color:red;">*</span></h6>
	</header>

	<div class="row-sm">

			<div class="col-md-2">
				<figure class="card card-product">
					{{--}}
				<span class="badge-new"> NEW </span>
				<span class="badge-offer"><b> -50%</b></span>
					--}}

					<a href="">
						<div class="img-wrap">
							<img src="">
						</div>
					</a>
					<figcaption class="info-wrap">
						<h6 class="title "><a href="#"></a></h6>

						<div class="price-wrap h5">
							<form method="POST" action="{{route('addproduct')}}">
							<input name="_method" type="hidden" value="post">
							{{ csrf_field() }}

							<button type="submit" class="btn btn btn-info btn-sm float-right">Add to cart</button>
							</form>
					<!-- <a href="/cart" class="btn btn-warning btn-sm float-right"> Add to cart </a> -->
							<span class="price-new">$</span>
							
						</div> <!-- price-wrap.// -->

					</figcaption>
				</figure> <!-- card // -->
			</div> <!-- col // -->

	</div> <!-- row.// -->

	<!-- Discount Product -->
	<header class="section-heading heading-line1">
		<h6 class="title-section bg1 text-uppercase">Top Discount <span style="color:red;">*</span></h6>
	</header>

	<div class="row-sm">

		<div class="col-md-2">
			<figure class="card card-product">
				{{--}}
			<span class="badge-new"> NEW </span>
			<span class="badge-offer"><b> -50%</b></span>
				--}}

				<a href="#">
					<div class="img-wrap">
						<img src="">
					</div>
				</a>
				<figcaption class="info-wrap">
					<h6 class="title "><a href="#"></a></h6>

					<div class="price-wrap h5">
					<form method="POST" action="">
						<input name="_method" type="hidden" value="post">
						{{ csrf_field() }}

						<button type="submit" class="btn btn btn-info btn-sm float-right">Add to cart</button>
					</form>
						<span class="price-new">$</span>
						
					</div> <!-- price-wrap.// -->

				</figcaption>
			</figure> <!-- card // -->
		</div> <!-- col // -->

	</div> <!-- row.// -->
	<!-- Category -->
	{{--}}
	<header class="section-heading heading-line1">
		<h4 class="title-section bg1 text-uppercase">Categories</h4>
	</header>

	<div class="row-sm">

			<div class="col-md-3">
				<figure class="card card-product">
					
				<span class="badge-new"> NEW </span>
				<span class="badge-offer"><b> -50%</b></span>
					

					<a href="#">
						<div class="img-wrap">
							<img src="">
						</div>
					</a>
					<figcaption class="info-wrap">
						<h6 class="title "><a href=""></a></h6>

						<div class="price-wrap h5">
					
						</div> <!-- price-wrap.// -->

					</figcaption>
				</figure> <!-- card // -->
			</div> <!-- col // -->

	</div> <!-- row.// -->
	--}}
</div><!-- container // -->
</section>
<!-- ========================= SECTION ITEMS .END// ========================= -->

@endsection
