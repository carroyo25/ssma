$(function(){
    var other_selected = "";
	var epp_selected = "";
	var id_obser = "";
	var data_obser = "";
	var sw = false;
	
	var sendMail = false;
	var ReaderObj;
    
    $("#btnRegister").on('click', function(event) {
		event.preventDefault();
		
		if (!verificarCampos(sw,epp_selected,other_selected) ) {
			return false;
		};

		$("#formTop").trigger('submit');
		
		$('.page').animate({scrollTop:0}, 'slow');
    });
	
	/*$("#btnRegisterOther").on('click', function(event) {
		event.preventDefault();
		
		if (!verificarCampos(sw,epp_selected,other_selected) ) {
			return false;
		};

		$("#formTop").trigger('submit');
		
		$('.page').animate({scrollTop:0}, 'slow');
	});*/
	
	$("#sltArea").on("change", function (e) {
		e.preventDefault();

		$.post(RUTA+"top/ubicaciones", {area:$(this).val()},
			function (data, textStatus, jqXHR) {
				$("#sltUbicacion")
				.empty()
				.append(data);
			},
			"text"
		);

		return false;
	});

    //quitar los errores
    $('#sltSede, #txtFecha, #sltArea').change(function(){
        $(this).parent().children('span').remove();
        return false;      
    });

    $('#txtLugar,#txtRepor,#txtFecha,#txtOtros,#txtPreve,#txtCorre').on('keyup', function(event) {
    	event.preventDefault();
    	/* Act on the event */
    	$(this).parent().children('span').remove();
    	return false;
    });

    $("#rgacsues label,#rgcosues label,#rgactseg label,#rgtipepp label,#rgconepp label,#rgrelac label,#rgPerdi label")
    	.on('click', function(event) {
		$(this).parent().children('span').remove();
    });
    
    //resetar el formulario
    $('#modeltop').on('reset',  function(event) {
		$("#divActIns, #divConIns, #divActSeg, #divRelac, #divOtros, #divTipEpp, #divConEpp").hide();

		$('input[name=rbacsues],input[name=rbcosues],input[name=rbactseg],input[name=rbrelac],input[name=rbtipepp],input[name=rgconepp]')
			.prop('checked',false);

		$(".error_obligatorio").remove();

		$("#formtop").fadeOut();
    });
    

    //radios group
	$("#rgObser label").on('click', function(event) {

		id_obser = $(this).prev('input').attr('id');
		data_obser = $(this).prev('input').val();

		$(this).parent().children('span').remove();

		$("#divActIns, #divConIns, #divActSeg, #divRelac, #divOtros, #divTipEpp, #divConEpp").hide();

		$('input[name=rbacsues],input[name=rbcosues],input[name=rbactseg],input[name=rbrelac],input[name=rbtipepp],input[name=rgconepp]').parent().children('span').remove();
		$('input[name=rbacsues],input[name=rbcosues],input[name=rbactseg],input[name=rbrelac],input[name=rbtipepp],input[name=rgconepp]').prop('checked',false);

		switch (id_obser){
			case 'rbObser01':
				$("#divActIns, #divRelac").fadeIn();
				sw = true;
				break;
			case 'rbObser02':
				$("#divConIns, #divRelac").fadeIn();
				sw = true;
				break;
			case 'rbObser03':
				$("#divActSeg").fadeIn();
				sw = false;
				break;		
		}	
    });
    
    $("input[name=rbObser]").change(function(event) {
		/* Act on the event */
		data_obser = $("input[name=rbObser]:checked").val();
	});

	$("#divActIns label, #divConIns label, #divActSeg label").on('click', function(event) {
		other_selected = $(this).text();

		if( other_selected == "OTROS"){
			$("#divOtros").fadeIn();
		}else{
			$("#divOtros").hide();
		}

	});

	$("#rgrelac label").on('click', function(event) {

		epp_selected = $(this).text();

		if(epp_selected == "Epp"){
			$("#divTipEpp, #divConEpp").fadeIn();
		}else{
			$("#divTipEpp, #divConEpp").hide();
		}
	});
	
	$("#btnFoto").on('click', function (event) {
		event.preventDefault();

		$("#image_file").trigger('click');
		
		return false;
	});

	$("#btnCancel").on("click", function (event) {
		event.preventDefault();
		if ($("#ruta_foto").val() != "") {
			$.post( RUTA + 'top/deleteImg',{img:$("#ruta_foto").val()}, function(data, textStatus, xhr) {
			
			});
		}
		
		$("#formTop").trigger("reset");	 
		$("#img_preview").attr('src', 'public/img/noimagen.jpg');

		return false;
	});

	$("#btnPhoto").on("click", function (event) {
		event.preventDefault()
		
		$("#formTop").trigger('submit');

		return false;
	});
    
    //enviar formulario
    $("#formTop").on('submit', function(event) {
		/* Act on the event */
		var str = $(this).serialize();

		$.ajax({
				// URL to move the uploaded image file to server
				url: RUTA + 'top/uploadImg',
				// Request type
				type: "POST", 
				// To send the full form data
				data: new FormData( this ),
				contentType:false,      
				processData:false,     
				// UI response after the file upload  
			success: function(data)
			{
				$.post( RUTA + 'top/guardarTop',str, function(data, textStatus, xhr) {
					mostrarMensaje("msj_correcto","Tarjeta Top Registrada");
					$("#img_preview").attr('src', 'public/img/noimagen.jpg');
					$("#formTop").trigger("reset");	 
				});
			}
		});
		
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

function verificarCampos(sw,epp_selected,other_selected) {
	var error_obligatorio = '<span class="error_obligatorio"><i><i class="fas fa-ban"></i> Este campo es obligatorio</i><span>'
	ret = true;

	if($("#sltSede").val() == "-1") {
		$("#sltSede").parent().children('label').after(error_obligatorio);
		$("#sltSede").focus();
		ret = false;
	}else if ( $("#txtLugar").val() == "" ){
		$("#txtLugar").parent().children('label').after(error_obligatorio);
		$("#txtLugar").focus();
		ret = false;
	}else if ( $("#txtRepor").val() == "" ){
		$("#txtRepor").parent().children('label').after(error_obligatorio);
		$("#txtRepor").focus();
		ret = false;
	}else if ($("#sltArea").val() == "-1") {
		$("#sltArea").parent().children('label').after(error_obligatorio);
		$("#sltArea").focus();
		ret = false;
	}else if ($("#sltUbicacion").val() == "-1") {
		$("#sltUbicacion").parent().children('label').after(error_obligatorio);
		$("#sltUbicacion").focus();
		ret = false;
	}else if ( $("#txtFecha").val() == "" ){
		$("#txtFecha").parent().children('label').after(error_obligatorio);
		$("#txtFecha").focus();
		ret = false;
	}else if ( $("input[name=rbObser]:checked").val() == undefined){
		$("#rgObser").children('label').after(error_obligatorio);
		$("input[name=rbObser]").focus();
		ret = false;
	}else if($("input[name=rbObser]:checked" ).val() == "01" && $("input[name=rbacsues]:checked" ).val() == undefined) {
		$("#rgacsues").children('label').after(error_obligatorio);
		$("#rbacsues01").focus();
		ret = false;
	}else if($("input[name=rbObser]:checked" ).val() == "02" && $("input[name=rbcosues]:checked" ).val() == undefined) {
		$("#rgcosues").children('label').after(error_obligatorio);
		$("#rbcosues01").focus();
		ret = false;
	}else if($("input[name=rbObser]:checked" ).val() == "03" && $("input[name=rbactseg]:checked" ).val() == undefined) {
		$("#rgactseg").children('label').after(error_obligatorio);
		$("#rbactseg01").focus();
		ret = false;
	}else if( sw && $("input[name=rbrelac]:checked" ).val() == undefined) {
		$("#rgrelac").children('label').after(error_obligatorio);
		$("#rbrelac01").focus();
		ret = false;
	}else if( epp_selected == "Epp" && $("input[name=rbtipepp]:checked" ).val() == undefined) {
		$("#rgtipepp").children('label').after(error_obligatorio);
		$("#rbtipepp01").focus();
		ret = false;
	}else if( epp_selected == "Epp" && $("input[name=rbconepp]:checked" ).val() == undefined) {
		$("#rgconepp").children('label').after(error_obligatorio);
		$("#rbconepp01").focus();
		ret = false;
	}else if ( $("#txtOtros").val() == "" && other_selected == "OTROS"){
		$("#txtOtros").parent().children('label').after(error_obligatorio);
		$("#txtOtros").focus();
		ret = false;
	}else if ( $("#txtPreve").val() == "" ){
		$("#txtPreve").parent().children('label').after(error_obligatorio);
		$("#txtPreve").focus();
		ret = false;
	}else if ( $("input[name=rbPerdi]:checked").val() == undefined){
		$("#rgPerdi").children('label').after(error_obligatorio);
		$("input[name=rgPerdi]").focus();
		ret = false;
	}

	return ret;
}

