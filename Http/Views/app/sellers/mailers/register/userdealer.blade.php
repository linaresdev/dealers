<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Mailers</title>
</head>

<body style="
		background: #f3f3f3; 
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

	<div style="padding: 0 15px 15px 15px;">
		<p style="margin: 0 0 5px 0; text-align: justify;">
			Las opiniones expresadas en este mensaje son propias del autor y no necesariamente coinciden con las de Delta Comercial, S. A. El mismo puede contener información privilegiada y confidencial. Dicha información es exclusivamente para el uso del individuo o entidad al cual es enviada. Si el lector de este mensaje no es el destinatario del mismo, o si le fue enviado por error, queda formalmente notificado de que cualquier divulgación, distribución, reproducción o copiado de esta comunicación esta estrictamente prohibido. Si este es el caso, favor de eliminar el mensaje de su computadora e informar al emisor a través de un mensaje de respuesta.
		</p>

		<p style="margin: 0 0 5px 0; text-align: justify;">
			Information in this message that does not directly relate to the official business of Delta Comercial, S. A. shall be understood as neither given nor endorsed by it. This message may contain information that is privileged and confidential. It is intended only for the use of the individual or entity to which it is addressed. If the reader of this message is not the intended recipient, or if you received this in error, you are hereby notified that any dissemination, distribution, reproduction or copying of this communication is strictly prohibited. If this is the case, please proceed to destroy the message from your computer and inform the sender through reply mail.
		</p>
	</div>
</body>

</html>