
<div class="publicacion-tareas" style="display: none;">
@if(count($errors)>0)
	@foreach($errors->all() as $error)Route::resource middelware laravel
	<div class="alert alert-danger">
	  <strong>{{$error}}</strong> 
	</div>
	@endforeach
@endif
	{!! Form::open(['route' => 'areas.store', 'id' => 'formularioTarea','metthod'=>'POST']) !!}
 
							<div class="form-group">
								{!! Form::text('title', null, ["class" => "form-control"]) !!}
							</div>
 
 
							<div class="form-group ">
								<div class="col-xs-6 col-sm-6 col-md-6">
								<button type="button"  class="atras-area btn btn-primary btn-lg btn-block" onclick="formulario.atras('atras-area','publicacion-areas','publicacion-tareas')">Atras</button>
								</div>
				
								<div class="col-xs-6 col-sm-6 col-md-6">
								<button type="button"  class="siguiente-publicaciones btn btn-primary btn-lg btn-block" onclick="formulario.siguiente('siguiente-publicaciones','publicacion-publicaciones','publicacion-tareas','formularioTarea')">Siguiente</button>
							    </div>
							</div>	


 
{!! Form::close() !!}
</div>