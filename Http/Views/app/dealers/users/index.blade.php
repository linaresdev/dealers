@extends( "delta::app.dealers.layout" )
	
	@section("body")

	<h4>
		<img src="{{__url($dealer->getMeta("logo"))}}" 
			alt="@"
			class="avatar avatar-circle my-1"				
			style="width: 36px; height: 36px;">
		{{$dealer->group}}
	</h4>

	{!! Alert::tag("system") !!}

	<article class="box box-light">

		<header class="box-header">
			<h4>{{__("words.users")}}</h4>
		</header>

		<section class="box-body">

			<article class="block">
				<div class="row">
					<div class="col-lg-7">
						<div class="btn-group">
							<a href="{{__url('__user/register')}}" 
								class="btn btn-outline-primary btn-sm">
								{!! __mdi('account-supervisor-circle-outline') !!}
								{{__("words.new")}}		
							</a>
							<a href="{{__url('__user/addsendmail')}}" 
								class="btn btn-outline-primary btn-sm">
								{!! __mdi("account-arrow-right") !!}
								{{__("words.upload")}}
							</a>
							<a href="#" class="btn btn-outline-primary btn-sm">
								{!! __mdi("account-plus") !!}
								{{__("words.add")}}
							</a>
						</div>
					</div>

					<div class="col-lg-5">
						<div class="form-group">
							<input type="text" class="form-control">
						</div>
					</div>
				</div>
			</article>

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

										<div class="dropdown-header">
											{{__("words.mantenance")}}
										</div>
										<a href="{{__url('__user/'.$user->id)}}" class="dropdown-item">
											{!! __mdi("account-circle") !!}
											{{__("words.information")}}
										</a>
										<a href="#" class="dropdown-item">
											{!! __mdi("pencil") !!}
											{{__("account.update")}}
										</a>
										<a href="#" class="dropdown-item">
											{!! __mdi("account-remove") !!}
											{{__("account.remove")}}
										</a>

										<div class="dropdown-header">
											{!! __mdi("key") !!}
											{{__("words.rols")}}
										</div>
										<a href="#" class="dropdown-item">
											{!! __mdi("radiobox-blank") !!}
											{{__("words.see")}}
										</a>
										<a href="#" class="dropdown-item">
											{!! __mdi("radiobox-blank") !!}
											{{__("words.insert")}}
										</a>
										<a href="#" class="dropdown-item">
											{!! __mdi("radiobox-blank") !!}
											{{__("words.update")}}
										</a>
										<a href="#" class="dropdown-item">
											{!! __mdi("radiobox-blank") !!}
											{{__("words.delete")}}
										</a>

										<div class="dropdown-header">
											{!! __mdi("shield-account") !!}
											{{__("words.security")}}
										</div>
										<a href="#" class="dropdown-item">
											{{__("words.information")}}
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