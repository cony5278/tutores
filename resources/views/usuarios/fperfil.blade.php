<div class="row">	
	<a href="#" class="perfil-atras" onclick="domDivVisiblePerfil.visibleContenedor()">
	  <span class="glyphicon glyphicon-menu-up"></span>
	</a>
</div>

<div class="login-form">
	<a href="#">
	 	{{ HTML::image('../img/logo.jpg', "Imagen", array('class'=>'img-cambir-perfil img-circle  img-responsive center-block','id'=>'img-cuenta-config')) }}
	</a>
	<div class="informacion-perfil-usuario">
		<div>
			<a class="center-block">NOMBRE</a>
		</div>		
		<div>
			<a href="{{ route('logout') }}"
	           onclick="event.preventDefault();
	           document.getElementById('logout-form').submit();">
	          <span class="glyphicon glyphicon-log-out"></span>
	          Cerrar Sesión
	        </a>
        </div>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          {{ csrf_field() }}
   	 </form>
	</div>
</div>