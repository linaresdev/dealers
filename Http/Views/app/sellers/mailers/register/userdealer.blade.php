<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Mailers</title>
</head>

<body style=" 
		display: table;
		border-radius: 3px 3px;
		max-width: 400px;">

	<h1 style="
			colour:#777; 
			font-size: 20px; 
			padding: 20px 15px 5px 15px;">
		Delta Comercial, S. A.
	</h1>

	<div style="
		background: #333;
		color: #fff;
		margin: 0 0 15px 0;
		padding: 15px 15px 15px 15px;">

		<p style="margin: 0 0 5px 0;">
			Envio del acceso al formulario de registro.
		</p>

		<p style="margin: 0 0 5px 0;">
			Puede acceder al formulario a travez de este enlace: 
		</p>

		<a href="{{__url("membership/from/$dealer/$token")}}" style="
				background: rgba(0,0,0, 0.02);
				border: 1px solid #e0e0e0;
				border-radius: 6px 6px;
				color: #fff;
				display: inline-block;
				padding: 5px 15px;">
			Iniciar resgistro
		</a>
	</div>
</body>

</html>