<div class="paso-paso-publicacion">
	<h3>Area</h3>
	<div class="publicacion-areas" style="display: block;">
	

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