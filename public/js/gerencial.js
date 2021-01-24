$(function(){
    $("#btnRegister").on('click', function(event) {
		event.preventDefault();
        
        $("#formGerencial").trigger('submit');
        
        return false
    });

     //enviar formulario
     $("#formGerencial").on('submit', function(event) {
        /* Act on the event */
        event.preventDefault();
		var str = $(this).serialize();

		$.post(RUTA + 'gerencial/grabarDocumento',str, function(data, textStatus, xhr) {
			mostrarMensaje("msj_correcto","Registrado Correctamente");
			$("#formGerencial").trigger("reset");	 
        });
        
		return false;
	});
})