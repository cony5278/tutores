
/**
*formularioPublicacion=>id del formulario el cual va enviar la informacion al controlador
*ruta=>ruta del controlador,
*metodo=>metodo POST,PUT,GET
*/
function EnvioDatos(formularioPublicacion,ruta,metodo) {
	this.formularioPublicacion=formularioPublicacion;//variable que almacena el id del ultimo formulario que va enviar los datos
	this.ruta =ruta;//variable que almacena la ruta donde se van a enviar los datos
	this.map= new Array();//variable que guarda los datos serialize de los formularios	
	this.metodo=metodo;//metodo de envio POST,PUT ,GET
	this.guardarDatosFormulario=function(idFomulario){
			var objeto=this;
			$("#"+idFomulario).on("click", function(e){				
				objeto.map[idFomulario]=$(this).serialize()		
			})			
	}
	/**
	*metodo que concatena los serialize de todos los formularios por los que se han pasado
	*/
	this.enviar=function(){		
		var datos=this.map['formularioArea']+
				  this.map['formularioTarea']+
				  this.map['formularioPublicacion'];
		this.envioAjax(datos);
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
		this.guardarDatosFormulario(idFormulario);	
		var siguienteTarea=new DomDivVisible(btn,
									 null,
									 visible,
									 ocultar,								
									 false);
		siguienteTarea.accion();		
	}
	/**
	*envio atravez de ajax de los datos almacenados al controlador
	*/
	this.envioAjax=function(dato){ 
		//antes de enviar los datos se capturan los datos del ultimo formulario para este caso en esl formulario de publiciones
		this.guardarDatosFormulario(this.formularioPublicacion);
		//fin
		//envion de datos por ajax	
	        $.ajax({
	            url:"areas",
	            method: this.metodo,
	            data: dato,
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

