@extends( $skin->path("page") )

	@section("body")

		<header class="mb-3 mt-4">
			<h4>
				{!! __mdi("storefront-outline") !!}
				{{__("words.dealers")}}
			</h4>			

			{!! Alert::tag("system") !!}
		</header>

		<article class="box box-light">
			<header class="box-header">
				<nav class="nav nav-tabs">
					<li class="nav-item">
						<a href="{{__url('seller')}}" 
							class="nav-link{{$isOn("seller")}}">
							{{__("words.home")}}
						</a>
					</li>
					<li class="nav-item">
						<a href="{{__url('seller/account')}}" 
							class="nav-link{{$isOn("seller/account")}}">
							{{__("words.users")}}
						</a>
					</li>
					<li class="nav-item">
						<a href="#" class="nav-link">Link 2</a>
					</li>
				</nav>
			</header>

			<section class="box-body">
				
				@yield("content", "Empty Content")

			</section>
		</article>
	@endsection