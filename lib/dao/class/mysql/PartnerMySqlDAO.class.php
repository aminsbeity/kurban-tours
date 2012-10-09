<?php
/**
 * Class that operate on table 'partner'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2012-09-07 15:16
 */
class PartnerMySqlDAO implements PartnerDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return PartnerMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM partner WHERE partner_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM partner';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM partner ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param partner primary key
 	 */
	public function delete($partner_id){
		$sql = 'DELETE FROM partner WHERE partner_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($partner_id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PartnerMySql partner
 	 */
	public function insert($partner){
		$sql = 'INSERT INTO partner (partner_name, partner_details, partner_logo, partner_link) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($partner->partnerName);
		$sqlQuery->set($partner->partnerDetails);
		$sqlQuery->set($partner->partnerLogo);
		$sqlQuery->set($partner->partnerLink);

		$id = $this->executeInsert($sqlQuery);	
		$partner->partnerId = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param PartnerMySql partner
 	 */
	public function update($partner){
		$sql = 'UPDATE partner SET partner_name = ?, partner_details = ?, partner_logo = ?, partner_link = ? WHERE partner_id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($partner->partnerName);
		$sqlQuery->set($partner->partnerDetails);
		$sqlQuery->set($partner->partnerLogo);
		$sqlQuery->set($partner->partnerLink);

		$sqlQuery->setNumber($partner->partnerId);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM partner';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByPartnerName($value){
		$sql = 'SELECT * FROM partner WHERE partner_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPartnerDetails($value){
		$sql = 'SELECT * FROM partner WHERE partner_details = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPartnerLogo($value){
		$sql = 'SELECT * FROM partner WHERE partner_logo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPartnerLink($value){
		$sql = 'SELECT * FROM partner WHERE partner_link = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByPartnerName($value){
		$sql = 'DELETE FROM partner WHERE partner_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPartnerDetails($value){
		$sql = 'DELETE FROM partner WHERE partner_details = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPartnerLogo($value){
		$sql = 'DELETE FROM partner WHERE partner_logo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPartnerLink($value){
		$sql = 'DELETE FROM partner WHERE partner_link = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return PartnerMySql 
	 */
	protected function readRow($row){
		$partner = new Partner();
		
		$partner->partnerId = $row['partner_id'];
		$partner->partnerName = $row['partner_name'];
		$partner->partnerDetails = $row['partner_details'];
		$partner->partnerLogo = $row['partner_logo'];
		$partner->partnerLink = $row['partner_link'];

		return $partner;
	}
	
	protected function getList($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		$ret = array();
		for($i=0;$i<count($tab);$i++){
			$ret[$i] = $this->readRow($tab[$i]);
		}
		return $ret;
	}
	
	/**
	 * Get row
	 *
	 * @return PartnerMySql 
	 */
	protected function getRow($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		if(count($tab)==0){
			return null;
		}
		return $this->readRow($tab[0]);		
	}
	
	/**
	 * Execute sql query
	 */
	protected function execute($sqlQuery){
		return QueryExecutor::execute($sqlQuery);
	}
	
		
	/**
	 * Execute sql query
	 */
	protected function executeUpdate($sqlQuery){
		return QueryExecutor::executeUpdate($sqlQuery);
	}

	/**
	 * Query for one row and one column
	 */
	protected function querySingleResult($sqlQuery){
		return QueryExecutor::queryForString($sqlQuery);
	}

	/**
	 * Insert row to table
	 */
	protected function executeInsert($sqlQuery){
		return QueryExecutor::executeInsert($sqlQuery);
	}
}
?>