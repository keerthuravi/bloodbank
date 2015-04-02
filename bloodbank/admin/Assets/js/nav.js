$(document).ready(function(e) {
//for ipod nav
	
$(".touch").click(function() {
    $(".navigation ul").slideToggle(100);
});

//for nav auto active class js
$(window).scroll(function(){
			var abc=$(this).scrollTop()
			 var position_holder = new Array();
			 var i=0 ; 
			 $('.anchorlink').each(function(){
				 position_holder[i] = $(this).attr('id');
				 i++;
			 });
			 
			 var curr_pos_win =$(this).scrollTop()+ $('.navigation').offset().top + $('.navigation').height() - $(window).scrollTop();

			 for(i= (position_holder.length)-1; i>=0; i--)
			 {
				if($(position_holder[i]).offset().top < curr_pos_win)
				{
					$('.anchorlink').each(function(){
						if($(this).attr('id')== position_holder[i])
							{ var classCheck=$(this).attr('class');
								if(classCheck.indexOf("active")>-1){
								
								}
								else{
								$('.anchorlink').removeClass('active');
								
								{$(this).addClass('active');}
	  							
								
								}
							}
					 });
					
					 	
					 break;
				}
			 }
			
	
		if(abc<$(window).height()-500)
		{
		$(".anchorlink").removeClass("active")	
		}
	
		});

$('a[id^="#"]').bind('click.smoothscroll',function (e) {
var ipod_width = $(window).width();	
    e.preventDefault();
    
    var target = $(this).attr("id");
        $target = $(target);
	if(ipod_width <=480){
		 if(ipod_width <=320)
		 { goto=parseInt($target.offset().top)-parseInt(222)
		 }else{
		goto=parseInt($target.offset().top)-parseInt(120)}
	}else{
  goto=parseInt($target.offset().top)-parseInt(117)}
    $('html, body').stop().animate({
        'scrollTop': goto
    }, 500, 'swing', function () {
       
    });
});


//ipad for nav position
//Mian navigation top js end

$(window).scroll(function() {
		
		
       var scroll = $(window).scrollTop();
	if( scroll >=$(window).height()-118){
		
		$(".nav-wrapper").addClass('fixed');
		
		
		}
	else{
		$(".nav-wrapper").removeClass('fixed');
	}
	});
	  //Bottom button go to top js
	  	$(".go-top").click(function(e) {
                
		$("body,html").animate({
			
		scrollTop:0
			})
			
			 });
		//Bottom button go to top js end
		$(".logo a img").click(function(e) {
                
		$("body,html").animate({
			
		scrollTop:0
			})
			
			});
		
			$(".nav ul li").removeClass("active_li"); //menu li on click active for js
       
	
	       var scroll = $(window).scrollTop();
	if( scroll >=$(window).height() ){
		
		$(".nav-wrapper").addClass('fixed');
		
		
		}
	else{
		$(".nav-wrapper").removeClass('fixed');
	}
	
	
			
		var ipod_window = $(window).width();


	 $(window).resize(function() {

		if($('.left-repeater').css('display') == 'none'){
				$('.touch').css('display','block');
				$(".navigation ul").css('display','none');

				$(".navigation ul li").click (function() {
					$(".navigation ul").slideUp(100);
				});
				//alert('ipod version');
			}
		else {
				//alert('normal version');
				$('.touch').css('display','none');
				$(".navigation ul").css('display','block');
				$(".navigation ul li").click (function() {
					$(".navigation ul").show(0);
				});
		}
		 
		 if(ipod_window >=481){
                $(".table,.WindowHeight,.header").height($(window).height());
		$(".nav-wrapper").css({'top':$(".header-scetion").height()-118})
		 }
        });
	 if(ipod_window >=481){
		
	$(".table,.WindowHeight,.header").height($(window).height());
	 $(".nav-wrapper").css({'top':$(".header-scetion").height()-118})
	 };
	 $('.navigation ul li a').click(function() {
	

    if ($(this).attr('id') == '#all') {
    $('.gallery ul li a,#portfolio .side-navigation li a').animate({
        opacity : '1'
    });
    }
    else {
        $(this).trigger('show');
        $(this).trigger('hide');
    }
$('.gallery ul li a,#portfolio .side-navigation li a').removeClass('current');
    $(this).addClass('current');
});

});

$(window).load(function(){
	$("body,html").animate({
			
		scrollTop:0
			})
	
	});
	