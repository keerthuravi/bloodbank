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

$doners_id = $_REQUEST['mid'];

$selqry="select * from  ".DONERS." where `doners_id`='$doners_id'";
$resqry=mysql_query($selqry) or die(mysql_error());
$ans=mysql_fetch_array($resqry);
$package=$ans['package'];
 
	if(isset($_POST["Update"]))
	{	
	
		$doners_name= $_POST["doners_name"];	
		$doners_blood_groud= $_POST["doners_blood_groud"];			
		$doners_gender= $_POST["doners_gender"];	
		$doners_dob= $_POST["doners_dob"];			
		$doners_mobile= $_POST["doners_mobile"];	
		$doners_landline= $_POST["doners_landline"];			
		$doners_state= $_POST["doners_state"];	
		$doners_city= $_POST["doners_city"];			
		$doners_email= $_POST["doners_email"];	
		$doners_address= $_POST["doners_address"];			
		$doners_status= $_POST["doners_status"];	
		$doners_id= $_POST["doners_id"];			
		
	
		$updqry="UPDATE ".DONERS." SET `doners_name`='$doners_name', `doners_blood_groud`='$doners_blood_groud', `doners_gender`='$doners_gender',
		`doners_dob`='$doners_dob',
		`doners_mobile`='$doners_mobile',		
		`doners_landline`='$doners_landline',		
		`doners_state`='$doners_state',		
		`doners_city`='$doners_city',		
		`doners_email`='$doners_email',		
		`doners_address`='$doners_address',`doners_status`='$doners_status'  WHERE `doners_id`='$doners_id'";

			$resupdqry=mysql_query($updqry)or die(mysql_error());
			$flag="success";
			header("Location:viewdonors.php?rflag=success&rtype=update&task=view");
		

	}

	if(isset($_POST["cmdSubmit"]))
	{
	
		$doners_name= $_POST["doners_name"];	
		$doners_blood_groud= $_POST["doners_blood_groud"];			
		$doners_gender= $_POST["doners_gender"];	
		$doners_dob= $_POST["doners_dob"];			
		$doners_mobile= $_POST["doners_mobile"];	
		$doners_landline= $_POST["doners_landline"];			
		$doners_state= $_POST["doners_state"];	
		$doners_city= $_POST["doners_city"];			
		$doners_email= $_POST["doners_email"];	
		$doners_address= $_POST["doners_address"];			
		$doners_status= $_POST["doners_status"];	
		
echo	 	$insert_query="INSERT INTO ".DONERS." (`doners_name`,`doners_blood_groud`,`doners_gender`,`doners_dob`,`doners_mobile`,`doners_landline`,`doners_state`,`doners_city`,`doners_email`,`doners_address`,`doners_status`) 
VALUES('$doners_name','$doners_blood_groud','$doners_gender','$doners_dob','$doners_mobile','$doners_landline','$doners_state','$doners_city','$doners_email','$doners_address','$doners_status')";		
		$inder_ad_price=mysql_query($insert_query);
		$inser_id=mysql_insert_id();
		if($inser_id>0)
		{
			header("Location:viewdonors.php?task=general&log=succ");
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
<script type="text/javascript">
 function checkdata()
 {
	 var package_value=document.getElementById("package").value;
	 if(package_value=="4" || package_value=="3")
	 {
		document.getElementById('positiondiv').style.display = "block";
	 }	
	 else
	 {
	 	document.getElementById('positiondiv').style.display = "none";
	 }	
	 
	 if(package_value=="3")
	 {
		document.getElementById('positiondiv1').style.display = "block";
	 }	
	 else
	 {
	 	document.getElementById('positiondiv1').style.display = "none";
	 }	
 }
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
				<div class="h_title">Add Doner Details</div>
				<form action="adddonors.php" method="post" name="frm_accountinfo">
					<div class="element">
						<label for="name">Doner Name</label>
						<input id="doners_name" name="doners_name" style="width:50%;" class="text" type="text" value="<?php echo $ans['doners_name']; ?>" />
					</div>
					<div class="element">
						<label for="category">Blood Group</label>
						<select name="doners_blood_groud" id="doners_blood_groud" style="width:30%;">
			                <option value="select">Select</option>
                           <?php
						   		$Q_Check	= "SELECT * FROM ".GROUP."  ORDER BY `group_id` ASC  ";
								$R_Check	= mysql_query($Q_Check) or die(mysql_error());
								
								while($fecth_while=mysql_fetch_array($R_Check))		
								{
								$group_ids=$fecth_while['group_id'];														
														
						    ?> 
							<option value="<?php echo $fecth_while['group_id']; ?>" <?php if($group_ids==$ans['doners_blood_groud']){ echo "selected";} ?>>
								<?php echo $fecth_while['group_name']; ?>
                            </option>
                            <?php } ?>
						</select>
					</div>           
					<div class="element">
						<label for="category">Gender</label>
						<select name="doners_gender" id="doners_gender" class="" style="width:30%;">
			                <option value="select">Select</option>
							<option value="Male" <?php $doners_genders=$ans['doners_gender'];  if($doners_genders =="Male") echo "selected"; ?>>Male</option>
							<option value="Female" <?php  if($doners_genders=="Female") echo "selected"; ?>>Female</option>
						</select>
					</div>                                  
					<div class="element">
						<label for="name">Doners DOB</label>
						<input id="doners_dob" name="doners_dob" class="text" type="text" value="<?php echo $ans['doners_dob']; ?>" />
					</div>                    
					<div class="element">
						<label for="name">Mobile No</label>
						<input id="doners_mobile" name="doners_mobile" class="text" type="text" value="<?php echo $ans['doners_mobile']; ?>" />
					</div>                    
					<div class="element">
						<label for="name">Land Line Number</label>
						<input id="doners_landline" name="doners_landline" class="text" type="text" value="<?php echo $ans['doners_landline']; ?>" />
					</div>                    
					<div class="element">
						<label for="name">State</label>
						<input id="doners_state" name="doners_state" class="text" type="text" value="<?php echo $ans['doners_state']; ?>" />
					</div>                    
					<div class="element">
						<label for="name">City</label>
						<input id="doners_city" name="doners_city" class="text" type="text" value="<?php echo $ans['doners_city']; ?>" />
					</div>
					<div class="element">
						<label for="name">Email Address</label>
						<input id="doners_email" name="doners_email" class="text" type="text" value="<?php echo $ans['doners_email']; ?>" />
					</div>
					<div class="element">
						<label for="name">Permanent Address</label>
						<textarea rows="5" class="textarea" name="doners_address" id="doners_address"><?php echo $ans['doners_address']; ?></textarea>
					</div>
					<div class="element">
						<label for="category">Doner Availability</label>
						<select name="doners_status" id="doners_status" class="">
			                <option value="select">Select</option>
							<option value="1" <?php $status=$ans['doners_status'];  if($status =="1") echo "selected"; ?>>Active</option>
							<option value="2" <?php  if($status=="0") echo "selected"; ?>>Deactive</option>
						</select>
					</div>                    
					<div class="entry">
						<input name="<?php if($doners_id==""){ echo "cmdSubmit";} else{ echo "Update"; }  ?>" type="submit" value="Submit" class="box1">
						<input type="hidden" value="<?php echo $doners_id; ?>" name="doners_id" id="doners_id" />
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
