/*objeto que vuelve visible un objeto
*claseAccion=>el evento onclick va ha buscar esta clase para ejecutar una accion
*claseAccionOtro=>el evento onclick va ha buscar esta clase para ejecutar una accion
*claseAccionOtro=>se utiliza para cuando el objeto claseAccion no es el mismo
*claseVisible=>objeto que va a volver visible 
*json=>objeto contenedores que se van a ocultar
*animacion=>con animacion true y sin animacion false
*/
function Contenedor(claseVisible,json,animacion) {
  this.estado=false;//estado para volver visible o ocultar el objeto dom
  this.clase=claseVisible;//json con los formularios o contenedores a ocultar
  this.json=json;//objeto clase que da click
  this.animacion=animacion;
 		
  this.visibleContenedorClase=function(nombreClase,estado){     
     if(estado){      
        $('.'+nombreClase).show(this.animacion?"slow":null);
      }else{        
        $('.'+nombreClase).hide(this.animacion?"fast":null);
      }  
  }

  this.visibleContenedor=function(){ 
    this.estado=!this.estado;
    this.visibleContenedorClase(this.clase,this.estado);  	 
  }
  /**
  *la primera clase es la que va hacer visible las otras se van a ocultar
  */
  this.visibleOcultarContenedores=function(){ 
    for(i in this.json){
      if(i!=1){      
        this.visibleContenedorClase(this.json[i],false); 
      }else{     
        this.visibleContenedorClase(this.json[i],true);     
      }
    }
  }

    this.isEmpty=function (str) {
        return (!str || 0 === str.length || str === null);
    }
  
  this.accion=function(){   
      this.visibleContenedor(); 
     if(!this.isEmpty(this.claseAccionOtro)){       
          this.visibleContenedor();    
      }
  }
}
