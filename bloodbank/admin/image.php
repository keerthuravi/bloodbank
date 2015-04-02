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
   $price="home";

	$id = $_REQUEST['mid'];

$selqry="select * from  ".ASSORTMENTIMG." where `id_price`='$id'";
$resqry=mysql_query($selqry) or die(mysql_error());
$ans=mysql_fetch_array($resqry);
$package=$ans['assortmentcat'];
$eventimg=$ans['eventimg'];
 
	if(isset($_POST["Update"]))
	{	
	
		$assortmentcat			= $_POST["assortmentcat"];	
		$price_id				= $_POST["price_id"];	
		$showin_home			= $_POST["showin_home"];	
				
		

		$filepathss="../products/";
		$rand=mt_rand(100000,999999);	
		$eventimg_r=$_FILES['eventimg']["name"];
		$eventimg_r_tmp=$_FILES['eventimg']["tmp_name"];	
		$eventimg_r_f=$rand.$eventimg_r; 
		$status 				= $_POST["status"];
		
		if($eventimg_r_tmp=="")
		{
			$updqry="UPDATE ".ASSORTMENTIMG." SET `assortmentcat`='$assortmentcat',`showin_home`='$showin_home',  `status`='$status'   WHERE `id_price`='$price_id'";
			$resupdqry=mysql_query($updqry)or die(mysql_error());
			$flag="success";
			header("Location:viewimage.php?rflag=success&rtype=edit&task=view");
		}
		else 
		{
echo			$updqryss="UPDATE ".ASSORTMENTIMG." SET `assortmentcat`='$assortmentcat', `showin_home`='$showin_home', `eventimg`='$eventimg_r_f', `status`='$status'   WHERE `id_price`='$price_id'";

			$resupdqrys=mysql_query($updqryss)or die(mysql_error());
//			move_uploaded_file($eventimg_r_tmp,$filepaths.$eventimg_r_f);	  			
			move_uploaded_file($eventimg_r_tmp,$filepathss.$eventimg_r_f);	  
			$flag="success";
			header("Location:viewimage.php?rflag=success&rtype=edit&task=view");	 
		}
		

	}

	if(isset($_POST["cmdSubmit"]))
	{
	
		$assortmentcat			= $_POST["assortmentcat"];
		$showin_home			= $_POST["showin_home"];					
		$filepaths="../products/";
		$rand=mt_rand(100000,999999);	
		$eventimg_r=$_FILES['eventimg']["name"];
		$eventimg_r_tmp=$_FILES['eventimg']["tmp_name"];	
		$eventimg_r_f=$rand.$eventimg_r; 
		$status 				= $_POST["status"];
		
	 	$insert_query="INSERT INTO ".ASSORTMENTIMG." (`assortmentcat`,`showin_home`,`status`) VALUES ('$assortmentcat','$showin_home','$status')";		
		$inder_ad_price=mysql_query($insert_query);
		$inser_id=mysql_insert_id();
		if($inser_id>0)
		{
			move_uploaded_file($eventimg_r_tmp,$filepaths.$eventimg_r_f);	  
			header("Location:viewimage.php?task=general&log=succ");
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
</head>
<body>
<div class="wrap">
	<?php include("topnave.php"); ?>
	
	<div id="content">
	<?php include("sidenav.php"); ?>			
		<div id="main">
			
			
			<div class="full_w">
				<div class="h_title">Add Product Image</div>
				<form action="image.php" method="post" enctype="multipart/form-data" name="frm_accountinfo" onsubmit="return setting_validation();">
					  <div class="element">
						<label for="category">Select Category</label>
						<select name="assortmentcat" id="assortmentcat" class="">
			                <option value="">Select</option>
                            <?php 
								$cqry = "select * from ".PACKAGE." where `package_st`='1'";
								$cres = mysql_query($cqry)or die(db_error());
								$j=1;
								while($carr=mysql_fetch_array($cres))
								{ 
								$package_name 				= $carr['package_name'];
								$package_id 				= $carr['package_id'];	
							?>
							<option value="<?php echo $package_id; ?>" <?php if($package==$package_id){ echo "selected='selected'"; }?> > <?php echo $package_name; ?></option>
                            <?php $j++; } ?>
						</select>
					</div>  
					<div class="element">
						<label for="name">Image</label>
						<input id="eventimg" name="eventimg" class="text" type="file" value="<?php echo $ans['price']; ?>" />
                        <?php if($package!=""){ ?>
                        <img src="../products/<?php echo $eventimg;?>" width="100" height="100" />
                        <?php } ?>
					</div>
					<div class="element">
					<label for="name">
	                    <input id="showin_home" name="showin_home" type="checkbox" value="1" <?php if($ans['showin_home']=="1") { echo "checked"; } ?> />
                    	&nbsp;&nbsp;Show in Home Page
                    </label>
					</div>
					<div class="element">
						<label for="category">Status</label>
						<select name="status" id="status" class="">
			                <option value="select">Select</option>
							<option value="1" <?php $status=$ans['status'];  if($status =="1") echo "selected"; ?>>Active</option>
							<option value="2" <?php  if($status=="0") echo "selected"; ?>>Deactive</option>
						</select>
					</div>
					<div class="entry">
						<input name="<?php if($id==""){ echo "cmdSubmit";} else{ echo "Update"; }  ?>" type="submit" value="Submit" class="box1"><!-- <button class="cancel">Cancel</button>-->
						<input type="hidden" value="<?php echo $id; ?>" name="price_id" id="price_id" />
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
							<td>
							<td>22-03-2012</td>
							<td>-</td>
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
