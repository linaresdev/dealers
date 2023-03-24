@extends( "delta::app.profilers.layout" )

	@section("content")

		<article class="box box-light">
			<header class="box-header">
				<h4>
					{!! __mdi("account-circle mdi-24px") !!}
					{{__("words.credentials")}}
				</h4>
			</header>

			<section class="box-body pt-3">
				<article class="block">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>{{__("words.firstname")}}</th>
								<th>{{__("words.lastname")}}</th>
								<th style="text-align:right;">
									{{__("words.publicname")}}
								</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									{{$user->info("firstname")}}
								</td>
								<td>{{$user->info("lastname")}}</td>
								<td style="text-align:right;">
									{{$user->publicname}}
								</td>
							</tr>
						</tbody>
					</table>
				</article>
			</section>
		</article>

		<article class="box box-light">
			<header class="box-header">
				<h4>
					{!! __mdi("shield-account mdi-24px") !!}
					{{__("words.account")}}
				</h4>
			</header>

			<section class="box-body pt-3">
				<article class="block">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>{{__("words.user")}}</th>
								<th>{{__("words.rnc")}}</th>
								<th style="text-align:right;">
									{{__("words.state")}}
								</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									{{$user->user}}
								</td>
								<td>{{$user->rnc}}</td>
								<td style="text-align:right;">
									{{__("user.state.$user->activated")}}
								</td>
							</tr>
						</tbody>
					</table>
				</article>
			</section>
		</article>

		<article class="box box-light">
			<header class="box-header">
				<h4>
					{!! __mdi("map-marker-radius mdi-24px") !!}
					{{__("words.location")}}
				</h4>
			</header>

			<section class="box-body pt-3">
				<article class="block">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>{{__("words.address")}}</th>
								<th>{{__("words.cellphone")}}</th>
								<th>{{__("words.phone")}}</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>{{$user->info("address")}}</td>
								<td>
									{!! __mdi("cellphone") !!} {{$user->cellphone}}
								</td>
								<td>
									{!! __mdi("phone") !!} {{$user->info("phone")}}
								</td>
							</tr>
						</tbody>
					</table>

				</article>
			</section>
		</article>
	@endsection