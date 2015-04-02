<?php



// About Us//
$cqry1 = "select * from ".CMS." where `page_name`='aboutus'";
$cres1 = mysql_query($cqry1)or die(db_error());
$carr1 = mysql_fetch_array($cres1);
$page1 =  stripcslashes($carr1['cms_dec']);

// How we works //
$cqry2 = "select * from ".CMS." where `page_name`='howweworks'";
$cres2 = mysql_query($cqry2)or die(db_error());
$carr2 = mysql_fetch_array($cres2);
$page2 = stripcslashes($carr2['cms_dec']);

// Reality //
$cqry3 = "select * from ".CMS." where `page_name`='reality'";
$cres3 = mysql_query($cqry3)or die(db_error());
$carr3 = mysql_fetch_array($cres3);
$page3 = stripcslashes($carr3['cms_dec']);

// Evolution //
$cqry4 = "select * from ".CMS." where `page_name`='evolution'";
$cres4 = mysql_query($cqry4)or die(db_error());
$carr4 = mysql_fetch_array($cres4);
$page4 = stripcslashes($carr4['cms_dec']);

// Services //
$cqry5 = "select * from ".CMS." where `page_name`='services'";
$cres5 = mysql_query($cqry5)or die(db_error());
$carr5 = mysql_fetch_array($cres5);
$page5 = stripcslashes($carr5['cms_dec']);

// Contact us //
$cqry6 = "select * from ".CMS." where `page_name`='contact'";
$cres6 = mysql_query($cqry6)or die(db_error());
$carr6 = mysql_fetch_array($cres6);
$page6 = stripcslashes($carr6['cms_dec']);

// Google Map //
$cqry7 = "select * from ".ADMINPROFILE."";
$cres7 = mysql_query($cqry7)or die(db_error());
$carr7 = mysql_fetch_array($cres7);
$google_map= $carr7['google_map'];
$fb_url= $carr7['fb_url'];
$youtube_url= $carr7['youtube_url'];


?>