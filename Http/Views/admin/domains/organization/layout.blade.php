@extends( $skin->path("admin") )

	@section("nav")

		{!! Menu::tag("adminnav") !!}
	@endsection

	@section("body")

	<h4>{!! __icon($brand) !!} {{$title}}</h4>

	<article class="box box-light">

		<header class="box-header">
			<ul class="nav nav-tabs">
				<li class="nav-item">
					<a href="{{__url('__organization')}}" 
						class="nav-link pt-2 pb-1">
						{!! __mdi("home") !!}
						{{__("words.home")}}
					</a>
				</li>
				<li class="nav-item">
					<a href="{{__url('__entity/users')}}" 
						class="nav-link pt-2 pb-1{{$isOn("users")}}">
						{!! __mdi("shield-account") !!}
						{{__("words.users")}}
					</a>
				</li>
				<li class="nav-item">
					<a href="{{__url('__entity/rol')}}" 
						class="nav-link pt-2 pb-1{{$isOn("rol")}}">
						{!! __mdi("key") !!}
						{{__("words.authorize")}}
					</a>
				</li>
			</ul>
		</header>

		<section class="box-body">

			@yield("content")
		</section>
	</article>

	@endsection