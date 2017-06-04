$(document).ready(function(){
	//hace visible o invisible los objetos div de la pagina haciendo visible un objeto y ocultando otro
		var domDivVisible=new DomDivVisible("img-config",
											"",
											"configuracion-usuario",
											"contenedor-usuario-publicacion",
											true);	
		domDivVisible.onClick();	
	//fin
	//hacer visible el perfil del usuario	
		var domDivVisiblePerfil=new DomDivVisible("img-perfil",
												  "perfil-atras",
												  "contenedor-perfil",
												  "",
												  false);	
		domDivVisiblePerfil.onClick();	
	//fin
});