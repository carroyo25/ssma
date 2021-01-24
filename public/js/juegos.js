$(function(){
    var limit = 15;
     
    setInterval(function(){
        limit--;
        $(".info_time span").text(limit);
        
        if (limit == 0) {
            limit = 16;
            window.location = RUTA + "juegos";
        }
    },1000);
    

    $("button").on('click', function () {
        
        var codigoPregunta = $(".pregunta h1").data('codigo')
        var usuario =  $("#idus").text();
        var codigoRespuesta = $(this).attr('id');

        if ( codigoPregunta === codigoRespuesta ) {
            $(this).addClass("buttonOk");
        }
        else {
            $(this).addClass("buttonError");
        }

        $.post(RUTA + 'juegos/guardarScore',{ user: usuario,quest:codigoPregunta ,answer: codigoRespuesta},function(data, textStatus, xhr) {});

        window.location = RUTA + "juegos";
    });
})

