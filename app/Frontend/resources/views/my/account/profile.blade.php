@extends('frontend::layouts.main')

@section('content')


<br>


<section class="section-request padding-y-sm">
<div class="container">

{{--}}
<header class="section-heading heading-line1">
	<h4 class="title-section bg1 text-uppercase">Recommended items</h4>
</header>
--}}

<div class="row">
	<aside class="col-sm-3">


	 	@include('frontend::my.partials.sidebar_menu')



</aside> <!-- col.// -->


<main class="col-sm-9">
<div class="row">

<div class="col-md-12">


	<div class="card">
		<header class="card-header">
	    <h6 class="title">Profile</h6>
	  </header>
  <div class="card-body">
		{{--}}<h5 class="card-title">Account settings</h5>--}}
		<div class="row">
		<div class="col-md-6">
		<form class="shipping-form">
			<div id="notifications"></div>

			{{--}}
			<div class="row">
			<div class="form-group col-md-6">
				<input type="text" placeholder="Full name" class="form-control">
			</div>
			<div class="form-group col-md-6">
				<input type="text" placeholder="Phone" class="form-control">
			</div>
		</div>
		--}}



		<div class="form-group">
			<input type="text" placeholder="Full name" class="form-control">
		</div>

			<div class="form-group">
				<input type="text" placeholder="Email address" class="form-control">
			</div>


			<div class="text-right">
								<a href="#" class="btn btn-warning">Save</a>
							</div>
							</form>
			</div>

</div>

</div>
</div>




</div> <!-- col // -->
</div></main>

</div>
</div> <!-- row.// -->


</div><!-- container // -->
</section>






@endsection
