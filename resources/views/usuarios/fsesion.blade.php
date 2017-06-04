<div class="login-form">
    
@if(count($errors)>0)
	@foreach($errors->all() as $error)
	<div class="alert alert-danger">
	  <strong>{{$error}}</strong> 
	</div>
	@endforeach
@endif
<a href="/">
 	{{ HTML::image('../img/logo.jpg', "Imagen", array('class'=>'img-perfil img-circle  img-responsive center-block','id'=>'img-cuenta-config')) }}
</a> 	
</br>
{!! Form::open(['route'=>'login','metthod'=>'POST']) !!}
	<div class="form-group">
	 	{!!Form::label('pseudonimo', 'Nombre de usuario o dirección de correo electrónico');!!}
	    {!!Form::text('email',null,array('class' => 'form-control'));!!}		
	</div>
	<div class="form-group">
	 	{!!Form::label('password', 'Contraseña He olvidado la contraseña?');!!}
	 {{ Form::password('password', array('class' => 'form-control')) }}  			
	</div>

	<div class="form-group"> 
	{!!Form::submit('Iniciar Sesion',array('class' => 'btn btn-primary btn-lg btn-block'));!!} 
	</div>
{!! Form::close() !!}


    
 </div>



