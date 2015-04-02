<?php
include("dbconnect.php");
session_start();
define("ADMINPROFILE","tbl_ads_adminprofile");

define("ASSORTMENTIMG","tbl_ads_assortmentimg");
define("PACKAGE","tbl_ads_packages");
define("VIPORDER","tbl_ads_viporder");
define("REDORDER","tbl_ads_redorder");
define("COUNTRY","tbl_ads_country");
define("BANNERORDER","tbl_ads_bannerorder");
define("FREEORDER","tbl_ads_freeorder");
define("CMS","tbl_ads_cms");
define("CONTACTUS","tbl_ads_contactus");
define("REGT","tbl_ads_registration");
define("CITY","tbl_ads_city");
define("ORDERS","tbl_ads_order");





define("ADDCATEGORY","tbl_ads_addcategory");
define("VIEW","tbl_ads_viewcomment");
define("REG","tbl_ads_registration");
//define("NEWSLETTER","tbl_chinatech_sendnewsletter");
define("SUBSCRIBER","tbl_ads_subscriber"); 
//define("NEWS","tbl_chinatech_news");
//define("REPORTS","tbl_chinatech_reports");
//define("GALLERY","tbl_chinatech_gallery");


define("FILE","../../fileimages/");
define("FRONT_PATH","fileimages/");

define("FRONTLOGO","../../frontlogo/");
define("LOG_FRONT","frontlogo/");
define("HOMEIMAGETOPENLARGEPATH","../../homeimage/");
define("HOMEIMAGETOPENLARGEPATH_FRONT","homeimage/");

$selecttitle="select * from ".ADMINPROFILE." ";
$executetitle=mysql_query($selecttitle) or die("Error:".mysql_error());
$fetchtitle=mysql_fetch_array($executetitle);
 $varAdminPage=$fetchtitle['varAdminPage'];

 $homepage=$fetchtitle['varHomePage'];
 $adminconper=$fetchtitle['varContactPerson'];
 $FromEmail=$fetchtitle['varEmail'];
 
 

//$selecttitlecms="select * from ".CMS." ";
//$executetitlecms=mysql_query($selecttitlecms) or die("Error:".mysql_error());
//$fetchtitlecms=mysql_fetch_array($executetitlecms);

$ratingarray = array('5'=>"Excellent", '4'=>"Very Good",'3'=>"Good", '2'=>"Fair", '1'=>"Poor");

$adexoriytime = array('1'=>"1 Month", '2'=>"2 Months",'3'=>"3 Months");

 $statearray = array('Choose'=>"Choose",'AK'=>'Alaska','AL'=>'Alabama','AR'=>'Arkansas','AZ'=>'Arizona','CA'=>'California','CO'=>'Colorado','CT'=>'Connecticut','DC'=>'District_of_Columbia','DE'=>'Delaware','FL'=>'Florida','GA'=>'Georgia','HI'=>'Hawaii','IA'=>'Iowa','ID'=>'Idaho','IL'=>'Illinois','IN'=>'Indiana','KS'=>'Kansas','KY'=>'Kentucky','LA'=>'Louisiana','MA'=>'Massachusetts','MD'=>'Maryland','ME'=>'Maine','MI'=>'Michigan','MN'=>'Minnesota','MO'=>'Missouri','MS'=>'Mississippi','MT'=>'Montana','NC'=>'North_Carolina','ND'=>'North_Dakota','NE'=>'Nebraska','NH'=>'New_Hampshire','NJ'=>'New_Jersey','NM'=>'New_Mexico','NV'=>'Nevada','NY'=>'New_York','OH'=>'Ohio','OK'=>'Oklahoma','OR'=>'Oregon','PA'=>'Pennsylvania','RI'=>'Rhode_Island','SC'=>'South_Carolina','SD'=>'South_Dakota','TN'=>'Tennessee','TX'=>'Texas','UT'=>'Utah','VA'=>'Virginia','VT'=>'Vermont','WA'=>'Washington','WI'=>'Wisconsin','WV'=>'West_Virginia','WY'=>'Wyoming');


$countryarray=array(''=>"Choose",'1'=>"CHANNEL ISLANDS & ISLE OF MAN",'2'=>"England",'3'=>"Scotland",'4'=>"Wales",'5'=>"Northern Ireland");

$countryarray=array(''=>"Choose",'1'=>"United States of America","Afghanistan","Albania","Algeria","American Samoa","Andorra","Angola","Anguilla","Antarctica","Antigua and Barbuda","Argentina","Armenia","Aruba","Australia","Austria","Azerbaijan","Bahamas","Bahrain","Bangladesh","Barbados","Belarus","Belgium","Belize","Benin","Bermuda","Bhutan","Bolivia","Bosnia and Herzegovina","Botswana","Bouvet Island","Brazil","British Indian Ocean Territory","Brunei Darussalam","Bulgaria","Burkina Faso","Burma","Burundi","Cambodia","Cameroon","Canada","Canton and Enderbury Islands","Cape Verde",
"Cayman Islands","Central African Republic","Chad","Chile","China","Christmas Island","Cocos (Keeling) Islands","Colombia","Comoros","Congo","Cook Islands","Costa Rica","Cote D'Ivoire","Croatia (Hrvatska)","Cuba","Cyprus","Czech Republic","Democratic Yemen","Denmark","Djibouti","Dominica","Dominican Republic","Dronning Maud Land","East Timor","Ecuador","Egypt","El Salvador","Equatorial Guinea","Eritrea","Estonia","Ethiopia","Falkland Islands (Malvinas)","Faroe Islands","Fiji","Finland","France","France Metropolitan","French Guiana","French Polynesia","French Southern Territories",
"Gabon","Gambia","Georgia","Germany","Ghana","Gibraltar","Greece","Greenland","Grenada","Guadeloupe","Guam","Guatemala","Guinea","Guinea-bisseu","Guyana","Haiti","Heard and Mc Donald Islands","Honduras","Hong Kong","Hungary","Iceland","India","Indonesia","Iraq","Ireland","Israel","Italy","Ivory Coast","Jamaica","Japan","Johnston Island","Jordan","Kazakstan","Kenya","Kiribati","Korea","Kuwait","Kyrgyzstan","Latvia","Lebanon","Lesotho","Liberia",
"Libyan Arab Jamahiriya","Liechtenstein","Lithuania","Luxembourg","Macau","Macedonia","Madagascar","Malawi","Malaysia","Maldives","Mali","Malta","Marshall Islands","Martinique","Mauritania","Mauritius","Mayotte","Mexico","Micronesia, Federated States of","Midway Islands","Moldova, Republic of","Monaco","Mongolia","Montserrat","Morocco","Mozambique","Myanmar","Namibia","Nauru","Nepal","Netherlands Antilles","Neutral Zone","New Calidonia","New Zealand","Nicaragua","Niger","Nigeria","Niue","Norfolk Island","Northern Mariana Islands","Norway","Oman","Pacific Islands",
"Pakistan","Palau","Panama","Papua New Guinea","Paraguay","Peru","Philippines","Pitcairn Island","Poland","Portugal","Puerto Rico","Qatar","Reunion","Romania","Russian Federation","Rwanda","S.Georgia and S. Sandwich Isls.","Saint Lucia","Saint Vincent/Grenadines","Samoa","San Marino","Sao Tome and Principe","Saudi Arabia","Senegal","Seychelles","Sierra Leone","Singapore","Slovenia","Solomon Islands","Somalia","South Africa","Spain","Sri Lanka","St.Helena","St. Kitts Nevis Anguilla","Sudan","Suriname",
"Svalbard and Jan Mayen Islands","Swaziland","Sweden","Switzerland","Syran Arab Republic","Taiwan","Tajikistan","Tanzania, United Republic of","Thailand","Togo","Tokelau","Tonga","Trinidad and Tobago","Tunisia","Turkey","Turkmenistan","Turks and Caicos Islands","Tuvalu","US Minor Outlying Islands","Uganda","Ukraine","United Arab Emirates","United Kingdom","United States","United States Pacific Islands","Upper Volta","Uruguay","Uzbekistan","Vanuatu","Vatican City State","Venezuela","VietNam","Virgin Islands, British","Virgin Islands, Unites States","Wake Island",
"Wallis and Futuma Islands","Western Sahara","Yemen","Yugoslavia","Zaire","Zambia","Zimbabwe");

$MonthArray	=	array(''=>"Choose",'01'=>"Jan",'02'=>"Feb",'03'=>"Mar",'04'=>"Apr",'05'=>"May",'06'=>"Jun",'07'=>"Jul",'08'=>"Aug",'09'=>"Sep",'10'=>"Oct",'11'=>"Nov",'12'=>"Dec");

$JobtypeArray	=	array(''=>"Select",'01'=>"Permanent",'02'=>"Temprary",'03'=>"Contract");

$WorkpatternArray  =  array(''=>"Select",'01'=>"Full Time",'02'=>"Part Time",'03'=>"Term");


$paystatusarray=array("All"=>"View All","Pending"=>"Pending","Delivered"=>"Delivered");
$paystatusarray1=array("All"=>"View All","Paid"=>"Paid","Pending"=>"Unpaid");
 ?>
<?php if($_SESSION['orderstatus_frompaypal']!= "")
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
 
