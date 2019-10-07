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
	    <h6 class="title">Account settings</h6>
	  </header>
  <div class="card-body">
		{{--}}<h5 class="card-title">Account settings</h5>--}}
		<h6>Membership:</h6>
		Member since: {{ Auth::user()->created_at}}<br>
		Membership type: General - Pending for approval to become retailor
		<hr>
		<h6>Registered phone number:</h6>
		{{ Auth::user()->phone}} <a href="#">Change</a>
		<hr>
		<h6>Change password:</h6>




</div>
</div>




</div> <!-- col // -->
</div></main>

</div>
</div> <!-- row.// -->


</div><!-- container // -->
</section>






@endsection
