/** Slider */
$(window).load(function(){
	$('.flexslider').flexslider({animation: "slide"});
});


$(document).ready(function(){


	/** Popup JS */
	$("body").delegate(".blog-comment h6 a", "click", function(){
		$(".overlay-wrap").fadeIn(500); 
		$("body,html").animate({scrollTop:0});
	});     
	
	$(".close").click(function(){
		$(".overlay-wrap").fadeOut(500); 
		$("body,html").animate({scrollTop:$('#blog').position().top - $('.navigation').height()});
	});


	/** Audio Player **/
	$("#jquery_jplayer_1").jPlayer({
		ready: function (event) {
			$(this).jPlayer("setMedia", {
				m4a:"http://www.jplayer.org/audio/m4a/TSP-01-Cro_magnon_man.m4a",
				oga:"http://www.jplayer.org/audio/ogg/TSP-01-Cro_magnon_man.ogg"
			});
		},
		swfPath: "Assets/js",
		supplied: "m4a, oga",
		wmode: "window",
		cssSelectorAncestor: '#jp_container_1'
	});

	$("#jquery_jplayer_2").jPlayer({
		ready: function (event) {
			$(this).jPlayer("setMedia", {
				m4a:"http://www.jplayer.org/audio/m4a/TSP-01-Cro_magnon_man.m4a",
				oga:"http://www.jplayer.org/audio/ogg/TSP-01-Cro_magnon_man.ogg"
			});
		},
		swfPath: "Assets/js",
		supplied: "m4a, oga",
		wmode: "window",
		cssSelectorAncestor: '#jp_container_2'
	});

});
