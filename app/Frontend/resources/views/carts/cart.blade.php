@extends('frontend::layouts.main')

@section('content')


<section class="section-content padding-y">
<div class="container">
	<div class="row">
		<main class="col-sm-9">
	@if(count($carts)>0)
	<div class="card">
	<table class="table table-hover shopping-cart-wrap" id="table_cart">
	<thead class="text-muted">
	<tr>
	  <th scope="col">Product</th>
	  <th scope="col" width="120">Quantity</th>
	  <th scope="col" width="120">Price</th>
	  <th scope="col" class="text-right" width="200">Action</th>
	</tr>
	</thead>
	<tbody>
		@foreach($carts as $cart)
			<tr>
			<td>
				<figure class="media">
					<div class="img-wrap"><img src="{{$cart->attributes->image}}" class="img-thumbnail img-sm"></div>
					<figcaption class="media-body">
						<h6 class="title text-truncate">{{$cart->name}}</h6>
						<dl class="dlist-inline small">
							<dt>Unit: </dt>
						<dd>250ml</dd>
						</dl>

					</figcaption>
				</figure>
			</td>
			<td style="width:140px">
				<!-- <select class="form-control" name="select_qty">
					<option>{{$cart->quantity}}</option>
					<option>2</option>
					<option>3</option>
					<option>4</option>
				</select> -->
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<button class="input-group-text" type="button" id="d-cat">-</button>
					</div>
					<input type="text" id="cart-qty" class="form-control text-center" value="{{$cart->quantity}}" min="1" max="9">
					<div class="input-group-append">
					<button class="input-group-text" type="button" id="in-cat">+</button>
					</div>
				</div>
				
			</td>
			<td>
				<div class="price-wrap">
					<var class="price" id="item-price">USD <span id="qty">{{$cart->price}}</span></var>
					<small class="text-muted">(USD5 each)</small>
				</div> <!-- price-wrap .// -->
			</td>
			<td class="text-right" s>
				{{--}}
			<a data-original-title="Save to Wishlist" title="" href="" class="btn btn-outline-success" data-toggle="tooltip"> <i class="fa fa-heart"></i></a>
	--}}
			<form method="POST" action="{{ route('rm-cart', ['id'=>$cart->id]) }}">
						<input name="_method" type="hidden" value="post">
						{{ csrf_field() }}

						<button type="submit" class="btn btn-outline-danger">× Remove</button>
			</form>
			</td>
		</tr>
		@endforeach

	</tbody>
	</table>
	
	</div> <!-- card.// -->
	@else
		<p>No Products</p>
	@endif
		</main> <!-- col.// -->


		<aside class="col-sm-3">

	{{--}}
	<p class="alert alert-success">Add USD 5.00 of eligible items to your order to qualify for FREE Shipping. </p>
	--}}

	<dl class="dlist-align">
	  <dt>Total price: </dt>
	  <dd class="text-right">USD <span id="Po">{{Cart::getTotal()}}</span></dd>
	</dl>
	<dl class="dlist-align">
	  <dt>Discount:</dt>
	  <dd class="text-right">USD 0</dd>
	</dl>
	<dl class="dlist-align h4">
	  <dt>Total:</dt>
	  <dd class="text-right"><strong>USD {{(Cart::getSubTotal()) + 0}}</strong></dd>
	</dl>
	<hr>
	{{--}}

	<figure class="itemside mb-3">
		<aside class="aside"><img src="http://bootstrap-ecommerce.com/ui-ecommerce/images/icons/pay-visa.png"></aside>
		 <div class="text-wrap small text-muted">
	Pay 84.78 AED ( Save 14.97 AED )
	By using ADCB Cards
		 </div>
	</figure>
	<figure class="itemside mb-3">
		<aside class="aside"> <img src="http://bootstrap-ecommerce.com/ui-ecommerce/images/icons/pay-mastercard.png"> </aside>
		<div class="text-wrap small text-muted">
	Pay by MasterCard and Save 40%. <br>
	Lorem ipsum dolor
		</div>
	</figure>
	--}}
	<script>
		$(document).ready(function() {
			let q = 1;
			// jQuery code
			$('[name=input_qty]').keypress(function (e){
					var charCode = (e.which) ? e.which : e.keyCode;
					if (charCode > 31 && (charCode < 48 || charCode > 57)) {
						return false;
				}
			});

			//
			// $( "#in-cat" ).click(function() {
			// 	if(q < 50){
			// 		$('[name=cart-qty]').val(++q);
			// 	}
			// 	return;
			// });

			// $( "#d-cat" ).click(function() {
			// 	if(q > 1){
			// 		$('[name=cart-qty]').val(--q);
			// 	}
			// 	return;
			// });

			$("#in-cat").click(function() {
				var $row = $(this).find("tr");    // Find the row
				var $tds = $row.find("#cart-qty");	
				console.log($tds.val());
			});
		});
	</script>
	<a href="{{ route('checkout')}}" class="btn btn-block btn-info">Checkout</a>

		</aside> <!-- col.// -->
	</div>


</div><!-- container // -->
</section>



@endsection
