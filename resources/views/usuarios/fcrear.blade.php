
@if(count($errors)>0)
	@foreach($errors->all() as $error)
	<div class="alert alert-danger">
	  <strong>{{$error}}</strong> 
	</div>
	@endforeach
@endif
{!! Form::open(['route'=>'usuario.store','metthod'=>'POST']) !!}
	<div class="form-group">
	 	{!!Form::label('pseudonimo', 'Nombre de usuario');!!}
	    {!!Form::text('pseudonimo',null,array('class' => 'form-control','placeholder'=>'Nombre o Alias'));!!}		
	</div>
	<div class="form-group">
	 	{!!Form::label('correo', 'Correo');!!}
	    {!!Form::text('correo',null,array('class' => 'form-control','placeholder'=>'Tu direccion de correo electronico'));!!}				
	</div>
	<div class="form-group">
	 	{!!Form::label('contrasena', 'Contraseña');!!}
	 	{{ Form::password('contrasena', array('class' => 'form-control','placeholder'=>'Contraseña')) }}  
	</div>
	<div class="btn-group" data-toggle="buttons" style="margin-bottom: 5px">	
	  <label class="btn btn-primary">
	  	{!!Form::radio('usuario','1',array('checked'));!!}
	  	Aprendiz	    
	  </label>	  
	    <label class="btn btn-primary">
	  	{!!Form::radio('usuario','0',array(''));!!}
	  	Tutor	    
	  </label>	
	 </div>

	<div class="form-group"> 
	{!!Form::submit('Inscríbete en ######',array('class' => 'btn btn-primary btn-lg btn-block'));!!} 
	</div>
{!! Form::close() !!}

