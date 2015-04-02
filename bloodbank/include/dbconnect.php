<?php 
ob_start();
error_reporting(0);



//Local server
$host_name = "localhost";
$host_user = "root";
$host_pass = "";
$host_db ="bloodbank";



$connect=mysql_connect($host_name,$host_user,$host_pass) or die("Could Not Connect to Data Base".mysql_error());
$db=mysql_select_db($host_db)or die("Could Not Select Data Base".mysql_error());

$Query = mysql_query("SELECT * FROM ".ADMINPROFILE."");

$Fetch = mysql_fetch_array($Query);

$admintitle=$Fetch['varAdminPage'];

$hometitle = $Fetch['varHomePage'];

$AdminEmail = $Fetch['varEmail'];

$AdminName = $Fetch['varContactPerson'];

$advertisingpage = $Fetch['advertising'];		

?>


