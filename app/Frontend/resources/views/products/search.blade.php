@extends('frontend::layouts.main')

@section('content')

<!-- ========================= SECTION MAIN ========================= -->
<br>

<!-- ========================= SECTION MAIN END// ========================= -->





<!-- ========================= SECTION ITEMS ========================= -->
<section class="section-request padding-y-sm">
<div class="container">

{{--}}
<header class="section-heading heading-line1">
	<h4 class="title-section bg1 text-uppercase">Recommended items</h4>
</header>
--}}

<div class="row">
	<aside class="col-sm-3">

	<div class="card card-filter">
	<article class="card-group-item">
		<header class="card-header">
			<a class="" aria-expanded="true" href="#" data-toggle="collapse" data-target="#collapse22">
				<i class="icon-action fa fa-chevron-down"></i>
				<h6 class="title">By Category</h6>
			</a>
		</header>
		<div style="" class="filter-content collapse show" id="collapse22">
			<div class="card-body">
				<form class="pb-3">
				<div class="input-group">
					<input class="form-control" placeholder="Search" type="text">
					<div class="input-group-append">
						<button class="btn btn-warning" type="button"><i class="fa fa-search"></i></button>
					</div>
				</div>
				</form>

				<ul class="list-unstyled list-lg">
					<li><a href="#">Beer <span class="float-right badge badge-light round">142</span> </a></li>
					<li><a href="#">Soft drinks  <span class="float-right badge badge-light round">3</span>  </a></li>
					<li><a href="#">Drinking water <span class="float-right badge badge-light round">32</span>  </a></li>
					<li><a href="#">Other <span class="float-right badge badge-light round">12</span>  </a></li>
				</ul>
			</div> <!-- card-body.// -->
		</div> <!-- collapse .// -->
	</article> <!-- card-group-item.// -->
	<article class="card-group-item">
		<header class="card-header">
			<a href="#" data-toggle="collapse" data-target="#collapse33">
				<i class="icon-action fa fa-chevron-down"></i>
				<h6 class="title">By Price  </h6>
			</a>
		</header>
		<div class="filter-content collapse show" id="collapse33">
			<div class="card-body">
				{{--}}
				<input type="range" class="custom-range" min="0" max="100" name="">
				--}}
				<div class="form-row">
				<div class="form-group col-md-6">
					<label>Min</label>
					<input class="form-control" placeholder="$0" type="number">
				</div>
				<div class="form-group text-right col-md-6">
					<label>Max</label>
					<input class="form-control" placeholder="$100" type="number">
				</div>
				</div> <!-- form-row.// -->
				<button class="btn btn-block btn-outline-warning">Apply</button>
			</div> <!-- card-body.// -->
		</div> <!-- collapse .// -->
	</article> <!-- card-group-item.// -->

	{{--}}
	<article class="card-group-item">
		<header class="card-header">
			<a href="#" data-toggle="collapse" data-target="#collapse44">
				<i class="icon-action fa fa-chevron-down"></i>
				<h6 class="title">By Feature </h6>
			</a>
		</header>
		<div class="filter-content collapse show" id="collapse44">
			<div class="card-body">
			<form>
				<label class="form-check">
					<input class="form-check-input" value="" type="checkbox">
					<span class="form-check-label">
						<span class="float-right badge badge-light round">5</span>
						Samsung
					</span>
				</label>  <!-- form-check.// -->
				<label class="form-check">
					<input class="form-check-input" value="" type="checkbox">
					<span class="form-check-label">
						<span class="float-right badge badge-light round">13</span>
						Mersedes Benz
					</span>
				</label> <!-- form-check.// -->
				<label class="form-check">
					<input class="form-check-input" value="" type="checkbox">
					<span class="form-check-label">
						<span class="float-right badge badge-light round">12</span>
						Nissan Altima
					</span>
				</label>  <!-- form-check.// -->
				<label class="form-check">
					<input class="form-check-input" value="" type="checkbox">
					<span class="form-check-label">
						<span class="float-right badge badge-light round">32</span>
						Another Brand
					</span>
				</label>  <!-- form-check.// -->
			</form>
			</div> <!-- card-body.// -->
		</div> <!-- collapse .// -->
	</article> <!-- card-group-item.// -->

	--}}
	</div> <!-- card.// -->


	</aside> <!-- col.// -->




<main class="col-sm-9">
<div class="row">


	@foreach($products as $product)

	<div class="col-md-4">
		<figure class="card card-product">
			{{--}}
	    <span class="badge-new"> NEW </span>
	    <span class="badge-offer"><b> -50%</b></span>
			--}}

			<a href="{{ route('product.show', ['id'=>$product->id]) }}">
				<div class="img-wrap"> <img src="{{$product->image_name}}"></div>
			</a>
			<figcaption class="info-wrap">
				<h6 class="title "><a href="{{ route('product.show', ['id'=>$product->id]) }}">{{ $product->name }}</a></h6>

				<div class="price-wrap h5">
	        <form method="POST" action="{{ route('add-cart', ['id'=>$product->id]) }}">
						<input name="_method" type="hidden" value="post">
						{{ csrf_field() }}

						<button type="submit" class="btn btn-warning btn-sm float-right">Add to cart</button>
			</form>
					<span class="price-new">${{ $product->sale_price>0?$product->sale_price:$product->unit_price }}</span>
					@if($product->sale_price>0)
						<del class="price-old">{{ $product->unit_price }}</del>
					@endif
				</div> <!-- price-wrap.// -->

			</figcaption>
		</figure> <!-- card // -->
	</div> <!-- col // -->

	@endforeach



{{--}}
<div class="col-md-4">
	<figure class="card card-product">
    <span class="badge-new"> NEW </span>
    <span class="badge-offer"><b> -50%</b></span>
		<a href="{{ route('product-detail') }}">
			<div class="img-wrap"> <img src="img/items/Freshy-Apple-Juice.jpg"></div>
		</a>
		<figcaption class="info-wrap">
			<h6 class="title "><a href="{{ route('product-detail') }}">Good item name</a></h6>

			<div class="price-wrap h5">
			<form method="POST" action="{{ route('add-cart', ['id'=>$new_product->id]) }}">
						<input name="_method" type="hidden" value="post">
						{{ csrf_field() }}

						<button type="submit" class="btn btn-warning btn-sm float-right">Add to cart</button>
					</form>
				<span class="price-new">$1280</span>
				<del class="price-old">$1980</del>
			</div> <!-- price-wrap.// -->

		</figcaption>
	</figure> <!-- card // -->
</div> <!-- col // -->
<div class="col-md-4">
	<figure class="card card-product">
		<div class="img-wrap"> <img src="img/items/ganzberg_beer.jpg"></div>
		<figcaption class="info-wrap">
			<h6 class="title "><a href="#">The name of product</a></h6>
			<div class="price-wrap">
        <a href="#" class="btn btn-warning btn-sm float-right"> Add to cart </a>
				<span class="price-new">$280</span>
			</div> <!-- price-wrap.// -->
		</figcaption>
	</figure> <!-- card // -->
</div> <!-- col // -->
<div class="col-md-4">
	<figure class="card card-product">
		<div class="img-wrap"> <img src="img/items/Freshy-Soybean.jpg"></div>
		<figcaption class="info-wrap">
			<h6 class="title "><a href="#">Name of product</a></h6>
			<div class="price-wrap">
        <a href="#" class="btn btn-warning btn-sm float-right"> Add to cart </a>
				<span class="price-new">$280</span>
			</div> <!-- price-wrap.// -->
		</figcaption>
	</figure> <!-- card // -->
</div> <!-- col // -->
<div class="col-md-4">
	<figure class="card card-product">
		<div class="img-wrap"> <img src="img/items/ganzberg_beer.jpg"></div>
		<figcaption class="info-wrap">
			<h6 class="title "><a href="#">The name of product</a></h6>
			<div class="price-wrap">
        <a href="#" class="btn btn-warning btn-sm float-right"> Add to cart </a>
				<span class="price-new">$280</span>
			</div> <!-- price-wrap.// -->
		</figcaption>
	</figure> <!-- card // -->
</div> <!-- col // -->

<div class="col-md-4">
	<figure class="card card-product">
		<div class="img-wrap"> <img src="img/items/ganzberg_beer.jpg"></div>
		<figcaption class="info-wrap">
			<h6 class="title "><a href="#">The name of product</a></h6>
			<div class="price-wrap">
        <a href="#" class="btn btn-warning btn-sm float-right"> Add to cart </a>
				<span class="price-new">$280</span>
			</div> <!-- price-wrap.// -->
		</figcaption>
	</figure> <!-- card // -->
</div> <!-- col // -->
<div class="col-md-4">
	<figure class="card card-product">
    <span class="badge-new"> NEW </span>
    <span class="badge-offer"><b> - 50%</b></span>
		<div class="img-wrap"> <img src="img/items/Freshy-Apple-Juice.jpg"></div>
		<figcaption class="info-wrap">
			<h6 class="title "><a href="#">Good item name</a></h6>

			<div class="price-wrap h5">
        <a href="#" class="btn btn-warning btn-sm float-right"> Add to cart </a>
				<span class="price-new">$1280</span>
				<del class="price-old">$1980</del>
			</div> <!-- price-wrap.// -->

		</figcaption>
	</figure> <!-- card // -->
</div> <!-- col // -->
<div class="col-md-4">
	<figure class="card card-product">
		<div class="img-wrap"> <img src="img/items/ganzberg_beer.jpg"></div>
		<figcaption class="info-wrap">
			<h6 class="title "><a href="#">The name of product</a></h6>
			<div class="price-wrap">
        <a href="#" class="btn btn-warning btn-sm float-right"> Add to cart </a>
				<span class="price-new">$280</span>
			</div> <!-- price-wrap.// -->
		</figcaption>
	</figure> <!-- card // -->
</div> <!-- col // -->
<div class="col-md-4">
	<figure class="card card-product">
		<div class="img-wrap"> <img src="img/items/Freshy-Soybean.jpg"></div>
		<figcaption class="info-wrap">
			<h6 class="title "><a href="#">Name of product</a></h6>
			<div class="price-wrap">
        <a href="#" class="btn btn-warning btn-sm float-right"> Add to cart </a>
				<span class="price-new">$280</span>
			</div> <!-- price-wrap.// -->
		</figcaption>
	</figure> <!-- card // -->
</div> <!-- col // -->


--}}



</main>

</div>
</div> <!-- row.// -->


</div><!-- container // -->
</section>
<!-- ========================= SECTION ITEMS .END// ========================= -->



{{--}}

<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y">
<div class="container">


<header class="section-heading">
<h3 class="title-section">Main section is here</h3>
</header>

<article>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
<p>Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
<p>Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>


</article>


</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->
--}}


@endsection
