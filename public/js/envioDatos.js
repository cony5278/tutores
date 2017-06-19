
/**
*formularioPublicacion=>id del formulario el cual va enviar la informacion al controlador
*ruta=>ruta del controlador,
*metodo=>metodo POST,PUT,GET
*archivo=>objeto arhivos que almacena todos los archivos
*contenedor=>es el contenedor que despues del envio de los datos va a renderizar inmediatemente la informacion
*/
function EnvioDatos(formularioPublicacion,ruta,metodo,archivo,contenedor) {
	this.formularioPublicacion=formularioPublicacion;//variable que almacena el id del ultimo formulario que va enviar los datos
	this.ruta =ruta;//variable que almacena la ruta donde se van a enviar los datos
	this.metodo=metodo;//metodo de envio POST,PUT ,GET	
	this.archivo=archivo;
	this.contenedor=contenedor;
	/**
	*metodo que concatena los serialize de todos los formularios por los que se han pasado
	*/
	this.enviar=function(){	
		this.envioAjax();
	}
	/**
	*metodo que oculta el formulario vuelve oculto en formulario actual y visible el anterior
	*/
	this.atras=function(btn,visible,ocultar){		
		var atras=new DomDivVisible(btn,
									 null,
									 visible,								
									 ocultar,
									 false);
		atras.accion();	
	}
	/**
	*metodo que oculta el formulario anterior y vuelve visible el siguiente
	*/
	this.siguiente=function(btn,visible,ocultar,idFormulario){
		//var validacion=new Validacion(idFormulario);
		//	validacion.validarInput(idFormulario);		
		var siguienteTarea=new DomDivVisible(btn,
									 null,
									 visible,
									 ocultar,								
									 false);
		siguienteTarea.accion();		
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
			console.log(j);	
	     	formData.append("archivos[]",this.archivo.getMap()[j]);
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
	            url:this.ruta,	        
	            method: this.metodo,
	            data:this.addDatos(),
	            contentType: false,
                processData: false,
                dataType: 'json',
	            success: function(res)
	            {
	                objeto.ajaxRenderSection("usuario",objeto.contenedor);
	            },
	            error: function(jqXHR, textStatus, errorThrown)
	            {
	              
	            }
	       });	  
	}
	this.ajaxRenderSection=function(url,contenedor) {
        $.ajax({
            type: 'GET',
            url: url,
            dataType: 'json',
            success: function (data) {
           
            	notificacion.crearContenedor();
            	notificacion.crearNotificacion("Su publicacion se ha procesado exitosamente","blue");        
                $('.'+contenedor).empty().append(data.html); //se toma la data en formato json, luego se borra el Div padre de el Sections y se pinta el json (data) como htlm
            	contenedorPublicacion.visibleOcultarContenedores();
            },
            error: function (data) {
            	alert("error");
            	console.log(data);
                var errors = data.responseJSON;
                if (errors) {
                    $.each(errors, function (i) {
                        console.log(errors[i]);
                    });
                }
            }
        });
    }
}

