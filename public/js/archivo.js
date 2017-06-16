function Archivo(idFormulario,contenedorArchivo) {
	this.idFormulario=idFormulario;
	this.contenedorArchivo=contenedorArchivo;
	this.map;
	this.nombre="archivo-";
	this.inicializar=function(){
		this.map=new Array();
	}
	this.addArchivos=function(i,archivo){
		this.map[this.nombre+i]=archivo;
	}
	this.eliminar=function(numero){		
		console.log("eliminacion "+this.nombre+numero);
		this.map[this.nombre+numero]=null;
	}
	this.cargar=function(evento){
							    
			var archivos=evento.files;			  
	     	var size=archivos.length;
	     	var objeto=this;   	   

			for (var i = 0; i < size; i++) {					
					var ruta=this.seleccionarRuta(archivos[i].name.split('.').pop());
					var reader = new FileReader();
					if(ruta!=null){	
						this.addArchivos(i,archivos[i]);				
						this.contenedorArchivos(ruta,i);
				 	}else{				 	
					 
						reader.onload = (function(theFile) {
					        return function(e) {					       
					 		objeto.addArchivos(i,theFile);					 		
							objeto.contenedorArchivos(e.target.result,i);		
					        };
					      })(archivos[i]);

					      // Read in the image file as a data URL.
					      reader.readAsDataURL(archivos[i]);				
				 	}	
			 		   
			}
			 	 
	}	
	this.contenedorArchivos=function(ruta,i){	
		$("."+this.contenedorArchivo).append(
			"<div style='postion:relative; class='contenedor-archivos-subida'>"+
			"<a class='contenedor-archivos-subida-"+i+"' onclick='archivo.cerrarCuadroArchivo(this)' style='dysplay:block;'>"+
			"x"+
			"</a>"+
			"<a href='#'><img src='"+ruta+"' /></a>"+
			"</div>"
		);			
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
			}
		return null;
	}

	this.cerrarCuadroArchivo=function(evento){	
		var contenedor=$(evento);
		contenedor.parent().css("display", "none" );
		this.eliminar(contenedor.attr('class').slice(-1));

	}
	this.getNombre=function(){
		return this.nombre;
	}
	this.getMap=function(){
		return this.map;
	}

}