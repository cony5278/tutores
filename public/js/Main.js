$(document).ready(function(){
	//hace visible o invisible los objetos div de la pagina haciendo visible un objeto y ocultando otro
		var domDivVisible=new DomDivVisible("img-config",
											null,
											"configuracion-usuario",
											"contenedor-usuario-publicacion",
											true);	
		domDivVisible.onClick();	
	//fin
	//hacer visible el perfil del usuario	
		var domDivVisiblePerfil=new DomDivVisible("img-perfil",
												  "perfil-atras",
												  "contenedor-perfil",
												  null,
												  false);	
		domDivVisiblePerfil.onClick();	
	//fin
	/**
	*PASO A PASO PARA HACER UNA PUBLICACION
	*/
		 formulario=new EnvioDatos("formularioPublicacion",
		 						   "publicaciones",
		 						   "POST",
		 						   {"area":"formularioArea","tarea":"formularioTarea","publicacion":"formularioPublicacion"});
		 imagen =new Imagen("formularioPublicacion");
		 imagen.cambiar();

	/**
	*FIN
	*/
});