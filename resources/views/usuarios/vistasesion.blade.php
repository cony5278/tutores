@extends('principal.vista')
@section('css')
	{!! Html::style('../css/principal/cuenta/sesion/fsesion.css')!!}
@endsection

@section('titulo','sesion de usuario')

@section('cuerpo')	
	@include('usuarios.fsesion')
@endsection