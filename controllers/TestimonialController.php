<?php

class TestimonialController {
	public static $TESTIMONIAL_LIMIT=10;
	function __construct() {
	}
	public function displayTestimonial() {
	
		
		// Testimonial page
		$testimonialPage=StaticPageController::getPageById(StaticPageController::$PAGE_TESTIMONIAL);
		set("testimonialPage",$testimonialPage);
		
		
		$testimonialObj=new TestimonialMySqlExtDAO();
		$testimonialArray=$testimonialObj->queryAllOrderBy('testimonial_id');
				

		$recordsCount = count ( $testimonialArray );
		$numberOfPages = ceil ( $recordsCount / TestimonialController::$TESTIMONIAL_LIMIT );
		
		$offset = 0;
		$page = 1;
		
		$link = option ( 'base_uri' ) . "testimonials";
		
		set_or_default ( 'page', params ( 'page' ), '1' );
		if (params ( 'page' ) != "") {
			$page = intval ( params ( 'page' ) );
			$offset = ($page - 1) * TestimonialController::$TESTIMONIAL_LIMIT ;
		}
		
		$testimonialArray=$testimonialObj->getAllTestimonial(TestimonialController::$TESTIMONIAL_LIMIT,$offset);
		
		set("testimonialArray",$testimonialArray);
		
		set ( 'numberOfPages', $numberOfPages );
		set ( 'link', $link );
		set ( 'page', $page );
		
		set ( "templateTitle", "Testimonial" );
		set ( "tplSection", render ( "testimonial.tpl.php" ) );
	}
}

?>