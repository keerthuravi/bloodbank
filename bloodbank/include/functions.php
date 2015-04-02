<?php 

//Date format function for displaying date
function dateformat($Date)
{

	if($Date != "0000-00-00")
	{
		#Changing the Format of the date
		$Query_Date = "SELECT * FROM ".ADMINPROFILE."";
		$Result_Date = db_query($Query_Date)or die(db_error());
		$Fetch_Date = db_fetch_array($Result_Date);
		$Date_Format	=	$Fetch_Date['intDateFormat'];
	
		$DateDisp = explode("-",$Date);
		$Year	=	$DateDisp[0];
		$Month	=	$DateDisp[1];
		$Day	=	$DateDisp[2];
		
		if($Date_Format == 1)		#For dd-mm-yyyy
		{
			$Date_Output	=	date("d-m-Y",mktime(0,0,0,$Month,$Day,$Year));
		}
		elseif($Date_Format == 2)		#For dd/mm/yyyy
		{
			$Date_Output	=	date("d/m/Y",mktime(0,0,0,$Month,$Day,$Year));
		}
		elseif($Date_Format == 3)		#For mm-dd-yyyy
		{
			$Date_Output	=	date("m-d-Y",mktime(0,0,0,$Month,$Day,$Year));
		}
		elseif($Date_Format == 4)		#For mm/dd/yyyy
		{
			$Date_Output	=	date("m/d/Y",mktime(0,0,0,$Month,$Day,$Year));
		}
		elseif($Date_Format == 5)		#For Mon Day YYYY
		{
			$Date_Output	=	date("M D Y",mktime(0,0,0,$Month,$Day,$Year));
		}
		elseif($Date_Format == 6)		#For Month Day YYYY
		{
			$Date_Output	=	date("F D Y",mktime(0,0,0,$Month,$Day,$Year));
		}
		
		elseif($Date_Format == 7)		#For Date"nd" Month YYYY
		{
			$Date_Output	=	date("d\\t\h F Y",mktime(0,0,0,$Month,$Day,$Year));
		}
		
		return $Date_Output;
	}
	else
	{
		return NULL;
	}

}


//Date format function for displaying date
function dateformatday($Date)
{

	if($Date != "0000-00-00 00:00:00")
	{
	
		$DateDisp = explode(" ",$Date);
		$Dated	=	$DateDisp[0];
		$Time	=	$DateDisp[1];
		$DateDisp = explode("-",$Dated);
		$Year	=	$DateDisp[0];
		$Month	=	$DateDisp[1];
		$Day	=	$DateDisp[2];
		$TimeDisp = explode(":",$Time);
		$hours	=	$TimeDisp[0];
		$Mins	=	$TimeDisp[1];
		$Sec	=	$TimeDisp[2];

	
		$Date_Output	=	date("l dS \of F Y h:i A",mktime($hours,$Mins,$Sec,$Month,$Day,$Year));
	
		
		return $Date_Output;
	}
	else
	{
		return NULL;
	}

}


//Set page settings

// Function to Show Image and Flash Files
/* Parameters
	$ImageType		--	Type of File (Image/Flash)
	$Path	--	FilePath
	$Width	--	Image/Flash Width
	$Height	--	Image/Flash Height
*/
function show($ImageType,$Path,$Width='',$Height='')
{
	if(file_exists($Path))
	{
		if($ImageType == "Flash")
		{
			echo "<object codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0\" width=\"$Width\" height=\"$Height\">
			  <param name=\"movie\" value=\"$Path\">
			  <param name=\"quality\" value=\"high\">
			  <embed src=\"$Path\" quality=\"high\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" type=\"application/x-shockwave-flash\" width=\"$Width\" height=\"$Height\"></embed>
			</object>";
		}
		else
		{
			if(!empty($Width))
				$strWidth	=	" width=\"$Width\"";
			else
				$strWidth	=	"";
			if(!empty($Height))
				$strHeight	=	" height=\"$Height\"";
			else
				$strHeight	=	"";

			echo "<img src=\"$Path\" $strWidth $strHeight border=\"0\">";
		}
	}
	else
	{
		echo "File Not Found";
	}
}


//Function for Checking Whether the Image is Present or Not
//Parameters ImageFullPath,FullImageName from Table
function imagecheck($path,$image)
{
	if(file_exists($path) && !empty($image))
		return true;
	else
		return false;
	
}


// Function Used For Compare the width of the image width the given width
// Return Image Width
// Parameters Image Location & Default Size.
function getimagewidth($ImagePath,$MaxWidth="",$Type="")
{
	if($Type == "height")
		$ArrayIndex	=	1;
	else
		$ArrayIndex	=	0;

	$ImageArray		=	getimagesize($ImagePath);
	
	if($MaxWidth == "")
		return $ImageArray[$ArrayIndex];
	elseif($ImageArray[$ArrayIndex] > $MaxWidth)
		return $MaxWidth;
	else
		return $ImageArray[$ArrayIndex];
}
function formatdate($passdate){
	$cordate=split("-",$passdate);
	$returndate=$cordate[1]."-".$cordate[2]."-".$cordate[0];
	return $returndate;
}

function makeClickableLinks($text) 
{  
	$text = eregi_replace('(((f|ht){1}tp://)[-a-zA-Z0-9@:%_\+.~#?&//=]+)',    '<a href="\\1" target="_blank">\\1</a>', $text);
  	$text = eregi_replace('([[:space:]()[{}])(www.[-a-zA-Z0-9@:%_\+.~#?&//=]+)',    '\\1<a href="http://\\2" target="_blank">\\2</a>', $text);
  	$text = eregi_replace('([_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,3})',    '<a href="mailto:\\1" target="_blank">\\1</a>', $text);  
	return $text;
}

//Copy the image with the same name
function copyimageonly($copypath,$imagename,$id){
//print_r($imagename);
					//Split the Image Array
								$pImage_name = $id."_".$imagename['name'];
								$x_file_name = $imagename['name'];
								$pImage_path = $imagename['tmp_name'];
								$pImage_type = $imagename['type'];
								//print $copypath;
								
								$exist = file_exists($copypath.$pImage_name);
								if($exist!="1")
										{
												 if(!copy($pImage_path,$copypath.$pImage_name))
												 {
													  echo "Error:Can not copy the specified file into ".$copypath;
													  exit;
												 }
										}
									else
										{
										unlink($copypath.$pImage_name);
										if(!copy($pImage_path,$copypath.$pImage_name))
												 {
													  echo "Error:Can not copy the specified file in ".$copypath.$pImage_name;
													  exit;
												 }
										}
								
								return $x_file_name=$pImage_name;
					}

//Copy the image with the same name
function copyimageonly1($copypath,$imagename){
//print_r($imagename);
					//Split the Image Array
								$pImage_name=$imagename['name'];
								$x_file_name=$imagename['name'];
								$pImage_path=$imagename['tmp_name'];
								$pImage_type=$imagename['type'];
								//print $copypath;
								
								$exist=file_exists($copypath.$pImage_name);
								if($exist!="1")
										{
												 if(!copy($pImage_path,$copypath.$pImage_name))
												 {
													  echo "Error:Can not copy the specified file into ".$copypath;
													  exit;
												 }
										}
								else{
										unlink($copypath.$pImage_name);
										if(!copy($pImage_path,$copypath.$pImage_name))
												 {
													  echo "Error:Can not copy the specified file in ".$copypath.$pImage_name;
													  exit;
												 }
										}
								
								return $x_file_name=$pImage_name;
					}

//Function Copy the Image Into the Specific folder
	function copyimage($makefolder,$imagename,$copyfilename){
	
					//Split the Image Array
								$pImage_name=$imagename['name'];
								$x_file_name=$imagename['name'];
								$pImage_path=$imagename['tmp_name'];
								$pImage_type=$imagename['type'];
								//print $pImage_type;
								
								//Find the Directory
								CreateSubFolder($makefolder);
								
								$exist=file_exists($copyfilename);
								if($exist!=1)
										{
												 if(!copy($pImage_path,$copyfilename))
												 {
													  echo "Error:Can not copy the specified file into ".$copyfilename;
													  exit;
												 }
										}
								else{
										
										unlink($copyfilename);
										if(!copy($pImage_path,$copyfilename))
												 {
													  echo "Error:Can not copy the specified file ".$copyfilename;
													  exit;
												 }
										}
					}
					
					
	//Function Create sub folder
	function CreateSubFolder($dest){
						if (is_dir($dest)){
							$flag=1;	
						}
						else
						{
						mkdir($dest,0777);
						}
		}
		
//Database Functions
		function db_query($s) //database query
		{
			return mysql_query($s);
		}
		function db_error() //database error message
		{
			return mysql_error();
		}
		function db_fetch_row($q) //row fetching
		{
			return mysql_fetch_row($q);
		}
		function db_fetch_array($q) //Array fetching
		{
			return @mysql_fetch_array($q);
		}
		function db_num_rows($r) //Num Rows Count fetching
		{
			return @mysql_num_rows($r);
		}
function resampimagejpg( $forcedwidth, $forcedheight, $sourcefile, $destfile )
{
    $fw = $forcedwidth;
	//print $sourcefile;
    $fh = $forcedheight;
    $is = getimagesize( $sourcefile );
    if( $is[0] >= $is[1] )
    {
        $orientation = 0;
    }
    else
    {
        $orientation = 1;
        $fw = $forcedwidth;
        $fh = $forcedheight;
    }
    if ( $is[0] > $fw || $is[1] > $fh )
    {
        if( ( $is[0] - $fw ) >= ( $is[1] - $fh ) )
        {
             $iw = $fw; 
			  $ih = $fh;
           // $ih = ( $fw / $is[0] ) * $is[1];
        }
        else
        {
             $ih = $fh;
			 $iw = $fw;
            //$iw = ( $ih / $is[1] ) * $is[0];
        }
        $t = 1;
    }
    else
    {
        $iw = $is[0];
        $ih = $is[1];
        $t = 2;
    }
    if ( $t == 1 )
    {
       if ((strpos($sourcefile,".gif") == true) || (strpos($sourcefile,".GIF") == true))
	   {
 		$img_src = imagecreatefromgif( $sourcefile );
      $img_dst = imagecreatetruecolor( $iw, $ih );
        imagecopyresampled( $img_dst, $img_src, 0, 0, 0, 0, $iw, $ih, $is[0], $is[1] );
        if( !imagegif( $img_dst, $destfile, 90 ) )
        {
            exit( );
        }
	   }	
        if ((strpos($sourcefile,".jpg") == true) || (strpos($sourcefile,".JPG") == true))
	   {
 		$img_src = imagecreatefromjpeg( $sourcefile );
        $img_dst = imagecreatetruecolor( $iw, $ih );
        imagecopyresampled( $img_dst, $img_src, 0, 0, 0, 0, $iw, $ih, $is[0], $is[1] );
        if( !imagejpeg( $img_dst, $destfile, 90 ) )
        {
            exit( );
        }
	   }	
       if ((strpos($sourcefile,".png") == true) || (strpos($sourcefile,".PNG") == true))
	   {
 		$img_src = imagecreatefrompng( $sourcefile );
        $img_dst = imagecreatetruecolor( $iw, $ih );
        imagecopyresampled( $img_dst, $img_src, 0, 0, 0, 0, $iw, $ih, $is[0], $is[1] );
        if( !imagepng( $img_dst, $destfile, 90 ) )
        {
            exit( );
        }
	   }	
       if ((strpos($sourcefile,".bmp") == true) || (strpos($sourcefile,".BMP") == true))
	   {
 		$img_src = imagecreatefromwbmp( $sourcefile );
        $img_dst = imagecreatetruecolor( $iw, $ih );
        imagecopyresampled( $img_dst, $img_src, 0, 0, 0, 0, $iw, $ih, $is[0], $is[1] );
        if( !imagewbmp( $img_dst, $destfile, 90 ) )
        {
            exit( );
        }
	   }	
   }
    else if ( $t == 2 )
    {
        copy( $sourcefile, $destfile );
    }
}

?>