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
			
$Q_Check1	= "SELECT * FROM ".DONERS." WHERE `doners_id`='$tsid'";
$R_Check1	= mysql_query($Q_Check1);
$F_Check = mysql_fetch_array($R_Check1);
$doners_name=$F_Check['doners_name'];
$doners_blood_groud= $F_Check["doners_blood_groud"];			
$doners_gender= $F_Check["doners_gender"];	
$doners_dob= $F_Check["doners_dob"];			
$doners_mobile= $F_Check["doners_mobile"];	
$doners_landline= $F_Check["doners_landline"];			
$doners_state= $F_Check["doners_state"];	
$doners_city= $F_Check["doners_city"];			
$doners_email= $F_Check["doners_email"];	
$doners_address= $F_Check["doners_address"];			
$doners_status= $F_Check["doners_status"];

$Q_Check12	= "SELECT * FROM ".GROUP." WHERE `group_id`='$doners_blood_groud'";
$R_Check12	= mysql_query($Q_Check12);
$F_Check2 = mysql_fetch_array($R_Check12);
$doners_blood_group= $F_Check2["group_name"];			

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
                    <h6>Doner Details</h6>
                    <a href="javascript:close_window();" class="ca-close">close</a>
                    <div style="text-align:left;">
						<span class="title">Name:</span><span> <?php echo $doners_name; ?> </span> 
	  			    </div>                                          
                    <div style="text-align:left;">
						<span class="title">Blood Group:</span><span> <?php echo $doners_blood_group; ?> </span> 
	  			    </div>                                          
                    <div style="text-align:left;">
						<span class="title">Gender:</span><span><?php echo $doners_gender;?> </span> 
	  			    </div>                                          
                    <div style="text-align:left;">
						<span class="title">DOB:</span><span> <?php echo $doners_dob; ?> </span> 
	  			    </div>                                          
                    <div style="text-align:left;">
						<span class="title">Mobile:</span><span> <?php echo $doners_mobile; ?> </span> 
	  			    </div>                                          
                    <div style="text-align:left;">
						<span class="title">Landline No:</span><span> <?php echo $doners_landline; ?> </span> 
	  			    </div>                                          
                    <div style="text-align:left;">
						<span class="title">State:</span><span> <?php echo $doners_state; ?> </span> 
	  			    </div>                                          
                    <div style="text-align:left;">
						<span class="title">City:</span><span> <?php echo $doners_city; ?> </span> 
	  			    </div>                                          
                    <div style="text-align:left;">
						<span class="title">Email:</span><span> <?php echo $doners_email; ?> </span> 
	  			    </div>                                          
                    <div style="text-align:left;">
						<span class="title">Address:</span><span> <?php echo $doners_address; ?> </span> 
	  			    </div>                                          
                    <div style="text-align:left;">
						<span class="title">Availablility:</span><span> <?php if($doners_status=="1") { echo "Available"; } else { echo "Not Available";} ?></span> 
	  			    </div>                                          
					</div>
					</div>
					</div>
				</div>
			</div>
		
    </body>
</html>