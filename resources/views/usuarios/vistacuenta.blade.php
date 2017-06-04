@extends('principal.vista')

@section('titulo','sesion de usuario')

@section('css')
	{!! Html::style('../css/principal/cuenta/usuario/fcuenta.css')!!}
@endsection

@section('js')
		{!! Html::script('../js/DomDivVisible.js')!!}	
@endsection
@section('cuerpojs')		
		{!! Html::script('../js/Main.js')!!}
@endsection
@section('cuerpo')	
	@include('usuarios.fcuenta')
@endsection	