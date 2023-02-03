@extends("delta::admin.domains.layout")

	@section("content")

	<article class="box box-light">
		<header class="box-header">
			<a href="{{__url('__now/new')}}" class="btn btn-primary btn-sm">
				{!! __mdi("storefront-plus") !!}
				{{ __("dealer.new") }}
			</a>
		</header>

		<section class="box-body">
			<table class="table">
				<thead>
					<tr>
						<th class="ftool">-</th>
						<th>{{__("words.dealer")}}</th>
						<th>{{__("words.phone")}}</th>
						<th>{{__("words.email")}}</th>
						<th class="action">{{__("words.actions")}}</th>
					</tr>
				</thead>

				<tbody>
					<tr>
						<td class="ftool">--</td>
						<td></td>
						<td></td>
						<td></td>
						<td class="action">
							<div class="dropdown dropstart">
								<a href="#" class="dropdown-toggle" 
										data-bs-toggle="dropdown">
									{!! __mdi("progress-wrench mdi-action") !!}
								</a>

								<div class="dropdown-menu">
									<a href="#" class="dropdown-item">
										Item 1
									</a>
								</div>
							</div>
						</td>
					</tr>
				</tbody>
			</table>
		</section>
	</article>
	@endsection