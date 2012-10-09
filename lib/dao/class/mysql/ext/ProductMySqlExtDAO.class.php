<?php
/**
 * Class that operate on table 'product'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2012-09-07 15:16
 */
class ProductMySqlExtDAO extends ProductMySqlDAO {
	
	public function getProduct($limit) {
		$sql = "SELECT * FROM product order by product_id asc limit $limit";
		$sqlQuery = new SqlQuery ( $sql );
		return $this->getList ( $sqlQuery );
	}
}
?>