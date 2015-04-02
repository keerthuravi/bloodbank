<?php

	//Include Database Connection
	include("../include/dbconnect.php");
	//Include Constants
	include("../include/constants.php");

		if(isset($_POST["login"]))
		{		
			$strUsername = $_POST['txtUsername'];
			$strPassword = base64_encode($_POST['txtPassword']);
			$objResult = mysql_query("SELECT * from ".ADMINPROFILE." WHERE `varUserName` = '$strUsername' and `varPassword`='$strPassword'") or die ("Error:".mysql_error());
			
			
			if (mysql_num_rows($objResult) != 0) 
			{
				
				$objUserdetails = mysql_fetch_array($objResult);
				
				$intUserId 		= $objUserdetails['intAdminId'];
				$strUserName 	= $objUserdetails['varUserName'];
				//$Session_LevelId=	$objUserdetails['intLevelId'];
				// Set Admin Session				
				session_start();
				$_SESSION["Session_UserId"] 	= $intUserId;
				$_SESSION["Session_Username"] 	= $strUserName;
				//$HTTP_SESSION_VARS["Session_LevelId"] = $Session_LevelId;
			
				header("Location:dashboard.php?task=general");
			
					
			}
			
			else
			{
				
				header("Location:index.php?log=error");
			}
		
	
		}
		$Query = mysql_query("SELECT * FROM ".ADMINPROFILE."");
$hometitle = $Fetch['varHomePage'];
//echo $hometitle;
//echo base64_decode("MzZtZXJsb3Q=");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pl" xml:lang="pl">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="author" content="Paweł 'kilab' Balicki - kilab.pl" />
<title><?php echo  $varAdminPage; ?></title>
<link rel="stylesheet" type="text/css" href="css/login.css" media="screen" />
<script language="javascript" type="text/javascript" src="script/adminscript.js"></script>
</head>
<body>
<div class="wrap">
	<div id="content">
		<div id="main">
			<div class="full_w">
				<form action="index.php"   method="post" name="Login" id="Login" onSubmit="return login_validation();">
					 <?php if($_GET['log'] == "error"){ 
	 print "<label for='login'>Invalid Login</label>";
 } ?>
					<label for="login">Username:</label>
					<input id="txtUsername" name="txtUsername" class="text" />
					<label for="pass">Password:</label>
					<input id="txtPassword" type="password" name="txtPassword" class="text" />
					<div class="sep"></div>
					 <input name="login" type="submit" class="box" id="login" value="Log In" /> <!--<a class="button" href="">Forgotten password?</a>-->
				</form>
			</div>
				<?php include("footer.php") ?>
		</div>
	</div>
</div>

</body>
</html>
