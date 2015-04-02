

$(window).resize(function(e) {      

	
   jQuery(document).ready(function($) {
	// || navigator.platform == 'iPhone' || navigator.platform == 'iPod'   
if(navigator.platform == 'iPad')
{
	 
 var width_window = $(window).width();
    if(width_window <= 768){
	  
 var $container = $('#container');

    $container.imagesLoaded(function(){
      $container.masonry({
        itemSelector: '.box',
        columnWidth:192
      });
    });
	    
    }
    else{
	   
	   /* var $container = $('#container');

    $container.imagesLoaded(function(){
      $container.masonry({
        itemSelector: '.box',
        columnWidth:239
      });
    });*/
	    
    }
  
};

  //ipad landscape
        var width_window = $(window).width();
    if(width_window == 1024){
	     var $container = $('#container');

    $container.imagesLoaded(function(){
      $container.masonry({
        itemSelector: '.box',
        columnWidth:240
      });
    });
    }
    }); 
});

 $(window).load(function(e) {
	 jQuery(document).ready(function($) {
	//|| navigator.platform == 'iPhone' || navigator.platform == 'iPod'   
if(navigator.platform == 'iPad')
{
	 
 var width_window = $(window).width();
    if(width_window <= 768){
	     
 var $container = $('#container');

    $container.imagesLoaded(function(){
      $container.masonry({
        itemSelector: '.box',
        columnWidth:192
      });
    });
	    
    }
    else{
	   /*
	    var $container = $('#container');

    $container.imagesLoaded(function(){
      $container.masonry({
        itemSelector: '.box',
        columnWidth:239
      });
    });*/
	    
    }
  
};
    }); 
});

$(function(){
	

    var $container = $('#container');

    $container.imagesLoaded(function(){
      $container.masonry({
        itemSelector: '.box',
        columnWidth:240
      });
    });
    //ipad landscape
        var width_window = $(window).width();
    if(width_window == 1024){
	     var $container = $('#container');

    $container.imagesLoaded(function(){
      $container.masonry({
        itemSelector: '.box',
        columnWidth:240
      });
    });
    }
    
       var width_window = $(window).width();
    if(width_window <= 960){
	   
	// Destop ipad prtraite 
	   
    var $container = $('#container');

    $container.imagesLoaded(function(){
      $container.masonry({
        itemSelector: '.box',
        columnWidth:187
      });
    });
	    
    }


    $container.infinitescroll({
      navSelector  : '#page-nav',    // selector for the paged navigation
      nextSelector : '#page-nav a',  // selector for the NEXT link (to page 2)
      itemSelector : '.box',     // selector for all items you'll retrieve
      loading: {
          finishedMsg: 'No more pages to load.',
          img: 'Assets/images/ajax-loader.gif'
        }
      },
      // trigger Masonry as a callback
      function( newElements ) {
        // hide new items while they are loading
        var $newElems = $( newElements ).css({ opacity: 0 });
        // ensure that images load before adding to masonry layout
        $newElems.imagesLoaded(function(){
          // show elems now they're ready
          $newElems.animate({ opacity: 1 });
          $container.masonry( 'appended', $newElems, true );
        });
      }
    );
    
    //Cross Browser js Start here
    
    function css_browser_selector(u){var ua=u.toLowerCase(),is=function(t){return ua.indexOf(t)>-1},g='gecko',w='webkit',s='safari',o='opera',m='mobile',h=document.documentElement,b=[(!(/opera|webtv/i.test(ua))&&/msie\s(\d)/.test(ua))?('ie ie'+RegExp.$1):is('firefox/2')?g+' ff2':is('firefox/3.5')?g+' ff3 ff3_5':is('firefox/3.6')?g+' ff3 ff3_6':is('firefox/3')?g+' ff3':is('gecko/')?g:is('opera')?o+(/version\/(\d+)/.test(ua)?' '+o+RegExp.$1:(/opera(\s|\/)(\d+)/.test(ua)?' '+o+RegExp.$2:'')):is('konqueror')?'konqueror':is('blackberry')?m+' blackberry':is('android')?m+' android':is('chrome')?w+' chrome':is('iron')?w+' iron':is('applewebkit/')?w+' '+s+(/version\/(\d+)/.test(ua)?' '+s+RegExp.$1:''):is('mozilla/')?g:'',is('j2me')?m+' j2me':is('iphone')?m+' iphone':is('ipod')?m+' ipod':is('ipad')?m+' ipad':is('mac')?'mac':is('darwin')?'mac':is('webtv')?'webtv':is('win')?'win'+(is('windows nt 6.0')?' vista':''):is('freebsd')?'freebsd':(is('x11')||is('linux'))?'linux':'','js']; c = b.join(' '); h.className += ' '+c; return c;}; css_browser_selector(navigator.userAgent);

  });