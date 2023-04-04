@extends( $skin->path("single") )

	@section("nav")

	{!! isAuthNav("warranty", "dealer") !!}
	@endsection

	@section("body")

		{!! Alert::tag("system") !!}

		<article class="block">
			<div class="bg-danger text-white p-2 px-3 mb-3 rounded">
				<h4>Potencia. Calidad. Tecnologia</h4>
				<p class="m-0">Recorre el mundo a tu manera</p>
			</div>

			<div class="pb-4">
				<div class="row">

					
					<div class="col-lg-3 col-md-6 col-sm-6">
						<div class="card mb-3">
							<img src="{{__url("__uploads/cars/hilux.png")}}" 
									alt="@">
							<div class="card-body">
								<div class="d-grid">
									<a href="https://deltacomercial.com.do/vehiculo/hilux" 
										class="btn btn-light btn-sm btn-blok"
										target="_blank">
										Hilux
									</a>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-3 col-md-6 col-sm-6">
						<div class="card mb-3">
							<img src="{{__url("__uploads/cars/prado.png")}}" 
									alt="@">
							<div class="card-body">
								<div class="d-grid">
									<a href="https://deltacomercial.com.do/vehiculo/prado" 
										class="btn btn-light btn-sm btn-blok"
										target="_blank">
										LC Prado
									</a>
								</div>
							</div>
						</div>
					</div>	

					<div class="col-lg-3 col-md-6 col-sm-6">
						<div class="card mb-3">
							<img src="{{__url("__uploads/cars/rush.png")}}" 
									alt="@">
							<div class="card-body">
								<div class="d-grid">
									<a href="https://deltacomercial.com.do/vehiculo/rush" 
										class="btn btn-light btn-sm btn-blok"
										target="_blank">
										Rush
									</a>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-3 col-md-6 col-sm-6">
						<div class="card mb-3">
							<img src="{{__url("__uploads/cars/rav4v.png")}}" 
									alt="@">
							<div class="card-body">
								<div class="d-grid">
									<a href="https://deltacomercial.com.do/vehiculo/rav4" 
										class="btn btn-light btn-sm btn-blok"
										target="_blank">
										Rav4
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="block pb-4">

				¡Contáctanos para poder atenderte de manera personal!

				<a href="https://deltacomercial.com.do/ventas" 
					class="btn btn-outline-primary btn-sm" 
					style="float:right;"
					target="_blank">
					Ir a ventas
				</a>			
			</div>

			<div class="py-2 px-3 bg-info text-center text-white border rounded">
				<h4 class="m-0"> Queda mucho por recorrer </h4>
				<p class="m-0 mb-1">
					Nuestros expertos recomiendan un servicio cada 5,000 KM o 3 meses.
				</p>
				<a href="#" class="btn btn-outline-light">
					Solicitar cita mantenimiento
				</a>
			</div>

			

		</article>
	@endsection