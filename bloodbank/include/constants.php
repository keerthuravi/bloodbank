<?php
include("dbconnect.php");
session_start();
define("ADMINPROFILE","tbl_adminprofile");
define("GROUP","tbl_blood_group");
define("DONERS","tbl_doners");
define("REQUEST","tbl_blood_request");

$selecttitle="select * from ".ADMINPROFILE." ";
$executetitle=mysql_query($selecttitle) or die("Error:".mysql_error());
$fetchtitle=mysql_fetch_array($executetitle);
$varAdminPage=$fetchtitle['varAdminPage'];

$homepage=$fetchtitle['varHomePage'];
$adminconper=$fetchtitle['varContactPerson'];
$FromEmail=$fetchtitle['varEmail'];
 
if($_SESSION['orderstatus_frompaypal']!= "")
{
	$_SESSION['sessionid_cart']="";
	$_SESSION['orderstatus_frompaypal']="";
}
if($_SESSION['sessionid_cart'] == "")
{
	 $_SESSION['sessionid_cart']=mt_rand(1,1000000000000000000);
	  $_SESSION['sessionid_cart'];
}
 $sessionid_cart = $_SESSION["sessionid_cart"];

 ?>
 
