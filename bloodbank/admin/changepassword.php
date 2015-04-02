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
   $packages="home";
	$PageName="MainMenu";


/*****************************************************************************
 * Website: Simple Website
 * Setting  Page
 *developed on 10/10/2008
 ****************************************************************************/
 
	$mid=$_REQUEST['mid'];
	$logopath = FRONTLOGO;
	
	if(isset($_POST["Update"]))
	{

	$varPassword 					= base64_encode($_POST["varPassword"]);
	$varPasswordnew 				= base64_encode($_POST["varPassword1"]);
	
	$cqry_edit = "select * from ".ADMINPROFILE." where `varPassword`='$varPassword'";
	$cres_edit = mysql_query($cqry_edit)or die(db_error());
	$checknumrow=mysql_num_rows($cres_edit);
	
	if($checknumrow > 0)
	{
	
	$update_query="UPDATE ".ADMINPROFILE." SET `varPassword`='$varPasswordnew'";
	$update_ad_price=mysql_query($update_query);
	
	header("Location:changepassword.php?task=edit&log=succ");
		
	}
	else 
	{
			header("Location:changepassword.php?task=edit&log=fail");
	}

	}
			
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pl" xml:lang="pl">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="author" content="Paweł 'kilab' Balicki - kilab.pl" />
<title><?php echo $homepage; ?></title>
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
<script type="text/javascript">
function varPasswordvalidate()
{
var varPassword1=	document.getElementById('varPassword1').value;
var varPassword2=	document.getElementById('varPassword2').value;
	if(!(varPassword1==varPassword2))
	{
		alert("Please recheck the confirm password");
		return false;   
	}

}
</script>

</head>
<body>
<div class="wrap">
	<?php include("topnave.php"); ?>
	
	<div id="content">
	<?php include("sidenav.php"); ?>			
		<div id="main">
			<div class="full_w">
				<div class="h_title">Add Package</div>
				<form action="changepassword.php" method="post" enctype="multipart/form-data" name="frm_accountinfo" onsubmit="return varPasswordvalidate();">
                <?php $log=$_REQUEST['log']; if($log=="fail") {  ?>
                	<div class="n_error"><p>Error!!! - Please check your current password you have entered</p></div>
                <?php } ?>
                <?php if($log=="succ") {  ?>
                	<div class="n_ok"><p>Success - Password Successfully Updated</p></div>
                <?php  } ?>
					<div class="element">
						<label for="name">Current Password</label>
						<input id="varPassword" name="varPassword" type="password" class="text" />
					</div>
					<div class="element">
						<label for="name">New Password</label>
						<input id="varPassword1" name="varPassword1" class="text" type="password" />
					</div>
					<div class="element">
						<label for="name">Confirm password</label>
						<input id="varPassword2" name="varPassword2" class="text" type="password" />
					</div>                    
					<div class="entry">
						<input name="Update" id="Update" type="submit" value="Update" class="box1">
					</div>
				</form>
			</div>
		</div>
		<div class="clear"></div>
	</div>

		<?php include("footer.php"); ?>
</div>

</body>
</html>
