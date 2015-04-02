<?php 
	//Include Database Connection
	include("include/dbconnect.php");
	//Include Constants
	include("include/constants.php");
	
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
        <li class="active"><a href="donerregister.php">Doner Register</a></li>
        <li><a href="search.php">Search Doner</a></li> 
	<li><a href="admin">Admin</a></li>               
      </ul>
    </nav>
  </header>
</div>
<div class="wrapper row3">
  <main id="container" class="clear">
<form action="donerregister.php" name="bloodrequest" id="bloodrequest" method="post">
<table width="1000" cellspacing="0" cellpadding="0" border="0">
                                    <tbody><tr>
                                        <td height="32">
                                          <strong>Blood Donors: Register</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <!-- Add Code Here -->
                                            <table width="1000" cellspacing="0" cellpadding="5">
                                                <tbody> <?php if($_REQUEST['log']=="succ"){  ?>
                                                	<tr>
                                                    	<td style="color:#FF0000" align="center">
                                                       	 <p><strong>You Registered Successfully!!</strong></p>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                <tr>
                                                    <td valign="top">Please fill the following information to register as voluntary blood donor. Also please update your profile/information if in case you relocate in future.<p align="center" class="heading_white">
                                                            <strong>REGISTRATION FORM</strong></p>
                                                        <table width="70%" cellspacing="1" cellpadding="3" align="center">
                                                            <tbody><tr>
                                                                <td align="center" colspan="3">
                                                                    
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="500" style="width: 300px">
                                                                    <strong>Full Name</strong>                                                                </td>
                                                                <td width="100" height="30">
                                                                    <strong>:</strong>                                                                </td>
                                                                <td width="400" style="width: 400px">
                                                                  <input type="text" class="textarea" id="doners_name" maxlength="100" name="doners_name">
                                                              </td>
                                                            </tr>
                                                            <tr bgcolor="#ffffff">
                                                                <td style="width: 107px">
                                                                    <strong>Blood Group</strong>
                                                                </td>
                                                                <td height="30">
                                                                    <strong>:</strong>
                                                                </td>
                                                                <td style="width: 327px">
                                                                    <select id="doners_blood_groud" name="doners_blood_groud">
                                                                        <option value="Select">-----Select----</option>
																		 <?php
                                                                                $Q_Check	= "SELECT * FROM ".GROUP."  ORDER BY `group_id` ASC  ";
                                                                                $R_Check	= mysql_query($Q_Check) or die(mysql_error());
                                                                                
                                                                                while($fecth_while=mysql_fetch_array($R_Check))		
                                                                                {
                                                                                $group_ids=$fecth_while['group_id'];														
                                                                            ?>                                                                         
                                                                        <option value="<?php echo $fecth_while['group_id']; ?>"><?php echo $fecth_while['group_name']; ?></option>
                                                                          <?php } ?>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width: 107px">
                                                                    <strong>Gender</strong>
                                                                </td>
                                                                <td height="30">
                                                                    <strong>:</strong>
                                                                </td>
                                                                <td style="width: 327px">
                                                                     <select name="doners_gender" id="doners_gender" class="" style="width:30%;">
			                <option value="select">Select</option>
							<option value="Male" <?php $doners_genders=$ans['doners_gender'];  if($doners_genders =="Male") echo "selected"; ?>>Male</option>
							<option value="Female" <?php  if($doners_genders=="Female") echo "selected"; ?>>Female</option>
						</select>
                                                                </td>
                                                            </tr>
                                                            <tr bgcolor="#ffffff">
                                                                <td style="width: 107px">
                                                                    <strong>Date Of Birth<br>
                                                                        <font size="1" color="#ff0000">(MM/DD/YYYY)</font> </strong>
                                                                </td>
                                                                <td height="30">
                                                                    <strong>:</strong>
                                                                </td>
                                                                <td style="width: 327px">
                                                                    <input type="text" class="textarea" id="doners_dob" maxlength="10" name="doners_dob">
                                                                    
                                                                </td>
                                                            </tr>
                                                            <tr bgcolor="#e5e5e5">
                                                                <td height="30" colspan="3">
                                                                    <strong>Contact Information</strong>
                                                                </td>
                                                            </tr>
                                                            <tr bgcolor="#ffffff">
                                                                <td style="width: 107px">
                                                                    <strong>Mobile Number<br>
                                                                        <font size="1" color="blue">(Don't add 0 before your number)</font>
                                                                </strong></td>
                                                                <td height="30">
                                                                    <strong>:</strong>
                                                                </td>
                                                                <td style="width: 327px">
                                                                    <input type="text"  class="textarea" id="doners_mobile" maxlength="10" name="doners_mobile">
                                                                </td>
                                                            </tr>
                                                            <tr bgcolor="#ffffff">
                                                                <td style="width: 107px">
                                                                    <strong>Land Line Number<br>
                                                                    </strong>(Eg: 0863351725)
                                                                </td>
                                                                <td height="30">
                                                                    <strong>:</strong>
                                                                </td>
                                                                <td style="width: 327px">
                                                                    <input type="text" class="textarea" id="doners_landline" maxlength="12" name="doners_landline">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width: 107px">
                                                                    <strong>State</strong>
                                                                </td>
                                                                <td height="30">
                                                                    <strong>:</strong>
                                                                </td>
                                                                <td style="width: 327px">
                                                                    <input  type="text" id="doners_state" name="doners_state" >
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width: 107px">
                                                                    <strong>City</strong>
                                                                </td>
                                                                <td height="30">
                                                                    <strong>:</strong>
                                                                </td>
                                                                <td style="width: 327px">
                                                                    <div id="dv">
																  <input  type="text" id="doners_city" name="doners_city" >
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr bgcolor="#ffffff">
                                                                <td style="width: 107px">
                                                                    <strong>E-Mail ID</strong>
                                                                </td>
                                                                <td height="30">
                                                                    <strong>:</strong>
                                                                </td>
                                                                <td style="width: 327px">
                                                                    <input type="text" class="textarea" id="doners_email" maxlength="100" name="doners_email">
                                                                </td>
                                                            </tr>
                                                            <tr bgcolor="#ffffff">
                                                                <td style="width: 107px">
                                                                    <strong>Permanent Address</strong>
                                                                </td>
                                                                <td height="30">
                                                                    <strong>:</strong>
                                                                </td>
                                                                <td style="width: 327px">
                                                                 <textarea style="height:64px;width:320px;"  class="textarea" id="doners_address" cols="40" rows="2" name="doners_address"> </textarea>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width: 107px">
                                                                    <strong>Please confirm your availability to donate blood</strong>
                                                                </td>
                                                                <td height="30">
                                                                    <strong>:</strong>
                                                                </td>
                                                                <td style="width: 327px">
                                                                    <select id="doners_status" name="doners_status">
	<option value="1" selected="selected">Available</option>
	<option value="0">UnAvailable</option>

</select>
                                                                </td>
                                                            </tr>
                                                         
                                                            <tr bgcolor="#ffffff">
                                                                <td height="30" colspan="3">
                                                                    <div align="center">
                                                                        &nbsp;
                                                                      
                                                                       <input type="submit" class="textarea" id="btnSubmit" value="Submit" name="btnSubmit">

                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody></table>
                                                        <br>
                                                        
                                                  </td>
                                                </tr>
                                            </tbody></table>
                                            <!-- End Code Here -->
                                        </td>
                                    </tr>
                                    <tr>
                                        <td height="9" background="../../imgs/bg_bottom_inner.gif">
                                        </td>
                                    </tr>
                                </tbody></table>
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