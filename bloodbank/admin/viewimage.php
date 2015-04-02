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
	
	$price="home";

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
		$Update	=	"UPDATE ".ASSORTMENTIMG." SET `status`='0' WHERE `id_price`='$id'";
		$Result	=	mysql_query($Update);
		$rflag	=	"success";
		$rType	=	"active";
	}
	elseif($flag == "deactive")
	{
		$Update	=	"UPDATE ".ASSORTMENTIMG." SET `status`='1' WHERE `id_price`='$id'";
		$Result	=	mysql_query($Update);
		$rflag	=	"success";
		$rType	=	"deactive";
	}
	elseif($flag == "delete")
	{
		$Delete	=	"DELETE FROM ".ASSORTMENTIMG." WHERE `id_price`='$id'";
		$Result	=	mysql_query($Delete);
		$rflag	=	"success";
		$rType	=	"delete";
	}

	$Q_Check	= "SELECT * FROM ".ASSORTMENTIMG."  WHERE (`assortmentcat` LIKE '$SortList%') ORDER BY `id_price` ASC  ";
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

			
	$Q_Check1	= "SELECT * FROM ".ASSORTMENTIMG." WHERE (`assortmentcat` LIKE '$SortList%') ORDER BY `id_price` ASC  ";
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
<script>
function deletelist() 
{ 
	var ok=window.confirm("Do you want to delete this details??");   
	if(ok==true)
	{
		return true;
	}
	else
	{
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
				<div class="h_title">View Product Image</div>
				 <?php
					  # Display the Result(Status) 
					  if($rflag == "success") 
					  { 
						  if($rType == "add")
							$rDisp	=	"Image Details Successfully Added";
						  elseif($rType == "deactive")
							$rDisp	=	"Image Details Successfully Actived";
						  elseif($rType == "active")
							$rDisp	=	"Image Details Successfully DeActived";
						  elseif($rType == "check")
							$rDisp	=	"Image Details Successfully turns to Popular";
						  elseif($rType == "uncheck")
							$rDisp	=	"Image Details Successfully cancel from Popular";
						  elseif($rType == "delete")
							$rDisp	=	"Image Details Deleted Successfully";
						  elseif($rType == "edit")
							$rDisp	=	"Image Details Edited Successfully";
						 
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
							<th scope="col" align="center">Product Category</th>
							<th scope="col" align="center">Image</th>
							<th scope="col" align="center">Show in Home Page</th>                            
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
							
							$id_price = $F_Check['id_price'];
							$showin_home = $F_Check['showin_home'];							
							$eventimg = $F_Check['eventimg'];
							$assortmentcat_id = $F_Check['assortmentcat'];							
							$status = $F_Check['status'];							
							
							if($status=="1"){  $sta="Active"; } else{ $sta="Deactive"; }
							
							$assortmentcat_r= "select * from ".PACKAGE." where `package_id`='$assortmentcat_id'";
							$assortmentcat_f = mysql_query($assortmentcat_r)or die(db_error());
							while($assortmentcat_v=mysql_fetch_array($assortmentcat_f))
							{ 
								$package_name=$assortmentcat_v['package_name'];

							
							
						?>
						<tr>
							<td class="align-center" align="center"><?php echo $r; ?></td>
							<td align="center"><?php echo $package_name; ?></td>
							<td align="center"><a href="javascript:void(0)" onclick="javascript:void window.open('popup/imgdetails.php?mid=<?php echo $eventimg;?>','1364619721014','width=1000,height=600,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');return false;" ><img src="../products/<?php echo $eventimg;?>" width="80" height="80" /></a></td>
							<td align="center"><?php if($showin_home=="1") { echo "Yes"; } else { echo "No"; } ; ?></td>                            
							<td align="center"><?php if($F_Check['status'] == "1") { ?><a style="color:#000000;text-decoration:none;" href="viewimage.php?task=view&amp;flag=active&amp;id=<?php echo $F_Check['id_price'];?>" ><?php echo $sta; ?></a> <?php } else { ?> <a style="color:#000000;text-decoration:none;" href="viewimage.php?task=view&amp;flag=deactive&amp;id=<?php echo $F_Check['id_price'];?>" ><?php echo $sta; ?></a> <?php } ?> </td>
							<td>
								<a href="image.php?task=edit&amp;mid=<?php echo $F_Check['id_price'];?>&amp;page=<?php echo $page;?>" class="table-icon edit" title="Edit"></a>
								<a href="#" class="" title="Archive">&nbsp;</a>								
								<a href="viewimage.php?task=view&amp;flag=delete&amp;id=<?php echo $F_Check['id_price'];?>&amp;page=<?php echo $page;?>" onClick="return deletelist()" class="table-icon delete" title="Delete"></a>
							</td>
						</tr>
						<?php } } } else {?> 
						<tr>
							<td colspan="5" align="center"><h2>Product Image List Not Found</h2></td>
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
