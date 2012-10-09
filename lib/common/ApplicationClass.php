<?php
include_once 'SimpleImage.php';
class ApplicationClass {
	
	private $path = "uploads/images/";
	private $authorized = false;
	public static  $regularImageW = 800;
	public static  $regularImageH= 600;
	public static  $medImageW = 300;
	public static  $medImageH = 255;
	public static  $smallImageW = 130;
	public static  $smallImageH = 90;
	function __construct() {
	
	}
	
	function getImage2($filename, $prefix) {
		if ($prefix == "") {
			return $this->path . $filename;
		}
		if (is_file ( $this->path . $prefix . "_" . $filename ))
			return $this->path . $prefix . "_" . $filename;
		else
			return $this->noImagePath . $prefix . ".jpg";
	}
	
	function getImage($filename, $prefix) {
		if ($prefix == "") {
			return $this->path . $filename;
		}else{
			return $this->path . $prefix . "_" . $filename;
		}
	}
	
	/*function getImage($filename, $prefix) {
		$simpleImage=new SimpleImage();
		if (is_file('public/'.$this->path.$filename)){
			if (!is_file('public/'.$this->path.'med_'.$filename)){
				$simpleImage->load ( 'public/'.$this->path . $filename );
				$simpleImage->resizeToWidth ( ApplicationClass::$medImageW );
				$simpleImage->save ( 'public/'.$this->path . "med_" . $filename );
				$simpleImage->resizeToWidth (  ApplicationClass::$smallImageW );
				$simpleImage->save ( 'public/'.$this->path . "small_" . $filename );
			}
			if ($prefix == "") {
				return $this->path . $filename;
			}else{
				return $this->path . $prefix . "_" . $filename;
			}
			
		}
	}*/
	
	
	

	
	function createRandomKey() {
		$chars = "abcdefgh2w2222ijkmnopqr2222stu222vwxyz023456789";
		srand ( ( double ) microtime () * 1000000 );
		$i = 0;
		$pass = '';
		while ( $i <= 7 ) {
			$num = rand () % 33;
			$tmp = substr ( $chars, $num, 1 );
			$pass = $pass . $tmp;
			$i ++;
		}
		return $pass;
	
	}
	
	// start login process
	

	public function getPageName() {
		return substr ( $_SERVER ["SCRIPT_NAME"], strrpos ( $_SERVER ["SCRIPT_NAME"], "/" ) + 1 );
	}
	
	public function getVisitorIP() {
		if (isset ( $_SERVER ['HTTP_X_FORWARDED_FOR'] )) {
			$ip = $_SERVER ['HTTP_X_FORWARDED_FOR'];
		} elseif (isset ( $_SERVER ['HTTP_VIA'] )) {
			$ip = $_SERVER ['HTTP_VIA'];
		} elseif (isset ( $_SERVER ['REMOTE_ADDR'] )) {
			$ip = $_SERVER ['REMOTE_ADDR'];
		}
		
		return $ip;
	}
	
	public function formatURI($completeURI) {
		$allURI = explode ( "?", $completeURI );
		//"index.php?".
		return $allURI [1];
	
	}
	
	function getPageURL() {
		$pageURL = 'http';
		if ($_SERVER ["HTTPS"] == "on") {
			$pageURL .= "s";
		}
		$pageURL .= "://www.";
		if ($_SERVER ["SERVER_PORT"] != "80") {
			$pageURL .= $_SERVER ["SERVER_NAME"] . ":" . $_SERVER ["SERVER_PORT"] . $_SERVER ["REQUEST_URI"];
		} else {
			$pageURL .= $_SERVER ["SERVER_NAME"] . $_SERVER ["REQUEST_URI"];
		}
		return $pageURL;
	}
}

?>