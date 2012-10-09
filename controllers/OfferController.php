<?php

class OfferController {
	public static $OFFER_LIMIT=10;
	function __construct() {
	}
	public function displayOffers() {
		
		$offerObj=new OfferMySqlExtDAO();
		$offerArray=$offerObj->queryAll();
		
		$recordsCount = count ( $offerArray );
		$numberOfPages = ceil ( $recordsCount / OfferController::$OFFER_LIMIT );
		
		$offset = 0;
		$page = 1;
		
		$link = option ( 'base_uri' ) . "offers";
		
		set_or_default ( 'page', params ( 'page' ), '1' );
		if (params ( 'page' ) != "") {
			$page = intval ( params ( 'page' ) );
			$offset = ($page - 1) * OfferController::$OFFER_LIMIT ;
		}
		
		$offerArray=$offerObj->getAllOffer(OfferController::$OFFER_LIMIT,$offset);
		
		set("offerArray",$offerArray);
		
		set ( 'numberOfPages', $numberOfPages );
		set ( 'link', $link );
		set ( 'page', $page );
		
		set ( "templateTitle", "Offers" );
		set ( "tplSection", render ( "offers.tpl.php" ) );
	}
	
	public function displayOffer(){
		
		$offerId=ValidatorClass::prepareQuery(params('offerId'),"INT");
		
		if ($offerId != "" && $offerId >0 ){
			$offerObj=new OfferMySqlExtDAO();
			$offerInfo=$offerObj->getOfferById($offerId);
			set("offerInfo",$offerInfo);
		}
		
		set ( "templateTitle", "Offers" );
		set ( "tplSection", render ( "offer.tpl.php" ) );
	
	}
}

?>