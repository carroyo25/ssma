$(function(){

    $(".capas").on('click', 'a', function(event) {
		event.preventDefault();
        /* Act on the event */
        RUTA = RUTA + "public/videos/";
        
        var video = RUTA + $(this).attr('href');
        
		$(".modalInterno").fadeIn('slow', function() {
			$("video")
			.attr("src",video)
			.trigger('play');
		});

		return false;
	});

})