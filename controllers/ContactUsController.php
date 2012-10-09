<?php

class ContactUsController {
	function __construct() {
	}
	
	public function contactUs() {
		
		// contact  page
		$contactPage = StaticPageController::getPageById ( StaticPageController::$PAGE_CONTACTUS );
		set ( "contactPage", $contactPage );
		
		// offices Contact
		$officesContactArray=OfficeController::getOffice(OfficeController::$OFFICE_CONTACT_ADDRESS_ARRAY);
		set("officesContactArray",$officesContactArray);
		
		
		// offices sales
		$salesContactArray=OfficeController::getOffice(OfficeController::$OFFICE_SALES_OFFICES_ARRAY);
		set("salesContactArray",$salesContactArray);
		
		
		set ( "action", 'form-action' );
		set ( "destination", "contact-us" );
		set ( "contactUsClass", "blue" );
		set ( "templateTitle", "Contact Us" );
		set ( "tplSection", render ( "contactUs.tpl.php" ) );
	}

}

?>