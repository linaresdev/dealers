@extends( "delta::app.sellers.entities.layout" )
	
	@section("content")

	<article class="box box-light">

		<header class="box-header">
			<h4>{{__("words.users")}}</h4>
		</header>

		<section class="box-body">			

			<article class="block">
				
				<table class="table">
					<thead>
						<tr>
							<th class="ftool">
								<input type="checkbox">
							</th>
							<th>{{__("words.name")}}</th>
							<th>{{__("words.email")}}</th>
							<th class="action">{{__("words.actions")}}</th>
						</tr>
					</thead>

					<tbody>
						@foreach($users as $user)
						<tr>
							<td class="ftool">
								<input type="checkbox">
							</td>

							<td>
								<a href="{{__url('__user/'.$user->id)}}" class="bt">
									<img src="{{__url($user->avatar)}}" 
										class="avatar my-1" 
										style="width: 32px;"
										alt="">
									{{$user->fullname}}
								</a>
							</td>
							<td>
								{{$user->email}}
							</td>

							<td class="action">
								<div class="dropdown dropstart">
									<a href="#" class="dropdown-toggle" 
										data-bs-toggle="dropdown">
										{!! __mdi("progress-wrench mdi-action") !!}
									</a>

									<div class="dropdown-menu headering">

										<a href="{{__url('__user/'.$user->id)}}" 
											class="dropdown-item">
											{!! __mdi("account-circle") !!}
											{{__("words.information")}}
										</a>

										<a href="{{__url('__user/'.$user->id."/rol")}}" 
											class="dropdown-item">
											{!! __mdi("key") !!}
											{{__("words.authorize")}}
										</a>

										<div class="dropdown-divider"></div>
										<a href="{{__url('__entity/users/detach/'.$user->id)}}" 
											class="dropdown-item text-danger">
											{!! __mdi("account-remove") !!}
											{{__("account.remove")}}
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