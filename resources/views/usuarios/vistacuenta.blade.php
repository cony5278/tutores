@extends('principal.vista')

@section('titulo','sesion de usuario')

@section('css')
	{!! Html::style('../css/principal/cuenta/usuario/fcuenta.css')!!}
@endsection

@section('cuerpo')	
	@include('usuarios.fcuenta')
@endsection	