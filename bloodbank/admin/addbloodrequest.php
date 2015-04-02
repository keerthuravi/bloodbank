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

$request_id = $_REQUEST['mid'];

$selqry="select * from  ".REQUEST." where `request_id`='$request_id'";
$resqry=mysql_query($selqry) or die(mysql_error());
$ans=mysql_fetch_array($resqry);
 
	if(isset($_POST["Update"]))
	{	
	
		$request_name= $_POST["request_name"];	
		$request_blood_groud= $_POST["request_blood_groud"];			
		$request_age= $_POST["request_age"];	
		$request_needed= $_POST["request_needed"];			
		$request_units= $_POST["request_units"];	
		$request_mobile= $_POST["request_mobile"];			
		$request_landline= $_POST["request_landline"];	
		$hospital_name= $_POST["hospital_name"];			
		$location= $_POST["location"];	
		$purpose= $_POST["purpose"];	
		$address= $_POST["address"];			
		$request_status= $_POST["request_status"];			
		$request_id= $_POST["request_id"];					
	
		$updqry="UPDATE ".REQUEST." SET `request_name`='$request_name', `request_blood_groud`='$request_blood_groud', `request_age`='$request_age',
		`request_needed`='$request_needed',
		`request_units`='$request_units',		
		`request_mobile`='$request_mobile',		
		`request_landline`='$request_landline',		
		`hospital_name`='$hospital_name',		
		`location`='$location',		
		`purpose`='$purpose',`address`='$address',`request_status`='$request_status'  WHERE `request_id`='$request_id'";

			$resupdqry=mysql_query($updqry)or die(mysql_error());
			$flag="success";
			header("Location:viewbloodrequest.php?rflag=success&rtype=update&task=view");
		

	}

if(isset($_POST["cmdSubmit"]))
{
	
		$request_name= $_POST["request_name"];	
		$request_blood_groud= $_POST["request_blood_groud"];			
		$request_age= $_POST["request_age"];	
		$request_needed= $_POST["request_needed"];			
		$request_units= $_POST["request_units"];	
		$request_mobile= $_POST["request_mobile"];			
		$request_landline= $_POST["request_landline"];	
		$hospital_name= $_POST["hospital_name"];			
		$location= $_POST["location"];	
		$purpose= $_POST["purpose"];	
		$address= $_POST["address"];			
		$request_status= $_POST["request_status"];	
		
echo	 	$insert_query="INSERT INTO ".REQUEST." (`request_name`,`request_blood_groud`,`request_age`,`request_needed`,`request_units`,`request_mobile`,`request_landline`,`hospital_name`,`location`,`purpose`,`address`,`request_status`) 
VALUES('$request_name','$request_blood_groud','$request_age','$request_needed','$request_units','$request_mobile','$request_landline','$hospital_name','$location','$purpose','$address','$request_status')";		
		$inder_ad_price=mysql_query($insert_query);
		$inser_id=mysql_insert_id();
		if($inser_id>0)
		{
			header("Location:viewbloodrequest.php?task=general&log=succ");
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
				<div class="h_title">Add Blood Request</div>
				<form action="addbloodrequest.php" method="post" name="frm_accountinfo">
					<div class="element">
						<label for="name">Patient Name</label>
						<input id="request_name" name="request_name" style="width:50%;" class="text" type="text" value="<?php echo $ans['request_name']; ?>" />
					</div>
					<div class="element">
						<label for="category">Blood Group</label>
						<select name="request_blood_groud" id="request_blood_groud" style="width:30%;">
			                <option value="select">Select</option>
                           <?php
						   		$Q_Check	= "SELECT * FROM ".GROUP."  ORDER BY `group_id` ASC  ";
								$R_Check	= mysql_query($Q_Check) or die(mysql_error());
								
								while($fecth_while=mysql_fetch_array($R_Check))		
								{
								$group_ids=$fecth_while['group_id'];														
														
						    ?> 
							<option value="<?php echo $fecth_while['group_id']; ?>" <?php if($group_ids==$ans['request_blood_groud']){ echo "selected";} ?>>
								<?php echo $fecth_while['group_name']; ?>
                            </option>
                            <?php } ?>
						</select>
					</div>           
<!--					<div class="element">
						<label for="category">Gender</label>
						<select name="doners_gender" id="doners_gender" class="" style="width:30%;">
			                <option value="select">Select</option>
							<option value="Male" <?php $doners_genders=$ans['doners_gender'];  if($doners_genders =="Male") echo "selected"; ?>>Male</option>
							<option value="Female" <?php  if($doners_genders=="Female") echo "selected"; ?>>Female</option>
						</select>
					</div>-->                                  
					<div class="element">
						<label for="name">Age</label>
						<input id="request_age" name="request_age" class="text" type="text" value="<?php echo $ans['request_age']; ?>" />
					</div>                    
					<div class="element">
						<label for="name">When need blood?</label>
						<input id="request_needed" name="request_needed" class="text" type="text" value="<?php echo $ans['request_needed']; ?>" />
					</div>                    
					<div class="element">
						<label for="name">How many units you need?</label>
						<input id="request_units" name="request_units" class="text" type="text" value="<?php echo $ans['request_units']; ?>" />
					</div>                    
					<div class="element">
						<label for="name">Mobile Number</label>
						<input id="request_mobile" name="request_mobile" class="text" type="text" value="<?php echo $ans['request_mobile']; ?>" />
					</div>                    
					<div class="element">
						<label for="name">LandLine Number</label>
						<input id="request_landline" name="request_landline" class="text" type="text" value="<?php echo $ans['request_landline']; ?>" />
					</div>
					<div class="element">
						<label for="name">Hospital Name</label>
						<input id="hospital_name" name="hospital_name" class="text" type="text" value="<?php echo $ans['hospital_name']; ?>" />
					</div>
					<div class="element">
						<label for="name">Location</label>
						<input id="location" name="location" class="text" type="text" value="<?php echo $ans['location']; ?>" />
					</div>
					<div class="element">
						<label for="name">Patient Address</label>
						<textarea rows="5" class="textarea" name="address" id="address"><?php echo $ans['address']; ?></textarea>
					</div>
					<div class="element">
						<label for="name">Purpose</label>
						<textarea rows="5" class="textarea" name="purpose" id="purpose"><?php echo $ans['purpose']; ?></textarea>
					</div>
                    
					<div class="element">
						<label for="category">Request Status</label>
						<select name="request_status" id="request_status" class="">
			                <option value="select">Select</option>
							<option value="1" <?php $status=$ans['request_status'];  if($status =="1") echo "selected"; ?>>Still Needed?</option>
							<option value="2" <?php  if($status=="0") echo "selected"; ?>>Closed</option>
						</select>
					</div>                    
					<div class="entry">
						<input name="<?php if($request_id==""){ echo "cmdSubmit";} else{ echo "Update"; }  ?>" type="submit" value="Submit" class="box1">
						<input type="hidden" value="<?php echo $request_id; ?>" name="request_id" id="request_id" />
					</div>
				</form>
			</div>
			
			<!--<div class="full_w">
				<div class="h_title">Manage pages - table</div>
				<h2>Lorem ipsum dolor sit ame</h2>
				<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumyeirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diamvolupt</p>
				
				<div class="entry">
					<div class="sep"></div>
				</div>
				<table>
					<thead>
						<tr>
							<th scope="col">ID</th>
							<th scope="col">Title</th>
							<th scope="col">Author</th>
							<th scope="col">Date</th>
							<th scope="col">Category</th>
							<th scope="col" style="width: 65px;">Modify</th>
						</tr>
					</thead>
						
					<tbody>
						<tr>
							<td class="align-center">2</td>
							<td>Home</td>
							<td>Paweł B.</td>
							<td>22-03-2012</td>
							<td>-</td>
							<td>
								<a href="#" class="table-icon edit" title="Edit"></a>
								<a href="#" class="table-icon archive" title="Archive"></a>
								<a href="#" class="table-icon delete" title="Delete"></a>
							</td>
						</tr>
						<tr>
							<td class="align-center">3</td>
							<td>Our offer</td>
							<td>Paweł B.</td>
							<td>22-03-2012</td>
							<td>-</td>
							<td>
								<a href="#" class="table-icon edit" title="Edit"></a>
								<a href="#" class="table-icon archive" title="Archive"></a>
								<a href="#" class="table-icon delete" title="Delete"></a>
							</td>
						</tr>
							
						<tr>
							<td class="align-center">5</td>
							<td>About</td>
							<td>Admin</td>
							<td>23-03-2012</td>
							<td>-</td>
							<td>
								<a href="#" class="table-icon edit" title="Edit"></a>
								<a href="#" class="table-icon archive" title="Archive"></a>
								<a href="#" class="table-icon delete" title="Delete"></a>
							</td>
						</tr>
							
						<tr>
							<td class="align-center">12</td>
							<td>Contact</td>
							<td>Admin</td>
							<td>25-03-2012</td>
							<td>-</td>
							<td>
								<a href="#" class="table-icon edit" title="Edit"></a>
								<a href="#" class="table-icon archive" title="Archive"></a>
								<a href="#" class="table-icon delete" title="Delete"></a>
							</td>
						</tr>						
						<tr>
							<td class="align-center">114</td>
							<td>Portfolio</td>
							<td>Paweł B.</td>
							<td>22-03-2012</td>
							<td>-</td>
							<td>
								<a href="#" class="table-icon edit" title="Edit"></a>
								<a href="#" class="table-icon archive" title="Archive"></a>
								<a href="#" class="table-icon delete" title="Delete"></a>
							</td>
						</tr>
							
						<tr>
							<td class="align-center">116</td>
							<td>Clients</td>
							<td>Admin</td>
							<td>23-03-2012</td>
							<td>-</td>
							<td>
								<a href="#" class="table-icon edit" title="Edit"></a>
								<a href="#" class="table-icon archive" title="Archive"></a>
								<a href="#" class="table-icon delete" title="Delete"></a>
							</td>
						</tr>
							
						<tr>
							<td class="align-center">131</td>
							<td>Customer reviews</td>
							<td>Admin</td>
							<td>25-03-2012</td>
							<td>-</td>
							<td>
								<a href="#" class="table-icon edit" title="Edit"></a>
								<a href="#" class="table-icon archive" title="Archive"></a>
								<a href="#" class="table-icon delete" title="Delete"></a>
							</td>
						</tr>
					</tbody>
				</table>
				<div class="entry">
					<div class="pagination">
						<span>« First</span>
						<span class="active">1</span>
						<a href="">2</a>
						<a href="">3</a>
						<a href="">4</a>
						<span>...</span>
						<a href="">23</a>
						<a href="">24</a>
						<a href="">Last »</a>
					</div>
					<div class="sep"></div>		
					<a class="button add" href="">Add new page</a> <a class="button" href="">Categories</a> 
				</div>
			</div>-->
		</div>
		<div class="clear"></div>
	</div>

		<?php include("footer.php") ?>
</div>

</body>
</html>
