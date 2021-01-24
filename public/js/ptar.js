$(function(){
    
    $("#btnRegister").on('click', function(event) {
		event.preventDefault();
        
        $("#formPtar").trigger('submit');
        
        return false
		
    });

     //enviar formulario
     $("#formPtar").on('submit', function(event) {
        /* Act on the event */
        event.preventDefault();
        var str = $(this).serialize();
        
        //console.log(str);

		$.post(RUTA + 'ptar/grabarDocumento',str, function(data, textStatus, xhr) {
			mostrarMensaje("msj_correcto","Registrado Correctamente");
			$("#formPtar").trigger("reset");	 
        });
        
		return false;
	});
})