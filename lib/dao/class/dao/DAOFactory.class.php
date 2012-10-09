<?php

/**
 * DAOFactory
 * @author: http://phpdao.com
 * @date: ${date}
 */
class DAOFactory{
	
	/**
	 * @return DestinationDAO
	 */
	public static function getDestinationDAO(){
		return new DestinationMySqlExtDAO();
	}

	/**
	 * @return DmcBrochureDAO
	 */
	public static function getDmcBrochureDAO(){
		return new DmcBrochureMySqlExtDAO();
	}

	/**
	 * @return DmcContactDAO
	 */
	public static function getDmcContactDAO(){
		return new DmcContactMySqlExtDAO();
	}

	/**
	 * @return DmcProductDAO
	 */
	public static function getDmcProductDAO(){
		return new DmcProductMySqlExtDAO();
	}

	/**
	 * @return LatestNewsDAO
	 */
	public static function getLatestNewsDAO(){
		return new LatestNewsMySqlExtDAO();
	}

	/**
	 * @return OfferDAO
	 */
	public static function getOfferDAO(){
		return new OfferMySqlExtDAO();
	}

	/**
	 * @return OfficeDAO
	 */
	public static function getOfficeDAO(){
		return new OfficeMySqlExtDAO();
	}

	/**
	 * @return PartnerDAO
	 */
	public static function getPartnerDAO(){
		return new PartnerMySqlExtDAO();
	}

	/**
	 * @return ProductDAO
	 */
	public static function getProductDAO(){
		return new ProductMySqlExtDAO();
	}

	/**
	 * @return ProductServiceDAO
	 */
	public static function getProductServiceDAO(){
		return new ProductServiceMySqlExtDAO();
	}

	/**
	 * @return StaticPageDAO
	 */
	public static function getStaticPageDAO(){
		return new StaticPageMySqlExtDAO();
	}

	/**
	 * @return TestimonialDAO
	 */
	public static function getTestimonialDAO(){
		return new TestimonialMySqlExtDAO();
	}


}
?>