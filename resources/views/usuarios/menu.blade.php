
<div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->

        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
             <a class="navbar-brand"  href="#">
                {{ HTML::image('../img/logo.jpg', "Imagen", array('class'=>'img-circle img-perfil','onclick'=>'domDivVisiblePerfil.visibleContenedor()')) }}
               <h5>Juan camilo rodriguez</h5>
            </a>
        </div>
</div>
</br>
        <!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1" >
   <div class="group">      
           <input class="buscar" type="text" required>
           <span class="highlight"></span>
           <span class="bar"></span>
           <label class="lbuscar">buscar publicación</label>
    </div>
    <ul class="menu-lateral">
        <li><a class="img-config" onclick="contenedorConfiguracion.visibleOcultarContenedores();">Crear Publicacion</a></li>
        <li><a onclick="contenedorPublicacion.visibleOcultarContenedores();archivo.inicializar()">Publicaciones</a></li>
        <li><a onclick="contenedorDocumento.visibleOcultarContenedores();">doc</a></li>
        <li><a onclick="contenedorNotificaion.visibleOcultarContenedores();">Notifi</a></li>                 
    </ul>

</div>



