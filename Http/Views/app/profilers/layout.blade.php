@extends( $skin->path("single") )

	@section("nav")

	{!! __nav([
		"index"		=> 8,
		"filters" 	=> [
			"node0" => "nav flex-column"
		],
		"items" => [
			[
				"icon" 	=> "home",
				"label" => "words.home",
				"url"	=> "__profile"
			],
			[
				"icon" 	=> "account-edit",
				"label" => "account.update",
				"url"	=> "__profile/update/account"
			],
			[
				"icon" 	=> "key",
				"label" => "update.password",
				"url"	=> "__profile/update/password"
			],			
			[
				"icon" => "cog",
				"label" => "words.config",
				"url"	=> "__profile/config"
			],
		]
	]) !!}
	@endsection

	@section("body")
		<header class="p-3">
			<article class="row">
				<div class="col-auto p-0">
					<img src="{{__url($user->avatar)}}" 
						class="avatar avatar-80px" 
						alt="@">
				</div>
				<div class="col-auto pt-3">
					<h4 class="m-0">{{$user->publicname}}</h4>
					<small>{{$user->email}}</small>
				</div>
			</article>
			
		</header>

		@yield("content")

	@endsection