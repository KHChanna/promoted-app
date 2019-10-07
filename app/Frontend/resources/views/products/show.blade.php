@extends('frontend::layouts.main')

@section('content')


<section class="section-content padding-y">
<div class="container">


<div class="row">
<div class="col-lg-12">

	<div class="card">
		<div class="row no-gutters">
			<aside class="col-sm-5 border-right">
	<article class="gallery-wrap">
	<div class="img-big-wrap">
	  <div>
			<a href="{{ $product->image_name }}" data-fancybox="">
				<img src="{{ $product->image_name }}">
			</a>

		</div>
	</div> <!-- slider-product.// -->
	<div class="img-small-wrap">

		<div class="item-gallery"> <img src="{{$product->image_name}}"></div>


{{--}}
		<div class="item-gallery"> <img src="ui-ecommerce/images/items/3.jpg"></div>
	  <div class="item-gallery"> <img src="ui-ecommerce/images/items/4.jpg"></div>
		--}}
	</div> <!-- slider-nav.// -->
	</article> <!-- gallery-wrap .end// -->
			</aside>
			<aside class="col-sm-7">
	<article class="p-5">
		<h3 class="title mb-3">{{ $product->name }}</h3>

	<div class="mb-3">
		<var class="price h3 text-warning">
			<span class="currency">$</span><span class="num">{{ $product->sale_price? $product->sale_price : $product->unit_price }}</span>
		</var>
		<span>/per {{ @$product->unit->name }}</span>
	</div> <!-- price-detail-wrap .// -->
	<dl>
	  <dt>Description</dt>
	  <dd>
			{{ $product->description }}
		</dd>
	</dl>
	<dl class="row">
	  <dt class="col-sm-3">Unit quantity</dt>
	  <dd class="col-sm-9">-</dd>

		<dt class="col-sm-3">Category</dt>
	  <dd class="col-sm-9">{{$product->default_name}}</dd>
		{{--}}
	  <dt class="col-sm-3">Color</dt>
	  <dd class="col-sm-9">Black and white </dd>

	  <dt class="col-sm-3">Delivery</dt>
	  <dd class="col-sm-9">Russia, USA, and Europe </dd>
		--}}


	</dl>

	{{--}}
	<div class="rating-wrap">

		<ul class="rating-stars">
			<li style="width:80%" class="stars-active">
				<i class="fa fa-star"></i> <i class="fa fa-star"></i>
				<i class="fa fa-star"></i> <i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
			</li>
			<li>
				<i class="fa fa-star"></i> <i class="fa fa-star"></i>
				<i class="fa fa-star"></i> <i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
			</li>
		</ul>


		<div class="label-rating">132 reviews</div>
		<div class="label-rating">154 orders </div>


	</div> <!-- rating-wrap.// -->
	--}}


	<hr>
		<div class="row">
			<div class="col-sm-5">
				<dl class="dlist-inline">
				  <dt>Quantity: </dt>
				  <dd>
				  	<select class="form-control form-control-sm" style="width:70px;">
				  		<option> 1 </option>
				  		<option> 2 </option>
				  		<option> 3 </option>
				  	</select>
				  </dd>
				</dl>  <!-- item-property .// -->
			</div> <!-- col.// -->


			{{--}}
			<div class="col-sm-7">
				<dl class="dlist-inline">
					  <dt>Size: </dt>
					  <dd>
					  	<label class="form-check form-check-inline">
						  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
						  <span class="form-check-label">SM</span>
						</label>
						<label class="form-check form-check-inline">
						  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
						  <span class="form-check-label">MD</span>
						</label>
						<label class="form-check form-check-inline">
						  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
						  <span class="form-check-label">XXL</span>
						</label>
					  </dd>
				</dl>  <!-- item-property .// -->
			</div> <!-- col.// -->
			--}}


		</div> <!-- row.// -->
		<hr>
		{{--}}<a href="#" class="btn  btn-primary"> Buy now </a>--}}
		

	</article> <!-- card-body.// -->
			</aside> <!-- col.// -->
		</div> <!-- row.// -->
	</div> <!-- card.// -->


</div>
</div> <!-- row.// -->


</div><!-- container // -->
</section>



@endsection
