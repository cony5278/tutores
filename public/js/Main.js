$(document).ready(function(){

	//fin
	//hacer visible el perfil del usuario	
		 domDivVisiblePerfil=new Contenedor("contenedor-perfil",
											null,
											false);	
	//fin
	/*
	*menu izquierda click que desaparece y aparece contenedores
	*/
		 contenedorConfiguracion=new Contenedor(null,
								   {1:"configuracion-usuario",
								    2:"contenedor-usuario-publicacion",
									3:"contenedor-usuario-documento",
								    4:"contenedor-usuario-notificacion"},
								   true);	
		 contenedorPublicacion=new Contenedor(null,
								   {1:"contenedor-usuario-publicacion",
								    2:"configuracion-usuario",
									3:"contenedor-usuario-documento",
								    4:"contenedor-usuario-notificacion"},
								   true);	
		 contenedorDocumento=new Contenedor(null,
								   {1:"contenedor-usuario-documento",
								    2:"configuracion-usuario",
									3:"contenedor-usuario-publicacion",
								    4:"contenedor-usuario-notificacion"},
								   true);
		contenedorNotificaion=new Contenedor(null,
								   {1:"contenedor-usuario-notificacion",
								    2:"configuracion-usuario",
									3:"contenedor-usuario-publicacion",
								    4:"contenedor-usuario-documento"},
								   true);		
	/*
	*fin
	*/
	/**
	*PASO A PASO PARA HACER UNA PUBLICACION
	*/
		//este objeto oculta y vuevl visible lo del paso a paso para una publicacion
			 domDivVisible=new DomDivVisible("img-config",
												null,
												"configuracion-usuario",
												"contenedor-usuario-publicacion",
												true);
		//fin
		 archivo =new Archivo("formularioPublicacion","grupo-imagenes");
		 archivo.inicializar();
		 notificacion=new Notificacion();
		 formulario=new EnvioDatos("formularioPublicacion",
		 						   "publicaciones",
		 						   "POST",
		 						   archivo,
		 						   "contenedor-cuerpo",
		 						   notificacion);
		


	/**
	*FIN
	*/

		

});