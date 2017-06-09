<!DOCTYPE html>

<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		{!! Html::style('../css/bootstrap.min.css')!!}
		{!! Html::script('../js/jquery-3.2.1.min.js')!!}
		{!! Html::script('../js/bootstrap.min.js')!!}
		{!! Html::style('../css/principal/cabeza.css')!!}
		{!! Html::style('../css/principal/cuerpo.css')!!}
		{!! Html::style('../css/principal/principal.css')!!}

		@yield('css')
		@yield('js')
	<title>App | @yield('titulo')</title>
</head>
<body>
	@yield('cabeza')

	@section('cuerpo')
		cuerpo
	@show
	@yield('cuerpojs')
</body>
</html>