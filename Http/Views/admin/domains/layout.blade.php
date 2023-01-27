@extends( $skin->path("admin") )

	@section("nav")

		{!! Menu::tag("adminnav") !!}
	@endsection

	@section("body")

	<h4>{!! __icon($brand) !!} {{$title}}</h4>

	@yield("content")

	@endsection