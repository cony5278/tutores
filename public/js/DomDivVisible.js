/*objeto que vuelve visible un objeto
*claseAccion=>el evento onclick va ha buscar esta clase para ejecutar una accion
*claseAccionOtro=>el evento onclick va ha buscar esta clase para ejecutar una accion
*claseAccionOtro=>se utiliza para cuando el objeto claseAccion no es el mismo
*claseVisible=>objeto que va a volver visible 
*claseContenedorOcultar=>objeto que va a volver invisible
*animacion=>con animacion true y sin animacion false
*/
function DomDivVisible(claseAccion,claseAccionOtro,claseVisible,claseContenedorOcultar,animacion) {
  this.estado=false;//estado para volver visible o ocultar el objeto dom
  this.claseAccion=claseAccion;//objeto clase que da click
  this.clase=claseVisible;//clase que se va ha ocultar o ser visible
  this.ocultar=claseContenedorOcultar;//objeto clase que da click
  this.animacion=animacion;
  this.claseAccionOtro=claseAccionOtro;
 		
  this.visibleClass=function(){ 
  	  this.estado=!this.estado;

  	 if(this.estado){
        if(!this.isEmpty(this.ocultar)){
  	 	     $('.'+this.ocultar).hide();
         }
  	  	$('.'+this.clase).show(this.animacion?"slow":null);
  	  }else{
         if(!this.isEmpty(this.ocultar)){
  	       	$('.'+this.ocultar).show();
          } 
  	  	$('.'+this.clase).hide(this.animacion?"fast":null);
  	  }  	 
  }
    this.isEmpty=function (str) {
        return (!str || 0 === str.length);
    }
  this.onClick=function(){
  	var objeto=this;
  	$("."+this.claseAccion).on("click", function() {   
			objeto.visibleClass();
	   });		
     if(!this.isEmpty(this.claseAccionOtro)){
        $("."+this.claseAccionOtro).on("click", function() {   
          objeto.visibleClass();
         });  
      }
  }
}
