function EnvioDatos(idFomulario,ruta) {
	this.idFomulario=idFomulario;
	this.ruta =ruta;
	this.datosTodos=null;//contiene los datos concatenados de todos los formularios
	this.datosActual=null;//contiene los datos actuales de formulario
	var map = new Map;//mapas
	this.guardarDatosFormulario=function(idFomulario){
			$("#"+idFomulario).on("click", function(e){	
			//colocar las validaciones								
					if(EnvioDatos.datosTodos!=null){
						EnvioDatos.datosTodos=EnvioDatos.datosTodos+$(this).serialize();
			 		}else{EnvioDatos.datosTodos=$(this).serialize();
			 			EnvioDatos.datosActual=EnvioDatos.datosTodos;			 			
			 		}
			 		console.log("TODOS: "+EnvioDatos.datosTodos+" ACTUAL: "+EnvioDatos.datosActual);			 			
			 })
	}
	this.atras=function(btn,visible,ocultar){
		EnvioDatos.datosTodos=null;
		var atras=new DomDivVisible(btn,
									 null,
									 visible,								
									 ocultar,
									 false);
		atras.accion();	
	}
	this.siguiente=function(btn,visible,ocultar,idFormulario){
		this.guardarDatosFormulario(idFormulario);	
		var siguienteTarea=new DomDivVisible(btn,
									 null,
									 visible,
									 ocultar,								
									 false);
		siguienteTarea.accion();		
		return false;
	}

	this.mostrar=function(){
		var rutas=this.ruta;
		$("#"+this.idFormulario).on("submit", function(e)
    {
        e.preventDefault();
        e.stopPropagation();      
        $.ajax({
            url:rutas,
            method: $(this).attr("method"),
            data: $(this).serialize(),
            dataType: 'json',
            success: function(res)
            {
                
            },
            error: function(jqXHR, textStatus, errorThrown)
            {
              
            }
        })
    })
	
	}
}

