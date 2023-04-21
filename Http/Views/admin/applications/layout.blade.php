@extends( $skin->path("landing") )

	@section("body")

		<header class="row mb-3">

			<h4>
				<span class="mdi mdi-application-braces"></span>
				{{__("words.aplications")}}
			</h4>	
			
		</header>	

		@yield("content", "Conten Apps")

	@endsection