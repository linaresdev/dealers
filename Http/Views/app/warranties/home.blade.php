@extends( "delta::app.warranties.layout" )

	@section("body")

		<header class="py-3">

			<article class="row">
				<div class="col-auto">
					<img src="{{__url($org->getMeta("logo"))}}" 
						class="avatar avatar-circle avatar-80px" 
						alt="@">
				</div>
				<div class="col-auto pt-3">
					<h4 class="m-0">{{$org->group}}</h4>
					<small>{{$org->getMeta("email")}}</small>
				</div>
			</article>
			
		</header>
		

		<section class="box box-light">
			<header class="box-header">
				<ul class="nav nav-tabs">
					<li class="nav-item">
						<a href="{{__url('__warranty')}}" class="nav-link active">
							{{__("words.warranties")}}
						</a>
					</li>
					<li class="nav-item">
						<a href="{{__url('__warranty/add')}}" class="nav-link">
							{{__("warranty.add")}}
						</a>
					</li>
				</ul>
				
			</header>

			<article class="box-body">				

				<div class="block">
					<div class="input-group">
						<input type="text" 
							class="form-control"
							placeholder="{{__("filter.by")}}: {{__("words.$filter")}}" 
							onkeyup="queryItem(this)">
						<button class="btn 
										btn-secondary 
										dropdown-toggle" 
								data-bs-toggle="dropdown">
							{!! __mdi("filter") !!}
						</button>
						<div class="dropdown-menu dropdown-menu-end">
							<a href="{{__url('__warranty/filter/niv')}}" class="dropdown-item">
								@if($filter == "niv" )
								{!! __mdi("checkbox-outline") !!}
								@else
								{!! __mdi("checkbox-blank-outline") !!}
								@endif
								NIV
							</a>
							<a href="{{__url('__warranty/filter/rnc')}}" class="dropdown-item">
								@if($filter == "rnc" )
								{!! __mdi("checkbox-outline") !!}
								@else
								{!! __mdi("checkbox-blank-outline") !!}
								@endif
								RNC
							</a>
							<a href="{{__url('__warranty/filter/customer')}}" class="dropdown-item">
								@if($filter == "customer" )
								{!! __mdi("checkbox-outline") !!}
								@else
								{!! __mdi("checkbox-blank-outline") !!}
								@endif
								{{__('words.customer')}}
							</a>
						</div>
						
					</div>					
				</div>

				@if( $warrantyCount > 1)
				<div class="block">
					<span class="badge text-bg-secondary">
						{{$warrantyCount}}
					</span>
					registros a la fecha.
				</div>
				@endif
				
				<table class="table table-hover">
					<thead class="bg-light border-top">
						<tr>
							<th class="py-1 px-2">NIV</th>
							<th class="py-1">{{__("words.customer")}}</th>
							<th class="py-1 center">{{ __("words.state") }}</th>
							<th class="action py-1">
								{{__("words.actions")}}
							</th>
						</tr>
					</thead>
					<tbody id="itemsource">
						@if(!empty($warranties))
						@foreach( $warranties as $warranty )
						<tr>
							<td class="py-1 px-2">
								<a href="{{__url('__warranty/show/'.$warranty->id)}}" 
											class="dropdown-item">
									{{$warranty->niv}}
								</a>
							</td>
							<td>{{$warranty->customer}}</td>
							<td class="uplink-{{$warranty->state}} py-1 center">
								@if( $warranty->state == 0 )
								{!! __mdi("pause-circle-outline mdi-18px") !!}
								@elseif( $warranty->state == 1 )
								{!! __mdi("satellite-uplink mdi-18px") !!}
								@elseif( $warranty->state == 2 )
								{!! __mdi("check mdi-18px") !!}
								@elseif( $warranty->state == 3 )
								{!! __mdi("bell-alert-outline mdi-18px") !!}
								@endif
								<span class="toggled-sm">
									{{__("seller.state.$warranty->state")}}
								</span>
							</td>
							<td class="action">
								<div class="dropdown dropstart">
									<a href="#" class="dropdown-toggle" 
										data-bs-toggle="dropdown">
										{!! __mdi("progress-wrench mdi-action") !!}
									</a>

									<div class="dropdown-menu">
										<a href="{{__url('__warranty/show/'.$warranty->id)}}" 
											class="dropdown-item">
											{{__("words.information")}}
										</a>
										@if(($warranty->state == 0) OR ($warranty->state == 3))
										<a href="{{__url('__warranty/activate/'.$warranty->id)}}" 
											class="dropdown-item">
											{{__("words.activate")}}
										</a>
										<a href="{{__url('__warranty/delete/'.$warranty->id)}}" class="dropdown-item">
											{{__("words.delete")}}
										</a>
										@endif
									</div>
								</div>
							</td>
						</tr>
						@endforeach						
						@endif
					</tbody>
				</table>
				
				<div class="p-2"></div>
			</article>
		</section>

	@endsection

	@section("js")
		@parent<script>

			function queryItem( inp ) {
				jQuery.get("{{__url('__warranty/search')}}/"+inp.value, function(data) {
					jQuery("#itemsource").html( data );
				});
			}

			// if( jQuery(window).width() > 575 ) {
			// 	jQuery.get("{{__url('__now/ajax/home/md')}}", function(data) {
			// 		jQuery("#ajax-content").html(data);
			// 	});
			// }
			// else {
			// 	jQuery.get("{{__url('__now/ajax/home/sm')}}", function(data) {
			// 		jQuery("#ajax-content").html(data);
			// 	});
			// }
			
		</script>
	@endsection