
/**
*formularioPublicacion=>id del formulario el cual va enviar la informacion al controlador
*ruta=>ruta del controlador,
*metodo=>metodo POST,PUT,GET
*json=>tiene el objeto json con los dormualrios
*/
function EnvioDatos(formularioPublicacion,ruta,metodo) {
	this.formularioPublicacion=formularioPublicacion;//variable que almacena el id del ultimo formulario que va enviar los datos
	this.ruta =ruta;//variable que almacena la ruta donde se van a enviar los datos
	this.metodo=metodo;//metodo de envio POST,PUT ,GET	
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
	     var archivos=$("#"+this.formularioPublicacion+" .archivos")[0].files;
	     var size=archivos.length;
	     for (var i = 0; i < size; i++) {
	     		formData.append("archivos[]",archivos[i]);
	     }	   
		return formData;
	}
	/**
	*envio atravez de ajax de los datos almacenados al controlador
	*/
	this.envioAjax=function(){ 	
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
	                
	            },
	            error: function(jqXHR, textStatus, errorThrown)
	            {
	              
	            }
	       });	  
	}
}

