$(function(){
    var error_obligatorio = '<span class="error_obligatorio"><i><i class="fas fa-ban"></i> Este campo es obligatorio</i><span>'

    $("#btnRegister").on('click', function(event) {
        event.preventDefault();
        
        var question = "";
        var answer   = "";
		
		if( $("#preguntaTexto").val() == "" ) {
			$("#preguntaTexto").parent().children('h1').after(error_obligatorio);
			$("#preguntaTexto").focus();
			return false;
		}else if( $("#txtLugar").val() == "" ){
			$("#respuestaTexto").parent().children('h2').after(error_obligatorio);
			$("#respuestaTexto").focus();
			return false;
		}
        
        var question = $("#preguntaTexto").val();
        var answer   = $("#respuestaTexto").val();

        $.post(RUTA + 'preguntas/guardarPregunta',
            { quest:question ,answ:answer }, function(data, textStatus, xhr) {
               mostrarMensaje("msj_correcto","Pregunta Registrada");
        });
    });

    $('#preguntaTexto,#respuestaTexto').on('keyup', function(event) {
    	event.preventDefault();
    	/* Act on the event */
    	$(this).parent().children('span').remove();
    	return false;
    });

    $("#btnRegister").on('click', function(event) {
        event.preventDefault();
        
        $('#preguntaTexto,#respuestaTexto').val('');
		
        return false;
    });
})