<div class="formulario-publicacion-todo" >

	<div class="archivo-menu-publicado btn-group">
	  <a onclick="publicacion.desplegarItem(this);"><span class="glyphicon glyphicon-menu-down"></span></a>
	  <div class="menu-publicado-item ">  	

	 	<div class="editar-archivo-menu-publicado" href="#">
	 		<span class="glyphicon glyphicon-edit" onclick="publicacion.editar(this)" > Editar</span>
	 	</div>
	 	<div class="eliminar-archivo-menu-publicado" href="#">
	 		<span class="glyphicon glyphicon-trash" onclick="publicacion.cambiarFormulario(this,'DELETE',1,{{$publicacion->id}})">Eliminar</span>
	 	</div>
	 	<div class="adicionar-archivo-menu-publicado" href="#">
	 		<span class="glyphicon glyphicon-file" onclick="publicacion.addArchivos(this)"> Añadir archivos</span>
            <input type="file" class="archivos-editar" width="100" height="100" onchange="archivoEditar.cargarMForm(this,'form-editar-publicacion-{{$publicacion->id}}','grupo-imagenes-editar-'{{$publicacion->id}})" name="archivos[]" multiple />

        </div>
	 	<div class="eliminar-archivo-menu-publicado" href="#">
	 		<span class="glyphicon glyphicon-trash" onclick="publicacion.cambiarFormulario(this,'GET',2,{{$publicacion->id}})">Eliminar archivos</span>

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

    <div class="grupo-imagenes-editar">
	 @foreach ($publicacion->tareas->first()->documentos as $documento)

	 <div class="col-xs-12 col-md-6">
        <div class="panel panel-default">

			<div class="col-sm-12 chequeo-archivos">
				<div class="checkbox ">
					<label>
						<input type="checkbox" name="eliminar-{{$documento->id}}" >
						<span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
					</label>
				</div>
			</div>

            <div class="panel-image">
                <img src="{{$documento->extension($documento->id)}}" class="panel-image-preview" />
                <label for="toggle-1"></label>
            </div>         
            <div class="panel-footer text-center">       
				<div class="nombre-archivo-publicacion"><a href="#download"><span class="glyphicon glyphicon-download">{{$documento->archivo}}</span></a></div>
				<div class="nombre-archivo-publicacion-form"><input type="text" name="{{$documento->id}}" class="form-control nombre-archivo-publicacion-form" value="{{$documento->archivo}}"/>
				</div>
			</div>
        </div>
    </div>
   	@endforeach				
    </div>
	<footer class="container-fluid">
	</footer>
	<footer class="footer">
		 <button type="button" onclick="publicacion.cancelarEditar(this)" class="cancelar-publicacion-form btn btn-default">Cancelar</button>

		<button type="submit"  class="enviar-publicacion-form btn btn-primary">Enviar</button> 
	</footer>
	 
</div>