<?php 
session_start();
$Session_UserId = $_SESSION["Session_UserId"];
$Session_LevelId = $_SESSION["Session_LevelId"];
$Session_Username =	$_SESSION["Session_Username"];

//$Session_LevelId	=	1;
if((empty($Session_UserId)) || (empty($Session_Username)))
	header("Location:../admin/index.php");
?>
