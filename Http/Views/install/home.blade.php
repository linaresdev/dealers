<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>{{$title}}</title>

	<style>
		body {
			--tw-bg-opacity: 1;
			background-color: rgb(243 244 246 / .1);
			margin: 0 0;
			padding: 0 0;
		}
		.container {
			margin: auto;
			padding: 10% 0 0 0;
			text-align: center;
		}
		.footer {
			border-top: 1px solid #ddd;
			padding: 5px 15px 15px 15px;
			position: fixed;
			bottom: 0;
			right: 0;
			left: 0;
			text-align: left;
		}
	</style>
</head>
<body>

	<article class="container">
		<section class="body">
			<h4>DELTA COMERCIAL, S.A.</h4>

			<p>
				Ventana de instalación del aplicativo corporativo GDealer V-1.0
			</p>

			<a href="{{__url('install/accept-term')}}">Iniciar instalación</a>
		</section>

		<footer class="footer" style="color:#996;">
			<strong style="color: red;">
				&COPY;2023 | 
			</strong> 
			<span>Santo Domingo, República Dominicana</span>
		</footer>
	</article>
	
</body>
</html>