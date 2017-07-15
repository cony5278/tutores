/**
*clase que va a contener todos los menus de la aplicacion
*contenedor=>el la clase que al dar click va a visualizar los item
*item=>clase contenedor que va a visulizar las opciones de menu
*/

function Publicacion(){
    /**
     * funcion que oculta todos los input cuando se da en la flechita
     */
    this.ocultarTodo=function(){
        $(".menu-publicado-item").hide();
        $(".enviar-publicacion-form").hide();
        $(".cancelar-publicacion-form").hide();
        $(".nombre-archivo-publicacion-form").hide();
        $(".descripcion-publicacion-form").hide();
        $(".chequeo-archivos").hide();
        $(".descripcion-publicacion-form").hide();
        $(".titulo-publicacion-form").hide();
    }

    this.desplegarItem=function(evento){
        var padre=$(evento).parents("form:first");
        if($(evento).siblings("div").css("display")=="none"){
            $(".menu-publicado-item").hide();
            $(evento).siblings('div').show();
		}else{
        	this.contenidoEditar(padre,false);
			this.eliminarArchivos(padre,false);
			this.contenidoBtnEnvio(padre);
        	this.ocultarTodo();
		}
    }




    /**
	 * metodo que es utilizado para cambiar el estado total de la publicacion cuando se edita
     * @param padre
     */
	this.contenidoEditar=function(padre,isVIsible){
		if(isVIsible){
            $(padre).find('.titulo-publicacion').hide();
            $(padre).find('.titulo-publicacion-form').show();
            $(padre).find('.descripcion-publicacion').hide();
            $(padre).find('.descripcion-publicacion-form').show();
            this.contenidoBtnEnvio(padre,isVIsible);
            $(padre).find('.nombre-archivo-publicacion').show();
            $(padre).find('.nombre-archivo-publicacion-form').show();
		}else{
            $(padre).find('.titulo-publicacion').show();
            $(padre).find('.titulo-publicacion-form').hide();
            $(padre).find('.descripcion-publicacion').show();
            $(padre).find('.descripcion-publicacion-form').hide();
            this.contenidoBtnEnvio(padre,isVIsible);
            $(padre).find('.nombre-archivo-publicacion').hide();
            $(padre).find('.nombre-archivo-publicacion-form').hide();
		}

	}
    /**
	 * metodo que cambia de estado los botones cancelar y enviar de la publicacion
     * @param padre
     */
	this.contenidoBtnEnvio=function(padre,isVisible) {
        if (isVisible) {
            $(padre).find('.enviar-publicacion-form').show();
            $(padre).find('.cancelar-publicacion-form').show();
        } else {
            $(padre).find('.enviar-publicacion-form').hide();
            $(padre).find('.cancelar-publicacion-form').hide();
        }
    }
	this.eliminarArchivos=function(padre,isVisible){
		if(isVisible){
            $(padre).find('.chequeo-archivos').show();
        	this.contenidoBtnEnvio(padre,isVisible);
		}else{
            $(padre).find('.chequeo-archivos').hide();
            this.contenidoBtnEnvio(padre,isVisible);
		}

	}

	this.cancelarEditar=function(evento){
        var padre=$(evento).parents("form:first");
        $(".contenedor-editar-publicacion").hide();
        archivo.inicializar();
		this.contenidoEditar(padre);
	}
    /**
	 * metodo que cambia la url y el metodo del formulario en el cual hay CRUD
     * @param evento
     * @param metodo
     * @param opcion
     * @param id
     */
	this.cambiarFormulario=function(evento,metodo,id,ruta,opcion){
        var padre=$(evento).parents("form:first");

		switch (opcion) {
            case 0://cuando eliminar por cada uno de los archivos
				this.contenidoEditar(padre,false);
                this.eliminarArchivos(padre,true);
                this.cambiarUrl(padre, id, metodo, ruta);
                break;
            case 1://editar publicacion
                this.eliminarArchivos(padre,false);
                this.contenidoEditar(padre,true);
                this.cambiarUrl(padre, id, metodo, ruta);
				break;
			case 2:
                this.eliminarArchivos(padre,false);
                this.contenidoEditar(padre,false);
                this.contenidoBtnEnvio(padre,true);
                this.cambiarUrl(padre, id, metodo, ruta);
				break;
            default:

                this.cambiarUrl(padre, id, metodo, ruta);
                break;
        }

	}
	this.cambiarUrl=function(padre,id,metodo,ruta){
		ruta=ruta==''?'':'/'+ruta;
        $(padre).attr('action',"publicaciones"+ruta+"/"+id);
        $(padre).find("input[name=_method]").val(metodo);
	}
	this.enviar=function(evento){
		var padre=$(evento).parent().parent().parent();
		$(padre).find("input[name=_method]").val("PUT");
    	$(padre).submit();
	}

}