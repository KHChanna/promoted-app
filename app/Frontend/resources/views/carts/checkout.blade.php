@extends('frontend::layouts.main')

@section('content')


<section class="section-content padding-y">
<div class="container">


	<div class="row">
		<main class="col-sm-6">


			{{--}}
			<div class="card">

		  <div class="card-body">
				<h5 class="card-title">Contact information</h5>
				<div class="row1">
					<form class="contact-form">
						<div class="form-group">
							<input type="text" id="shipping_address_full_name" placeholder="Full name" class="form-control">
						</div>
						<div class="form-group">
							<input type="email" id="shipping_address_email" placeholder="Email address" class="form-control">
						</div>

					 <a href="#" class="btn btn-primary">Continue</a>
					 </form>
				 </div>



		  </div>

		</div> <!-- card.// -->


<br>

--}}
		<div class="card">

  <div class="card-body">
		<h5 class="card-title">Contact Information & Delivery address</h5>
		<div class="row1">
		<form class="shipping-form">
			<div id="notifications"></div>


			<div class="row">
			<div class="form-group col-md-6 city">
				<input type="text" placeholder="Full name" class="form-control">
			</div>
			<div class="form-group col-md-6 zip">
				<input type="text" placeholder="Phone" class="form-control">
			</div>
		</div>

			<div class="form-group">
				<input type="text" placeholder="Street address" class="form-control">
			</div>


			{{--}}

			<div class="form-group ">
				<div class="select-side"><i class="glyphicon glyphicon-menu-down gray-arrow"></i>
				</div>

				<select id="countries" class="form-control">
							<option disabled="disabled" value="" style="color: rgb(153, 153, 153);">
                  Select Country
                <option value="KH">
                  Cambodia
                </option>

							</select>
						</div>
						--}}

							<div class="form-group" style="">
								<div class="select-side">
									<i class="glyphicon glyphicon-menu-down gray-arrow"></i>
								</div>

									<select id="states" class="form-control">
										<option disabled="disabled" value="">
                  Select  City / Province
                </option><option value="AK">
                  Phnom Penh
                </option></select>
							</div>


							<div class="form-group" style="">
								<div class="select-side">
									<i class="glyphicon glyphicon-menu-down gray-arrow"></i>
								</div>

									<select id="states" class="form-control">
										<option disabled="disabled" value="">
                  Select  District
                </option><option value="AK">
                  7 Makara
                </option></select>
							</div>
							<div class="text-right">
								<a href="#" class="btn btn-warning">Continue</a>
							</div>
							</form>
					 </div>



</div>
</div>


<br>
		<div class="card">
  <div class="card-body">
		<h5 class="card-title">Delivery options</h5>

			<div class="row form-group">
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="selected">
                    <label class="well1" for="do1" style="width: 100%; background-color: #fff;">
                      <input type="radio" required="" id="do1" name="delivery_options" value="1" checked="">
                          <span class="title">Standard deliver (US$1)</span>
                      <div class="clear"></div>
                    </label>
                </div>
              </div>

              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="selected">
                    <label class="well1" for="do2" style="width: 100%; background-color: #fff;">
                      <input type="radio" required="" id="do2" name="delivery_options" value="2">
												<span class="title">Express delivery (US$3)</span>
                      <div class="clear"></div>
                    </label>

                </div>
              </div>
      </div>

		<div class="text-right">
    <a href="{{ route('checkout-completed')}}" class="btn btn-warning">Continue</a>
	</div>
  </div>

</div>




<br>
		<div class="card">
  <div class="card-body">
		<h5 class="card-title">Payment methods</h5>

			<div class="row form-group">
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="selected">
                    <label class="well1" for="pm1" style="width: 100%; background-color: #fff;">
                      <input type="radio" required="" id="pm1" name="payment_methods" value="1" checked="">
                          <span class="title">Cash on Delivery (COD)</span>
                      <div class="clear"></div>
                    </label>
                </div>
              </div>

              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="selected">
                    <label class="well1" for="pm2" style="width: 100%; background-color: #fff;">
                      <input type="radio" required="" id="pm2" name="payment_methods" value="2">
												<span class="title">Wing</span>
                      <div class="clear"></div>
                    </label>

                </div>
              </div>
      </div>

		<div class="text-right">
    <!-- <a href="{{ route('checkout-completed')}}" class="btn btn-warning">Place order</a> -->
	</div>
  </div>

</div>
<br>
<div class="card" style="height: 300px; padding:10px;">
	<!-- Google Map Here -->
	<div id="map" style="height: 300px;">
	</div>
</div>
		<script>
			var map, infoWindow;
			function initMap() {
				map = new google.maps.Map(document.getElementById('map'), {
				center: {lat: -34.397, lng: 150.644},
				zoom: 15
				});
				infoWindow = new google.maps.InfoWindow;

				// Try HTML5 geolocation.
				if (navigator.geolocation) {
				navigator.geolocation.getCurrentPosition(function(position) {
					var pos = {
					lat: position.coords.latitude,
					lng: position.coords.longitude
					};

					var marker = new google.maps.Marker({
						position: pos,
						map: map,
						draggable:true,
    					animation: google.maps.Animation.DROP,
						title: 'Hello World!'
					});

					// function geocodePosition(pos) {
					// 	geocoder.geocode({
					// 		latLng: pos
					// 	}, function(responses) {
					// 		if (responses && responses.length > 0) {
					// 		updateMarkerAddress(responses[0].formatted_address);
					// 		} else {
					// 		updateMarkerAddress('Cannot determine address at this location.');
					// 		}
					// 	});
					// }

					google.maps.event.addListener(marker, 'dragend', function () {
						updateMarkerStatus('Drag ended');
						geocodePosition(marker.getPosition());
					});
					// infoWindow.setPosition(pos);
					// infoWindow.setContent('Location found.');
					infoWindow.open(map);
					map.setCenter(pos);
				}, function() {
					handleLocationError(true, infoWindow, map.getCenter());
				});
				} else {
				// Browser doesn't support Geolocation
				handleLocationError(false, infoWindow, map.getCenter());
				}
			}

			function handleLocationError(browserHasGeolocation, infoWindow, pos) {
				infoWindow.setPosition(pos);
				infoWindow.setContent(browserHasGeolocation ?
									'Error: The Geolocation service failed.' :
									'Error: Your browser doesn\'t support geolocation.');
				infoWindow.open(map);
			}
		</script>
		<script async defer
    		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAqYYXtuIZ1_kmO2PD7ZUztNfR6BD6g7B0&callback=initMap">
   		</script>
		</main> <!-- col.// -->


		<aside class="col-sm-6">

			<div class="card">

				<div class="card-body">
					<h5 class="card-title">Order summary</h5><br>
			@foreach($carts as $cart)
				<div>
				<figure class="media">
					<div class="img-wrap"><img src="{{$cart->attributes->image}}" class="img-thumbnail img-sm"></div>
					<figcaption class="media-body">
						<h6 class="title text-truncate">{{$cart->name}}</h6>
						<dl class="dlist-inline small">
							<dt>Unit: </dt>
						<dd>250ml</dd>
						</dl>

					</figcaption>
					<div class="text-right">
						x {{$cart->quantity}} <br>USD
						<span>{{$cart->price}}</span>
					</div>
				</figure>
				</div>
			<br>

			@endforeach

	{{--}}
	<p class="alert alert-success">Add USD 5.00 of eligible items to your order to qualify for FREE Shipping. </p>
	--}}
<hr>
	<dl class="dlist-align">
	  <dt>Total price: </dt>
	  <dd class="text-right">USD {{Cart::session(Auth::user()->id)->getTotal()}}</dd>
	</dl>
	<dl class="dlist-align">
	  <dt>Discount:</dt>
	  <dd class="text-right">USD 0</dd>
	</dl>
	<dl class="dlist-align h4">
	  <dt>Total:</dt>
	  <dd class="text-right"><strong>USD <span>{{Cart::session(Auth::user()->id)->getSubTotal()}}</span></strong></dd>
	</dl>

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
{{--}}
	<a href="#" class="btn btn-block btn-warning">Place order</a>
--}}

</div>
</div>
		<br>
		<a href="{{ route('checkout-completed')}}" class="btn btn-block btn-warning">Place order</a>
		</aside> <!-- col.// -->
	</div>


</div><!-- container // -->
</section>



@endsection
