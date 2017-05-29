<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
{!! Form::open(['url' => 'foo/bar']) !!}
<div>
		<label>NOMBRE DE USUARIO</label>
		<label><input type="text" name=""></label>
	</div>
	<div>
		<label>CONTRASEÑA</label>
		<label><input type="text" name=""></label>
	</div>
	<input type="submit" name="enviar">
	
{!! Form::close() !!}

</body>
</html>
