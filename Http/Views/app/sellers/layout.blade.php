@extends( $skin->path("single") )

	@section("nav")

	{!! Menu::tag("seller") !!}

	@endsection

	@section("body")

		<header class="mb-3">
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
				</nav>
			</header>

			<section class="box-body">

				@yield("content", "Sin Contenido")

			</section>
		</article>

		
	@endsection

	@section("aside")

	<div class="mx-3 mt-3 p-3 border rounded text-center fw-lighter">
		Empty Data
	</div>

	<div class="mx-3 mt-3 p-3 border rounded text-center fw-lighter">

		Lorem ipsum dolor sit amet consectetur adipisicing elit. Non provident, aperiam, hic voluptates pariatur ea quia odit ducimus? Inventore minima eaque quae corporis, tempore maxime alias, rem illum natus officia.
		
	</div>
	
	@endsection