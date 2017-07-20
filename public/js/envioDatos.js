

/**
*formularioPublicacion=>id del formulario el cual va enviar la informacion al controlador
*ruta=>ruta del controlador,
*metodo=>metodo POST,PUT,GET
*archivo=>objeto arhivos que almacena todos los archivos
*contenedor=>es el contenedor que despues del envio de los datos va a renderizar inmediatemente la informacion
*fileInputName=>esta variable contiene el nombre del name del input file
 */
function PasoPaso() {

    /**
     *metodo que oculta el formulario vuelve oculto en formulario actual y visible el anterior
     */
    this.atras = function (btn, visible, ocultar) {
        var atras = new DomDivVisible(btn,
            null,
            visible,
            ocultar,
            false);
        atras.accion();
    }
    /**
     *metodo que oculta el formulario anterior y vuelve visible el siguiente
     */
    this.siguiente = function (btn, visible, ocultar, idFormulario) {
        var siguienteTarea = new DomDivVisible(btn,
            null,
            visible,
            ocultar,
            false);
        siguienteTarea.accion();
    }
}
/**
 * objeto ajax para el registro de la publicacion
 * @param formularioPublicacion
 * @param archivo
 * @param contenedor
 * @param fileInputName
 * @constructor
 */

function Ajax(formularioPublicacion,archivo,contenedor,fileInputName){
    this.formularioPublicacion=formularioPublicacion;//variable que almacena el id del ultimo formulario que va enviar los datos
    this.archivo=archivo;
    this.contenedor=contenedor;
    this.fileInputName=fileInputName;
    /**
     * metodo constructor utilizado para inicializar ciertas variables
     * @param formularioPublicacion
     * @param ruta
     * @param metodo
     * @param archivo
     * @param contenedor
     */
    this.init=function(formularioPublicacion,archivo,contenedor,fileInputName){
        this.formularioPublicacion=formularioPublicacion;
        this.archivo=archivo;
        this.contenedor=contenedor;
        this.fileInputName=fileInputName;
    }

    this.enviarEditar = function (formularioPublicacion, archivo, contenedor, fileInputName) {
        this.init(formularioPublicacion, archivo, contenedor, fileInputName);
        this.envioAjax();
    }
    /**
     *metodo que concatena los serialize de todos los formularios por los que se han pasado
     */
    this.enviar = function () {
        this.envioAjax();
    }
	/**
	*metodo que adiciona los datos del formulario
	*/

	this.addDatos=function(){
		var formData = new FormData();

		$.each($("#"+this.formularioPublicacion).serializeArray(), function(i, json) {
		   		formData.append(json.name, json.value);
		});
		for (j in this.archivo.getMap()) {
	     	formData.append(this.fileInputName+"[]",this.archivo.getMap()[j]);
	    }
		return formData;
	}
	/**
	*envio atravez de ajax de los datos almacenados al controlador
	*/
	this.envioAjax=function(){
			var objeto=this;
	        $.ajax({
	        	headers: {'X-CSRF-TOKEN':$("#"+this.formularioPublicacion+" input[name=_token]").val()},
	            url:$("#"+this.formularioPublicacion).attr("action"),
	            method: $("#"+this.formularioPublicacion).attr("method"),
	            data:this.addDatos(),
	            contentType: false,
                processData: false,
                dataType: 'json',
	            success: function(data)
	            {
	                objeto.ajaxRenderSection(data);
	            },
	            error: function(data)
	            {
					objeto.alerta(data.responseJSON);
	            }
	       });
	}
	this.alerta=function(errors){
		    var objeto=this;
		    var notificacion=new Notificacion();
			notificacion.crearContenedor();
        	$.each(errors, function(index, value) {
				notificacion.crearNotificacion(value,"DANGER");
				objeto.validacionCssColor(index,"1px solid #FE2E64");
        	});

	}
	this.ajaxRenderSection=function(data) {
          	var notificacion=new Notificacion();
			notificacion.crearContenedor();
        	notificacion.crearNotificacion("Su publicación se ha procesado exitósamente","SUCCESS");
			this.volverVaciosCamposFormulario(data);
     		$('.'+this.contenedor).prepend(data.html); //se toma la data en formato json, luego se borra el Div padre de el Sections y se pinta el json (data) como htlm
			contenedorPublicacion.visibleOcultarContenedores();
      		  pasopaso.atras('atras-tarea','publicacion-tareas','publicacion-publicaciones');
      		  pasopaso.atras('atras-area','publicacion-areas','publicacion-tareas');
    		this.renewToken(data.token);
    }
    this.validacionCssColor=function(name,css){
		$('input[name='+name+']').css("border",css);

    }
    this.volverVaciosCamposFormulario=function(data){
    	$.each($("#"+this.formularioPublicacion).serializeArray(), function(i, json) {
		   		if(json.name!="estado"){
		   			$('input[name='+json.name+']').val("");
		   		}
		});
		$('#fecha_final').val(data.hora_final);
    	this.borrarArchivos();

    }
    this.borrarArchivos=function(){
    	this.archivo.setMap(null);//eliminar el map de archivos
    	this.archivo.inicializar();
        $("#"+this.formularioPublicacion).find(".grupo-imagenes").empty();
    }
    this.renewToken=function(value){
		$('input[name=_token]').val(value);
    }

}


/**
 * el nuevo encvio de ajax para la publicacion de la edicion
 * @constructor
 */
function AjaxAll() {
    /***
     * datos de envio en formato json para los datos o texto
     * @param formulario
     * @returns {*|jQuery}
     */
    this.addDatos = function (formulario) {
        var jsonAll=$(formulario).serializeArray();

        $.each(jsonAll, function (i, json) {
            jsonAll.push({name: json.name, value:json.value});
        });
        return jsonAll;
    }
    /***
     * datos de envio con form data para los archivos
     * @param formulario
     * @param fileInputName
     * @returns {*}
     */
    this.addDatosArchivos=function(formulario, fileInputName){
        var formData = new FormData();

        $.each($(formulario).serializeArray(), function(i, json) {
            formData.append(json.name, json.value);
        });
        for (var j in archivo.getMap()) {
            formData.append(fileInputName+"[]",archivo.getMap()[j]);
        }
        return formData;
    }
    this.tamano=function(){
        var size=0;
        for (var j in archivo.getMap()) {
            size++;
        }
        return size;
    }
    /**
     *funcion de envio general
     */
    this.envioAjax = function (evento) {
        var formulario = $(evento).parents("form:first");
        if(this.tamano()>0){
            this.envioArchivos(formulario);
        }else{
            this.envioDatos(formulario);
        }
    }
    /**
     * funcion que envia solamente los datos de un formualario sin los archivos
     * @param formulario
     */
    this.envioDatos=function(formulario){
        var objeto=this;
        var dato=this.addDatos(formulario);
        $.ajax({
            headers: {'X-CSRF-TOKEN': $(formulario).find("input[name=_token]").val()},
            url: $(formulario).attr("action"),
            method: $(formulario).attr("method"),
            data: dato,
            dataType: 'json',
            success: function (data) {
                var notificacion = new Notificacion();
                notificacion.crearContenedor();
                notificacion.crearNotificacion(data.message, "SUCCESS");

                objeto.renewToken(data.token);
            },
            error: function (data) {
                objeto.alerta(data.responseJSON);
            }
        });
    }
    /**
     * funcion que envia los archivos al controlador
     * @param formulario
     */
    this.envioArchivos=function(formulario){
        var objeto=this;
        var dato=this.addDatosArchivos(formulario, "archivos");
        $.ajax({
            headers: {'X-CSRF-TOKEN': $(formulario).find("input[name=_token]").val()},
            url: $(formulario).attr("action"),
            method: $(formulario).attr("method"),
            data: dato,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function (data) {
                var notificacion = new Notificacion();
                notificacion.crearContenedor();
                notificacion.crearNotificacion(data.message, "SUCCESS");

                objeto.renewToken(data.token);
            },
            error: function (data) {
                objeto.alerta(data.responseJSON);
            }
        });
    }
    /**
     * renueva el token para envio de formulario
     * @param value
     */
    this.renewToken=function(value){
        $('input[name=_token]').val(value);
    }
    /**
     * fncion que vuelve vacios los campos del formulario
     * @param formulario
     */
    this.volverVaciosCamposFormulario = function (formulario) {
        $.each($(formulario).serializeArray(), function (i, json) {
            $('input[name=' + json.name + ']').val("");
        });
        archivo.inicializar();
    }
    /**
     * notificacion de alerta
     * @param errors
     */
    this.alerta = function (errors) {
        var notificacion = new Notificacion();
        notificacion.crearContenedor();
        $.each(errors, function (index, value) {
            notificacion.crearNotificacion(value, "DANGER");
        });
    }
}
/**
 * paginado
 * @constructor
 */
function AjaxPaginado(){
    this.inicial=0;
    this.final=9;
    this.enviar=function(formulario) {

        var objeto=this;
        publicacion.cambiarFormularioPaginado(formulario,'pagePublication',this.inicial,this.final,'GET');
        var json= {"inicial":this.inicial, "final":this.final};
            $.ajax({
            headers: {'X-CSRF-TOKEN': $(formulario).find("input[name=_token]").val()},
            url: $(formulario).attr("action"),
            method:'GET',
            data: json,
            dataType: 'json',
            success: function (data) {
                var notificacion = new Notificacion();
                notificacion.crearContenedor();
                notificacion.crearNotificacion(data.message, "SUCCESS");
                objeto.renewToken(data.token);
                objeto.inicial=data.inicial;
                objeto.final=data.final;
                if(data.html!=null  || data.html!="") {
                    $('.contenedor-cuerpo').prepend(data.html);
                }
            },
            error: function (data) {
                console.log("error");
            }
        });
    }
    /**
     * renueva el token para envio de formulario
     * @param value
     */
    this.renewToken=function(value){
        $('input[name=_token]').val(value);
    }

    /**
     * f
     * @param evento
     */
    this.scrollPaginado=function(evento){
        if($(evento).find(".paginado-publicacion-"+this.final).length!=0) {
            var altura = $(evento).find(".paginado-publicacion-" + this.final).offset();
            altura = altura.top;
            if (altura <= 0) {
                this.enviar($(evento).find(".paginado-publicacion-"+this.final).parents("form:first"));
            }
        }
    }
    this.setFinal=function(final){
        this.final=final;
    }
    this.getFinal=function(){
        return this.final;
    }
}




