@extends("delta::admin.domains.organization.layout")

	@section("content")

	{{-- <article class="box box-light">
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
					<a href="{{__url('__entity')}}" 
						class="nav-link pt-2 pb-1">
						{!! __mdi("shield-account") !!}
						{{__("words.authorize")}}
					</a>
				</li>
				<li class="nav-item">
					<a href="{{__url('__now')}}" 
						class="nav-link pt-2 pb-1 active">
						{!! __mdi("key") !!}
						{{__("words.".$group->slug)}}
					</a>
				</li>
			</ul>
		</header> --}}

		<section class="">
			<article class="block">
				<h4>{{__("words.users")}}</h4>

				<form class="mb-3" action="{{__url('__now/add-user')}}" method="POST">
					@csrf

					<div class="input-group">
						<input type="text" 
							name="src"
							list="users"
							value="{{old("src")}}" 
							class="form-control"
							placeholder="{{__("search.users")}}" 
							onkeyup="sourceUser(this)">

						<button class="btn btn-secondary" 
								type="submit">
							{!! __mdi("plus-thick") !!}
							{{__("words.add")}}
						</button>
					</div>

					<datalist id="users"></datalist>
				</form>
				
			</article>

			<article class="block">
				<table class="table table-hover">
					<thead>
						<tr>
							<th class="ftool">
								<input type="checkbox" 
									onchange="allChecked(this)">
							</th>
							<th>{{__("words.name")}}</th>
							<th>{{__("words.email")}}</th>
							<th class="action">{{__("words.actions")}}</th>
						</tr>
					</thead>

					@if( !empty( ($users = $group->users) ) )
					<form action="#">
						<tbody>
							@foreach( $users as $user)						
							<tr>
								<td class="ftool">
									<input type="checkbox"
										class="ucheck">
								</td>
								<td>{{$user->fullname}}</td>
								<td>{{$user->email}}</td>
								<td class="action">
									<div class="dropdown dropstart">				
										<a href="#" class="dropdown-toggle" 
											data-bs-toggle="dropdown">
											{!! __mdi("progress-wrench mdi-action") !!}
										</a>

										<div class="dropdown-menu">

											<a href="{{__url('__now/detach/'.$user->id)}}" 
												class="dropdown-item">
												{!! __mdi("trash-can-outline") !!}
												{{__("group.remove")}}
											</a>
											<div class="dropdown-header ps-2">
												{{__("words.authorize")}}
											</div>
											<a href="{{__url('__toggle/'.$user->id."/view")}}" 
												class="dropdown-item">
												{!! $checkbox($rol($user)->view) !!}
												{{__("words.view")}}
											</a>

											<a href="{{__url('__toggle/'.$user->id."/insert")}}" 
												class="dropdown-item">
												{!! $checkbox($rol($user)->insert) !!}
												{{__("words.insert")}}
											</a>

											<a href="{{__url('__toggle/'.$user->id."/update")}}" 
												class="dropdown-item">
												{!! $checkbox($rol($user)->update) !!}
												{{__("words.update")}}
											</a>

											<a href="{{__url('__toggle/'.$user->id."/delete")}}" 
												class="dropdown-item">

												{!! $checkbox($rol($user)->delete) !!}
												{{__("words.delete")}}
											</a>
										</div>
									</div>
								</td>
							</tr>
							@endforeach
						</tbody>
					</form>
					@else
					<tr>
						<td colspan="4" class="p-2 text-center"> 
							{{ __("content.empty") }}
						</td>
					</tr>
					@endif
				</table>
			</article>
	

	@endsection

	@section("js")
		@parent<script type="text/javascript">

			function allChecked( e ) {

				var ucheck = document.querySelectorAll(".ucheck");
				if(e.checked) {
					for (var i=0; i < ucheck.length; i++ ) {
						ucheck[i].checked = true;
					}
				}
				else {
					for (var i=0; i < ucheck.length; i++ ) {
						ucheck[i].checked = false;
					}
				}
			}

			function sourceUser( inp ) {
				console.log("{{__url('__now/search')}}");

				if( inp.value.length > 0 ) {
					var url 	= "{{__url('__now/search')}}",
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