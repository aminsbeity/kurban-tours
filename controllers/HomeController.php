<?php

class HomeController {
	function __construct() {
	}
	public function displayHomePage() {
		
		
		// get latest testimonial (3)
		$testimonialObj=new TestimonialMySqlExtDAO();
		$latestTestimonial=$testimonialObj->getLatestTestimonial(3);
		set("latestTestimonial",$latestTestimonial);
		
		
		
		//dmc page
		$dmcPage=StaticPageController::getPageById(StaticPageController::$PAGE_DMC_HOME);
		set("dmcPage",$dmcPage);
		
		//whoWeAre Page
		$whoWeArePage=StaticPageController::getPageById(StaticPageController::$PAGE_WHO_WE_ARE);
		set("whoWeArePage",$whoWeArePage);
		
		
		
		set ("homeClass","blue");
		set ( "templateTitle", "Home Page" );
		set ( "tplSection", render ( "home.tpl.php" ) );
	}
}

?>