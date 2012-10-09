<?php

class PartnerController {
	function __construct(){}
	
	public function displayPartners(){
		
		//OUR COMMITMENT Page
		$partnersPage=StaticPageController::getPageById(StaticPageController::$PAGE_PARTNERS);
		set("partnersPage",$partnersPage);
		
		$partnerObj=new PartnerMySqlExtDAO();
		$partnerArray=$partnerObj->queryAllOrderBy('partner_name');
		set("partnerArray",$partnerArray);
		
		set("partnersClass","blue");
		set ( "templateTitle", "partners" );
		set ( "tplSection", render ( "partner.tpl.php" ) );
	}
}

?>