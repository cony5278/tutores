$(document).ready(function(){
	//hace visible o invisible los objetos div de la pagina haciendo visible un objeto y ocultando otro
		var domDivVisible=new DomDivVisible("img-config",
											null,
											"configuracion-usuario",
											"contenedor-usuario-publicacion",
											true);	
		//domDivVisible.onClick();	
	//fin
	//hacer visible el perfil del usuario	
		 domDivVisiblePerfil=new DomDivVisible("img-perfil",
												  "perfil-atras",
												  "contenedor-perfil",
												  null,
												  false);	
		
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