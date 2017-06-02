@extends('principal.vista')

@section('titulo','sesion de usuario')

@section('cabeza')
	@include('plantillas.cabeza')
@endsection
	
@section('cuerpo')	
	@include('usuarios.fcuenta')
@endsection	