<?php
/**
 * Class that operate on table 'office'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2012-09-07 15:16
 */
class OfficeMySqlExtDAO extends OfficeMySqlDAO {
	
	public function getOffices($idArray) {
		$sql = "SELECT * FROM office  where office_id in (";
		foreach ($idArray as $id){
		$sql.= " $id , ";	
		}
		$sql.=" 0 )";
		$sqlQuery = new SqlQuery ( $sql );
		return $this->getList ( $sqlQuery );
	}
}
?>