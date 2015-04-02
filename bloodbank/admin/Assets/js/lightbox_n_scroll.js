$(document).ready(function(){
	$('.scrollbar1').tinyscrollbar();

	$('#second .side-navigation ul li').click(function(){ 
		$('.scrollbar1').tinyscrollbar();	
	});
	
	$("ul#portfolio-list li a").colorbox({rel:'light_box'}); //light box
	
	$("ul#portfolio-list li a").hover(function(){
		
		$(this).append('<img src="Assets/images/light_box_h.png" alt="image" class="light2">')},
		
		function(){
			$(this).find('.light2').remove();
		});
	
	$("#click").click(function(){ 
			$('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
			return false;
		});
});	