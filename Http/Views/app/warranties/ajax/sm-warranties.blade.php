		
		
		<section class="box box-light">

			<header class="box-header">
				<ul class="nav nav-tabs">
					<li class="nav-item">
						<a href="{{__url('__warranty')}}" class="nav-link active">
							{{__("words.home")}}
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

				<table class="table table-hover">

					<thead class="bg-light border-top">
						<tr>
							<th class="py-1" style="padding-left: 10px; width: 90px;">NIV</th>
							<th class="py-1">{{__("words.customer")}}</th>
							<th class="py-1">{{ __("words.state") }}</th>
							<th class="action py-1">
								{{__("words.actions")}}
							</th>
						</tr>
					</thead>

					<tbody>
						@foreach( $warranties as $warranty )
						<tr>
							<td class="py-1" style="padding-left: 10px; width: 90px;">
								{{$warranty->niv}}
							</td>
							<td>{{$warranty->customer}}</td>
							<td class="uplink-{{$warranty->state}} py-1">
								{!! __mdi("satellite-uplink mdi-18px") !!}			
							</td>
							<td class="action py-1">
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