function Archivo() {
    this.formulario = null;
    this.map;
    this.nombre = "archivo-";
    this.cont;
    /**
     * metodo utilizado cuando es solo un formulario
     */
    this.inicializar = function () {
        this.map = new Array();
        this.cont = -1;
        $('.contenedor-editar-publicacion').hide();
    }
    /**
     * metodo utilizado cuando son varios formularios
     */
    this.init = function (formulario) {
        this.formulario = formulario;
    }
    /**
     * metodo que adiciona un archivo al array de archivos
     * @param i
     * @param archivo
     */
    this.addArchivos = function (i, archivo) {
        console.log("numero archivos"+i);
        this.map[this.nombre + i] = archivo;
    }
    /**
     * metodo que elimina un archivo del array de archivos
     * @param numero
     */
    this.eliminar = function (numero) {
        console.log(" matona "+this.nombre + numero);
        this.map[this.nombre + numero] = null;
    }
    /**
     * sirve cuando son muchos formularios
     * @param evento
     */
    this.cargarMForm = function (evento,formulario) {

        if (evento.value.length == 0) {
            console.log("");
        } else {
            this.init(formulario);
            var archivos = evento.files;
            var size = archivos.length;
            this.cont++;
            this.general(archivos, size);
        }
    }

    this.nombreSinExtension = function (nombreArchivo) {
        return nombreArchivo.split('.')[0];
    }
    /**
     * metodo que se llama al cargar los arhcivos con un input
     * @param evento
     */
    this.cargar = function (evento,formulario) {
        this.init(formulario);
        var archivos = evento.files;
        var size = archivos.length;
        this.cont++;
        this.general(archivos, size);
    }
    /**
     * metodo general el cual lee el archivo local
     * @param archivos
     * @param size
     */
    this.general = function (archivos, size) {
        var objeto = this;
        for (var i = 0; i < size; i++, this.cont++) {

            var ruta = this.seleccionarRuta(archivos[i].name.split('.').pop());
            var reader = new FileReader();
            if (ruta != null) {
                this.addArchivos(this.cont, archivos[i]);
                this.contenedorArchivos(ruta, this.cont, archivos[i]);
            } else {

                reader.onload = (function (theFile) {
                    return function (e) {
                        objeto.cont++;
                        objeto.addArchivos(objeto.cont, theFile);
                        objeto.contenedorArchivos(e.target.result, objeto.cont, theFile);
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
    this.cargarDrop = function (e,formulario) {
        e.preventDefault();
        if (e.dataTransfer && e.dataTransfer.files.length != 0) {
            this.init(formulario);
            var archivos = e.dataTransfer.files //Array of filenames
            var size = e.dataTransfer.files.length;
            this.general(archivos, size);
        } else {
            // browser doesn't support drag and drop.
        }

    }
    /**
     * metodo que renderiza los archivos o imagenes de los archivos
     * @param ruta
     * @param i
     * @param archivo
     */
    this.contenedorArchivos = function (ruta, i, archivo) {

        $(".grupo-imagenes").append(
            this.addHtml(ruta, i, archivo)
        );
    }
    /**
     * metodo que renderiza el html que es necesario para que se visualicen las imagenes
     * @param ruta
     * @param i
     * @param archivo
     * @returns {string}
     */
    this.addHtml = function (ruta, i, archivo) {
        var html = "<div class='contenedor-editar-publicacion col-xs-12 col-md-6'>";
        html += "<span  id='contenedor-archivos-subida-" + i + "' onclick='archivo.cerrarArchivo(this)' class='cr'><i class='contenedor-archivos-cerrar glyphicon glyphicon-remove-circle'></i></span>";
        html += "<div class='panel panel-default'>";
        html += "<div class='col-sm-12 chequeo-archivos'>";
        html += "<div class='checkbox '>";
        html += "<label>";
        html += "<input type='checkbox' name='eliminar' >";
        html += "<span class='cr'><i class='cr-icon glyphicon glyphicon-ok'></i></span>";
        html += "</label>";
        html += "</div>";
        html += "</div>";
        html += "<div class='panel-image'>";
        html += "<img src='" + ruta + "' class='panel-image-preview' />";
        html += "<label for='toggle-1'></label>";
        html += "</div>";
        html += "<div class='panel-footer text-center'>";
        html += "<div class='nombre-archivo-publicacion'><a href='#download'><span class='glyphicon glyphicon-download'>" + this.nombreSinExtension(archivo.name) + "</span></a></div>";
        html += "<div class='nombre-archivo-publicacion-form'><input type='text' class='form-control nombre-archivo-publicacion-form' />";
        html += "</div>";
        html += "</div>";
        html += "</div>";
        html += "</div>";
        return html;
    }
    this.cerrarArchivo=function(evento){
        var contenedor=$(evento);
        contenedor.parent().css("display", "none" );

        var id=contenedor.attr('id').split("-");
        console.log("eliminar "+id[3]);

        this.eliminar(id[3]);
    }

    /**
     * metodo que deacuerdo al tipo de archivo selecciona una imagen de la base de datos
     * @param extension
     * @returns {*}
     */
    this.seleccionarRuta = function (extension) {
        switch (extension) {
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

    this.getMap = function () {
        return this.map;
    }

    this.setMap = function (map) {
        return this.map = map;
    }
}