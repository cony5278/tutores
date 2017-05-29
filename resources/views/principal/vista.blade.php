<!DOCTYPE html>

<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		{!! Html::style('../css/bootstrap.min.css')!!}
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		{!! Html::script('../js/bootstrap.min.js')!!}
		{!! Html::style('../css/principal/cabeza.css')!!}
		{!! Html::style('../css/principal/cuerpo.css')!!}
		{!! Html::style('../css/principal/principal.css')!!}
	<title>App | @yield('titulo')</title>
</head>
<body>
	@section('cabeza')
		cabeza
	@show
	@section('cuerpo')
		cuerpo
	@show
</body>
</html>