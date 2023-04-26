@extends( "delta::app.sellers.layout" )


	@section("body")

	{!! Alert::tag("system") !!}	

	<article class="box box-light">

		<header class="box-header">
			<h4>
				<a href="{{__url('__entity')}}">
					<img src="{{__url($ent->getMeta("logo"))}}" 
						style="width: 48px; height:46px;"
						class="avatar avatar-circle" 
						alt="@">
					{{$ent->group}}
				</a>
			</h4>
		</header>

		<ul class="nav box-nav">
			<li class="nav-item">
				<a href="{{__url('seller')}}" class="nav-link">
					{!! __mdi("home") !!} 
					{{__("words.home")}}
				</a>
			</li>

			<li class="nav-item dropdown">

				<a class="nav-link dropdown-toggle" 
					data-bs-toggle="dropdown" 
					href="#" role="button" 
					aria-expanded="false">
					{!! __mdi("account-circle") !!}
					{{__("words.users")}} 
				</a>

				<div class="dropdown-menu">
					<a href="{{__url("__user")}}" class="dropdown-item">
						{!! __mdi("account-group") !!}
						{{__("user.ongroup")}}  
					</a>
					<a href="{{__url("__user/add")}}" 
						class="dropdown-item">
						{!! __mdi("plus-thick") !!}
						{{__("user.add")}} 
					</a>
					<a href="{{__url("__user/register")}}" 
						class="dropdown-item">
						{!! __mdi("new-box") !!}
						{{__("user.new")}} 
					</a>
					<a href="{{__url("__user/send/register")}}" 
						class="dropdown-item">
						{!! __mdi("send") !!}
						{{__("register.sendmail")}} 
					</a>
				</div>
			</li>
		</ul>
	</article>

	@yield("content", "Empty Data")

	@endsection