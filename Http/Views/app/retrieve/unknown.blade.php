@extends( $skin->path("landing") )

	@section("body")

		<article class="box box-light">
			<header class="box-header">
				<h4>Reporte de seguridad</h4>
			</header>
			<section class="box-body">
				<article class="block">
					La solicitud <code>{{$retrieve->token}}</code> registrada el
					{{$retrieve->created_at}} fue deshabilitada y reportada al departamento correspondiente.
				</article>				
			</section>
		</article>
	@endsection