function Imagen(idFormulario) {
	this.idFormulario=idFormulario;
	this.cambiar=function(){
		$("#"+this.idFormulario+" input[type=file]").on("change",function(){
			alert(this.val());//I mean name of the file
		});
	}
}