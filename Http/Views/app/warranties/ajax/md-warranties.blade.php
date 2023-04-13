		
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
				<table class="table">
					<thead class="bg-light border-top">
						<tr>
							<th class="ftool">
								<input type="checkbox">
							</th>
							<th>NIV</th>
							<th>{{__("words.customer")}}</th>
							<th>{{ __("words.date") }}</th>
							<th class="action">
								{{__("words.actions")}}
							</th>
						</tr>
					</thead>
					<tbody>
						@foreach( $warranties as $warranty )
						<tr>
							<td class="ftool">
								<input type="checkbox">
							</td>
							<td>{{$warranty->niv}}</td>
							<td>{{$warranty->customer}}</td>
							<td>{{$warranty->date}}</td>
							<td class="action">
								<div class="dropdown dropstart">
									<a href="#" class="dropdown-toggle" 
										data-bs-toggle="dropdown">
										{!! __mdi("progress-wrench mdi-action") !!}
									</a>

									<div class="dropdown-menu">
										<a href="#" class="dropdown-item">
											Link
										</a>
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
			