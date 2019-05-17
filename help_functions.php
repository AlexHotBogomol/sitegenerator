<?php
	function hex2rgb($hex)
	{
	    return array(
	            hexdec(substr($hex,1,2)),
	            hexdec(substr($hex,3,2)),
	            hexdec(substr($hex,5,2))
	        );
	}

	function different_shade($rgb, $type, $percent)
	{
	     $newShade = array();
	     $percentageChange = $percent;

	     if($type == 'lighter')
	     {
	         $newShade = Array(
	                255-(255-$rgb[0]) + $percentageChange,
	                255-(255-$rgb[1]) + $percentageChange,
	                255-(255-$rgb[2]) + $percentageChange
	            );
	     } else {
	         $newShade = Array(
	                $rgb[0] - $percentageChange,
	                $rgb[1] - $percentageChange,
	                $rgb[2] - $percentageChange
	            );
	     }

	     return "#" . dechex($newShade[0]) . dechex($newShade[1]) . dechex($newShade[2]);
	}