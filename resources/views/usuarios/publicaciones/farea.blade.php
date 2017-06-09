
<div class="publicacion-areas" style="display: block;">
@if(count($errors)>0)
	@foreach($errors->all() as $error)Route::resource middelware laravel
	<div class="alert alert-danger">
	  <strong>{{$error}}</strong> 
	</div>
	@endforeach
@endif
	{!! Form::open(['route' => 'areas.store', 'id' => 'formularioArea','metthod'=>'POST']) !!}
 
							<div class="form-group">
								{!! Form::text('title', null, ["class" => "form-control"]) !!}
							</div>
 
							<div class="form-group">
								{!! Form::textarea('body', null,
										['class'=>'form-control', 'placeholder'=>'Body'])
								!!}
							</div>
 
							<div class="form-group">
								<button type="button"  class="siguiente-tarea btn btn-primary btn-lg btn-block" onclick="formulario.siguiente('siguiente-tarea','publicacion-tareas','publicacion-areas','formularioArea');">Siguiente</button>
							</div>
						
 
{!! Form::close() !!}
</div>