@extends("delta::admin.layout")
		
	@section("body")

		<article class="border bg-white py-3 rounded-1 shadow-sm">
			<header class="px-3 pb-2">
				<h5 class="fs-5">Reporte</h5>
			</header>
			<section class="">
				<table class="table">
					<thead>
						<tr>
							<th class="bg-light border-top ps-3">#</th>
							<th class="bg-light border-top ps-3 text-center">ID</th>
							<th class="bg-light border-top ps-3">Dealers</th>
							<th class="bg-light border-top text-center">Registros aceptados</th>
							<th class="bg-light border-top text-end pe-3">Total de registro</th>
						</tr>
					</thead>
					<tbody>

						@foreach($dealers as $key => $dealer)
						<tr>
							<td class="ps-3">{{$key}}</td>
							<td class="text-center">{{$dealer["ID"]}}</td>
							<td class="">{{$dealer["name"]}}</td>
							<td class="text-center">{{$dealer["close"]}}</td>
							<td class="text-end pe-3">{{$dealer["total"]}}</td>
						</tr>
						@endforeach

					</tbody>
				</table>
			</section>
		</article>
	@endsection