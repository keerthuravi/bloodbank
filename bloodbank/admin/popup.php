<?php 
	//Include Database Connection
	include("../include/dbconnect.php");
	//Include Constants
	include("../include/constants.php");
	//Check Admin session
	include("../include/session.php");
	//Include Fucntions
	include("../include/functions.php");
	//function for paging
	include("../include/paging.php");
	//Include Editor
    include("../fckeditor.php");


 $tsid=$_REQUEST['mid'];
			
$Q_Check1	= "SELECT * FROM ".TESTIMONIALS." WHERE `testimonial_id`='$tsid'";
$R_Check1	= mysql_query($Q_Check1);
$F_Check = mysql_fetch_array($R_Check1);
$testimonial_img=$F_Check['testimonial_img'];
$testimonial_title = $F_Check['testimonial_title'];							
$testimonial_dec = stripcslashes($F_Check['testimonial_dec']);														
$testimonial_status = $F_Check['testimonial_status'];							



?> 

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Circular Content Carousel with jQuery</title>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Circular Content Carousel with jQuery" />
        <meta name="keywords" content="jquery, conent slider, content carousel, circular, expanding, sliding, css3" />
		<meta name="author" content="Codrops" />
<!--Testim Slider-->
<link rel="stylesheet" type="text/css" href="css/demos.css" />
<link rel="stylesheet" type="text/css" href="css/slider-style.css" />
<link rel="stylesheet" type="text/css" href="css/jquery.jscrollpane.css" media="all" />
<script language="javascript1.5" type="application/x-javascript">
function close_window() {
  if (confirm("You want to close?")) {
    close();
  }
}
</script>
<!--Testim Slider-->    </head>
    <body style="overflow:hidden;background:none repeat scroll 0 0 #B0CCC6;">
<div id="ca-container" class="ca-container">
				<div class="ca-wrapper">
					<div class="ca-item ca-item-1">

                    <div class="ca-content">
                    <h6><?php echo $testimonial_title; ?></h6>
                    <a href="javascript:close_window();" class="ca-close">close</a>
                    <div style="text-align:left;">
                        <?php echo $testimonial_dec; ?>
                    </div>
                    <div style="text-align:left;">
                    <img src="../testimonialimg/<?php echo $testimonial_img;?>" width="80" align="absmiddle"/>
					</div>                    
					</div>
					</div>
					</div>
				</div>
			</div>
		
    </body>
</html>