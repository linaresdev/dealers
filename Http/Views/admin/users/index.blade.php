
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

				<article class="px-3">
					{!! Alert::tag("system") !!}
				</article>

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

								<td>
									<div class="dropdown dropstart dropdown-text">
										<a href="#" class="dropdown-toggle btn btn-sm btn-light py-0 px-1 border-0" 
											data-bs-toggle="dropdown">
											{{ __("user.state.".$user->activated) }}
										</a>
										<div class="dropdown-menu">
											<div class="dropdown-header">
												{{$user->fullname}}
											</div>
											<a href="{{__url('__users/set/'.$user->id."/0")}}" class="dropdown-item ps-4">
												@if($user->activated == 0)
												{!! __mdi("checkbox-marked-circle-outline") !!}
												{{__("auth.0")}}
												@else
												{!! __mdi("checkbox-blank-circle-outline") !!}
												{{__("words.disable")}}
												@endif
											</a>
											<a href="{{__url('__users/set/'.$user->id."/1")}}" class="dropdown-item ps-4">
												@if($user->activated == 1)
												{!! __mdi("checkbox-marked-circle-outline") !!}
												{{__("auth.1")}}
												@else
												{!! __mdi("checkbox-blank-circle-outline") !!}
												{{__("words.activate")}}
												@endif
												
											</a>
											<a href="{{__url('__users/set/'.$user->id."/2")}}" class="dropdown-item ps-4">
												@if($user->activated == 2)
												{!! __mdi("checkbox-marked-circle-outline") !!}
												{{__("auth.2")}}
												@else
												{!! __mdi("checkbox-blank-circle-outline") !!}
												{{__("words.block")}}
												@endif												
											</a>
										</div>
								</td>
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
												class="dropdown-item ps-4">
												{{__("edit.credentials")}}
											</a>
											<a href="{{__url("__users/$user->id/update/password")}}" 
												class="dropdown-item ps-4">
												{{__("edit.password")}}
											</a>
											<a href="{{__url("__users/$user->id/password/expired")}}" 
												class="dropdown-item ps-4">
												{{__("request.edit-password")}}
											</a>
											<a href="{{__url("__users/update/$user->id/send/password-reset")}}" 
												class="dropdown-item ps-4">
												{{__("send.edit-password")}}
											</a>

											<div class="dropdown-header">
												{!! __mdi("account-group") !!}
												{{ __("user.groups") }}
											</div>
											<a href="{{__url("__groups/$user->id")}}" 
												class="dropdown-item ps-4">
												{{__("admin.groups")}}
											</a>

											<div class="dropdown-header">
												{!! __mdi("shield-account") !!}
												{{ __("words.security") }}
											</div>
											<a href="{{__url("__groups/$user->id")}}" 
												class="dropdown-item ps-4">
												{{__("words.access")}}
											</a>
											<a href="{{__url("__users/$user->id/delete")}}" 
												class="btn btn-outline-danger btn-sm d-block mx-2 text-start ps-3">
												{{__("words.delete")}}
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