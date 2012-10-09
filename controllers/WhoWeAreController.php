<?php

class WhoWeAreController {
	function __construct() {
	}
	
	public function displayWhoWeAre() {
		
		
		//whoWeAre Page
		$whoWeArePage=StaticPageController::getPageById(StaticPageController::$PAGE_WHO_WE_ARE);
		set("whoWeArePage",$whoWeArePage);
		
		//OUR TEAM Page
		$ourTeamPage=StaticPageController::getPageById(StaticPageController::$PAGE_OUR_TEAM);
		set("ourTeamPage",$ourTeamPage);
		
		//OUR CLIENTS Page
		$ourClientsPage=StaticPageController::getPageById(StaticPageController::$PAGE_OUR_CLIENTS);
		set("ourClientsPage",$ourClientsPage);
		
		//OUR COMMITMENT Page
		$ourCommitmentPage=StaticPageController::getPageById(StaticPageController::$PAGE_OUR_COMMITMENT);
		set("ourCommitmentPage",$ourCommitmentPage);
		
		// offices
		$officesArray=OfficeController::getOffice(OfficeController::$OFFICE_INCOMING_ARRAY);
		set("officesArray",$officesArray);
		
		set("whoWeAreClass","blue");
		set ( "templateTitle", "Who We Are" );
		set ( "tplSection", render ( "whoWeAre.tpl.php" ) );
	}
}

?>