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


 $request_id=$_REQUEST['mid'];
			
$Q_Check1	= "SELECT * FROM ".REQUEST." WHERE `request_id`='$request_id'";
$R_Check1	= mysql_query($Q_Check1);
$F_Check = mysql_fetch_array($R_Check1);
$request_name=$F_Check['request_name'];
$request_blood_groud= $F_Check["request_blood_groud"];			
$request_age= $F_Check["request_age"];	
$request_needed= $F_Check["request_needed"];			
$request_units= $F_Check["request_units"];	
$request_mobile= $F_Check["request_mobile"];			
$request_landline= $F_Check["request_landline"];	
$hospital_name= $F_Check["hospital_name"];			
$location= $F_Check["location"];	
$purpose= $F_Check["purpose"];			
$address= $F_Check["address"];			
$request_status= $F_Check["request_status"];


$Q_Check12	= "SELECT * FROM ".GROUP." WHERE `group_id`='$request_blood_groud'";
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

						<span class="title">Name:</span><span> <?php echo $request_name; ?> </span> 
	  			    </div>                                          
                    <div style="text-align:left;">
						<span class="title">Blood Group:</span><span> <?php echo $doners_blood_group; ?> </span> 
	  			    </div>                                          
                    <div style="text-align:left;">
						<span class="title">Age:</span><span><?php echo $request_age;?> </span> 
	  			    </div>                                          
                    <div style="text-align:left;">
						<span class="title">When Blood Needed:</span><span> <?php echo $request_needed; ?> </span> 
	  			    </div>                                          
                    <div style="text-align:left;">
						<span class="title">No of Units Required:</span><span> <?php echo $request_units; ?> </span> 
	  			    </div>                                          
                    <div style="text-align:left;">
						<span class="title">Mobile No:</span><span> <?php echo $request_mobile; ?> </span> 
	  			    </div>                                          
                    <div style="text-align:left;">
						<span class="title">Landline No:</span><span> <?php echo $request_landline; ?> </span> 
	  			    </div>                                          
                    <div style="text-align:left;">
						<span class="title">Hospital Name:</span><span> <?php echo $hospital_name; ?> </span> 
	  			    </div>                                          
                    <div style="text-align:left;">
						<span class="title">Location:</span><span> <?php echo $location; ?> </span> 
	  			    </div>                        
                    <div style="text-align:left;">
						<span class="title">Address:</span><span> <?php echo $address; ?> </span> 
	  			    </div>     
                    <div style="text-align:left;">
						<span class="title">Purpose:</span><span> <?php echo $purpose; ?> </span> 
	  			    </div>     
                    <div style="text-align:left;">
						<span class="title">Request Status:</span><span> <?php if($request_status=="1") { echo "Still Needed"; } else { echo "Closed";} ?></span> 
	  			    </div>                                          
					</div>
					</div>
					</div>
				</div>
			</div>
		
    </body>
</html>