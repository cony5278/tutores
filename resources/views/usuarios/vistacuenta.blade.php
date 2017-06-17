@extends('principal.vista')

@section('titulo','sesion de usuario')

@section('css')
	{!! Html::style('../css/principal/cuenta/usuario/fcuenta.css')!!}
@endsection

@section('js')
		{!! Html::script('../js/hasMap.js')!!}	
		{!! Html::script('../js/archivo.js')!!}	
		{!! Html::script('../js/contenedor.js')!!}	
		{!! Html::script('../js/validacion.js')!!}	
		{!! Html::script('../js/envioDatos.js')!!}	
@endsection
@section('cuerpojs')		
		{!! Html::script('../js/main.js')!!}
@endsection
@section('cuerpo')	
	@include('usuarios.fcuenta')
@endsection	