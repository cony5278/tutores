/**
*clase que va a contener todos los menus de la aplicacion
*contenedor=>el la clase que al dar click va a visualizar los item
*item=>clase contenedor que va a visulizar las opciones de menu
*/
function Menu(){
	this.desplegarItem=function(evento){	
		$(evento).siblings('div').toggle();	
	}	
}

function Publicacion(){
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
	}
	this.cancelarEditar=function(evento){
		var padre=$(evento).parent().parent();
		this.contenidoEditar(padre);	
	}
	this.cambiarFormulario=function(evento,metodo){
		var padre=$(evento).parent().parent().parent().parent().parent();	   
    		$(padre).find("input[name=_method]").val("DELETE");
    		$(padre).submit();  
    		$(padre).find("input[name=_method]").val("PUT"); 
	}
	this.enviar=function(evento){
		var padre=$(evento).parent().parent().parent();
		$(padre).find("input[name=_method]").val("PUT");
    	$(padre).submit();   
	}

}