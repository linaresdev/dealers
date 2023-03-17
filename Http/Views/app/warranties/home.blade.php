@extends( "delta::app.warranties.layout" )

	@section("body")

	<header class="p-3">
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

	

	<article class="box box-light">

		<header class="pt-3">

			<ul class="nav">
				<li class="nav-item">
					<a href="{{__url("__now/add")}}" class="nav-link">
						{!! __mdi("plus-thick") !!}
						{{__("warranty.add")}}
					</a>
				</li>
			</ul>
			
			<div class="px-3">
				<input type="text"
					name="src" 
					class="form-control"
					placeholder="{{__("filter.warranty")}}.."
					autocomplete="off">
			</div>
		</header>

		<section class="box-body">
			<article class="py-3">
				
				<table class="table">
					<thead>
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

			</article>
		</section>
	</article>
	@endsection