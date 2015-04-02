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
	//Check Admin session
	include("../include/session.php");
	//Include Fucntions
	include("../include/functions.php");
	//function for paging
	include("../include/paging.php");
	//Include Editor
    include("../fckeditor.php");
	
	$packages="home";

	$mid	= $_REQUEST['mid'];

	$SortBy	= $_REQUEST['sortby'];
	if(($SortBy == "") || ($SortBy == "all")) { echo $SortList = ""; } else { $SortList = $SortBy; }
	
		# GET LIMIT VALUE
	$Query_Limit	=	"SELECT * FROM ".ADMINPROFILE."";
	$Result_Limit	=	mysql_query($Query_Limit);
	$Fetch_Limit	=	mysql_fetch_array($Result_Limit);
	
    $flag=$_REQUEST['flag'];
    $id=$_REQUEST['id'];
  	
	#For Display the Result
	$rflag	=	$_GET['rflag'];	
	$rType	=	$_GET['rtype'];	
	
	if($flag == "active")
	{
		$Update	=	"UPDATE ".PACKAGE." SET `package_st`='0' WHERE `package_id`='$id'";
		$Result	=	mysql_query($Update);
		$rflag	=	"success";
		$rType	=	"active";
	}
	elseif($flag == "deactive")
	{
		$Update	=	"UPDATE ".PACKAGE." SET `package_st`='1' WHERE `package_id`='$id'";
		$Result	=	mysql_query($Update);
		$rflag	=	"success";
		$rType	=	"deactive";
	}
	elseif($flag == "delete")
	{
		$Delete	=	"DELETE FROM ".PACKAGE." WHERE `package_id`='$id'";
		$Result	=	mysql_query($Delete);
		$rflag	=	"success";
		$rType	=	"delete";
	}

	$Q_Check	= "SELECT * FROM ".PACKAGE."  WHERE (`package_name` LIKE '$SortList%') ORDER BY `package_id` ASC  ";
	$R_Check	= mysql_query($Q_Check) or die(mysql_error());
	$C_Check	= mysql_num_rows($R_Check);
	$total		= mysql_num_rows($R_Check);	
	
	$page = $_GET['page']; 
	$limit = $Fetch_Limit['intRows']; 
	$limit = 10; 

	$pager  = getPagerData($total, $limit, $page); 
	$offset = $pager->offset; 
	$limit  = $pager->limit; 
	$page   = $pager->page; 	

			
	$Q_Check1	= "SELECT * FROM ".PACKAGE." WHERE (`package_name` LIKE '$SortList%') ORDER BY `package_id` ASC  limit $offset, $limit";
	$R_Check1	= mysql_query($Q_Check1);
	 $R_numrows  = mysql_num_rows($R_Check1); 
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
<script language="javascript" type="text/javascript" src="../script/adminscript.js"></script>

<script type="text/javascript">
$(function(){
	$(".box .h_title").not(this).next("ul").hide("normal");
	$(".box .h_title").not(this).next("#home").show("normal");
	$(".box").children(".h_title").click( function() { $(this).next("ul").slideToggle(); });
});
</script>
<script type="text/javascript">
function calldel(idvalue)
{
var x;
var r=confirm(idvalue);
if (r==true)
  {
	return true; 
  }
else
  {
	return false; 
  }
document.getElementById("demo").innerHTML=x;
	
}
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
			
			<!-- <div class="full_w">
				<div class="h_title">View Price</div>
				<form action="price.php" method="post" enctype="multipart/form-data" name="frm_accountinfo" onsubmit="return setting_validation();">
					<div class="element">
						<label for="name">Ad's Price ($)</label>
						<input id="price" name="price" class="text" value="<?php echo $company; ?>" />
					</div>
					<div class="element">
						<label for="name">Time Frame<label>
						<input id="timeframe" name="timeframe" class="text" value="<?php echo $contact; ?>"  />
					</div>
					<div class="element">
						<label for="category">Status</label>
						<select name="status" id="status" class="">
			                <option value="select">Select</option>
							<option value="1" <?php  if($status == 1) echo "selected"; ?>>Active</option>
							<option value="2" <?php  if($status == 2) echo "selected"; ?>>Deactive</option>
						</select>
					</div>
					<div class="entry">
						<input name="cmdSubmit" type="submit" value="Submit" class="box1"><button class="cancel">Cancel</button>
					</div>
				</form>
			</div>-->
			
			<div class="full_w">
				<div class="h_title">View Package</div>
				 <?php
					  # Display the Result(Status) 
					  if($rflag == "success") 
					  { 
						  if($rType == "add")
							$rDisp	=	"Package Details Successfully Added";
						  elseif($rType == "deactive")
							$rDisp	=	"Package Details Successfully Actived";
						  elseif($rType == "active")
							$rDisp	=	"Package Details Successfully DeActived";
						  elseif($rType == "check")
							$rDisp	=	"Package Details Successfully turns to Popular";
						  elseif($rType == "uncheck")
							$rDisp	=	"Package Details Successfully cancel from Popular";
						  elseif($rType == "delete")
							$rDisp	=	"Package Details Deleted Successfully";
						  elseif($rType == "edit")
							$rDisp	=	"Package Details Edited Successfully";
						 
							echo "<div class='n_ok'><p>".$rDisp."</p></div>";
						 
					  }  
					  ?>
<!--				<h2>Lorem ipsum dolor sit ame</h2>
				<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumyeirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diamvolupt</p>
				
				<div class="entry">
					<div class="sep"></div>
				</div>-->
				<table>
					<thead>
						<tr>
							<th scope="col" align="center">SL No</th>
<!--							<th scope="col" align="center">Package Duration</th>-->
							<th scope="col" align="center">Package Name</th>
							<th scope="col" align="center">Status</th>
							<th scope="col" align="center" style="width: 65px;">Modify</th>
						</tr>
					</thead>
					<tbody>
					<?php
							$change="";
							if($R_numrows > 0 ){
							$r=0;
							while($F_Check = mysql_fetch_array($R_Check1)) 
							{ 
							$r++;
							
							$package_time = $F_Check['package_time'];
							$package_name = $F_Check['package_name'];
							$status = $F_Check['package_st'];
							$id_price = $F_Check['id_price'];
							
							if($status=="1"){  $sta="Active"; } else{ $sta="Deactive"; }
						?>
						<tr>
							<td class="align-center" align="center"><?php echo $r; ?></td>
							<!--<td align="center"><?php echo $package_time; ?></td>-->
							<td align="center"><?php echo $package_name; ?></td>
							<td align="center"><?php if($F_Check['package_st'] == "1") { ?><a style="color:#000000;text-decoration:none;" href="viewpackage.php?task=view&amp;flag=active&amp;id=<?php echo $F_Check['package_id'];?>" ><?php echo $sta; ?></a> <?php } else { ?> <a style="color:#000000;text-decoration:none;" href="viewpackage.php?task=view&amp;flag=deactive&amp;id=<?php echo $F_Check['package_id'];?>" ><?php echo $sta; ?></a> <?php } ?> </td>
							<td align="center">
								<a href="packages.php?task=edit&amp;mid=<?php echo $F_Check['package_id'];?>&amp;page=<?php echo $page;?>" class="table-icon edit" title="Edit"></a>
								<a href="#" class="" title="Archive">&nbsp;</a>								
								<!--<a href="viewpackage.php?task=view&amp;flag=delete&amp;id=<?php echo $F_Check['package_id'];?>&amp;page=<?php echo $page;?>" onclick="return calldel('Do you want to delete this Package details?');" class="table-icon delete" title="Delete"></a>-->
							</td>
						</tr>
						<?php } } else {?> 
						<tr>
							<td colspan="5" align="center"><h2>Price List Not Found</h2></td>
						</tr>
						<?php } ?>
					</tbody>
					
				</table>
				<div class="sep"></div>		
				<!--<div class="entry">
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
				</div>-->
			</div>
		</div>
		<div class="clear"></div>
	</div>

		<?php include("footer.php") ?>
</div>

</body>
</html>
