<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Lighters</title>	
@section("css")

	<link href="{{__url('__lighter/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{__url('__lighter/css/mdi.min.css')}}" rel="stylesheet">
	<link href="{{__url('__lighter/css/install.css')}}" rel="stylesheet">
@show

</head>
<body>
	
	<main role="install" class="container">
		
		@yield("body", "Contenido")

		<footer class="brand">
			<strong>&COPY;2023 | </strong> 
			<span>
				Delta Comercial, S.A. | Santo Domingo, República Dominicana.
			</span>
		</footer>
	</main>

@section("js")

	<script src="{{__url('__lighter/js/bootstrap.bumdle.min.js')}}"></script>
	<script src="{{__url('__lighter/js/install.js')}}"></script>
@show
</body>
</html>