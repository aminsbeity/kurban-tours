<?php

class CommonController {
	public static $HOME_OFFER=4;
	public static $TOP_DESTINATION=4;
	public static $LATEST_NEWS=3;
	public static $PRODUCT_LIMIT=4;
	
	public static $WEATHER_LEBANON_XML="http://weather.yahooapis.com/forecastrss?w=56051360&u=c";
	public static $WEATHER_OMAN_XML="http://weather.yahooapis.com/forecastrss?w=2267394&u=c";
	public static $WEATHER_UAE_XML="http://weather.yahooapis.com/forecastrss?w=1940332&u=c";
	
	function __construct() {
	}
	public function commonFct() {
		
		// create common classes
		$formatClass=new FormatClass();
		set("formatClass",$formatClass);
		$appClass=new ApplicationClass();
		set("appClass",$appClass);
		
		//product page
		$productPage=StaticPageController::getPageById(StaticPageController::$PAGE_PRODUCT);
		set("productPage",$productPage);
		
		// header page
		$headerPage=StaticPageController::getPageById(StaticPageController::$PAGE_HEADER);
		set("headerPage",$headerPage);
		
	}
	
	
	public function displayTopDestination(){
		// get top destinations(4)
		$destinationObj=new DestinationMySqlExtDAO();
		$topDestinationArray=$destinationObj->getTopDestination(CommonController::$TOP_DESTINATION);
		set("topDestinationArray",$topDestinationArray);
		return render('sectionTopDestination.tpl.php');
	}
	
	public function displayLatestNews(){
		//get latest news (4)
		$latestNewsObj=new LatestNewsMySqlExtDAO();
		$latestNewsArray=$latestNewsObj->getLatestNews(CommonController::$LATEST_NEWS);
		set("latestNewsArray",$latestNewsArray);
		return render('sectionLatestNews.tpl.php');
	}
	
	public function displayProduct(){
		// get  our product (4)
		$productObj=new ProductMySqlExtDAO();
		$productArray=$productObj->getProduct(CommonController::$PRODUCT_LIMIT);
		set("productArray",$productArray);
		return render('sectionProduct.tpl.php');
	}
	
	public function displayPartner(){
		// get  4 parterns by rand
		$partnerObj=new PartnerMySqlExtDAO();
		$partnerArray=$partnerObj->getPartnerByRand(4);
		set("partnerArray",$partnerArray);	
		return render('sectionPartner.tpl.php');
	}
	
	public function displayHomeoffer(){
		// get latest 4 home offers.
		$offerObj=new OfferMySqlExtDAO();
		$homeOfferArray=$offerObj->getHomeOffer(CommonController::$HOME_OFFER);
		set("homeOfferArray",$homeOfferArray);
		return render("sectionHomeoffer.tpl.php");
	}
	
	public function displayForm(){
		return render("form.tpl.php");
	}
	
	public function formAction(){
		$name=ValidatorClass::prepareQuery($_POST['name'],"STRING");
		$email=ValidatorClass::prepareQuery($_POST['email'],"STRING");
		$phone=ValidatorClass::prepareQuery($_POST['phone'],'STRING');
		$message=ValidatorClass::prepareQuery($_POST['message'],"STRING");
		
		$adminEmail = MailClass::getAdminEmail ();
		//$adminEmail="amin.sbeity@multiframes.com";
		

		$arrayFieldForm = array ($name, $email, $message );
		$isFilled = ValidatorClass::validateFields ( $arrayFieldForm );
		$isValidEmail = ValidatorClass::checkEmailAddress ( $email );
		$sendMsg = "";
		
		
		if ($isValidEmail == false) {
			$sendMsg = "Please enter a valid email.";
		}
		
		if ($isFilled == false) {
			$sendMsg = "* All fields are required.";
		}
		
		if ($sendMsg == "") {
			$mailClassObj = new MailClass ( );
			$msgArray = array ("Name" => "$name", "E-mail" => "$email", "Phone" => "$phone", "Message" => "$message" );
			$headers = $mailClassObj->getMailHeaders ($name, $email );
			$emailMsg = $mailClassObj->getMessageAsHTML ( $msgArray );
			$sendEmail = $mailClassObj->sendEmail ( $adminEmail, "[ kurbantours ] From $name", $emailMsg, $headers );
			if ($sendEmail == true) {
				$sendMsg = "Your Message Was Sent Successfully.";
			} else {
				$sendMsg = "Message Sending Failed, Please Try Again.";
			}
		}
		$_SESSION['returnedMsg']=$sendMsg;
		redirect(option('base_uri').ValidatorClass::prepareQuery($_POST['destination'],"STRING"));
	}
}

?>