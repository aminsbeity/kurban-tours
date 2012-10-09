<?php

class DmcController {
	function __construct() {
	}
	public function dmcArabia() {
		
		//about dmc page
		$aboutDmcPage=StaticPageController::getPageById(StaticPageController::$PAGE_DMC_ABOUT);
		set("aboutDmcPage",$aboutDmcPage);
		
		//mission dmc page
		$missionDmcPage=StaticPageController::getPageById(StaticPageController::$PAGE_DMC_MISSION);
		set("missionDmcPage",$missionDmcPage);
		
		// product
		$dmcProductObj=new DmcProductMySqlExtDAO();
		$dmcProductArray=$dmcProductObj->queryAllOrderBy('dmc_product_id');
		set("dmcProductArray",$dmcProductArray);
		
		// dmc brochure
		$dmcBrochureObj=new DmcBrochureMySqlExtDAO();
		$dmcBrochureArray=$dmcBrochureObj->queryAll('dmc_brochure_id');
		set("dmcBrochureArray",$dmcBrochureArray);
		
		// dmc contact
		$dmcContactObj=new DmcContactMySqlExtDAO();
		$dmcContactArray=$dmcContactObj->queryAll('dmc_contact_id');
		set("dmcContactArray",$dmcContactArray);
		
		
		// to  change the bg color for the header, and to change the arrows color and to change the color of the menu tab on mouse over. 
		set("redheaderSlide","red");
		// to  change the logo and it is taked as a condition to change the differents between the  template.
		set("dmcLogo","logoDmc-logo.png");
		
		set ( "templateTitle", "Dmc arabia" );
		set ( "tplSection", render ( "dmc.tpl.php" ) );
	}
}

?>