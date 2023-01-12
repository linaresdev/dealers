@extends( "delta::app.dealers.layout" )

	@section("body")

	<section class="box-group">
		
		<article class="box box-start">
			<header class="box-header">
				<hgroup>
					<h4> {{ $client->customer }} </h4>
					<h5 class="text-muted">RNC {{ $client->rnc }}</h5>
				</hgroup>
			</header>

			<section class="box-body">
			</section>
		</article>

		<article class="box">
			<header class="box-header">
				<h4>{{__("client.contact")}}</h4>
			</header>

			<section class="box-body">
				<article class="block">
					<div class="row">
						<div class="col-4">
							<label for="emal">{{__("words.cellphone")}}</label>
							<div><strong>{{$client->cellphone}}</strong></div>
						</div>

						<div class="col-4">
							<label for="emal">{{__("words.email")}}</label>
							<div><strong>{{$client->email}}</strong></div>
						</div>
					</div>
					
				</article>

			</section>
		</article>

		<article class="box">
			<header class="box-header">
				<h4>{{__("client.location")}}</h4>
			</header>

			<section class="box-body">
				<article class="block">
					<div class="row">
						<div class="col-4">
							<label for="sector">{{__("words.sector")}}</label>
							<div><strong>{{$client->code}}</strong> {{$client->sector}}</div>
						</div>

						<div class="col-8">
							<label for="address">{{__("words.address")}}</label>
							<div><strong>{{$client->address}}</strong></div>
						</div>
					</div>
					
				</article>

			</section>
		</article>

		<article class="box box-end">
			<section class="box-body">
				<article class="block">
					@csrf
					<a href="{{__url("dealer/__dealer")}}" 
						class="btn btn-secondary">
						<i class="mdi mdi-close"></i>
						{{__("words.close")}}
					</a>
				</article>
			</section>
		</article>

	</section>
	@endsection