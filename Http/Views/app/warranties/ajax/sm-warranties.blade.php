		
		
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

				<table class="table">
					<thead class="bg-light border-top">
						<tr>
							<th style="padding-left: 10px; width: 90px;">NIV</th>
							<th>{{__("words.customer")}}</th>
							<th class="action">
								{{__("words.actions")}}
							</th>
						</tr>
					</thead>

					<tbody>
						@foreach( $warranties as $warranty )
						<tr>
							<td style="padding-left: 10px; width: 90px;">{{$warranty->niv}}</td>
							<td>{{$warranty->customer}}</td>
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