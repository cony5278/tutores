<div class="contenedor-cuenta">
  <div class="contenedor-perfil">
    @include('usuarios/perfil')

  </div>

  <div class="col-sm-3 sidenav contenedor-izquierda" >
      @include('usuarios/menu')
  </div>

  <div class="configuracion-usuario">
        <div class="configuracion-usuario-izquierda col-xs-12 col-sm-2 col-md-2">

           <ul class="lista"> 
            <li><a href="#">Publicacion</a></li> 
            <li><a href="#">Opcion1</a></li> 
            <li><a href="#">Opcion1</a></li> 
            <li><a href="#">Opcion1</a></li> 
            <li><a href="#">Opcion1</a></li> 
          </ul>
    
        </div>
        <div class="configuracion-usuario-derecha col-xs-12 col-sm-7 col-md-7">
          {!! Form::open(['route' => 'publicaciones.store','class' => 'formulario-publicacion', 'id' => 'formularioPublicacion','method'=>'POST','files'=> true]) !!}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div>
               <div class="configuracion-derecha-numero"><a>1</a></div>               
                @include('usuarios/configuracion/farea')
            </div>
            <div>
               <div class="configuracion-derecha-numero"><a>2</a></div>
                 @include('usuarios/configuracion/ftarea')
            </div>
            <div>
                <div class="configuracion-derecha-numero"><a>3</a></div>
                 @include('usuarios/configuracion/fpublicacion')
           </div>
         {!! Form::close() !!}
        </div>
  </div>
 <div class="contenedor-usuario-documento">    
        <div class=" col-xs-12 col-sm-9 col-md-9" style="background: #723;">
          documentos
     </div>
  </div>

   <div class="contenedor-usuario-notificacion">
     <div class=" col-xs-12 col-sm-9 col-md-9" style="background: #723;">
           @include('usuarios/publicacion/fpublicacion')
     </div>
  </div>
  <!-- este es el contenedor donde va a ir las publicaciones que el usuario a publicado y tambien algo en la cabeza -->
  <div class="contenedor-usuario-publicacion" >
    <div class="contenedor-cabeza col-xs-12 col-sm-9 col-md-9">
          izquierda
      </div>
      <div  class="contenedor-cuerpo scroll-1 col-xs-12 col-sm-8 col-md-9">
          <div class="force-overflow">        

               @include('usuarios/publicacion/fpublicacion')                    
         
          </div>
      </div>
  </div>


</div>