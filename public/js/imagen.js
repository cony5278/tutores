function Imagen(idFormulario) {
	this.idFormulario=idFormulario;
	this.cambiar=function(){
		var objeto=this;
		$("#"+this.idFormulario+" input[type=file]").on("change",function(){					    
			    var archivos=$("#"+objeto.idFormulario+" .archivos")[0].files;
	     		var size=archivos.length;
			     for (var i = 0; i < size; i++) {						
						var reader = new FileReader();
					    reader.onload = function (e) {
					        $("#"+objeto.idFormulario+" img").attr("src", e.target.result);
					    }
					    reader.readAsDataURL(archivos[i]);
			     }	 
		});
	}
}