<header class="section-header">


<section class="header-main">
	<div class="container">
<div class="row align-items-center">
	<div class="col-lg-5-24 col-sm-5 col-4">
		<div class="brand-wrap">
      <a href="/">
  			{{-- <img class="logo" src="ui-ecommerce/images/logo-dark.png"> --}}
        <img class="logo" src="{{ asset('img/_logo.png')}}">
  			<h2 class="logo-text" style="color:#e3342f; font-weight:700; text-shadow: 1px 1px 1px red;">{{ env('APP_NAME', 'PromoApp')}}</h2>
      </a>
    </div> <!-- brand-wrap.// -->
	</div>
	
	<div class="col-lg-18-24 col-sm-7 col-8  order-2  order-lg-3">
		<div class="d-flex justify-content-end ">
			<div class="widget-header">

        @guest
          <small class="title text-muted">Hello!</small>
        @else
          <small class="title text-muted">Hello {{ Auth::user()->full_name }}!</small>
        @endguest

				<div>
            @guest
              <a href="{{ url('login')}}">Sign in</a> <span class="dark-transp"> | </span>
				      <a href="{{ url('register')}}"> Register</a>

            @else
              <a href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
            @endguest

        </div>


			</div>

      @if (Auth::check())
      <a href="#" class="widget-header pl-3 ml-3">
				<div class="icontext">
					<div class="icon-wrap icon-sm round border"><i class="fa fa-envelope"></i></div>
				</div>
				<span class="badge badge-pill badge-danger notify">0</span>
			</a>
      <a href="{{route('myproduct')}}" class="widget-header pl-3 ml-3">
				<div class="icontext">
					<div class="icon-wrap icon-sm round border"><i class="fa fa-folder-open" aria-hidden="true"></i></div>
				</div>
				<span class="badge badge-pill badge-danger notify">0</span>
			</a>
      @endif


			<a href="{{ route('cart') }}" class="widget-header pl-3 ml-3">
				<div class="icontext">
					<div class="icon-wrap icon-sm round border"><i class="fa fa-shopping-cart"></i></div>
				</div>
        @if(Auth::user())
				<span class="badge badge-pill badge-danger notify">{{Cart::session(Auth::user()->id)->getContent()->count()}}</span>
        @else
        <span class="badge badge-pill badge-danger notify">{{Cart::getContent()->count()}}</span>
        @endif
      </a>
		</div> <!-- widgets-wrap.// -->
	</div> <!-- col.// -->
</div> <!-- row.// -->
	</div> <!-- container.// -->
</section> <!-- header-main .// -->
</header> <!-- section-header.// -->



