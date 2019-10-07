@extends('frontend::layouts.main')

@section('content')


<section class="section-content padding-y">
<div class="container">


	<div class="row">
		<main class="col-sm-12">


<div class="card">
  <div class="card-body">
    <h5 class="card-title">Thank you for your order</h5>
    <p class="card-text">
			Your order number: 000001
		</p>
    <a href="#" class="btn btn-warning">View your order</a>
		<a href="{{ route('search')}}" class="btn btn-warning">Continue shopping</a>
  </div>
</div> <!-- card.// -->



	</main> <!-- col.// -->

	</div>

</div><!-- container // -->
</section>



@endsection
