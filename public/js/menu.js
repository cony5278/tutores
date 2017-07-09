/**
*clase que va a contener todos los menus de la aplicacion
*contenedor=>el la clase que al dar click va a visualizar los item
*item=>clase contenedor que va a visulizar las opciones de menu
*/

function Publicacion(){

    this.desplegarItem=function(evento){
        $(evento).siblings('div').toggle();
    }

    this.editar=function(evento){
		var padre=$(evento).parent().parent().parent().parent();
		this.contenidoEditar(padre);
	}
    /**
	 * metodo que es utilizado para cambiar el estado total de la publicacion cuando se edita
     * @param padre
     */
	this.contenidoEditar=function(padre){
		$(padre).find('.titulo-publicacion').toggle();
		$(padre).find('.titulo-publicacion-form').toggle();
		$(padre).find('.descripcion-publicacion').toggle();
		$(padre).find('.descripcion-publicacion-form').toggle();
		this.contenidoBtnEnvio(padre,true);
        $(padre).find('.nombre-archivo-publicacion').toggle();
        $(padre).find('.nombre-archivo-publicacion-form').toggle();
	}
    /**
	 * metodo que cambia de estado los botones cancelar y enviar de la publicacion
     * @param padre
     */
	this.contenidoBtnEnvio=function(padre,isEditInsert){
        $(padre).find('.enviar-publicacion-form').toggle();
        $(padre).find('.cancelar-publicacion-form').toggle();
	}
    /**
	 * t
     * @param padre
     */
    this.contenidoBtnEnvioI=function(estado){
    	if(estado) {
            $('.enviar-publicacion-form').show();
            $('.cancelar-publicacion-form-insert').show();

        }else{
            $('.enviar-publicacion-form').hide();
            $('.cancelar-publicacion-form-insert').hide();
		}
	}
	this.eliminarArchivos=function(padre){
        $(padre).find('.chequeo-archivos').toggle();
        $(padre).find('.cancelar-publicacion-form').toggle();
        $(padre).find('.enviar-publicacion-form').toggle();
	}
    /**
	 * metodo que cancela la insercion ocultando
     */
	this.cancelarInsertar=function(evento){
        var padre=$(evento).parent().parent();
        this.contenidoBtnEnvioI(false);
        archivoEditar.eliminarTodoArchivo();
	}
	this.cancelarEditar=function(evento){
		var padre=$(evento).parent().parent();
		this.contenidoEditar(padre,true);
	}
    /**
	 * metodo que cambia la url y el metodo del formulario en el cual hay CRUD
     * @param evento
     * @param metodo
     * @param opcion
     * @param id
     */
	this.cambiarFormulario=function(evento,metodo,opcion,id){
        var padre=$(evento).parent().parent().parent().parent().parent();
        switch(opcion) {
            case 1:
                $(padre).find("input[name=_method]").val(metodo);
                $(padre).submit();
                $(padre).find("input[name=_method]").val("PUT");
            break;
			case 2:
				this.eliminarArchivos(padre);
				this.cambiarUrl(padre,id,metodo,"destroyFile");
				break;
			case 3:
                this.cambiarUrl(padre,id,metodo,"addFilePulication");
				break;
        }
	}
	this.cambiarUrl=function(padre,id,metodo,ruta){
        $(padre).attr('action',"publicaciones/"+ruta+"/"+id);
        $(padre).find("input[name=_method]").val(metodo);
	}
	this.enviar=function(evento){
		var padre=$(evento).parent().parent().parent();
		$(padre).find("input[name=_method]").val("PUT");
    	$(padre).submit();   
	}

}