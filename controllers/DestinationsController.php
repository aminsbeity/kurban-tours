<?php

class DestinationsController {
	function __construct() {
	}
	public function displayDestination() {
		
		//destination Page
		$destinationPage=StaticPageController::getPageById(StaticPageController::$PAGE_DESTINATION);
		set("destinationPage",$destinationPage);
		
		$destinationObject=new DestinationMySqlExtDAO();
		$AllDestination=$destinationObject->queryAllOrderBy('destination_top');
		set("AllDestination",$AllDestination);
		
		
		set("destinationsClass","blue");
		set ( "templateTitle", "Destinations" );
		set ( "tplSection", render ( "destinations.tpl.php" ) );
	}
}

?>