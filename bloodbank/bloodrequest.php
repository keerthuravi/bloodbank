<?php 
	//Include Database Connection
	include("include/dbconnect.php");
	//Include Constants
	include("include/constants.php");
	
	if(isset($_POST["btnSubmit"]))
{
	
		$request_name= $_POST["request_name"];	
		$request_blood_groud= $_POST["request_blood_groud"];			
		$request_age= $_POST["request_age"];	
		$request_needed= $_POST["request_needed"];			
		$request_units= $_POST["request_units"];	
		$request_mobile= $_POST["request_mobile"];			
		$request_landline= $_POST["request_landline"];	
		$hospital_name= $_POST["hospital_name"];			
		$location= $_POST["location"];	
		$purpose= $_POST["purpose"];	
		$address= $_POST["address"];			
		$request_status= $_POST["request_status"];	
		
echo	 	$insert_query="INSERT INTO ".REQUEST." (`request_name`,`request_blood_groud`,`request_age`,`request_needed`,`request_units`,`request_mobile`,`request_landline`,`hospital_name`,`location`,`purpose`,`address`,`request_status`) 
VALUES('$request_name','$request_blood_groud','$request_age','$request_needed','$request_units','$request_mobile','$request_landline','$hospital_name','$location','$purpose','$address','$request_status')";		
		$inder_ad_price=mysql_query($insert_query);
		$inser_id=mysql_insert_id();
		if($inser_id>0)
		{
			header("Location:bloodrequest.php?task=general&log=succ&reqt='$inser_id'");
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
        <li class="active"><a href="bloodrequest.php">Blood Request</a>
        <li><a href="donerregister.php">Doner Register</a></li>
        <li><a href="search.php">Search Doner</a></li>      
	<li><a href="admin">Admin</a></li>          
      </ul>
    </nav>
  </header>
</div>
<div class="wrapper row3">
  <main id="container" class="clear">
<form action="bloodrequest.php" name="bloodrequest" id="bloodrequest" method="post">
<table width="1000" cellspacing="0" cellpadding="0" border="0">
                                    <tbody>
                                    <tr>
                                        <td height="32">
                                           <strong> Blood request: Form</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td >
                                            <!-- Add Code Here -->
                                            <table width="688" cellspacing="0" cellpadding="5">
                                                <tbody>
                                                <?php if($_REQUEST['log']=="succ"){  ?>
                                                	<tr>
                                                    	<td style="color:#FF0000" align="center">
                                                       	 <p><strong>Your Request Submitted Successfully!!</strong></p>
                                                       	 <p>Your Request Id <strong>"<?php echo $_REQUEST['reqt']; ?>"</strong></p>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                <tr>
                                                    <td valign="top">
                                                        <p>
                                                            Dear,<br>
                                                            Please fill the following information to post your blood request. We will inform
                                                            our donors and we hope the needy people recover soon.</p>
                                                        <p align="center" class="style4">
                                                            POST BLOOD REQUEST FORM</p>
                                                        <table width="90%" cellspacing="1" cellpadding="3" align="center">
                                                            <tbody><!--<tr>
                                                                <td align="center" colspan="3">
                                                                    If your are already posted your blood request and want to update your blood request
                                                                    then please enter request code and press submit
                                                                </td>
                                                            </tr>-->
                                                            <!--<tr>
                                                                <td align="center" colspan="3">
                                                                    <table width="100%" cellspacing="0" cellpadding="0" border="0" id="Table1">
                                                                        <tbody><tr>
                                                                            <td style="width: 400px">
                                                                                <strong>Enter Your Blood Request Code </strong>
                                                                            </td>
                                                                            <td align="center" style="width: 11px">
                                                                                <strong>:</strong>
                                                                            </td>
                                                                            <td>
                                                                                <input type="text"  class="textarea" id="txtRequestCode" name="txtRequestCode">&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" style="width:75px;" class="textarea" id="btnRequestCodeSubmit" onclick="javascript:return chkRequestCodeValidation('txtRequestCode');" value="Submit" name="btnRequestCodeSubmit">
                                                                            </td>
                                                                        </tr>
                                                                    </tbody></table>
                                                                    <hr width="100%" size="1">
                                                                    <input type="hidden" value="3/15/2015" id="hdnCurrentDate" name="hdnCurrentDate">
                                                                </td>
                                                            </tr>-->
                                                            <tr>
                                                                <td align="center" colspan="3">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="center" colspan="3">
                                                                    
                                                                </td>
                                                            </tr>
                                                            <tr bgcolor="#ffffff">
                                                                <td>
                                                                    <strong>Patient Full Name</strong>
                                                                </td>
                                                                <td height="30">
                                                                    <strong>:</strong>
                                                                </td>
                                                                <td>
                                                                    <input type="text"  class="textarea" id="request_name" maxlength="100" name="request_name">
                                                                </td>
                                                            </tr>
                                                            <tr bgcolor="#ffffff">
                                                                <td>
                                                                    <strong>Patient Blood Group</strong>
                                                                </td>
                                                                <td height="30">
                                                                    <strong>:</strong>
                                                                </td>
                                                                <td>
                                                                    <select id="request_blood_groud" name="request_blood_groud">
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
                                                            <tr bgcolor="#ffffff">
                                                                <td>
                                                                    <strong>Patient Age</strong>
                                                                </td>
                                                                <td height="30">
                                                                    <strong>:</strong>
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="textarea" id="request_age" maxlength="3" name="request_age">
                                                                </td>
                                                            </tr>
                                                            <tr bgcolor="#ffffff">
                                                                <td>
                                                                    <strong>When you need blood?<br>
                                                                        <font size="1" color="#ff0000">(MM/DD/YYYY)</font></strong>
                                                                </td>
                                                                <td height="30">
                                                                    <strong>:</strong>
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="textarea" id="request_needed" maxlength="10" name="request_needed">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <strong>How many units you need&nbsp;?</strong>
                                                                </td>
                                                                <td height="30">
                                                                    <strong>:</strong>
                                                                </td>
                                                                <td>
                                                                    <input type="text"  class="textarea" id="request_units" maxlength="2" name="request_units">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <strong>Mobile Number<br>
                                                                    </strong><font size="1" color="blue">(Please enter phone number without STD code)</font>
                                                                </td>
                                                                <td height="30">
                                                                    <strong>:</strong>
                                                                </td>
                                                                <td>
                                                                    <input type="text"  class="textarea" id="request_mobile" maxlength="10" name="request_mobile">
                                                                </td>
                                                            </tr>
                                                            <tr bgcolor="#ffffff">
                                                                <td>
                                                                    <strong>LandLine Number<br>
                                                                    </strong><font size="1" color="blue">(Eg: 08632351725)</font>
                                                                </td>
                                                                <td height="30">
                                                                    <strong>:</strong>
                                                                </td>
                                                                <td>
                                                                    <input type="text"  class="textarea" id="request_landline" maxlength="12" name="request_landline">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <strong>Hospital Name</strong>
                                                                </td>
                                                                <td height="30">
                                                                    <strong>:</strong>
                                                                </td>
                                                                <td>
                                                                    <input type="text"  class="textarea" id="hospital_name" maxlength="100" name="hospital_name">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <strong>Location</strong>
                                                                </td>
                                                                <td height="30">
                                                                    <strong>:</strong>
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="textarea" id="location" maxlength="100" name="location">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <strong>Patient Address</strong>
                                                                </td>
                                                                <td height="30">
                                                                    <strong>:</strong>
                                                                </td>
                                                                <td>
                                  							<textarea style="height:64px;width:320px;"  class="textarea" id="address" cols="40" rows="2" name="address">
                                                            </textarea>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <strong>Purpose</strong>
                                                                </td>
                                                                <td height="30">
                                                                    <strong>:</strong>
                                                                </td>
                                                                <td>
                                                                   <textarea style="height:64px;width:320px;"  class="textarea" id="purpose" cols="40" rows="2" name="purpose">
                                                                    </textarea>
                                                                </td>
                                                            </tr>
                                                            <tr bgcolor="#ffffff">
                                                                <td height="30" colspan="3">
                                                                    <div align="center">
                                                                        &nbsp;
													<input type="submit" id="btnSubmit"  value="Submit" name="btnSubmit">
						                                            </div>
                                                                </td>
                                                            </tr>
                                                        </tbody></table>
                                                        <p>&nbsp;
                                                            </p>
                                                    </td>
                                                </tr>
                                            </tbody></table>
                                            <!-- End Code Here -->
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
 <p class="fl_left">Copyright &copy; 2015 - All Rights Reserved - Blood Bank</p>        <!-- ################################################################################################ --> 
  </div>
</div>
</body>
</html>