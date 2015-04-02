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
	
   $testimonial="home";

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
		$Update	=	"UPDATE ".TESTIMONIALS." SET `status`='0' WHERE `testimonial_id`='$id'";
		$Result	=	mysql_query($Update);
		$rflag	=	"success";
		$rType	=	"active";
	}
	elseif($flag == "deactive")
	{
		$Update	=	"UPDATE ".TESTIMONIALS." SET `status`='1' WHERE `testimonial_id`='$id'";
		$Result	=	mysql_query($Update);
		$rflag	=	"success";
		$rType	=	"deactive";
	}
	elseif($flag == "delete")
	{
		$Delete	=	"DELETE FROM ".TESTIMONIALS." WHERE `testimonial_id`='$id'";
		$Result	=	mysql_query($Delete);
		$rflag	=	"success";
		$rType	=	"delete";
	}

	$Q_Check	= "SELECT * FROM ".TESTIMONIALS."  WHERE (`testimonial_title` LIKE '$SortList%') ORDER BY `testimonial_id` ASC  ";
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

			
	$Q_Check1	= "SELECT * FROM ".TESTIMONIALS." WHERE (`testimonial_title` LIKE '$SortList%') ORDER BY `testimonial_id` ASC  ";
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
				<div class="h_title">View Testimonial</div>
				 <?php
					  # Display the Result(Status) 
					  if($rflag == "success") 
					  { 
						  if($rType == "add")
							$rDisp	=	"Testimonial Details Successfully Added";
						  elseif($rType == "deactive")
							$rDisp	=	"Testimonial Details Successfully Actived";
						  elseif($rType == "active")
							$rDisp	=	"Testimonial Details Successfully DeActived";
						  elseif($rType == "check")
							$rDisp	=	"Testimonial Details Successfully turns to Popular";
						  elseif($rType == "uncheck")
							$rDisp	=	"Testimonial Details Successfully cancel from Popular";
						  elseif($rType == "delete")
							$rDisp	=	"Testimonial Details Deleted Successfully";
						  elseif($rType == "edit")
							$rDisp	=	"Testimonial Details Edited Successfully";
						 
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
							<th width="41" align="center" scope="col">SL</th>
						  <th width="139" align="center" scope="col">Title</th>
							<th width="196" align="center" scope="col">Testimonial Dec</th>                            
						  <th width="104" align="center" scope="col">Image</th>
						  <th width="96" align="center" scope="col">Status</th>
						  <th width="82" align="center" style="width: 65px;" scope="col">Modify</th>
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
							
							$testimonial_id = $F_Check['testimonial_id'];
							$testimonial_img = $F_Check['testimonial_img'];
							$testimonial_title = $F_Check['testimonial_title'];							
							$testimonial_dec = stripcslashes($F_Check['testimonial_dec']);														
							$testimonial_status = $F_Check['testimonial_status'];							
							
							if($testimonial_status=="1"){  $sta="Active"; } else{ $sta="Deactive"; }
						?>
						<tr>
							<td class="align-center" align="center"><?php echo $r; ?></td>
							<td align="center"><?php echo $testimonial_title; ?></td>
							<td align="center"><?php echo substr($testimonial_dec,0,100); ?></td>                            
							<td align="center"><a href="javascript:void(0)"><img src="../testimonialimg/<?php echo $testimonial_img;?>" width="60" /></a></td>
							<td align="center"><?php if($F_Check['testimonial_status'] == "1") { ?><a style="color:#000000;text-decoration:none;" href="viewtestimonial.php?task=view&amp;flag=active&amp;id=<?php echo $F_Check['testimonial_id'];?>" ><?php echo $sta; ?></a> <?php } else { ?> <a style="color:#000000;text-decoration:none;" href="viewtestimonial.php?task=view&amp;flag=deactive&amp;id=<?php echo $F_Check['testimonial_id'];?>" ><?php echo $sta; ?></a> <?php } ?> </td>
							<td>
								<a href="addtestimonial.php?task=edit&amp;mid=<?php echo $F_Check['testimonial_id'];?>&amp;page=<?php echo $page;?>" class="table-icon edit" title="Edit"></a>
								<!--<a href="#" class="table-icon view" title="View">View</a>-->
                                <a title="View" class="table-icon archive" onclick="javascript:void window.open('popup.php?mid=<?php echo $F_Check['testimonial_id'];?>','1364619721014','width=680,height=500`,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');return false;" href="javascript:void(0)"></a>								
								<a href="viewtestimonial.php?task=view&amp;flag=delete&amp;id=<?php echo $F_Check['testimonial_id'];?>&amp;page=<?php echo $page;?>" onClick="return deletelist()" class="table-icon delete" title="Delete"></a>
							</td>
						</tr>
						<?php }  } else {?> 
						<tr>
							<td colspan="6" align="center"><h2>Testimonial List Not Found</h2></td>
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
