$(function(){
    
    $("#btnRegister").on('click', function(event) {
		event.preventDefault();
        
        $("#formIncidencia").trigger('submit');
        
        return false
		
    });

    $("#documento").keypress(function(e) {
        //e.preventDefault()

        if(e.which == 13) {
            e.preventDefault();

            $.post( RUTA + "incidencias/obtainWorkerData", { dni:$("#documento").val() },
                function (data, textStatus, jqXHR) {
                   $("#accidentado").val(data.id);
                   $("#persona").val(data.nombres + ' ' + data.apellidos );
                   $("#sexo").val(data.sexo );
                   $("#edad").val(data.edad );
                   $("#nacimiento").val(data.depanacim + ' ' + data.nacimiento );
                   $("#civil").val(data.civil );
                   $("#dpto").val(data.depadom );
                   $("#prov").val(data.provdom);
                   $("#dist").val(data.distdom);
                   $("#cargo").val(data.dcargo );
                   $("#domicilio").val(data.direccion );
                },
                "json"
            );
          }
    });

     //enviar formulario
    $("#formIncidencia").on('submit', function(event) {
        /* Act on the event */
        event.preventDefault();
        
        var str = $(this).serialize();

        $.ajax({
          // URL to move the uploaded image file to server
          url: RUTA + 'incidencias/uploadImg',
          // Request type
          type: "POST", 
          // To send the full form data
          data: new FormData( this ),
          contentType:false,      
          processData:false,     
          // UI response after the file upload  
        success: function(data)
        {
          $.post(RUTA + 'incidencias/grabarDocumento',str, function(data, textStatus, xhr) {
              mostrarMensaje("msj_correcto","Registrado Correctamente");
              $("#formIncidencia").trigger("reset");
              $("#imgEvidencia").attr('src', 'public/img/noimagen.jpg');
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
    
    $("#btnCancel").on("click", function (event) {
		event.preventDefault();
		if ($("#ruta_foto").val() != "") {
			$.post( RUTA + 'incidencias/deleteImg',{img:$("#ruta_foto").val()}, function(data, textStatus, xhr) {
			
			});
		}
		
		$("#formIncidencia").trigger("reset");	 
		$("#imgEvidencia").attr('src', 'public/img/noimagen.jpg');

		return false;
	});
})