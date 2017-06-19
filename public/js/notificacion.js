function Notificacion(){
	this.contador=-1;
	this.crearContenedor=function(){
		if($('.notificacion').css('display') == 'none'){
			$('.notificacion').fadeIn(300).animate({top:"0"},700);	
			$('.notificacion').show();		
		}
		this.ocultarContenedor();
	}
	this.ocultarContenedor=function(){
		var objeto=this;	
		var intervalo=setInterval(function (){			
			if(objeto.esVacio("notificacion-mensajes")){				
				$('.notificacion').empty();
				$('.notificacion').hide();	
				clearInterval(intervalo);
			}
		},1000);		
	}
	this.esVacio=function(elemento){	
		if($("."+elemento).length >0){
			return false;
		}else{
			return true;
		}			
	}
	this.crearNotificacion=function(mensaje,color){
		var objeto=this;
		this.contador++;
		var id=this.contador;
		$('.notificacion').append(this.html(mensaje,color));
		$('#notificacion-'+id).fadeIn(300);
		this.ocultarNotificacion(id);		
	}
	this.ocultarNotificacion=function(id){
		setTimeout(function() {
        	$('#notificacion-'+id).fadeOut(400);        	
        	$('#notificacion-'+id).remove();
   		},3000);
	}
	this.html=function(mensaje,color){
		var codigo='<div class="notificacion-mensajes"  id="notificacion-'+this.contador+'" style="display: none;">';
			codigo+=mensaje;
			codigo+='<a  onclick="notificacion.cerrar(this)">x</a>';
			codigo+='</div>';
		return codigo;
	}		
	this.cerrar=function(evento){	
		$(evento).parent().remove();
	}
}