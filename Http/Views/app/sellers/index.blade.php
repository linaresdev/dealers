@extends( "delta::app.sellers.layout" )

	@section("body")

	{!! Alert::tag("system") !!}
	
	<article class="box box-light">

		<header class="box-header">
			<h4>{{__("words.dealer")}}</h4>
		</header>

		<section class="box-body">
			<article class="block">
				<a href="{{__url("seller/register")}}" 
					class="btn btn-primary btn-sm">
					{!! __mdi("storefront-plus") !!}
					{!! __("dealer.new") !!}
				</a>
			</article>

			<table class="table">
				<thead>
					<tr>
						<th class="ftool"><input type="checkbox"></th>
						<th>{{__("words.name")}}</th>
						<th>{{__("words.phone")}}</th>
						<th>{{__("words.email")}}</th>
						<th class="action">{{__("words.actions")}}</th>
					</tr>
				</thead>
				<tbody>
					@foreach( $dealers as $dealer)
					<tr>
						<td class="ftool"><input type="checkbox"></td>

						<td>
							<a href="{{__url('seller/entity/'.$dealer->id)}}" 
								class="bt">
								<img src="{{__url($dealer->getMeta("logo"))}}" 
									alt="@"
									class="avatar avatar-circle my-1"					
									style="width: 36px; height: 36px;">
								{{$dealer->group}}
							</a>
						</td>

						<td>{{$dealer->getMeta("phone")}}</td>
						<td>{{$dealer->getMeta("email")}}</td>

						<td class="action">

							<div class="dropdown dropstart">

								<a href="#" class="dropdown-toggle" 
									data-bs-toggle="dropdown">
									{!! __mdi("progress-wrench mdi-action") !!}
								</a>

								<div class="dropdown-menu headering">
									<div class="dropdown-header">
										{!! __mdi("storefront-outline") !!}
										{{$dealer->group}}
									</div>
									<a href="{{__url('seller/update/'.$dealer->id)}}" 
										class="dropdown-item">
										{{__("account.update")}}
									</a>
									<a href="{{__url('seller/update/'.$dealer->id.'/logo')}}" class="dropdown-item">
										{{__("update.logo")}}
									</a>

									<div class="dropdown-header">
										{!! __mdi("cog") !!}
										{{__("words.manager")}}
									</div>
									<a href="{{__url('seller/'.$dealer->id.'/users')}}" class="dropdown-item">
										{{__("words.users")}}
									</a>
								</div>
							</div>

						</td>
					</tr>
					@endforeach
				</tbody>
			</table>

		</section>
	</article>
	@endsection