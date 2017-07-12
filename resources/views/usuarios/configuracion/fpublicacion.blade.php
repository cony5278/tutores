<div class="paso-paso-publicacion">
	<h3>publicacion</h3>
	<div class="publicacion-publicaciones" style="display: none;">
	 
		<div class="form-group">
		 	{!!Form::label('titulo', 'Titulo');!!}
		    {!!Form::text('titulo',null,array('class' => 'form-control'));!!}		
		</div>
		<div class="form-group">
		 	{!!Form::label('descripcion', 'Descripcion');!!}
		    {!!Form::text('descripcion',null,array('class' => 'form-control'));!!}			
		</div>	
		<div class="form-group">
		 	{!!Form::label('fecha_entrega', 'Fecha entrega');!!}	 	
		  	{!!Form::date('fecha_final', \Carbon\Carbon::now(),array('id' => 'fecha_final'));!!}		
		</div>	
		<div class="form-group">
		 	{!!Form::label('valor', 'Valor');!!}	 	
			{!!Form::text('valor',null,array('class' => 'form-control'));!!}	
		</div>
			

		{!!Form::label('importancia', 'Importancia de la publicacion');!!}
		<div class="btn-group" data-toggle="buttons" style="margin-bottom: 5px">	
		
		  <label class="btn btn-primary active">
		  	{!!Form::radio('estado','0',array('checked'));!!}
		  	Urgente    
		  </label>	  
		   <label class="btn btn-primary">
		  	{!!Form::radio('estado','1',array(''));!!}
		  	Muy	    
		  </label>	
		   <label class="btn btn-primary">
		  	{!!Form::radio('estado','2',array(''));!!}
		  	Parcial	    
		  </label>	

		 </div>

		<div class="form-group"> 		
			<div class="col-xs-6 col-sm-6 col-md-6">
				<button type="button"  class="atras-area btn btn-primary btn-lg btn-block" onclick="pasopaso.atras('atras-tarea','publicacion-tareas','publicacion-publicaciones')"">Atras</button>
			</div>
					
			<div class="col-xs-6 col-sm-6 col-md-6">
				<button type="button"  class="siguiente-publicaciones btn btn-primary btn-lg btn-block" onclick="ajax.enviar()">Siguiente</button>
			</div>		
		</div> 
					

	</div>
</div>
