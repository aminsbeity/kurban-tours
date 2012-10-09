<?php
/**
 * Class that operate on table 'destination'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2012-09-07 15:16
 */
class DestinationMySqlExtDAO extends DestinationMySqlDAO {
	
	public function getTopDestination($limit) {
		$sql = "SELECT * FROM destination where destination_top =1 limit $limit";
		$sqlQuery = new SqlQuery ( $sql );
		return $this->getList ( $sqlQuery );
	}
}
?>