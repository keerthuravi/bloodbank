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
			if(isset($_POST["cmdSubmit"]))
			{
			
			$package_time=$_POST['package_time'];
			$package_name 				= $_POST["package_name"];
			$cat_sort_result			= substr($package_name, 0, 4);
			$cat_sort					=$cat_sort_result.mt_rand(0, 1000);
			$package_note 				= $_POST["package_note"];
			$package_st					= $_POST['package_st'];

			$insert_query="INSERT INTO ".PACKAGE." (`package_name`,`cat_sort`,`package_st`) VALUES ('$package_name','$cat_sort','$package_st')";
			$inder_ad_price=mysql_query($insert_query);
			$inser_id=mysql_insert_id();
			if($inser_id>0)
			{
				header("Location:viewassortmentcategory.php?task=general&log=succ");
			}					

				
	}

			if(isset($_POST["Update"]))
			{
			
			$devlanguage=$_POST['package_time'];
	        if ($devlanguage)
			{
			  foreach ($devlanguage as $lang)
				{
				  $d[] = $lang ;
				}
			}
			$selected_pack=implode($d,",");
			
			
			$pack_id 					= $_POST["pack_id"];
			$package_name 				= $_POST["package_name"];
			$package_dec 				= addslashes($_POST["package_dec"]);
			$package_note 				= $_POST["package_note"];
			$package_st					= $_POST['package_st'];
			
			
		    $update_query="UPDATE ".PACKAGE." SET `package_name`='$package_name',`package_st`='$package_st' WHERE  `package_id`='$pack_id'";
			$update_ad_price=mysql_query($update_query);
			
			header("Location:viewassortmentcategory.php?task=edit&log=succ");
	
				
	}



	
			$cqry_edit = "select * from ".PACKAGE." where `package_id`='$mid'";
			$cres_edit = mysql_query($cqry_edit)or die(db_error());
			$cresf_edit=mysql_fetch_array($cres_edit);
			
			$package_time_edit=$cresf_edit['package_time'];
			$package_name_edit=$cresf_edit['package_name'];
			$package_dec_edit=$cresf_edit['package_dec'];
			$package_note_edit=$cresf_edit['package_note'];
			$package_st_edit=$cresf_edit['package_st'];		
	
			
//			$carr = mysql_fetch_array($cres);
//			$id_price = $carr['id_price'];
		
//			$price 				= $carr['price'];
//			$timeframe 			= $carr['timeframe'];
//			$status 			= $carr['status'];

			$updateaction 			= "Update"; 
		
			
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
function showdinote(id)
{
//	alert(id);
	if(document.getElementById('ifnote').checked = true)
	{
	 document.getElementById('notediv').style.display='block';
	}
	else if(document.getElementById('ifnote').checked = false)
	{
	 document.getElementById('notediv').style.display='none';
	}
	
/*	alert(document.getElementById("ifnote").value);
	if(document.getElementById("ifnote").value=="on")
	{
		document.getElementById("notediv").style.display='block'; 
	}
	if(document.getElementById("ifnote").value=="0")
	{
		document.getElementById("notediv").style.display='none'; 
	}
*/}
</script>

</head>
<body>
<div class="wrap">
	<?php include("topnave.php"); ?>
	
	<div id="content">
	<?php include("sidenav.php"); ?>			
		<div id="main">
			<!--<div class="half_w half_left">
				<div class="h_title">Visits statistics</div>
					<script src="js/highcharts_init.js"></script>
					<div id="container" style="min-width: 300px; height: 180px; margin: 0 auto"></div>
					<script src="js/highcharts.js"></script>
			</div>
			<div class="half_w half_right">
				<div class="h_title">Site statistics</div>
				<div class="stats">
					<div class="today">
						<h3>Today</h3>
						<p class="count">2 349</p>
						<p class="type">Visits</p>
						<p class="count">96</p>
						<p class="type">Comments</p>
						<p class="count">9</p>
						<p class="type">Articles</p>
					</div>
					<div class="week">
						<h3>Last week</h3>
						<p class="count">12 931</p>
						<p class="type">Visits</p>
						<p class="count">521</p>
						<p class="type">Comments</p>
						<p class="count">38</p>
						<p class="type">Articles</p>
					</div>
				</div>
			</div>
			
			<div class="clear"></div>-->
			
			<!--<div class="full_w">
				<div class="h_title">Paragraph, headers, lists, notify</div>
				<h1>Level 1 header</h1>
				<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumyeirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diamvoluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takim</p>
				<h2>Level 2 header</h2>
				<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumyeirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diamvoluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumyeirmod tempor i</p>
				<h3>Level 3 header</h3>
				<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumyeirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diamvolupt</p>
				<h3>Unordered list</h3>
				<ul>
					<li>first list item, Lorem ipsum dolor sit amet, consete</li>
					<li>second list item, Lorem ipsum dolor sit amet, consete</li>
					<li>third list item, Lorem ipsum dolor sit amet, consete</li>
					<li>fourth list item, Lorem ipsum dolor sit amet, consete</li>
				</ul>
				<h3>Ordered list</h3>
				<ol>
					<li>first list item, Lorem ipsum dolor sit amet, consete</li>
					<li>second list item, Lorem ipsum dolor sit amet, consete</li>
					<li>third list item, Lorem ipsum dolor sit amet, consete</li>
					<li>fourth list item, Lorem ipsum dolor sit amet, consete</li>
				</ol>
                <div class="n_warning"><p>Attention notification. Lorem ipsum dolor sit amet, consetetur, sed diam nonumyeirmod tempor.</p></div>
				<div class="n_ok"><p>Success notification. Lorem ipsum dolor sit amet, consetetur, sed diam nonumyeirmod tempor.</p></div>
				<div class="n_error"><p>Error notification. Lorem ipsum dolor sit amet, consetetur, sed diam nonumyeirmod tempor.</p></div>		
			</div>-->
			
			<div class="full_w">
				<div class="h_title">Add Category</div>
				<form action="<?php  print $HTTP_SERVER_VARS['PHP_SELF'];?>?task=general" method="post" enctype="multipart/form-data" name="frm_accountinfo" onsubmit="return setting_validation();">
               <!-- <div class="element">
						<label for="category">Select Price (Admin can select the multiple price)</label>
						<select name="package_time" id="package_time" class="" >
			                <option value="select">Select</option>-->
                            <?php 
								/*$cqry = "select * from ".PRICE." where  `status`='1'";
								$cres = mysql_query($cqry)or die(db_error());
								
								$j=1;
								while($carr=mysql_fetch_array($cres))
								{ 
								$price 				= $carr['price'];
								$timeframe 			= $carr['timeframe'];
								$status 			= $carr['status'];		
								$id_price			= $carr['id_price'];	*/
								
								

/*								$cqry = "select * from ".PRICE." where  `status`='1'";
								$cres = mysql_query($cqry)or die(db_error());*/

											
							?>
                            
							<!--<option value="<?php echo $id_price; ?>" <?php     ?>> <?php echo "$ ".$price." - ".$timeframe; ?></option>-->
                            
                            <?php //$j++; } ?>
				<!--		</select>
					</div>-->
					<div class="element">
						<label for="name">Category Name</label>
						<input id="package_name" name="package_name" class="text" value="<?php echo $package_name_edit; ?>" />
					</div>
					<div class="element">
						<label for="category">Status</label>
						<select name="package_st" id="package_st" class="">
			                <option value="select" > Select</option>
							<option value="1" <?php if($package_st_edit =="1"){ echo "selected"; }?>>Active</option>
							<option value="2" <?php if($package_st_edit =="0"){ echo "selected"; }?>>Deactive</option>
						</select>
					</div>
					<div class="entry">
						<input name="<?php if($mid==""){ echo "cmdSubmit";} else{ echo "Update"; }  ?>" type="submit" value="Submit" class="box1"><!-- <button class="cancel">Cancel</button>-->
						<input type="hidden" value="<?php echo $mid; ?>" name="pack_id" id="pack_id" />
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
