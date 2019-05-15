<?php 
	/*====================================================
											VARIABLES
	====================================================*/
	$sitename = $_POST["sitename"]; 
	$header_type = $_POST["header_type"];
	$footer_type = $_POST["footer_type"];
	/*====================================================
										OUTPUT LAYOUT
	====================================================*/
	$head = '<!DOCTYPE html>'
		. '<html lang="en">'
		. '<head>'
		. '<meta charset="UTF-8">'
		. '<title>' . $sitename .'</title>'
		. '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">'
		. '</head>'
		. '<body>';
	require_once("templates-part/header/header-{$header_type}.php"); //return string $header
	require_once("templates-part/footer/footer-{$footer_type}.php"); //return string $footer

	/*====================================================
  										Result String	
 	====================================================*/ 

	$strOut = $head . $header . $footer;

	/*====================================================
	  	Create a text file to accept the output string	
 	====================================================*/
	$filename = "createdSites/" . $sitename . ".php";
	$f = fopen($filename, "w"); 
	fwrite($f, $strOut); 
	fclose($f);  

	/*====================================================
					Give some feedback and a test link
	 ====================================================*/
	echo '<a href="' . $filename . '">Click here</a> to test if the build worked.';


