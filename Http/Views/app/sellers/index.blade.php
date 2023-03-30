@extends( "delta::app.sellers.layout" )

		@section("content")	

			<article class="block">
				<a href="{{__url("seller/register")}}" 
					class="btn btn-primary btn-sm">
					{!! __mdi("storefront-plus") !!}
					{!! __("dealer.new") !!}
				</a>
			</article>

			<article class="block">				
				<input type="text"
					name="src"
					class="form-control"
					placeholder="{{__("dealer.search")}}"
					onkeyup="srcDealer(this)">				
			</article>

			<table class="table">
				<thead class="bg-light border-top">
					<tr>
						<th class="ftool py-2"><input type="checkbox"></th>
						<th class="py-2">{{__("words.name")}}</th>
						<th class="py-2">{{__("words.phone")}}</th>
						<th class="py-2">{{__("words.email")}}</th>
						<th class="action py-2">{{__("words.actions")}}</th>
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

									<a href="{{__url('seller/delete/'.$dealer->id)}}" 
										class="dropdown-item">
										{{__("words.delete")}}
									</a>
								</div>
							</div>

						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			<article class="block"></article>

		
		@endsection

	@section("js")
		@parent <script type="text/javascript">
			function srcDealer(src) {

				let data = src.value;

				if( data.length > 0 ) {
					jQuery.get("{{__url('__now/search')}}/"+data, function( calback ){
						jQuery("tbody").html( calback );
					});					
				}
			}
		</script>
	@endsection