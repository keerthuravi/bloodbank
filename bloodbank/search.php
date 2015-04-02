<?php 
	//Include Database Connection
	include("include/dbconnect.php");
	//Include Constants
	include("include/constants.php");
	
	
$bloodgroup1=$_REQUEST['blood_group'];
$city1=$_REQUEST['city'];


	
	if(isset($_POST["btnSubmit"]))
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
		
	 	$insert_query="INSERT INTO ".DONERS." (`doners_name`,`doners_blood_groud`,`doners_gender`,`doners_dob`,`doners_mobile`,`doners_landline`,`doners_state`,`doners_city`,`doners_email`,`doners_address`,`doners_status`) 
VALUES('$doners_name','$doners_blood_groud','$doners_gender','$doners_dob','$doners_mobile','$doners_landline','$doners_state','$doners_city','$doners_email','$doners_address','$doners_status')";		


		$inder_ad_price=mysql_query($insert_query);
		$inser_id=mysql_insert_id();
		if($inser_id>0)
		{
			header("Location:donerregister.php?task=general&log=succ");
		}					
		
	}

?>
<!DOCTYPE html>
<!--
Template Name: Cortex
Author: <a href="http://www.os-templates.com/">OS Templates</a>
Author URI: http://www.os-templates.com/
Licence: Free to use under our free template licence terms
Licence URI: http://www.os-templates.com/template-terms
-->
<html>
<head>
<title>Blood Bank</title>
<meta charset="utf-8">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top">
<!-- ################################################################################################ --> 
<!-- ################################################################################################ --> 
<!-- ################################################################################################ -->
<div class="wrapper row1">
  <header id="header" class="clear"> 
    <!-- ################################################################################################ -->
    <div id="logo" class="fl_left">
      <h1><i class="icon-medkit"></i> <a href="index.php">Blood Bank</a></h1>
    </div>
    <!-- ################################################################################################ -->
    <nav id="mainav" class="fl_right">
      <ul class="clear">
        <li><a href="index.php">Home</a></li>
        <li><a href="bloodrequest.php">Blood Request</a>
        <li><a href="donerregister.php">Doner Register</a></li>
        <li class="active"><a href="search.php">Search Doner</a></li>    
        <li><a href="admin">Admin</a></li>
      </ul>
    </nav>
  </header>
</div>
<div class="wrapper row3">
  <main id="container" class="clear">
<form action="search.php" name="bloodrequest" id="bloodrequest" method="get">
<table width="688" cellspacing="0" cellpadding="0" border="0">
								  <tbody><tr>
											<td height="32"><strong>Search 
													Doners</strong></td>
									  </tr>
										<tr>
											<td background="../../imgs/bg_middle_inner.gif" align="center">
												<br><table width="257" cellspacing="0" cellpadding="0" border="0">
													<tbody><tr>
														<td height="51" background="../../imgs/search_bg_t.gif"></td>
													</tr>
													<tr>
														<td background="../../imgs/search_bg_m.gif">
															<table width="257" cellspacing="0" cellpadding="5" border="0">
																<tbody><tr>
																	<td>Blood Group</td>
																	<td>:
																	</td>
																	<td>
                                    <select id="blood_group" name="blood_group">
                                        <option value="Select">-----Select----</option>
                                         <?php
                                                $Q_Check	= "SELECT * FROM ".GROUP."  ORDER BY `group_id` ASC  ";
                                                $R_Check	= mysql_query($Q_Check) or die(mysql_error());
                                                
                                                while($fecth_while=mysql_fetch_array($R_Check))		
                                                {
                                                $group_ids=$fecth_while['group_id'];														
                                            ?>                                                                         
                                        <option value="<?php echo $fecth_while['group_id']; ?>" <?php if($bloodgroup1==$fecth_while['group_id']) { echo "selected"; } ?>   ><?php echo $fecth_while['group_name']; ?></option>
                                          <?php } ?>
                                    </select>
                                                                    </td>
																</tr>
																<tr>
																	<td>Enter City</td>
																	<td>:</td>
																	<td><input type="text" name="city" value="<?php echo $city1; ?>" id="city"></td>
																</tr>
																<tr>
																	<td>&nbsp;</td>
																	<td>&nbsp;</td>
																	<td><input type="submit" id="Search" value="Search" name="Search"></td>
																</tr>
															</tbody></table>
														</td>
													</tr>
													<tr>
														<td height="12" background="../../imgs/search_bg_b.gif"></td>
													</tr>
												</tbody></table>
											</td>
										</tr>
									
										<tr align="center">
										<td><b><span id="lblTracker">Search Results</span></b></td>
										</tr>
										<tr>
											<td align="center"></td>
										</tr>
                                        <?php if($bloodgroup1!="") { ?>
										<tr>
											<td>
												<!-- Add Code Here -->
												<table width="100%" cellspacing="1" cellpadding="1" border="0" align="center" id="Table1">
													<tbody><tr>
														<td>
                                                        <table cellspacing="1" cellpadding="5" style="border-color:#E0EDF4;border-width:0px;border-style:Inset;width:100%;">
														<tbody>
                                                      <tr align="center" style="color:White;background-color:#999999;">
														<td align="center" style="font-weight:bold;width:30%;">Name</td>
                                                        <td align="center" style="font-weight:bold;width:12%;">Available/ Unavailable</td>
                                                        <td align="center" style="font-weight:bold;width:18%;">Mobile No.</td>
                                                        <td align="center" style="font-weight:bold;width:15%;">Address</td>
												      </tr>
                                                      <tr style="background-color:#CCD6EB;">
                                                      <?php 
													  	$bloodgroup=$_REQUEST['blood_group'];
														$city=$_REQUEST['city'];

														$Q_Check12	= "SELECT * FROM ".DONERS." WHERE `doners_blood_groud`='$bloodgroup' and `doners_city`='$city'";
														$R_Check12	= mysql_query($Q_Check12);
														while($F_Check2 = mysql_fetch_array($R_Check12)) 
														{ 
															$doners_name = $F_Check2['doners_name'];
															$doners_blood_groud = $F_Check2['doners_blood_groud'];
															$doners_status = $F_Check2['doners_status'];							
															$doners_mobile = $F_Check2['doners_mobile'];	
															$doners_address = $F_Check2['doners_address'];																
																					
															if($doners_status=="1"){  $sta="Available"; } else{ $sta="Unavailable"; }
													  ?>
												  	   <td style="width:4%;" align="center"><span><?php echo $doners_name; ?></span></td>
                                                       <td style="width:20%;" align="center"><span style="display:inline-block;color:Green;font-weight:bold;width:100px;"><?php echo $sta; ?></span></td>
                                                       <td style="width:18%;" align="center"><span><?php echo $doners_mobile; ?></span></td>
                                                       <td style="width:60%;" align="center"><span><?php echo $doners_address; ?></span></td>
                                                       <?php } ?>
													</tr>
												</tbody></table>
												<!-- End Code Here --></td>
										</tr>
										<tr>
											<td height="9" background="../../imgs/bg_bottom_inner.gif"></td>
										</tr>
									</tbody></table>
                                    </td>
                                    </tr>
                                    <?php } else { ?>
   										<tr>
											<td align="center">Search result not found</td>
										</tr>
                                    <?php } ?>
                                    </tbody>
                                    </table>
                                    
							</form>
    <!-- ########################################################################################## --> 
    <!-- / container body -->
    <div class="clear"></div>
  </main>
</div>
<div class="wrapper row5">
  <div id="copyright" class="clear"> 
    <!-- ################################################################################################ -->
 <p class="fl_left">Copyright &copy; 2015 - All Rights Reserved - Blood Bank</p>    <!-- ################################################################################################ --> 
  </div>
</div>
</body>
</html>