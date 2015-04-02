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

$cms="home";

$page_names=$_REQUEST['page'];
/*****************************************************************************
 * Website: Simple Website
 * Setting  Page
 *developed on 10/10/2008
 ****************************************************************************/
$logopath = FRONTLOGO;
	if(isset($_POST["cmdSubmit"])){
	
			$page_name				=$_POST["page_name"];
			$pagetitle 				= $_POST["pagetitle"];
			$metekeyword 			= $_POST["metekeyword"];
			$metadec 				= $_POST["metadec"];
			echo $pagecontent 			= addslashes($_POST["pagecontent"]);


		 	$UpdateUserQry = "update ".CMS." set `pagetitle`= '$pagetitle',
			`meta_keyword` 		= '$metekeyword',
			`meta_dec`				= '$metadec',
			`cms_dec` 				= '$pagecontent' where `page_name`='$page_name'";
			
			
			
			$UpdateUserRes = mysql_query($UpdateUserQry) or die("Error in updation:".db_error());
			
			header("Location:cms.php?page=$page_name&log=succ");
	}
			$cqry = "select * from ".CMS." where `page_name`='$page_names'";
			$cres = mysql_query($cqry)or die(db_error());
			$carr = mysql_fetch_array($cres);
			$adminid = $carr['intAdminId'];
			
			$pagetitle 				= $carr['pagetitle'];
			$metekeyword 				= $carr['meta_keyword'];
			$metadec 					= $carr['meta_dec'];
			$pagecontent 				= $carr['cms_dec'];
			$website 				= $carr['varWebsite'];
			$homepage 				= $carr['varHomePage'];
			$adminpage 				= $carr['varAdminPage'];
			$updateaction 			= "Update"; 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pl" xml:lang="pl">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="author" content="Paweł 'kilab' Balicki - kilab.pl" />
<title><?php echo $pagetitle; ?></title>
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
				<div class="h_title">Content Management System - <?php echo $pagetitle; ?></div>
				<form action="<?php  print $HTTP_SERVER_VARS['PHP_SELF'];?>?task=general" method="post" enctype="multipart/form-data" name="frm_accountinfo" onsubmit="return setting_validation();">
                	<?php $log=$_REQUEST['log']; if($log=="succ"){ ?>
                	<div class="n_ok"><p><?php echo $pagetitle; ?> Details Successfully Updates </p></div>
                    <?php } ?>
					<div class="element">
						<label for="name">Page Title</label>
						<input id="pagetitle" name="pagetitle" class="text" value="<?php echo $pagetitle; ?>" />
					</div>
<!--					<div class="element">
						<label for="name">Meta Keyword</label>
						<input id="metekeyword" name="metekeyword" class="text" value="<?php echo $metekeyword; ?>" />
					</div>
					<div class="element">
						<label for="name">Meta Description<span class="red">(required)</span></label>
						<input id="metadec" name="metadec" class="text" value="<?php echo $metadec; ?>" />
					</div>
-->					<div class="element">
						<label for="name">Page Content</label>
						<textarea cols="80" id="editor1" name="pagecontent" rows="10">
                        <?php echo stripcslashes($pagecontent); ?>
                        </textarea>
                        <script>
						CKEDITOR.replace( 'editor1' );
						</script>

					</div>
					<div class="entry">
						<input name="cmdSubmit" type="submit" value="<?php echo $updateaction; ?>" class="box1"><!-- <button class="cancel">Cancel</button>-->
                        <input type="hidden" value="<?php echo $page_names; ?>" id="page_name" name="page_name" />
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
