<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Mailers</title>
</head>
<body style="background: #f3f3f3; width:100%; height: 100%;">
	<h1 style="colour:#777; font-size: 20px;">
		Delta Comercial, S. A.
	</h1>
	<p>Envio del acceso al formulario de registro.</p>

	<ul>
		<li><strong>Token:</strong> {{$token}}</li>
		<li>
			Puede acceder al formulario a travez de este enlace: 
		</li>
		<li>
			<a href="{{__url("membership/from/$dealer/$token")}}">Ir al formulario</a>
		</li>
	</ul>
</body>
</html>