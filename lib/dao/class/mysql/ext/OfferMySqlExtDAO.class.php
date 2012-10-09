<?php
/**
 * Class that operate on table 'offer'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2012-09-07 15:16
 */
class OfferMySqlExtDAO extends OfferMySqlDAO {
	
	public function getHomeOffer($limit) {
		ConnectionFactory::getConnection ();
		$sql = "SELECT * FROM offer inner join destination on offer.destination_id = destination.destination_id  where offer_home = 1 order by offer_id desc limit $limit";
		$result = mysql_query ( $sql );
		$objects = array ();
		while ( $object = mysql_fetch_object ( $result ) ) {
			array_push ( $objects, $object );
		}
		return $objects;
	}
	
	public function getAllOffer($limit , $offset) {
		ConnectionFactory::getConnection ();
		$sql = "SELECT * FROM offer inner join destination on offer.destination_id = destination.destination_id   order by offer_id desc limit $limit offset $offset";
		$result = mysql_query ( $sql );
		$objects = array ();
		while ( $object = mysql_fetch_object ( $result ) ) {
			array_push ( $objects, $object );
		}
		return $objects;
	}
	
	public function getOfferById($offerId){
		ConnectionFactory::getConnection ();
		$sql = "SELECT * FROM offer inner join destination on offer.destination_id = destination.destination_id  where offer_id = $offerId";
		$result = mysql_query ( $sql );
		$object=mysql_fetch_object($result);
		return $object;
	}
}
?>