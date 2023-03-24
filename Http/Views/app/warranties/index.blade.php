@extends( "delta::app.warranties.layout" )


	@section("body")

	<header class="p-3">
		<article class="row">
			<div class="col-auto">
				<img src="{{__url($user->avatar)}}" 
					class="avatar avatar-circle avatar-80px" 
					alt="@">
			</div>
			<div class="col-auto pt-3">
				<h4 class="m-0">{{$user->publicname}}</h4>
				<small>{{$user->email}}</small>
			</div>
		</article>
		
	</header>
	@endsection