@extends( $skin->path("single") )

	@section("nav")
	{!! Menu::tag("seller") !!}

	<div class="p-3 mb-3 border rounded text-center fw-lighter bg-light">
		Empty Data
	</div>

	<div class="p-3 mb-2 border rounded text-center fw-lighter bg-light">
		Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat aut, sit quam architecto aliquam odio ex exercitationem, fuga eligendi. Beatae, animi exercitationem saepe doloremque, quas facilis reiciendis explicabo minus voluptas.
	</div>

	@endsection

	@section("body")

		<header class="mb-3">
			<h4>
				{!! __mdi("storefront-outline") !!}
				{{__("words.dealers")}}
			</h4>

			<a href="{{__url("seller/register")}}" 
				class="btn btn-primary btn-sm">
				{!! __mdi("storefront-plus") !!}
				{!! __("dealer.new") !!}
			</a>

			{!! Alert::tag("system") !!}
		</header>

		@yield("content", "Sin Contenido")
	@endsection

	@section("aside")

	<div class="mx-3 mt-3 p-3 border rounded text-center fw-lighter">
		Empty Data
	</div>

	<div class="mx-3 mt-3 p-3 border rounded text-center fw-lighter">

		Lorem ipsum dolor sit amet consectetur adipisicing elit. Non provident, aperiam, hic voluptates pariatur ea quia odit ducimus? Inventore minima eaque quae corporis, tempore maxime alias, rem illum natus officia.
		
	</div>
	
	@endsection