<?php

class JavascriptClass {
	
	function __construct() {
	
	}
	
	function redirect($link) {
		echo "<script>javascript:document.location.href='" . $link . "';</script>";
	}	
}

?>