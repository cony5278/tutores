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
		 archivo =new Archivo();
		 archivo.inicializar();
		 pasopaso=new PasoPaso();
		 ajax=new Ajax("formularioPublicacion",
		 						   archivo,
		 						   "contenedor-cuerpo",
			                       "archivos");

	/**
	*FIN
	*/
    /**
	 * objetos que se utilizan en la publicacon
     * @type {Publicacion}
     */

		publicacion=new Publicacion();//tiene la logica para esconder los objetos del dom cuando se va ha editar una publicacion
   		ajaxEditar=new Ajax(null,
										null,
										null,
										null);

    	ajaxAll=new AjaxAll();



});
ajaxPaginado=new AjaxPaginado();
//$(window).scroll(function(){
//	var altura=$('.paginado-publicacion-'+ajaxPaginado.getFinal()).height();
  //  console.log($(window).scrollTop() + $(window).height());
    //if($(window).scrollTop() + $(window).height() == altura) {
      //  alert("Has llegado al final de la página");
    //}

//});

