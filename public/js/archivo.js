function Archivo(idFormulario,contenedorArchivo) {
	this.idFormulario=idFormulario;
	this.contenedorArchivo=contenedorArchivo;
	this.map;
	this.nombre="archivo-";
	this.cont;
    /**
	 * metodo utilizado cuando es solo un formulario
     */
	this.inicializar=function(){
		this.map=new Array();
		this.cont=-1;
	}
    /**
	 * metodo utilizado cuando son varios formularios
     */
	this.init=function(idFormulario,contenedorArchivo){
        this.setIdFormulario(null);
        this.setContenedorArchivo(null);
        this.inicializar();
	}
	this.addArchivos=function(i,archivo){
		this.map[this.nombre+i]=archivo;
	}
	this.eliminar=function(numero){		
	
		this.map[this.nombre+numero]=null;
	}
    /**
	 * sirve cuando son muchos formularios
     * @param evento
     */
	this.cargarMForm=function(evento,idFormulario,contenedorArchivo){
		this.init(idFormulario,contenedorArchivo);
        var archivos=evento.files;
        var size=archivos.length;
        this.cont++;
        this.general(archivos,size);
	}
	this.cargar=function(evento){
							    
			var archivos=evento.files;			  
	     	var size=archivos.length;	       	   
	     	this.cont++;
	     	this.general(archivos,size);		 	 
	}	
	this.general=function(archivos,size){
		var objeto=this; 
		for (var i = 0; i < size; i++,this.cont++) {									
					var ruta=this.seleccionarRuta(archivos[i].name.split('.').pop());
					var reader = new FileReader();
					if(ruta!=null){						
						this.addArchivos(this.cont,archivos[i]);				
						this.contenedorArchivos(ruta,this.cont,archivos[i]);
				 	}else{				 	
					 
						reader.onload = (function(theFile) {
					        return function(e) {		
					        objeto.cont++;					        		       
					 		objeto.addArchivos(objeto.cont,theFile);					 		
							objeto.contenedorArchivos(e.target.result,objeto.cont,theFile);		
					        };
					      })(archivos[i]);

					      // Read in the image file as a data URL.
					      reader.readAsDataURL(archivos[i]);				
				 	}	
			 		   
			}
	}
	this.cargarDrop=function(e) {
	    e.preventDefault();
	    if(e.dataTransfer && e.dataTransfer.files.length != 0){
	        var archivos = e.dataTransfer.files //Array of filenames
	        var size=e.dataTransfer.files.length;
	        this.general(archivos,size);
	    }else{
	        // browser doesn't support drag and drop.
	    }   

	}
	this.contenedorArchivos=function(ruta,i,archivo){	
		var mega=(((archivo.size/1024)/1024));

		$("."+this.contenedorArchivo).append(
			"<li onmouseover='archivo.informacionIn(this,"+i+")' onmouseout='archivo.informacionOut(this,"+i+")' class='contenedor-archivos-subida' onmou>"+
			"<div class='contenedor-archivos-cerrar' id='contenedor-archivos-subida-"+i+"' onclick='archivo.cerrarCuadroArchivo(this)' style='dysplay:block;'>"+
			"<a>x</a>"+
			"</div>"+
			"<img src='"+ruta+"' />"+
			"<div class='informacion-archivo' id='informacion-archivo-"+i+"'>"+
			archivo.name+
			"<br>"+mega.toFixed(2)+
			"<div>"+
			"</li>"
		);			
	}
	this.addHtml=function(){
		var html= "<div class='col-xs-12 col-md-6'>";

            <div class="panel panel-default">

            <div class="col-sm-12 chequeo-archivos">
            <div class="checkbox ">
            <label>
            <input type="checkbox" name="eliminar-{{$documento->id}}" >
            <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
            </label>
            </div>
            </div>

            <div class="panel-image">
            <img src="{{$documento->extension($documento->id)}}" class="panel-image-preview" />
            <label for="toggle-1"></label>
            </div>
            <div class="panel-footer text-center">
            <div class="nombre-archivo-publicacion"><a href="#download"><span class="glyphicon glyphicon-download">{{$documento->archivo}}</span></a></div>
        <div class="nombre-archivo-publicacion-form"><input type="text" name="{{$documento->id}}" class="form-control nombre-archivo-publicacion-form" value="{{$documento->archivo}}"/>
            </div>
            </div>
            </div>
            </div>
	}
	this.informacionOut=function(evento,i){		
		$(evento).parent().find("#informacion-archivo-"+i).css("display","none");
	}
	this.informacionIn=function(evento,i){
		$(evento).parent().find("#informacion-archivo-"+i).css("display","block");
	}
	/**
	*funcion que renderiza una imagen o un archivo
	*/
	this.seleccionarRuta=function(extension){
			switch(extension) {
			    case "xls":
			        return "http://localhost:8000/img/xls.jpg";
			        break;
			    case "csv":
			        return "http://localhost:8000/img/csv.jpg";
			        break;
			    case "xlsx":
			        return "http://localhost:8000/img/xls.jpg";
			    break;
			    case "pdf":
			        return "http://localhost:8000/img/pdf.jpg";
			    break;
			    case "docx":
			        return "http://localhost:8000/img/docx.jpg";
			    break;
  				case "doc":
			        return "http://localhost:8000/img/docx.jpg";
			    break;	   
			    case "pps":
			        return "http://localhost:8000/img/point.jpg";
			    break;	
			    case "ppt":
			        return "http://localhost:8000/img/point.jpg";
			    break;	
			    case "ppsx":
			        return "http://localhost:8000/img/point.jpg";
			    break;
			     case "zip":
			        return "http://localhost:8000/img/winrar.jpg";
			    break;		
			      case "rar":
			        return "http://localhost:8000/img/winrar.jpg";
			    break;		
			}
		return null;
	}

	this.cerrarCuadroArchivo=function(evento){	
		var contenedor=$(evento);
		contenedor.parent().css("display", "none" );
		var id=contenedor.attr('id').split("-");
		this.eliminar(id[3]);
	}
	this.getNombre=function(){
		return this.nombre;
	}
	this.getMap=function(){
		return this.map;
	}
	this.getContenedorArchivo=function(){
		return this.contenedorArchivo;
	}
	this.setMap=function(map){
		return this.map=map;
	}
    this.setIdFormulario=function(idFormulario){
		this.idFormulario=idFormulario;
    }
    this.setContenedorArchivo=function(contenedorArchivo){
    	this.contenedorArchivo=contenedorArchivo;
    }
}
