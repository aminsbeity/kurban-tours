<?php
/**
 * Class that operate on table 'latest_news'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2012-09-07 15:16
 */
class LatestNewsMySqlExtDAO extends LatestNewsMySqlDAO {
	
	public function getLatestNews($limit) {
		$sql = "SELECT * FROM latest_news order by latest_news_id desc limit $limit";
		$sqlQuery = new SqlQuery ( $sql );
		return $this->getList ( $sqlQuery );
	}
	
	public function getAllNews($limit, $offset) {
		$sql = "SELECT * FROM latest_news order by latest_news_id desc limit $limit offset $offset";
		$sqlQuery = new SqlQuery ( $sql );
		return $this->getList ( $sqlQuery );
	}

}
?>