<?php

class StaticPageController {
	public static $PAGE_HEADER = 1;
	public static $PAGE_PRODUCT = 2;
	public static $PAGE_DMC_HOME = 3;
	public static $PAGE_WHO_WE_ARE = 4;
	public static $PAGE_OUR_TEAM = 5;
	public static $PAGE_OUR_CLIENTS = 6;
	public static $PAGE_OUR_COMMITMENT = 7;
	public static $PAGE_DESTINATION = 8;
	public static $PAGE_PARTNERS= 9;
	public static $PAGE_TESTIMONIAL= 10;
	public static $PAGE_CONTACTUS= 11;
	public static $PAGE_REQUEST_ACCESS= 12;
	public static $PAGE_DMC_ABOUT= 13;
	public static $PAGE_DMC_MISSION= 14;
	public static $PAGE_TOUR_OPERATOR= 15;
	
	function __construct() {
	}
	
	public function getPageById($pageId) {
		$staticPageObj = new StaticPageMySqlExtDAO ( );
		$pageinfo = $staticPageObj->load ( $pageId );
		return $pageinfo;
	}
	
	public function loadPage(){
		
		$pageId=ValidatorClass::prepareQuery(params('pageId'),"INT");
		
		if ($pageId == StaticPageController::$PAGE_TOUR_OPERATOR){
			set("tourOperatorClass","blue");
		}
		
		
		$pageInfo=StaticPageController::getPageById($pageId);
		set("pageInfo",$pageInfo);
		
		set ( "templateTitle", $pageInfo->staticPageTitle );
		set ( "tplSection", render ( "page.tpl.php" ) );
		
	}

}

?>