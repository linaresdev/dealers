@extends("delta::admin.domains.layout")

	@section("content")

	<article class="box box-light">
		<header class="box-header">
			@includeIF("delta::admin.domains.organization.partial.nav")
		</header>

		<section class="box-body">
			<article class="block">

				<section class="row">
					<article class="col-6 bx">

						<h4 class="bx-title">{{__("words.users")}}</h4>

						<form action="#" class="bx-form">
							<div class="input-group">
								<input type="text" 
									list="users" 
									class="form-control"
									placeholder="{{__("search.user")}} .."
									onkeyup="sourceUser(this)">

									<datalist id="users" onchange="loadUser(this)">
									</datalist>

								<button class="btn btn-secondary" type="submit">
									{!! __mdi("plus-thick") !!}
								</button>
							</div>
						</form>

						<ul class="nav nav-bx">
							@foreach( $org->users as $user )
							<li class="nav-item">
								<a href="{{__url('__now?user='.$user->id)}}" class="nav-link">
									<img src="{{__url($user->avatar)}}" 
										class="avatar avatar-circle avatar-36px" 
										alt="@">
									{{$user->fullname}}
								</a>
							</li>
							@endforeach							
						</ul>
					</article>

					<article class="col-6">
					@if(isset($rol) )
						<h4>{{$user->fullname}}</h4>
						<p class="m-0">Permisos </p>
						<div class="linkcheck ms-3">
							<a href="#">
								{!! __mdi("checkbox-blank-outline") !!}
								{{__("words.view")}}
							</a>
							<a href="#">
								{!! __mdi("checkbox-blank-outline") !!}
								{{__("words.insert")}}
							</a>
							<a href="#">
								{!! __mdi("checkbox-blank-outline") !!}
								{{__("words.update")}}
							</a>
							<a href="#">
								{!! __mdi("checkbox-blank-outline") !!}
								{{__("words.delete")}}
							</a>
						</div>
					@endif
					</article>
				</section>
			</article>

		</section>
	</article>
	@endsection

	@section("js")
		@parent <script type="text/javascript">

			function sourceUser( inp ) {
				if( inp.value.length > 0 ) {
					var url 	= "{{__url('__organization/'.$org->slug.'/users')}}",
						url 	= url+"/"+inp.value,
						query 	= query = fetch(url, {method:"get"});

						query = query.then((response) => response.text());

						query.then((data) => {
							document.getElementById("users").innerHTML = data;
						});	
				}
			}

			document.querySelector("datalist").addEventListener("onchange", function(e){
				console.log(e);
			});
		</script>
	@endsection