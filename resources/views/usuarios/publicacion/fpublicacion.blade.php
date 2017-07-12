
@if($publicar)
 @foreach ($publicaciones as $publicacion)
 {{ Form::model($publicacion, array('route' => array('publicaciones.update',$publicacion->id), 'method' => 'PUT','files'=> true,'class'=>'edicion-eliminacion-publicacion-'.$publicacion->id,'id' => 'form-editar-publicacion-'.$publicacion->id)) }}

 		@include('usuarios.publicacion.cuerpopublicacion')

  	{!! Form::close() !!}  
 @endforeach
 @else
 {{ Form::model($publicacion, array('route' => array('publicaciones.update', $publicacion->id), 'method' => 'PUT','files'=> true,'class'=>'edicion-eliminacion-publicacion-'.$publicacion->id,'id' => 'form-editar-publicacion-'.$publicacion->id)) }}

 		@include('usuarios.publicacion.cuerpopublicacion')

 	{!! Form::close() !!}  
 @endif
