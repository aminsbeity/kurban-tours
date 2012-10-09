<?php
/**
 * Class that operate on table 'testimonial'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2012-09-07 15:16
 */
class TestimonialMySqlExtDAO extends TestimonialMySqlDAO {
	
	public function getLatestTestimonial($limit) {
		$sql = "SELECT * FROM testimonial order by testimonial_id desc limit $limit";
		$sqlQuery = new SqlQuery ( $sql );
		return $this->getList ( $sqlQuery );
	}
	
	public function getAllTestimonial($limit,$offset){
		$sql = "SELECT * FROM testimonial order by testimonial_id desc limit $limit offset $offset";
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
}
?>