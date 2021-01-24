$(function(){
    $("#btnRegister").on('click', function(event) {
        event.preventDefault();
        
        
        
        $("#formSeguridad").trigger('submit');

        return false
    });

     //enviar formulario
     $("#formSeguridad").on('submit', function(event) {
        /* Act on the event */
        event.preventDefault();

        var str = $("#formSeguridad").serialize();
        var DATA = [];
        var TABLA = $("#formSeguridad tbody > tr");
        var x=0;
        var og ="";
        var rid = "";

        $.ajax({
            // URL to move the uploaded image file to server
            url: RUTA + 'seguridad/uploadImg',
            // Request type
            type: "POST", 
            // To send the full form data
            data: new FormData( this ),
            contentType:false,      
            processData:false,     
            // UI response after the file upload  
        success: function(data)
        {
            $.post(RUTA + 'seguridad/grabarDocumento',str, function(data, textStatus, xhr) {
            rid = data;
            })
            .always(function() {
                TABLA.each(function(){
                    x++;
                    og = 'input[name='+'cla'+x+']:checked';
        
                    var COL1 = $(this).find('td:eq(0)').children().val(),
                        COL2 = $(this).find(og).val(),
                        COL3 = $(this).find('td:eq(4)').children().val(),
                        COL4 = $(this).find('td:eq(5)').children().val(),
                        COL5 = $(this).find('td:eq(6)').children().val(),
                        COL6 = $(this).find('td:eq(7)').children().val();
        
                    var item = {};
        
                    if( COL1 !== undefined && COL1 !== ""){
                        item["condicion"] = COL1;
                        item["clasificacion"] = COL2;
                        item["accion"] = COL3;
                        item["responsable"] = COL4;
                        item["fecha"] = COL5;
                        item["seguimiento"] = COL6;
                        item["iddoc"] = rid;
                
                        DATA.push(item);
                    }
                });
        
                //eventualmente se lo vamos a enviar por PHP por ajax de una forma bastante simple 
                //y además convertiremos el array en json para evitar cualquier incidente con compatibilidades.
        
                INFO    = new FormData();
                aInfo   = JSON.stringify(DATA);
                
                INFO.append('data', aInfo);

                $.ajax({
                    data: INFO,
                    type: 'POST',
                    url : RUTA + 'seguridad/grabarDetalles',
                    processData: false, 
                    contentType: false,
                    success: function(r){
                        mostrarMensaje("msj_correcto","Registrado Correctamente");
                        $("#formSeguridad").trigger("reset");	
                    }
                });
            });
        }
    });

		return false;
    });
    
    $("#btnFoto").on('click', function (event) {
		event.preventDefault();

		$("#image_file").trigger('click');
		
		return false;
    });
    
    $("#image_file").on("change", function (event) {
		if(-1!=$.inArray($("#image_file")[0].files[0].type, ["image/jpeg","image/jpg"])){	
            var populateImg = new FileReader();
            populateImg.onload = previewImg;
			populateImg.readAsDataURL($("#image_file")[0].files[0]);
			$("#ruta_foto").val($("#image_file")[0].files[0].name);
        }else {
			console.log("Error en el tipo de imagen");
		}
	});
})