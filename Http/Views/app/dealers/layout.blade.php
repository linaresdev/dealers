@extends( $skin->path("single") )

	@section("nav")

		<div class="usernav">

			<img class="logo" src="{{__url($info->logo)}}" alt="@">

			<ul class="nav flex-column">

				<li class="nav-item">
					<a href="{{__url("dealer/__dealer")}}" class="nav-link"> 
						<i class="mdi mdi-home"></i>
						{{__("words.home")}} 
					</a>					
				</li>
			</ul>
		</div>
	@endsection