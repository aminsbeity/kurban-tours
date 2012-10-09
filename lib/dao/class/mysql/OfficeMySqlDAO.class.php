<?php
/**
 * Class that operate on table 'office'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2012-09-07 15:16
 */
class OfficeMySqlDAO implements OfficeDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return OfficeMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM office WHERE office_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM office';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM office ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param office primary key
 	 */
	public function delete($office_id){
		$sql = 'DELETE FROM office WHERE office_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($office_id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param OfficeMySql office
 	 */
	public function insert($office){
		$sql = 'INSERT INTO office (office_title, office_details, office_location) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($office->officeTitle);
		$sqlQuery->set($office->officeDetails);
		$sqlQuery->set($office->officeLocation);

		$id = $this->executeInsert($sqlQuery);	
		$office->officeId = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param OfficeMySql office
 	 */
	public function update($office){
		$sql = 'UPDATE office SET office_title = ?, office_details = ?, office_location = ? WHERE office_id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($office->officeTitle);
		$sqlQuery->set($office->officeDetails);
		$sqlQuery->set($office->officeLocation);

		$sqlQuery->setNumber($office->officeId);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM office';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByOfficeTitle($value){
		$sql = 'SELECT * FROM office WHERE office_title = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByOfficeDetails($value){
		$sql = 'SELECT * FROM office WHERE office_details = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByOfficeLocation($value){
		$sql = 'SELECT * FROM office WHERE office_location = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByOfficeTitle($value){
		$sql = 'DELETE FROM office WHERE office_title = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByOfficeDetails($value){
		$sql = 'DELETE FROM office WHERE office_details = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByOfficeLocation($value){
		$sql = 'DELETE FROM office WHERE office_location = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return OfficeMySql 
	 */
	protected function readRow($row){
		$office = new Office();
		
		$office->officeId = $row['office_id'];
		$office->officeTitle = $row['office_title'];
		$office->officeDetails = $row['office_details'];
		$office->officeLocation = $row['office_location'];

		return $office;
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
	 * @return OfficeMySql 
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