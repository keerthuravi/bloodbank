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

$id = $_GET['mid'];
$filepath="../testimonialimg/";

$selqry="select * from  ".TESTIMONIALS." where `testimonial_id`='$id'";
$resqry=mysql_query($selqry) or die(mysql_error());
$ans=mysql_fetch_array($resqry);
$package=$ans['package'];
 
	if(isset($_POST["Update"]))
	{	
	
		$testimonial_title= $_POST["testimonial_title"];	
		$testimonial_id= $_POST["testimonial_id"];			
			
		$testimonial_dec= addslashes($_POST["testimonial_dec"]);						
		$filepath="../testimonialimg/";
		$rand=mt_rand(100000,999999);	
		$testimonial_img=$_FILES['testimonial_img']["name"];
		$testimonial_img_tmp=$_FILES['testimonial_img']["tmp_name"];	
		$testimonial_img_f=$rand.$testimonial_img; 
		$testimonial_status		= $_POST["testimonial_status"];
		
		if($testimonial_img=="")
		{
		$updqry="UPDATE ".TESTIMONIALS." SET `testimonial_title`='$testimonial_title', `testimonial_dec`='$testimonial_dec', `testimonial_status`='$testimonial_status'   WHERE `testimonial_id`='$testimonial_id'";

			$resupdqry=mysql_query($updqry)or die(mysql_error());
			$flag="success";
			header("Location:viewtestimonial.php?rflag=success&rtype=edit&task=view");
		}
		else 
		{
 			$updqrys="UPDATE ".TESTIMONIALS." SET `testimonial_title`='$testimonial_title',`testimonial_img`='$testimonial_img_f', `testimonial_dec`='$testimonial_dec', `testimonial_status`='$testimonial_status'   WHERE `testimonial_id`='$testimonial_id'";
 			move_uploaded_file($testimonial_img_tmp,$filepath.$testimonial_img_f);	  
			$resupdqrys=mysql_query($updqrys)or die(mysql_error());
			$flag="success";
			header("Location:viewtestimonial.php?rflag=success&rtype=edit&task=view");	 
		}
		

	}

	if(isset($_POST["cmdSubmit"]))
	{
	
		$testimonial_title= $_POST["testimonial_title"];		
		$testimonial_dec= addslashes($_POST["testimonial_dec"]);						
		$filepath="../testimonialimg/";
		$rand=mt_rand(100000,999999);	
		$testimonial_img=$_FILES['testimonial_img']["name"];
		$testimonial_img_tmp=$_FILES['testimonial_img']["tmp_name"];	
		$testimonial_img_f=$rand.$testimonial_img; 
		$testimonial_status		= $_POST["testimonial_status"];
		
	 	$insert_query="INSERT INTO ".TESTIMONIALS." (`testimonial_title`,`testimonial_dec`,`testimonial_status`) VALUES ('$testimonial_title','$testimonial_dec','$testimonial_status')";		
		$inder_ad_price=mysql_query($insert_query);
		$inser_id=mysql_insert_id();
		if($inser_id>0)
		{
			move_uploaded_file($testimonial_img_tmp,$filepath.$testimonial_img_f);	  
			$updqrys="UPDATE ".TESTIMONIALS." SET `testimonial_img`='$testimonial_img_f' WHERE `testimonial_id`='$inser_id'";
			$resupdqrys=mysql_query($updqrys)or die(mysql_error());
			header("Location:viewtestimonial.php?task=general&log=succ");
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
				<div class="h_title">Add News</div>
				<form action="addtestimonial.php" method="post" enctype="multipart/form-data" name="frm_accountinfo" onsubmit="return setting_validation();">
					<div class="element">
						<label for="name">News Title</label>
						<input id="testimonial_title" name="testimonial_title" class="text" type="text" value="<?php echo $ans['testimonial_title']; ?>" />
					</div>
					<div class="element">
						<label for="name">News Description</label>
						<textarea cols="80" id="editor1" name="testimonial_dec" rows="10">
                        <?php echo stripcslashes($ans['testimonial_dec']); ?>
                        </textarea>
                        <script>
						CKEDITOR.replace( 'editor1' );
						</script>
					</div>

					<div class="element">
						<label for="category">Status</label>
						<select name="testimonial_status" id="testimonial_status" class="">
			                <option value="select">Select</option>
							<option value="1" <?php $status=$ans['testimonial_status'];  if($status =="1") echo "selected"; ?>>Active</option>
							<option value="2" <?php  if($status=="0") echo "selected"; ?>>Deactive</option>
						</select>
					</div>
					<div class="entry">
						<input name="<?php if($id==""){ echo "cmdSubmit";} else{ echo "Update"; }  ?>" type="submit" value="Submit" class="box1"><!-- <button class="cancel">Cancel</button>-->
						<input type="hidden" value="<?php echo $id; ?>" name="testimonial_id" id="testimonial_id" />
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
