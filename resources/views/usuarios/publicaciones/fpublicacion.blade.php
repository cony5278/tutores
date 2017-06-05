
@if(count($errors)>0)
	@foreach($errors->all() as $error)Route::resource middelware laravel
	<div class="alert alert-danger">
	  <strong>{{$error}}</strong> 
	</div>
	@endforeach
@endif
{!! Form::open(['route'=>'publicacion.store','metthod'=>'POST']) !!}
	<div class="form-group">
	 	{!!Form::label('titulo', 'Titulo');!!}
	    {!!Form::text('titulo',null,array('class' => 'form-control'));!!}		
	</div>
	<div class="form-group">
	 	{!!Form::label('descripcion', 'Descripcion');!!}
	    {!!Form::text('descripcion',null,array('class' => 'form-control'));!!}			
	</div>	
	<div class="form-group">
	 	{!!Form::label('descripcion', 'Descripcion');!!}	 	
	  	{!!Form::date('name', \Carbon\Carbon::now());!!}		
	</div>		
	<div class="form-group">
	 	{!!Form::label('descripcion', 'Descripcion');!!}
		{!!Form::file('image');!!}		
	</div>	
	{!!Form::label('importancia', 'Importancia de la publicacion');!!}
	<div class="btn-group" data-toggle="buttons" style="margin-bottom: 5px">	
	
	  <label class="btn btn-primary">
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
	{!!Form::submit('Publicar',array('class' => 'btn btn-primary btn-lg btn-block'));!!} 
	</div>
{!! Form::close() !!}

