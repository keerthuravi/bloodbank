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

	$request_id	= $_REQUEST['mid'];

		# GET LIMIT VALUE
	$Query_Limit	=	"SELECT * FROM ".ADMINPROFILE."";
	$Result_Limit	=	mysql_query($Query_Limit);
	$Fetch_Limit	=	mysql_fetch_array($Result_Limit);
	
    $flag=$_REQUEST['flag'];
    $request_id=$_REQUEST['id'];
  	
	#For Display the Result
	$rflag	=	$_GET['rflag'];	
	$rType	=	$_GET['rtype'];	
	

	if($flag == "delete")
	{
		$Delete	=	"DELETE FROM ".REQUEST." WHERE `request_id`='$request_id'";
		$Result	=	mysql_query($Delete);
		$rflag	=	"success";
		$rType	=	"delete";
	}

			
	$Q_Check1	= "SELECT * FROM ".REQUEST."  ORDER BY `request_id` ASC  ";
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
	var ok=window.confirm("Do you want to delete this details?");   
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
				<div class="h_title">View Blood Request</div>
				 <?php
					  # Display the Result(Status) 
					  if($rflag == "success") 
					  { 
						  if($rType == "add")
							$rDisp	=	"Blood Request Details Successfully Added";
						  elseif($rType == "deactive")
							$rDisp	=	"Blood Request Details Successfully Actived";
						  elseif($rType == "active")
							$rDisp	=	"Blood Request Details Successfully DeActived";
						  elseif($rType == "check")
							$rDisp	=	"Blood Request Details Successfully turns to Popular";
						  elseif($rType == "uncheck")
							$rDisp	=	"Blood Request Details Successfully cancel from Popular";
						  elseif($rType == "delete")
							$rDisp	=	"Blood Request Details Deleted Successfully";
						  elseif($rType == "update")
							$rDisp	=	"Blood Request Details updated Successfully";
						 
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
                            <th width="20" align="center" scope="col">SL</th>
                            <th width="139" align="center" scope="col">Patient Name</th>
                            <th width="50" align="center" scope="col">Group</th>                            
                            <th width="120" align="center" scope="col">When needed?</th>                            
                            <th width="120" align="center" scope="col">No of Units</th>                            
                            <th width="96" align="center" scope="col"> Location </th>
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
							
							$request_name = $F_Check['request_name'];
							$request_blood_groud = $F_Check['request_blood_groud'];
							$request_needed = $F_Check['request_needed'];							
							$request_units = $F_Check['request_units'];														
							$location = $F_Check['location'];							
							if($doners_status=="1"){  $sta="Active"; } else{ $sta="Deactive"; }
							
							$Q_Check123	= "SELECT * FROM ".GROUP." WHERE `group_id`='$request_blood_groud'";
							$R_Check123	= mysql_query($Q_Check123);
							$F_Check123 = mysql_fetch_array($R_Check123);
							$blood_group= $F_Check123["group_name"];
							
						?>
						<tr>
							<td class="align-center" align="center"><?php echo $r; ?></td>
							<td align="center"><?php echo $request_name; ?></td>
							<td align="center"><?php echo $blood_group; ?></td>                            
							<td align="center"><?php echo $request_needed;  ?></td>   
							<td align="center"><?php echo $request_units; ?></td>   
							<td align="center"><?php echo $location; ?></td>   
							<td>
						<a href="addbloodrequest.php?task=edit&amp;mid=<?php echo $F_Check['request_id'];?>" class="table-icon edit" title="Edit"></a>

                                <a title="View" class="table-icon archive" onclick="javascript:void window.open('viewrequestdetails.php?mid=<?php echo $F_Check['request_id'];?>','1364619721014','width=680,height=500`,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');return false;" href="javascript:void(0)"></a>								
								<a href="viewbloodrequest.php?task=view&amp;flag=delete&amp;id=<?php echo $F_Check['request_id'];?>" onClick="return deletelist()" class="table-icon delete" title="Delete"></a>
							</td>
						</tr>
						<?php }  } else {?> 
						<tr>
							<td colspan="6" align="center"><h2>Doners List Not Found</h2></td>
						</tr>
						<?php } ?>
					</tbody>
					
				</table>
				<div class="sep"></div>		
			
			</div>
		</div>
		<div class="clear"></div>
	</div>

		<?php include("footer.php") ?>
</div>

</body>
</html>
