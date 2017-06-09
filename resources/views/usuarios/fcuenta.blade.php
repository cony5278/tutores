<div class="contenedor-cuenta">
  <div class="contenedor-perfil ">
    @include('usuarios/fperfil')

  </div>

  <div class="contenedor-izquierda  col-xs-2 col-sm-2 col-md-2">
      @include('usuarios/menu')
  </div>

  <div class="configuracion-usuario ">
    		<div class="configuracion-usuario-izquierda col-xs-10 col-sm-10 col-md-6">
    			izquierda
    		</div>
    		<div class="configuracion-usuario-derecha col-xs-12 col-sm-12 col-md-4">
    			     @include('usuarios/publicaciones/farea')
               @include('usuarios/publicaciones/ftarea')
               @include('usuarios/publicaciones/fpublicacion')
    		</div>
  </div>
  <!-- este es el contenedor donde va a ir las publicaciones que el usuario a publicado y tambien algo en la cabeza -->
  <div class="contenedor-usuario-publicacion ">
  	<div class="contenedor-cabeza col-xs-10 col-sm-10 col-md-10">
    			izquierda
    	</div>
    	<div class="contenedor-cuerpo col-xs-10 col-sm-10 col-md-10">
    			derecha
    	</div>
  </div>
</div>