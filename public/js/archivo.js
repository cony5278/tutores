function Archivo(idFormulario,contenedorArchivo,contenedorHijo) {
    /**
	 * varibles de clase
     */
	this.idFormulario=idFormulario;
	this.contenedorArchivo=contenedorArchivo;
	this.contenedorHijo=contenedorHijo;
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
        this.setIdFormulario(idFormulario);
        this.setContenedorArchivo(contenedorArchivo);
        this.inicializar();
	}
    /**
	 * metodo que adiciona un archivo al array de archivos
     * @param i
     * @param archivo
     */
	this.addArchivos=function(i,archivo){
		this.map[this.nombre+i]=archivo;
	}
    /**
	 * metodo que elimina un archivo del array de archivos
     * @param numero
     */
	this.eliminar=function(numero){		
	
		this.map[this.nombre+numero]=null;
	}
    /**
	 * sirve cuando son muchos formularios
     * @param evento
     */
	this.cargarMForm=function(evento,idFormulario,contenedorArchivo,idPublicacion){
        if (evento.value.length == 0) {
            publicacion.contenidoBtnEnvioI(false);
        }else {
        	publicacion.contenidoBtnEnvioI(true);
            publicacion.cambiarFormulario(this,'GET',3,idPublicacion);
            this.init(idFormulario, contenedorArchivo);
            var archivos = evento.files;
            var size = archivos.length;
            this.cont++;
            this.general(archivos, size);
        }
	}
    /**
	 * metodo que se llama al cargar los arhcivos con un input
     * @param evento
     */
	this.cargar=function(evento){
							    
			var archivos=evento.files;			  
	     	var size=archivos.length;	       	   
	     	this.cont++;
	     	this.general(archivos,size);		 	 
	}
    /**
	 * metodo general el cual lee el archivo local
     * @param archivos
     * @param size
     */
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
    /**
	 * metodo que es llamado cuando se hace el arrastre del archivo
     * @param e
     */
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
    /**
	 * metodo que renderiza los archivos o imagenes de los archivos
     * @param ruta
     * @param i
     * @param archivo
     */
	this.contenedorArchivos=function(ruta,i,archivo){
		//var mega=(((archivo.size/1024)/1024));
		$("."+this.contenedorArchivo).append(
			this.addHtml(ruta,i,archivo)
		);
	}
    /**
	 * metodo que renderiza el html que es necesario para que se visualicen las imagenes
     * @param ruta
     * @param i
     * @param archivo
     * @returns {string}
     */
	this.addHtml=function(ruta,i,archivo){
		var html= "<div class='"+this.contenedorHijo+" col-xs-12 col-md-6'>";
            html+="<span  id='contenedor-archivos-subida-"+i+"' onclick='archivo.cerrarCuadroArchivo(this)' class='cr'><i class='contenedor-archivos-cerrar glyphicon glyphicon-remove-circle'></i></span>";
            html+="<div class='panel panel-default'>";
            html+="<div class='col-sm-12 chequeo-archivos'>";
            html+="<div class='checkbox '>";
            html+="<label>";
            html+="<input type='checkbox' name='eliminar' >";
            html+="<span class='cr'><i class='cr-icon glyphicon glyphicon-ok'></i></span>";
            html+="</label>";
            html+="</div>";
            html+="</div>";
            html+="<div class='panel-image'>";
            html+="<img src='"+ruta+"' class='panel-image-preview' />";
            html+="<label for='toggle-1'></label>";
            html+="</div>";
            html+="<div class='panel-footer text-center'>";
            html+="<div class='nombre-archivo-publicacion'><a href='#download'><span class='glyphicon glyphicon-download'>"+archivo.name+"</span></a></div>";
            html+="<div class='nombre-archivo-publicacion-form'><input type='text' class='form-control nombre-archivo-publicacion-form' />";
            html+="</div>";
            html+="</div>";
            html+="</div>";
            html+="</div>";
            return html;
	}
    /**
	 *
     */
	this.eliminarTodoArchivo=function(){
		this.init(null,null);
        $("."+this.contenedorHijo).hide();
	}
    /**
	 * metodo que deacuerdo al tipo de archivo selecciona una imagen de la base de datos
     * @param extension
     * @returns {*}
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
    /**
	 * metodo para cerrar el cuadro que renderiza el archivo tambien se llama el elimnar del array que continene los archivos
     * @param evento
     */
	this.cerrarCuadroArchivo=function(evento){	
		var contenedor=$(evento);
		contenedor.parent().css("display", "none" );
		var id=contenedor.attr('id').split("-");
		this.eliminar(id[3]);
	}
    /**
	 * metodos get y set
     * @returns {string}
     */
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
