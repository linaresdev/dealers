<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Lighters</title>	
@section("css")

	<link href="{{__url('__lighter/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{__url('__lighter/css/mdi.min.css')}}" rel="stylesheet">
	<link href="{{__url('__lighter/css/layout.ui.css')}}" rel="stylesheet">
@show

</head>
<body>
	
	<main role="lighter">
		
		@includeIF("lighter::partial.navbar")

		<article class="wrapp">
			
			Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo iste quisquam, facere. Odio placeat porro ipsum error laudantium dolores obcaecati, ipsam id molestias veniam quae accusamus, explicabo voluptates, aperiam, modi?

			<footer class="lighter-footer">
				<div class="baner">
					<div class="container">
						<div class="row p-2">
							<div class="col-4 text-center">
								<i class="mdi mdi-calculator mdi-48px"></i> <br>
								¡Cotiza el Toyota perfecto para ti!
							</div>
							<div class="col-4 pt-4">
								<a href="https://deltacomercial.com.do/cotizar-vehiculo"
									target="_blank" class="btn btn-outline-light">

									<i class="mdi mdi-car-connected"></i>
									Solicitar Cotizaci&oacute;n
								</a>
							</div>
							<div class="col-4 pt-4">
								<a href="https://deltacomercial.com.do/test-drive"
									target="_blank" class="btn btn-outline-light">

									<i class="mdi mdi-car-connected"></i>
									Solicitar Test Drive
								</a>
							</div>
						</div>
					</div>
				</div>

				<div class="container">
				<div class="row">
					<div class="col-4">
						Delta Comercial, S.A., es una empresa pionera en la importación de vehículos japoneses, obteniendo la distribución exclusiva de la línea Toyota.
					</div>
					<div class="col-4">
						Lorem ipsum dolor sit amet consectetur adipisicing, elit. Adipisci soluta corporis facilis nam consequatur velit rem. Laboriosam adipisci minima porro iure, quae corrupti sint sequi numquam officia labore quas, rem.
					</div>
					<div class="col-4">
						Lorem ipsum dolor sit amet consectetur adipisicing, elit. Adipisci soluta corporis facilis nam consequatur velit rem. Laboriosam adipisci minima porro iure, quae corrupti sint sequi numquam officia labore quas, rem.
					</div>
				</div>
				</div>

				<div class="brand">
					<span>&COPY;</span> <span>2022 | Delta Comercial, S.A.</span>
				</div>
				
			</footer>
		</article>

	</main>

@section("js")
	<script src="{{__url('__lighter/js/jquery-3.6.1.min.js')}}"></script>
	<script src="{{__url('__lighter/js/bootstrap.bundle.min.js')}}"></script>
	<script src="{{__url('__lighter/js/layout.ui.js')}}"></script>
@show
</body>
</html>