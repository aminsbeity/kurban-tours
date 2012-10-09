<?php
/**
 * Class that operate on table 'partner'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2012-09-07 15:16
 */
class PartnerMySqlExtDAO extends PartnerMySqlDAO {
	
	public function getPartnerByRand($limit) {
		$sql = "SELECT * FROM partner order by rand() limit $limit";
		$sqlQuery = new SqlQuery ( $sql );
		return $this->getList ( $sqlQuery );
	}
}
?>