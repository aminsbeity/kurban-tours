<?php
require_once (dirname ( __FILE__ )) . '/lib/limonade.php';
require_once_dir ( (dirname ( __FILE__ )) . '/lib/common/' );
require_once_dir ( (dirname ( __FILE__ )) . '/lib/dao/' );
require_once_dir ( (dirname ( __FILE__ )) . '/controllers/' );
require_once ((dirname ( __FILE__ )) . "/lib/rsslib/rsslib.php");

function configure() {
	session_save_path ( "sessions" );
	session_start ();
	option ( 'base_uri', '../index.php/' );
	ConnectionFactory::getConnection ();
	CommonController::commonFct();
}

option ( 'BASE_URL', 'http://localhost/projects/kurban_tours/public/' );
option ( 'MAIN_URL', 'http://localhost/projects/kurban_tours/?/' );

/*option ( 'BASE_URL', 'http://184.173.6.201/~kurbanto/public/' );
option ( 'MAIN_URL', 'http://184.173.6.201/~kurbanto/?/' );*/


// define the views directory
option ( 'BASE_PATH', dirname ( __FILE__ ) . '/public/' );
option ( 'VIEWS_DIR', dirname ( __FILE__ ) . '/views' );

option ( 'upload_dir_image', 'uploads/images/' );
option ( 'upload_dir_video', 'uploads/videos/' );
option ( 'upload_dir_file', 'uploads/files/' );
option ( 'upload_dir_pdf', 'uploads/pdf/' );
option ( 'upload_ad_dir', 'uploads/advertisments/' );



dispatch ( '/', 'defaultPage' );
function defaultPage() {
	HomeController::displayHomePage();
	return html ( "template.php" );
}

dispatch ( 'who-we-are/', 'whoWeAre' );
function whoWeAre() {
	WhoWeAreController::displayWhoWeAre();
	return html ( "template.php" );
}

dispatch ( 'products/', 'products' );
function products() {
	ProductController::displayProduct();
	return html ( "template.php" );
}


dispatch ( 'product/:productId', 'product' );
function product() {
	ProductController::displayProductDetails();
	return html ( "template.php" );
}

dispatch ( 'destinations/', 'destinations' );
function destinations() {
	DestinationsController::displayDestination();
	return html ( "template.php" );
}

dispatch ( 'partners/', 'partners' );
function partners() {
	PartnerController::displayPartners();
	return html ( "template.php" );
}

dispatch ( 'testimonials/:page', 'testimonials' );
function testimonials() {
	TestimonialController::displayTestimonial();
	return html ( "template.php" );
}

dispatch ( 'news/:page', 'news' );
function news() {
	NewsController::displayLatestNews();
	return html ( "template.php" );
}

dispatch ( 'news-details/:newsId', 'newsDetails' );
function newsDetails() {
	NewsController::displayLatestNewsDetails();
	return html ( "template.php" );
}

dispatch ( 'offers/:page', 'offers' );
function offers() {
	OfferController::displayOffers();
	return html ( "template.php" );
}

dispatch ( 'offer/:offerId', 'offer' );
function offer() {
	OfferController::displayOffer();
	return html ( "template.php" );
}

dispatch ( 'contact-us/', 'contactUs' );
function contactUs() {
	ContactUsController::contactUs();
	return html ( "template.php" );
}

dispatch_post( 'form-action/', 'formAction' );
function formAction() {
	CommonController::formAction();
	return html ( "template.php" );
}

dispatch ( 'request-access/', 'requestAccess' );
function requestAccess() {
	RequestAccessController::displayRequest();
	return html ( "template.php" );
}

dispatch ( 'dmc-arabia/', 'dmcArabia' );
function dmcArabia() {
	DmcController::dmcArabia();
	return html ( "template.php" );
}

dispatch ( 'page/:pageId', 'pageLoad' );
function pageLoad() {
	StaticPageController::loadPage();
	return html ( "template.php" );
}


dispatch ( 'feed/', 'feedRss' );
function feedRss() {
	echo NewsController::generateNewsRss();
}

run ();

?>