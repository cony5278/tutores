$(document).ready(function(){

	//fin
	//hacer visible el perfil del usuario	
		 domDivVisiblePerfil=new Contenedor("contenedor-perfil",
											null,
											false);	
		 contenedorConfiguracion=new Contenedor(null,
								   {1:"configuracion-usuario",
								    2:"contenedor-usuario-publicacion",
									3:"contenedor-usuario-documentos"},
								   true);	
		 contenedorPublicacion=new Contenedor(null,
								   {1:"contenedor-usuario-publicacion",
								    2:"configuracion-usuario",
									3:"contenedor-usuario-documentos"},
								   true);	
		 contenedorDocumento=new Contenedor(null,
								   {1:"contenedor-usuario-documentos",
								    2:"configuracion-usuario",
									3:"contenedor-usuario-publicacion"},
								   true);	
	//fin
	/**
	*PASO A PASO PARA HACER UNA PUBLICACION
	*/
		 archivo =new Archivo("formularioPublicacion","grupo-imagenes");
		 archivo.inicializar();
		 formulario=new EnvioDatos("formularioPublicacion",
		 						   "publicaciones",
		 						   "POST",
		 						   archivo);
		


	/**
	*FIN
	*/
});