@extends( "delta::app.warranties.layout" )

	@section("body")

		<article class="box box-light">
			<header class="box-header">
				<ul class="nav nav-tabs">
					<li class="nav-item">
						<a href="{{__url('__warranty')}}" class="nav-link">
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

			<section class="box-body">
				<article class="block">
					
					<h4>{{ $org->group }}</h4>

					<table class="table border">
						<thead class="bg-light border-top">
							<tr>
								<th colspan="2" class="px-2 py-1">
									{{__("info.warranty")}}
								</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="py-1 px-2">
									{!! __mdi("calendar") !!} 
									{{__("words.date")}}
								</td>
								<td class="py-1 px-2">{{$warranty->updated_at}}</td>
							</tr>
							<tr>
								<td class="py-1 px-2">
									{!! __mdi("car") !!} NIV
								</td>
								<td class="py-1 px-2">{{$warranty->niv}}</td>
							</tr>
							<tr>
								<td class="py-1 px-2">
									{!! __mdi("account-tie") !!} 
									{{__("words.customer")}}
								</td>
								<td class="py-1 px-2">{{$warranty->customer}}</td>
							</tr>
							<tr>
								<td class="py-1 px-2">
									{!! __mdi("cellphone") !!} 
									{{__("words.cellphone")}}
								</td>
								<td class="py-1 px-2">{{$warranty->cellphone}}</td>
							</tr>
							<tr>
								<td class="py-1 px-2">
									{!! __mdi("email-outline") !!} 
									{{__("words.email")}}
								</td>
								<td class="py-1 px-2">{{$warranty->email}}</td>
							</tr>
							<tr>
								<td class="py-1 px-2">
									{!! __mdi("map-marker-outline") !!} 
									{{__("words.address")}}
								</td>
								<td class="py-1 px-2">{{$warranty->address}}</td>
							</tr>
							<tr>
								<td class="py-1 px-2">
									{!! __mdi("map-marker-radius-outline") !!} 
									{{__("words.sector")}}
								</td>
								<td class="py-1 px-2">{{$warranty->sector}}</td>
							</tr>
						</tbody>
					</table>
				</article>
			</section>
		</article>
	@endsection