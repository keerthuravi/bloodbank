<?php 

	
	//Include Database Connection
	include("../../include/dbconnect.php");
	//Include Constants
	include("../../include/constants.php");
	//Check Admin session
	include("../../include/session.php");
	
	$imgdetails=$_REQUEST['mid'];
	
	$Q_Check1	= "SELECT * FROM ".REG." WHERE `Regid`='$pop_id'";
	$R_Check1	= mysql_query($Q_Check1);
    $R_numrows  = mysql_num_rows($R_Check1); 
	//$F_Check = mysql_fetch_array($R_Check1);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pl" xml:lang="pl">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="author" content="Paweł 'kilab' Balicki - kilab.pl" />
<title><?php echo $package_dec1; ?></title>
</head>
<body>
<table style="background-color:#CCCCCC;" cellpadding="2" cellspacing="2" >
<tr>
	<td>
    	<img src="../../events/<?php echo $imgdetails; ?> " />
    </td>
</tr>
</table>
</body>
</html>