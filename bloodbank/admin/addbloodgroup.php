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
   $testimonial="home";

$group_id = $_REQUEST['mid'];

$selqry="select * from  ".GROUP." where `group_id`='$group_id'";
$resqry=mysql_query($selqry) or die(mysql_error());
$ans=mysql_fetch_array($resqry);
$package=$ans['package'];
 
	if(isset($_POST["Update"]))
	{	
	
		$group_name= $_POST["group_name"];	
		$group_id= $_POST["group_id"];			

		$updqry="UPDATE ".GROUP." SET `group_name`='$group_name' WHERE `group_id`='$group_id'";
		$resupdqry=mysql_query($updqry)or die(mysql_error());
		$flag="success";
		header("Location:viewbloodgroup.php?rflag=success&rtype=edit&task=view");
	}

	if(isset($_POST["cmdSubmit"]))
	{
	
		$group_name= $_POST["group_name"];		
		
	 	$insert_query="INSERT INTO ".GROUP." (`group_name`) VALUES ('$group_name')";		
		$inder_ad_price=mysql_query($insert_query);
		$inser_id=mysql_insert_id();
		if($inser_id>0)
		{
			header("Location:viewbloodgroup.php?task=general&log=succ");
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
<script language="javascript" type="text/javascript" src="../script/adminscript.js"></script>
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
				<div class="h_title">Add Blood Group</div>
				<form action="addbloodgroup.php" method="post" name="frm_accountinfo" onsubmit="return setting_validation();">
					<div class="element">
						<label for="name">Group Name</label>
						<input id="group_name" name="group_name" class="text" type="text" value="<?php echo $ans['group_name']; ?>" />
					</div>
					<div class="entry">
						<input name="<?php if($group_id==""){ echo "cmdSubmit";} else{ echo "Update"; }  ?>" type="submit" value="Submit" class="box1">
						<input type="hidden" value="<?php echo $group_id; ?>" name="group_id" id="group_id" />
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
