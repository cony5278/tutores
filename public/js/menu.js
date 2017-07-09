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
	this.contenidoEditar=function(padre){
		$(padre).find('.titulo-publicacion').toggle();
		$(padre).find('.titulo-publicacion-form').toggle();
		$(padre).find('.descripcion-publicacion').toggle();
		$(padre).find('.descripcion-publicacion-form').toggle();
		$(padre).find('.cancelar-publicacion-form').toggle();
		$(padre).find('.enviar-publicacion-form').toggle();
        $(padre).find('.nombre-archivo-publicacion').toggle();
        $(padre).find('.nombre-archivo-publicacion-form').toggle();
	}
	this.eliminarArchivos=function(padre){

        $(padre).find('.chequeo-archivos').toggle();
        $(padre).find('.cancelar-publicacion-form').toggle();
        $(padre).find('.enviar-publicacion-form').toggle();
	}
	this.cancelarEditar=function(evento){
		var padre=$(evento).parent().parent();
		this.contenidoEditar(padre);	
	}
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
				this.cambiarUrl(padre,id,metodo);
				break;
        }
	}
	this.cambiarUrl=function(padre,id,metodo){
        $(padre).attr('action',"publicaciones/destroyFile/"+id);
        $(padre).find("input[name=_method]").val(metodo);
	}
	this.enviar=function(evento){
		var padre=$(evento).parent().parent().parent();
		$(padre).find("input[name=_method]").val("PUT");
    	$(padre).submit();   
	}
	this.addArchivos=function(){
        var padre=$(evento).parent().parent().parent().parent().parent();

	}
}