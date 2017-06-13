@extends('principal.vista')

@section('titulo','sesion de usuario')

@section('css')
	{!! Html::style('../css/principal/cuenta/usuario/fcuenta.css')!!}
@endsection

@section('js')
		{!! Html::script('../js/imagen.js')!!}	
		{!! Html::script('../js/domDivVisible.js')!!}	
		{!! Html::script('../js/validacion.js')!!}	
		{!! Html::script('../js/envioDatos.js')!!}	
@endsection
@section('cuerpojs')		
		{!! Html::script('../js/main.js')!!}
@endsection
@section('cuerpo')	
	@include('usuarios.fcuenta')
@endsection	