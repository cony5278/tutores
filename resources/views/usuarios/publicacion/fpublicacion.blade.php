{!! Form::open(['route' => 'publicaciones.store', 'id' => 'formularioPublicacion','metthod'=>'POST','files'=> true]) !!}

 @foreach ($publicaciones as $publicacion)
 	<a>{{$publicacion->tareas->first()->id}}</a>

    <div class="formulario-publicacion-todo" >
		
		

		<div class=" col-xs-12 col-sm-12 col-md-12">
			<h1>{{$publicacion->titulo}}</h1>
			<a>{{$publicacion->created_at}}</a>
		</div>	
		
		<div class=" col-xs-12 col-sm-12 col-md-12">
				{{$publicacion->descripcion}}
		</div>	
		<div class="container-fluid" style="height:230px; overflow-y: scroll; ">
			<div class=" col-xs-12 col-sm-12 col-md-12">
			
			  @foreach ($publicacion->tareas->first()->documentos as $documento)
				<a> {{$documento->archivo}}
				<img src="{{$documento->extension($documento->archivo)}}" width="30px" height="30px" />		</a>		
			 @endforeach	
			</div>			
		</div>
		<footer class="container-fluid">
			<div class=" col-xs-12 col-sm-12 col-md-12">
	 	 			subir mas archivos
	 	 	</div>	
		</footer>
 	 
    </div>
   @endforeach	
{!! Form::close() !!}