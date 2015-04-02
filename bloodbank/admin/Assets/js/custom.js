/*--------------------------------------------------
PURESUTDIO html/css template - custom.js

URL:gozawi.com
SUPPORT: wtxinc@gmail.com
CODE: PS001C

Custom overwiev:

1. Alerts
2. Toogle
3. Comment Text Resize
4. Mobile Menu
5. Flickr
6. One Page Nav
7. Preloader
8. Vimeo
9. Slider
10. About Us Resize
11. BX SLider
12. Tweeter
13. Isotope
14. Pretty Photo
15. Client REsize
16. Google Map
17. Contact Form
18. Scroll TO
		
---------------------------------------------------*/

/***************************************************
1. ALERTS
***************************************************/

$('.alert-click1').click(function() {
event.preventDefault();
  $('.alert1').hide('slow', function() {
	return false;
  });
});
$('.alert-click2').click(function() {
event.preventDefault();
  $('.alert2').hide('slow', function() {
	return false;
  });
});
$('.alert-click3').click(function() {
event.preventDefault();
  $('.alert3').hide('slow', function() {
	return false;
  });
});

/***************************************************
2. TOOGLE
***************************************************/

$('.toggle1').click(function() {
event.preventDefault();
  $('.toogle-content1').toggle('slow', function() {
	return false;
  });
});
$('.toggle2').click(function() {
event.preventDefault();
  $('.toogle-content2').toggle('slow', function() {
	return false;
  });
});
$('.toggle3').click(function() {
event.preventDefault();
  $('.toogle-content3').toggle('slow', function() {
	return false;
  });
});

/***************************************************
3. COMMENT TEXT RESIZE
***************************************************/

$('.comment-text').css('width', '100%').css('width', '-=100px');
$(window).resize(function() {
$('.comment-text').css('width', '100%').css('width', '-=100px');
});

/***************************************************
4. MOBILE MENU
***************************************************/

$('.mobile-button').click(function() {
  $('.mobile-menu-list').toggle('slow', function() {
	return false;
  });
});

$('.mobile-menu-list a').click(function() {
  $('.mobile-menu-list').toggle('slow', function() {
	return false;
  });
});

/***************************************************
5. FLICKR
***************************************************/

$('.flickr').jflickrfeed({
		limit: 6,
		qstrings: {
			id: '71865026@N00'
		},
		itemTemplate: '<li><a href="{{image_b}}" data-rel="prettyPhoto" ><img src="{{image_s}}" alt="{{title}}" /></a></li>'
		
		}, function(data) {
			$('.flickr a').prettyPhoto();
});


/***************************************************
6. ONE PAGE NAV
***************************************************/

(function($){

    $('.menu-normal').onePageNav({
        currentClass: 'current',
        changeHash: false,
        scrollSpeed: 2000,
        scrollOffset: 30,
        scrollThreshold: 0.5,
        filter: '',
        easing: 'swing',
        begin: function() {
        },
        end: function() {
        },
        scrollChange: function($currentListItem) {  
        }
    });
})(jQuery);

/***************************************************
7. PRELOADER
***************************************************/

$(window).load(function() {
    	$("#status").fadeOut(); 
	$("#preloader").delay(300).fadeOut("slow"); 
})

/***************************************************
8. VIMEO
***************************************************/

jQuery(document).ready(function($){
    $(".vimeo").fitVids();
});

/***************************************************
9. SLIDER
***************************************************/

jQuery(function(){

jQuery('.home-slider').camera({
	height: 'auto',
	loader: 'bar',
	pagination: false,
	thumbnails: false,
	hover: false,
	opacityOnGrid: false,
	navigationHover: false,
	playPause: false,
	fx: 'mosaicSpiral',
	autoAdvance: false,
});

});
	
$(window).load(function(){
		  $(".menu").sticky({ topSpacing: 0 });
});

/***************************************************
10. ABOUT US RESIZE
***************************************************/

$('.skill-20').css('width', '20%').css('width', '-=28px');
$(window).resize(function() {
$('.skill-20').css('width', '20%').css('width', '-=28px');
});
$('.skill-30').css('width', '30%').css('width', '-=28px');
$(window).resize(function() {
$('.skill-30').css('width', '30%').css('width', '-=28px');
});
$('.skill-40').css('width', '40%').css('width', '-=28px');
$(window).resize(function() {
$('.skill-40').css('width', '40%').css('width', '-=28px');
});
$('.skill-50').css('width', '50%').css('width', '-=28px');
$(window).resize(function() {
$('.skill-50').css('width', '50%').css('width', '-=28px');
});
$('.skill-60').css('width', '60%').css('width', '-=28px');
$(window).resize(function() {
$('.skill-60').css('width', '60%').css('width', '-=28px');
});
$('.skill-70').css('width', '70%').css('width', '-=28px');
$(window).resize(function() {
$('.skill-70').css('width', '70%').css('width', '-=28px');
});
$('.skill-80').css('width', '80%').css('width', '-=28px');
$(window).resize(function() {
$('.skill-80').css('width', '80%').css('width', '-=28px');
});
$('.skill-90').css('width', '90%').css('width', '-=28px');
$(window).resize(function() {
$('.skill-90').css('width', '90%').css('width', '-=28px');
});
$('.skill-100').css('width', '100%').css('width', '-=28px');
$(window).resize(function() {
$('.skill-100').css('width', '100%').css('width', '-=28px');
});

/***************************************************
11. BX SLIDER
***************************************************/

$(document).ready(function($){

         if ($(window).width() < 900 && $(window).width() > 680) {

            $('.our-team').bxSlider({
                  slideWidth: 330,
                  minSlides: 2,
                  maxSlides: 2,
                  pager: false,
                  slideMargin: 30
            });

            $('.previous-news').bxSlider({
                  slideWidth: 500,
                  minSlides: 2,
                  maxSlides: 2,
                  pager: false,
                  slideMargin: 30
            });
        }

        if ($(window).width() > 900){


            $('.our-team').bxSlider({
                  slideWidth: 330,
                  minSlides: 3,
                  maxSlides: 3,
                  pager: false,
                  slideMargin: 30
            });

            $('.previous-news').bxSlider({
                  slideWidth: 500,
                  minSlides: 2,
                  maxSlides: 2,
                  pager: false,
                  slideMargin: 30
            });
        }
});

/***************************************************
12. TWEETER
***************************************************/
										
jQuery(function($){
	$(".tweet").tweet({
	join_text: "auto",
	username: "envato",
	avatar_size: 0,
	count: 3,
	auto_join_text_default: "",
	auto_join_text_ed: "",
	auto_join_text_ing: "",
	auto_join_text_reply: " ",
	auto_join_text_url: "",
	loading_text: "loading tweets..."
	});
});


/***************************************************
13. ISOTOPE
***************************************************/


var $container = $('.portfolio-container');
$container.isotope({

});

$('.portfiolio-filters a').click(function(){
  $('.portfiolio-filters  a.bold').removeClass('bold');
  var selector = $(this).attr('data-filter');
  $container.isotope({ filter: selector });
  $(this).addClass('bold');
  return false;
});

(function ($) {
  $.Isotope.prototype._getCenteredMasonryColumns = function() {
    this.width = this.element.width();
    
    var parentWidth = this.element.parent().width();
    
                  // i.e. options.masonry && options.masonry.columnWidth
    var colW = this.options.masonry && this.options.masonry.columnWidth ||
                  // or use the size of the first item
                  this.$filteredAtoms.outerWidth(true) ||
                  // if there's no items, use size of container
                  parentWidth;
    
    var cols = Math.floor( parentWidth / colW );
    cols = Math.max( cols, 1 );

    // i.e. this.masonry.cols = ....
    this.masonry.cols = cols;
    // i.e. this.masonry.columnWidth = ...
    this.masonry.columnWidth = colW;
  };
  
  $.Isotope.prototype._masonryReset = function() {
    // layout-specific props
    this.masonry = {};
    // FIXME shouldn't have to call this again
    this._getCenteredMasonryColumns();
    var i = this.masonry.cols;
    this.masonry.colYs = [];
    while (i--) {
      this.masonry.colYs.push( 0 );
    }
  };

  $.Isotope.prototype._masonryResizeChanged = function() {
    var prevColCount = this.masonry.cols;
    // get updated colCount
    this._getCenteredMasonryColumns();
    return ( this.masonry.cols !== prevColCount );
  };
  
  $.Isotope.prototype._masonryGetContainerSize = function() {
    var unusedCols = 0,
        i = this.masonry.cols;
    // count unused columns
    while ( --i ) {
      if ( this.masonry.colYs[i] !== 0 ) {
        break;
      }
      unusedCols++;
    }
    
    return {
          height : Math.max.apply( Math, this.masonry.colYs ),
          // fit container to columns that have been used;
          width : (this.masonry.cols - unusedCols) * this.masonry.columnWidth
        };
  };
  
})(jQuery);


/***************************************************
14. PRETTY PHOTO
***************************************************/
						
jQuery(function($){
				$("a[rel^='prettyPhoto']").prettyPhoto({
				show_title: false,
				theme: 'light_square'
			  });
});
			  
$('a[data-rel]').each(function() {
		$(this).attr('rel', $(this).data('rel'));
});

/***************************************************
15. CLIENT RESIZE
***************************************************/

$('.client').css('width', '22%').css('width', '-=23px');
$(window).resize(function() {
$('.client').css('width', '22%').css('width', '-=23px');
});

/***************************************************
16. GOOGLE MAP
***************************************************/
/*
function initialize() 
{

	var styles = [
	{
	  stylers: [
		{ saturation: -100 }
	  ]
	}
  ];
  
	var styledMap = new google.maps.StyledMapType(styles,
	{name: "Styled Map"});
	var geocoder  = new google.maps.Geocoder();
	var map;
	var latlng = new google.maps.LatLng(40.763381209080215, -73.97232055664062);
	var infowindow = new google.maps.InfoWindow();
	var myOptions = { 
	  zoom: 11,
	  mapTypeId: google.maps.MapTypeId.ROADMAP,
	  disableDefaultUI: true
	};
	map = new google.maps.Map(document.getElementById("map"), myOptions);
	geocoder.geocode( { 'location': latlng }, 
	function(results, status) {
			  if (status == google.maps.GeocoderStatus.OK) 
			  {
				map.setCenter(results[0].geometry.location);
				
			  } 
			  else 
			  {
				alert("Geocode was not successful for the following reason: " + status);
			  }
	});
	 map.mapTypes.set('map_style', styledMap);
	map.setMapTypeId('map_style');
  }									 
  initialize();*/
  
/***************************************************
17. CONTACT FORM
***************************************************/


$(function() { 
$("#contact_button").click(function() { 
var contact_name = $("#contact_name").val(); 
var contact_email = $("#contact_email").val(); 
var contact_subject = $("#contact_subject").val(); 
var contact_text = $("#contact_text").val(); 
var emailReg = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
var dataString = '&name='+ contact_name + '&email=' + contact_email + '&text=' + contact_text + '&subject=' + contact_subject; 
var go = true;
var emailcheck = false;

$('.name-error').removeClass('error-display');  
$('.email-error').removeClass('error-display');
$('.topic-error').removeClass('error-display'); 
$('.message-error').removeClass('error-display');
$('.submit-wrapper').find('#contact_button').attr('value','Send Email'); 
$('#contact_button').removeClass('skin-contact-done');
 
if(contact_name=='Name'){
$('.name-error').addClass('error-display'); 
go=false;
}

if(contact_name==''){
$('.name-error').addClass('error-display'); 
go=false;
}

if(contact_email=='Email'){
$('.email-error').addClass('error-display'); 
go=false;
}

if(contact_email==''){
$('.email-error').addClass('error-display'); 
go=false;
}
else{
	if(emailReg.test(contact_email)){
	emailcheck = true;
	}
	else {
	$('.email-error').addClass('error-display'); 
	go=false;
	}
}

if(contact_subject=='Subject'){
$('.topic-error').addClass('error-display'); 
go=false;
}

if(contact_subject==''){
$('.topic-error').addClass('error-display'); 
go=false;
}

if(contact_text=='Email content'){
$('.message-error').addClass('error-display'); 
go=false;
}

if(contact_text==''){
$('.message-error').addClass('error-display'); 
go=false;
}

if ( go == false){
 return false; 
}

 $.ajax({ 
type: "POST", 
url: "email.php", 
data: dataString, 
success: function(){
$('.submit-wrapper').find('#contact_button').attr('value','Thank you!'); 
$('#contact_button').addClass('skin-contact-done');
} 
}); 
$('.contact').find('form')[0].reset();
return false;
}); 
});

/***************************************************
18. SCROLL TO
***************************************************/

function ScrollTo(id){
	$('html,body').animate({scrollTop: $("#"+id).offset().top},3000);
}
