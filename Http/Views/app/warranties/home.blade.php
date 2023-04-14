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

					<li class="nav-item">
						<a href="{{__url('__warranty/search')}}" class="nav-link">
							{{__("words.search")}}
						</a>
					</li>
				</ul>
				
			</header>

			<article class="box-body">

				<div class="block">
					<input type="text" class="form-control">
				</div>
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
					<tbody>
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
								{!! __mdi("satellite-uplink mdi-18px") !!}
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
										@if($warranty->state == 0)
										<a href="#" class="dropdown-item">
											{{__("words.activate")}}
										</a>
										<a href="#" class="dropdown-item">
											{{__("words.delete")}}
										</a>
										@endif
									</div>
								</div>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>

				<div class="p-2"></div>
			</article>
		</section>

	@endsection

	@section("js")
		@parent<script>

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