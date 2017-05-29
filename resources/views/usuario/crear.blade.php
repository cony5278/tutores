<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
{!! Form::open(['route'=>'user.store','metthod'=>'POST']) !!}
<div>
		<label>NOMBRE DE USUARIO</label>
		<label><input type="text" name="nombre"></label>
	</div>
	<div>
		<label>CONTRASEÑA</label>
		<label><input type="text" name="contrasena"></label>
	</div>
	<input type="submit" name="enviar">

{!! Form::close() !!}

</body>
</html>
