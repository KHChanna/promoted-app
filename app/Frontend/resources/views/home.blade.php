@extends('frontend::layouts.main')

@section('content')

<!-- ========================= SECTION MAIN ========================= -->
<br>
<section class="section-main bg1 padding-bottom">
<div class="container">
<div class="row no-gutters bAdd to cart bAdd to cart-top-0 bg-white">

{{--}}

<aside class="col-lg-5-24">
<nav>
	<div class="title-category bg-secondary white d-none d-lg-block" style="margin-top:-53px">
		<span>Categories</span>
	</div>
	<ul class="menu-category">
		<li> <a href="#">Beer </a></li>
		<li> <a href="#">Juice & Juice Drinks </a></li>
		<li> <a href="#">Energy Drinks </a></li>
		<li> <a href="#">Sports Drinks  </a></li>
		<li> <a href="#">Drinking Water  </a></li>


		<li> <a href="#">Mobile phones  </a></li>
		<li class="has-submenu"> <a href="#">More category  <i class="icon-arrow-right pull-right"></i></a>
			<ul class="submenu">
				<li> <a href="#">Food &amp Beverage </a></li>
				<li> <a href="#">Home Equipments </a></li>
				<li> <a href="#">Machinery Items </a></li>
				<li> <a href="#">Toys & Hobbies  </a></li>
				<li> <a href="#">Consumer Electronics  </a></li>
				<li> <a href="#">Home & Garden  </a></li>
				<li> <a href="#">Beauty & Personal Care  </a></li>
			</ul>
		</li>


	</ul>
</nav>
</aside> <!-- col.// -->
--}}

<main class="col-lg-24-24">
<!-- ========= intro aside ========= -->
<div class="row no-gutters">
	<div class="col-lg-12 col-md-12">
<!-- ================= main slide ================= -->

<div class="owl-init slider-main owl-carousel" data-items="1" data-margin="1" data-nav="true" data-dots="false">
	<div class="item-slide">
		<img src="img/banners/banner1.jpg">
	</div>
	<div class="item-slide">
		<img src="img/banners/banner2.jpg">
	</div>
  {{--}}
	<div class="item-slide">
		<img src="ui-ecommerce/images/banners/slide3.jpg">
	</div>
  --}}
</div>

<!-- ============== main slidesow .end // ============= -->
	</div> <!-- col.// -->

  {{--}}
	<div class="col-lg-3 col-md-4">
<ul class="list-group list-group-flush">
    <li class="list-group-item">
		<h6>Group of items goes here</h6>
		<a href="#" class="btn btn-warning btn-sm btn-round"> View all </a>
    </li>
    <li class="list-group-item">
		<h6>Group of items goes here</h6>
		<a href="#" class="btn btn-warning btn-sm btn-round"> View all </a>
    </li>
    <li class="list-group-item">
		<h6>Group of items goes here</h6>
		<a href="#" class="btn btn-warning btn-sm btn-round"> View all </a>
    </li>
  </ul>
	</div> <!-- col.// -->
  --}}


</div> <!-- row.// -->
<!-- ======== intro aside ========= .// -->
</main> <!-- col.// -->
</div> <!-- row.// -->
</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION MAIN END// ========================= -->





<!-- ========================= SECTION ITEMS ========================= -->
<section class="section-request padding-y-sm">
<div class="container">

	<!-- New Product -->
	<header class="section-heading heading-line1">
		<h4 class="title-section bg1 text-uppercase">New Products</h4>
	</header>

	<div class="row-sm">

	@foreach($data['new_products'] as $new_product)
		<div class="col-md-3">
			<figure class="card card-product">
				{{--}}
			<span class="badge-new"> NEW </span>
			<span class="badge-offer"><b> -50%</b></span>
				--}}

				<a href="{{ route('product.show', ['id'=>$new_product->id]) }}">
					<div class="img-wrap">
						<img src="{{$new_product->image_name}}">
					</div>
				</a>
				<figcaption class="info-wrap">
					<h6 class="title "><a href="{{ route('product.show', ['id'=>$new_product->id]) }}">{{ $new_product->name }}</a></h6>

					<div class="price-wrap h5">
					<form method="POST" action="{{ route('add-cart', ['id'=>$new_product->id]) }}">
						<input name="_method" type="hidden" value="post">
						{{ csrf_field() }}

						<button type="submit" class="btn btn-warning btn-sm float-right">Add to cart</button>
					</form>
				<!-- <a href="/add-cart/{{$new_product->id}}" class="btn btn-warning btn-sm float-right"> Add to cart </a> -->
						<span class="price-new">${{ $new_product->sale_price>0?$new_product->sale_price:$new_product->unit_price }}</span>
						@if($new_product->sale_price>0)
							<del class="price-old">{{ $new_product->unit_price }}</del>
						@endif
					</div> <!-- price-wrap.// -->

				</figcaption>
			</figure> <!-- card // -->
		</div> <!-- col // -->
	@endforeach

	</div> <!-- row.// -->


	<!-- Promoted Product -->
	<header class="section-heading heading-line1">
		<h4 class="title-section bg1 text-uppercase">Promoted Product</h4>
	</header>

	<div class="row-sm">

		@foreach($data['promoted_products'] as $promoted_product)
			<div class="col-md-3">
				<figure class="card card-product">
					{{--}}
				<span class="badge-new"> NEW </span>
				<span class="badge-offer"><b> -50%</b></span>
					--}}

					<a href="{{ route('product.show', ['id'=>$promoted_product->id]) }}">
						<div class="img-wrap">
							<img src="{{$promoted_product->image_name}}">
						</div>
					</a>
					<figcaption class="info-wrap">
						<h6 class="title "><a href="{{ route('product.show', ['id'=>$promoted_product->id]) }}">{{ $promoted_product->name }}</a></h6>

						<div class="price-wrap h5">
							<form method="POST" action="{{ route('add-cart', ['id'=>$promoted_product->id]) }}">
							<input name="_method" type="hidden" value="post">
							{{ csrf_field() }}

							<button type="submit" class="btn btn-warning btn-sm float-right">Add to cart</button>
							</form>
					<!-- <a href="/cart" class="btn btn-warning btn-sm float-right"> Add to cart </a> -->
							<span class="price-new">${{ $promoted_product->sale_price>0?$promoted_product->sale_price:$promoted_product->unit_price }}</span>
							@if($promoted_product->sale_price>0)
								<del class="price-old">{{ $promoted_product->unit_price }}</del>
							@endif
						</div> <!-- price-wrap.// -->

					</figcaption>
				</figure> <!-- card // -->
			</div> <!-- col // -->
		@endforeach

	</div> <!-- row.// -->

	<!-- Category -->
	<header class="section-heading heading-line1">
		<h4 class="title-section bg1 text-uppercase">Categories</h4>
	</header>

	<div class="row-sm">

		@foreach($data['categories'] as $category)
			<div class="col-md-3">
				<figure class="card card-product">
					{{--}}
				<span class="badge-new"> NEW </span>
				<span class="badge-offer"><b> -50%</b></span>
					--}}

					<a href="{{ route('product.show', ['id'=>$category->id]) }}">
						<div class="img-wrap">
							<img src="{{$category->image_name}}">
						</div>
					</a>
					<figcaption class="info-wrap">
						<h6 class="title "><a href="{{ route('product.show', ['id'=>$category->id]) }}">{{ $category->default_name }}</a></h6>

						<div class="price-wrap h5">
					<!-- <a href="/cart" class="btn btn-warning btn-sm float-right"> Add to cart </a> -->
							<!-- <span class="price-new">${{ $promoted_product->sale_price>0?$promoted_product->sale_price:$promoted_product->unit_price }}</span>
							@if($promoted_product->sale_price>0)
								<del class="price-old">{{ $promoted_product->unit_price }}</del>
							@endif -->
						</div> <!-- price-wrap.// -->

					</figcaption>
				</figure> <!-- card // -->
			</div> <!-- col // -->
		@endforeach

	</div> <!-- row.// -->
</div><!-- container // -->
</section>
<!-- ========================= SECTION ITEMS .END// ========================= -->

@endsection
