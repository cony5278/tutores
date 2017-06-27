<div class="formulario-publicacion-todo" >

	<div class="archivo-menu-publicado btn-group">
	  <a onclick="menu.desplegarItem(this);"><span class="glyphicon glyphicon-menu-down"></span></a>
	  <div class="menu-publicado-item ">  	

	 	<div class="editar-archivo-menu-publicado" href="#">
	 		<span class="glyphicon glyphicon-edit" onclick="publicacion.editar(this)" > Editar</span>
	 	</div>
	 	<div class="eliminar-archivo-menu-publicado" href="#">
	 		<span class="glyphicon glyphicon-trash" onclick="publicacion.cambiarFormulario(this)">Eliminar</span>
	 	</div>
	 	<div class="adicionar-archivo-menu-publicado" href="#">
	 		<span class="glyphicon glyphicon-file"> Añadir archivos</span>
	 	</div>  
	 	<div class="eliminar-archivo-menu-publicado" href="#">
	 		<span class="glyphicon glyphicon-trash" onclick="publicacion.cambiarFormulario(this)">Eliminar archivos</span>
	 	</div>	
		
	  </div>
	</div>

	<div class="col-xs-12 col-sm-12 col-md-12">

		<h1 class="titulo-publicacion">{{$publicacion->titulo}}</h1>
		<input type="text" name="titulo" class="form-control titulo-publicacion-form" value="{{$publicacion->titulo}}" >
		<a>{{$publicacion->updated_at}}</a>
		<hr class='message-inner-separator'>
	</div>	
	
	<div class=" col-xs-12 col-sm-12 col-md-12">
		<div class="descripcion-publicacion">{{$publicacion->descripcion}}</div>
		<div class="descripcion-publicacion-form">
			<textarea name="descripcion" class="form-control" id="comment">{{$publicacion->descripcion}}			
			</textarea>
		</div>
	</div>	

	 @foreach ($publicacion->tareas->first()->documentos as $documento)

	 <div class="col-xs-12 col-md-6">
        <div class="panel panel-default">
            <div class="panel-image">
                <img src="{{$documento->extension($documento->id)}}" class="panel-image-preview" />
                <label for="toggle-1"></label>
            </div>         
            <div class="panel-footer text-center">       
                <a href="#download"><span class="glyphicon glyphicon-download">{{$documento->archivo}}</span></a>
               <input type="text" name="{{$documento->id}}" class="form-control nombre-archivo-publicacion-form" value="{{$documento->archivo}}"/>
            </div>
        </div>
    </div>
   	@endforeach				
	
	<footer class="container-fluid">
	</footer>
	<footer class="footer">
		 <button type="button" onclick="publicacion.cancelarEditar(this)" class="cancelar-publicacion-form btn btn-default">Cancelar</button>

		<button type="submit"  class="enviar-publicacion-form btn btn-primary">Enviar</button> 
	</footer>
	 
</div>