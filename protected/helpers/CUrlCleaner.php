<?php
/**
 * CUrlCleaner class file.
 */

class CUrlCleaner
{
	function alias($string) {
	    $string = strtolower(trim($string));
	    $string = preg_replace('/[^a-z0-9-]/', '-', $string);
	    $string = preg_replace('/-+/', "-", $string);
	    $string = trim($string, " \t\n\r\0\x0B-_");
	    
	    return $string;
    }
    
    function upper($string) {
	    $string = strtoupper(trim($string));
	    $string = preg_replace('/[^a-zA-Z0-9]/', '_', $string);
	    $string = preg_replace('/-+/', "_", $string);
	    $string = trim($string, " \t\n\r\0\x0B-_");
	    
	    return $string;
    }
}