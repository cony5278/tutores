<div class="paso-paso-publicacion">
	<h3>Actividad</h3>
	<div class="publicacion-tareas" style="display: none;">

		<div class="form-group">
			{!!Form::label('titulo', 'Titulo');!!}
			{!! Form::text('titulo_tarea', null, ["class" => "form-control"]) !!}
		</div>
	 
		<div class="form-group">		 	
		 	 <div id="filedrag" ondrop="archivo.cargarDrop(this)">
		 	 <div id="filedrag-titulo">Soltar archivos aqui</div>
		 	 <input type="file" class="archivos" width="100" height="100" onchange="archivo.cargar(this)" name="archivos[]" multiple />	
		 	 </div>
		 	
		</div>	
		
		<div class="grupo-imagenes-contenedor form-group">
				<ul class="grupo-imagenes">
					
				</ul>
		</div>
		<div class="form-group ">

			<div class="col-xs-6 col-sm-6 col-md-6">
				<button type="button"  class="atras-area btn btn-primary btn-lg btn-block" onclick="formulario.atras('atras-area','publicacion-areas','publicacion-tareas')">Atras</button>
			</div>
					
			<div class="col-xs-6 col-sm-6 col-md-6">
				<button type="button"  class="siguiente-publicaciones btn btn-primary btn-lg btn-block" onclick="formulario.siguiente('siguiente-publicaciones','publicacion-publicaciones','publicacion-tareas','formularioTarea')">Siguiente</button>
			</div>
		</div>	
	</div>
</div>