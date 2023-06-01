
@extends("delta::admin.layout")

	@section("body")

		<h4>{{$title}}</h4>

		<article class="box box-light">
			<header class="box-header p-3">
				<div class="input-group">
					<button class="btn btn-secondary dropdown-toggle" 
							type="button"
							data-bs-toggle="dropdown">
						{!! __icon("mdi-filter")!!}
					</button>
					<div class="dropdown-menu">

						<div class="dropdown-header">
							{{__("filter.by")}} :
						</div>

						@foreach( $optfilters as $find => $label )
						<a href="{{__url( '__admin/users/config/users-filter/'.$find )}}" class="dropdown-item">
							{!! __mdi("checkbox-blank-outline") !!} {{ $label }}
						</a>
						@endforeach
					</div>

					<input type="text" 
						placeholder="{{__('words.finder')}}.." 
						class="form-control">	


					<span class="input-group-text">						
					</span>				
				</div>
			</header>
		</article>

		<article class="box box-light">
			<header class="box-header">
				<div class="btn-group">
					<a href="{{__url("__users/register")}}" 
						class="btn btn-outline-secondary btn-sm">
						{!! __mdi("account-plus") !!} {{__("user.new")}}
					</a>
					<a href="{{__url('__groups/')}}" class="btn btn-outline-secondary btn-sm">
						{!! __mdi("account-group") !!} 
						{{__("words.groups")}}
					</a>					
				</div>
			</header>

			<section class="box-body">
				<article class="pb-3">
					<table class="table">
						<thead>
							<tr>
								<th class="ftool">
									<input type="checkbox" 
										class="monitor">
								</th>
								<th>{{__("words.name")}}</th>
								<th>{{__("last.access")}}</th>
								<th>{{__("words.state")}}</th>
								<th class="action">{{__("words.actions")}}</th>
							</tr>
						</thead>

						<tbody>
							@foreach($users as $user)
							<tr>
								<td class="ftool">
									<input type="checkbox" 
										class="ui{{$user->id}}">
								</td>

								<td>{{$user->fullname}}</td>

								<td>--</td>

								<td>{{ __("user.state.".$user->activated) }}</td>
								<td class="action">
									<div class="dropdown dropstart">
										<a href="#" class="dropdown-toggle" 
											data-bs-toggle="dropdown">
											{!! __mdi("progress-wrench mdi-action") !!}
										</a>

										<div class="dropdown-menu">
											<div class="dropdown-header">
												{!! __mdi("account-cog") !!}
												{{ __("words.mantenance") }}
											</div>
											<a href="{{__url("__users/$user->id/update/credential")}}" 
												class="dropdown-item ident">
												{{__("edit.credentials")}}
											</a>
											<a href="{{__url("__users/$user->id/update/password")}}" 
												class="dropdown-item ident">
												{{__("edit.password")}}
											</a>
											<a href="{{__url("__users/$user->id/expired/password")}}" 
												class="dropdown-item ident">
												{{__("request.edit-password")}}
											</a>
											<a href="{{__url("__users/update/$user->id/send/password-reset")}}" 
												class="dropdown-item ident">
												{{__("send.edit-password")}}
											</a>

											<div class="dropdown-header">
												{!! __mdi("account-group") !!}
												{{ __("user.groups") }}
											</div>
											<a href="{{__url("__groups/$user->id")}}" 
												class="dropdown-item ident">
												{{__("admin.groups")}}
											</a>

											<div class="dropdown-header">
												{!! __mdi("shield-account") !!}
												{{ __("words.security") }}
											</div>
											<a href="{{__url("__groups/$user->id")}}" 
												class="dropdown-item ident">
												{{__("words.access")}}
											</a>
										</div>
									</div>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					
				</article>
			</section>
		</article>
	@endsection