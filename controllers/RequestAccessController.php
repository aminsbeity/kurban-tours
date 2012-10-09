<?php

class RequestAccessController {
	function __construct() {
	}
	
	public function displayRequest() {
		
		//request Access Page
		$requestAccessPage = StaticPageController::getPageById ( StaticPageController::$PAGE_REQUEST_ACCESS );
		set ( "requestAccessPage", $requestAccessPage );
		set ( "action", 'form-action' );
		set ( "destination", "request-access" );
		set ( "requestAccessClass", "yellow" );
		set ( "templateTitle", "Request an Access" );
		set ( "tplSection", render ( "requestAccess.tpl.php" ) );
	}
}

?>