<?php 
/*****************************************************************************
 * Website: Econo Scooter
 * CMS Page
 *developed on 24/6/2008
 ****************************************************************************/
	
	//Include Database Connection
	include("../include/dbconnect.php");
	//Include Constants
	include("../include/constants.php");
//	//Check Admin session
	include("../include/session.php");
//	//Include Fucntions
	include("../include/functions.php");
//	//function for paging
   include("../fckeditor.php");

$setting="home";

/*****************************************************************************
 * Website: Simple Website
 * Setting  Page
 *developed on 10/10/2008
 ****************************************************************************/

	$cqry = "select * from ".DONERS." where `doners_status`='1'";
	$cres = mysql_query($cqry)or die(db_error());
	$noofdoners=mysql_num_rows($cres);
	
	$cqry1 = "select * from ".DONERS."";
	$cres1 = mysql_query($cqry1)or die(db_error());
	$noofdoners1=mysql_num_rows($cres1);	
	
	$cqrys = "select * from ".REQUEST." where `request_status`='2'";
	$cress = mysql_query($cqrys)or die(db_error());
	$noofrequestclosed=mysql_num_rows($cress);

	$cqrys1 = "select * from ".REQUEST."";
	$cress1 = mysql_query($cqrys1)or die(db_error());
	$noofrequest=mysql_num_rows($cress1);

			
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pl" xml:lang="pl">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="author" content="Paweł 'kilab' Balicki - kilab.pl" />
<title><?php echo $varAdminPage; ?></title>
<link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/navi.css" media="screen" />
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript">
$(function(){
	$(".box .h_title").not(this).next("ul").hide("normal");
	$(".box .h_title").not(this).next("#home").show("normal");
	$(".box").children(".h_title").click( function() { $(this).next("ul").slideToggle(); });
});
</script>
<script src="ckeditor/ckeditor.js"></script>
<link href="ckeditor/sample.css" rel="stylesheet">

</head>
<body>
<div class="wrap">
	<?php include("topnave.php"); ?>
	
	<div id="content">
		<?php include("sidenav.php"); ?>	
		<div id="main">
		<div class="half_w half_left">
				<div class="h_title">Total no of Doners</div>
				<div class="stats">
					<p class="count" style="text-align:center;height:60px;margin-top:40px;"><?php echo $noofdoners1; ?></p>
				</div>
			</div>
		<div class="half_w half_right">
				<div class="h_title">No of Doners Available</div>
	               <div class="stats">
						<p class="count" style="text-align:center;height:60px;margin-top:40px;"><?php echo $noofdoners; ?></p>                
                  </div>
			</div>            
			<div class="clear"></div>
		</div>
		
<div id="main">
		<div class="half_w half_left">
				<div class="h_title">Total no of Blood Request</div>
				<div class="stats">
					<p class="count" style="text-align:center;height:60px;margin-top:40px;"><?php echo $noofrequest; ?></p>
				</div>
			</div>
		<div class="half_w half_right">
				<div class="h_title">No of Request Closed</div>
	               <div class="stats">
						<p class="count" style="text-align:center;height:60px;margin-top:40px;"><?php echo $noofrequestclosed; ?></p>                
                  </div>
			</div>            
			<div class="clear"></div>
		</div>        
	</div>

		<?php include("footer.php") ?>
</div>

</body>
</html>
