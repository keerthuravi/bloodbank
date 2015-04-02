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
$logopath = FRONTLOGO;
	if(isset($_POST["cmdSubmit"])){
	
			$x_company 				= $_POST["txtCompany"];
			$x_contact 				= $_POST["txtContact"];
			$x_email 				= $_POST["txtEmail"];
			$x_Rows 				= $_POST["intRows"];
			$x_adminpage			= $_POST['txtadminpage'];
			$txthomepage			= $_POST['txthomepage'];
			$intDateFormat			= $_POST['Datedisp'];
			$advertising			= $_POST['advertising'];	
			$google_map				= $_POST['google_map'];		
			$txtintRows			    = $_POST['txtintRows'];					
			$txtMetaDescription	    = $_POST['txtMetaDescription'];					
			$txtMetaKeyWord		    = $_POST['txtMetaKeyWord'];											
					
					
			$fb_url			= $_POST['fb_url'];						
			$youtube_url			= $_POST['youtube_url'];						
			
			$flShippingab200			= $_POST['flShippingab200'];
			$AdTimeFrame			= $_POST['AdTimeFrame'];
			$adpayment			= $_POST['adpayment'];
			$addiscountpercent			= $_POST['addiscountpercent'];
			$changelogo	=	$_FILES['changelogo'];
				
			$admaxdiscount	=	$_POST['admaxdiscount'];
			
		 	$UpdateUserQry = "update ".ADMINPROFILE." set varCompany = '$x_company',
			varContactPerson 		= '$x_contact',
			varEmail				= '$x_email',
			intRows 				= '$x_Rows',
			varHomePage 			= '$txthomepage',
			varAdminPage			= '$x_adminpage',
			advertising			= '$advertising',			
			google_map='$google_map',
			fb_url='$fb_url', 
			intRows='$txtintRows', 		
			txtMetaKeyWord='$txtMetaDescription', 	
			txtMetaDescription='$txtMetaKeyWord', 								
			youtube_url='$youtube_url'";
			
			
			$UpdateUserRes = mysql_query($UpdateUserQry) or die("Error in updation:".db_error());
			
			
			/*//Copy the Image
				$changelogo	=	$_FILES['changelogo'];
			if (isset($_FILES["changelogo"]) && $_FILES["changelogo"]["name"])
			{
				
			$cimagename = copyimageonly1($logopath,$changelogo);
			 $insqry="UPDATE ".ADMINPROFILE." SET changelogo='".$cimagename."'  ";
			$result = mysql_query($insqry)or die(mysql_error());
			}*///End of Image Checking
		header("Location:home.php?task=general&log=succ");
	}

	
			$cqry = "select * from ".ADMINPROFILE."";
			$cres = mysql_query($cqry)or die(db_error());
			$carr = mysql_fetch_array($cres);
			$adminid = $carr['intAdminId'];
			
			$company 				= $carr['varCompany'];
			$contact 				= $carr['varContactPerson'];
			$email 					= $carr['varEmail'];
			$txtpaypalEmail			= $carr['txtpaypalEmail'];					
			$intRows 				= $carr['intRows'];
			$website 				= $carr['varWebsite'];
			$homepage 				= $carr['varHomePage'];
			$adminpage 				= $carr['varAdminPage'];
			$emailaddr 				= $carr['varEmail'];
			$Datedisp 				= $carr['intDateFormat'];
			$advertising			= $carr['advertising'];				
			$AdTimeFrame 				= $carr['AdTimeFrame'];
			$google_map	= $carr['google_map'];
			$txtMetaKeyWord	= $carr['txtMetaKeyWord'];
			$txtMetaDescription	= $carr['txtMetaDescription'];						
			$fb_url	= $carr['fb_url'];
			$youtube_url	= $carr['youtube_url'];						
			
			
			$txtintRows	= $carr['intRows'];			
			
			$changelogo	= $carr['changelogo'];
			$adpayment 				= $carr['adpayment'];
			$admaxdiscount 				= $carr['admaxdiscount'];
			$updateaction 			= "Update"; 
			$banner_white			= stripslashes($carr['banner_white']);						
			$banner_black			= stripslashes($carr['banner_black']);	
			
				
		
			
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
			<div class="full_w">
				<div class="h_title">Admin Settings</div>
				<form action="<?php  print $HTTP_SERVER_VARS['PHP_SELF'];?>?task=general" method="post" enctype="multipart/form-data" name="frm_accountinfo" onsubmit="return setting_validation();">
					<div class="element">
						<label for="name">Name Of the Company</label>
						<input id="txtCompany" name="txtCompany" class="text" value="<?php echo $company; ?>" />
					</div>
					<div class="element">
						<label for="name">Contact Person<label>
						<input id="txtContact" name="txtContact" class="text" value="<?php echo $contact; ?>"  />
					</div>
					<div class="element">
						<label for="name">Email Address<span class="red">(required)</span></label>
						<input id="txtEmail" name="txtEmail" class="text" value="<?php echo $email; ?>" />
					</div>
<!--					<div class="element">
						<label for="name">Paypal Email Address<span class="red">(required)</span></label>
						<input id="txtpaypalEmail" name="txtpaypalEmail" class="text" value="<?php echo $txtpaypalEmail; ?>" />
					</div>
-->					<div class="element">
						<label for="name">Admin Page Title</label>
						<input id="txtadminpage" name="txtadminpage" class="text" value="<?php echo $adminpage; ?>" />
					</div>
					<div class="element">
						<label for="name">No of Rows</label>
						<input id="txtintRows" name="txtintRows" class="text" value="<?php echo $txtintRows; ?>" />
					</div>
					<div class="element">
						<label for="name">Home Page Title</label>
						<input id="txthomepage" name="txthomepage" class="text" value="<?php echo $homepage; ?>" />
					</div>
					<div class="element">
						<label for="name">Meta Keywords</label>
						<textarea name="txtMetaKeyWord" id="txtMetaKeyWord" rows="3" cols="100"><?php echo $txtMetaKeyWord; ?></textarea>
						<!--<input id="txthomepage" name="keywords" class="text" value="<?php echo $txtMetaDescription; ?>" />-->
					</div>
					<div class="element">
						<label for="name">Meta Description</label>
						<textarea name="txtMetaDescription" id="txtMetaDescription" rows="3" cols="100"><?php echo $txtMetaDescription; ?></textarea>
					</div>		

					<div class="entry">
						<input name="cmdSubmit" type="submit" value="<?php echo $updateaction; ?>" class="box1"><!-- <button class="cancel">Cancel</button>-->
					</div>
				</form>
			</div>
	
		</div>
		<div class="clear"></div>
	</div>

		<?php include("footer.php") ?>
</div>

</body>
</html>
