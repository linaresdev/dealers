<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>{{__("report.unknown.retrieve")}}</title>
</head>
<body style=" 
		display: table;
		max-width: 600px;">	

	<div style="
		color: #222;
		padding: 0 20px">

		<h1 style=" 
			font-size: 20px; 
			padding: 0 0 5px 0;">
			Delta Comercial, S. A.
		</h1>
		<p style="margin: 0 0 15px 0;text-align: justify;">
			{{__("report.retrieve")}}
		</p>
		<div style="padding: 15px 15xp;">
			<table style="width:100%;">
				<tr>
					<td>Fecha</td>
					<td>{{$meta->date}}</td>
				</tr>
				<tr>
					<td>IP</td>
					<td>{{$meta->ip}}</td>
				</tr>
				<tr>
					<td>PATH</td>
					<td>{{$meta->path}}</td>
				</tr>
				<tr>
					<td>device</td>
					<td>{{$meta->device}}</td>
				</tr>
				<tr>
					<td>Platform</td>
					<td>{{$meta->platform}}</td>
				</tr>
				<tr>
					<td>Browser</td>
					<td>{{$meta->browser}}</td>
				</tr>
			</table>
		</div>

	</div>
	<div style="
		border-top: 1px solid #ddd;
		margin: 5px 0 5px 20px;">

		<p style="color: #222;font-size: 14px;margin: 15px 0 10px 0;text-align: justify;">
			Las opiniones expresadas en este mensaje son propias del autor y no necesariamente coinciden con las de Delta Comercial, S. A. El mismo puede contener información privilegiada y confidencial. Dicha información es exclusivamente para el uso del individuo o entidad al cual es enviada. Si el lector de este mensaje no es el destinatario del mismo, o si le fue enviado por error, queda formalmente notificado de que cualquier divulgación, distribución, reproducción o copiado de esta comunicación esta estrictamente prohibido. Si este es el caso, favor de eliminar el mensaje de su computadora e informar al emisor a través de un mensaje de respuesta.
		</p>

		<p style="color: #222;font-size: 14px;margin: 0 0 10px 0;text-align: justify;">
			Information in this message that does not directly relate to the official business of Delta Comercial, S. A. shall be understood as neither given nor endorsed by it. This message may contain information that is privileged and confidential. It is intended only for the use of the individual or entity to which it is addressed. If the reader of this message is not the intended recipient, or if you received this in error, you are hereby notified that any dissemination, distribution, reproduction or copying of this communication is strictly prohibited. If this is the case, please proceed to destroy the message from your computer and inform the sender through reply mail.
		</p>		
	</div>
</body>
</html>