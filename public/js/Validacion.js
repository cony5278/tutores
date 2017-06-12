function Validacion(idFormulario){
	this.idFormulario=idFormulario;
	this.validarInput=function(elemento){		
		$("#"+this.idFormulario).find(':input').each(function() { //esta es la función que hace que recorrar todos los “form” que haya en nuestro 
			console.log($(this).val());
		});
	}
	this.validarCheck=function(elemento){
	
		
			// $("#"+this.nombreFormulario+" "+elemento).each(function(){
			// 		if(){

			// 		}
		 //            if($(this).is(':checked')){
		               
		 //            }
		 //    });

	}
}