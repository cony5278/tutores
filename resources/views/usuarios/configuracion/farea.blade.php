<div class="paso-paso-publicacion">
	<h1>Area</h1>
	<div class="publicacion-areas" style="display: block;">
	@if(count($errors)>0)
		@foreach($errors->all() as $error)Route::resource middelware laravel
		<div class="alert alert-danger">
		  <strong>{{$error}}</strong> 
		</div>
		@endforeach
	@endif

		<div class="form-group">
			<select class="combo" name="area">
			 {!!Form::label('areas', 'Seleccionar Area');!!}
			  @foreach ($areas as $area)
			    <option value="{{$area->id}}">{{ $area->nombre }}</option>  
			  @endforeach	 
			</select>

		</div>						 
		<div class="form-group">
			<button type="button"  class="siguiente-tarea btn btn-primary btn-lg btn-block" onclick="formulario.siguiente('siguiente-tarea','publicacion-tareas','publicacion-areas','formularioArea');">Siguiente</button>
		</div>
	</div>
</div>