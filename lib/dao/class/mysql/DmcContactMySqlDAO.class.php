<?php
/**
 * Class that operate on table 'dmc_contact'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2012-09-07 15:16
 */
class DmcContactMySqlDAO implements DmcContactDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return DmcContactMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM dmc_contact WHERE dmc_contact_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM dmc_contact';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM dmc_contact ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param dmcContact primary key
 	 */
	public function delete($dmc_contact_id){
		$sql = 'DELETE FROM dmc_contact WHERE dmc_contact_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($dmc_contact_id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param DmcContactMySql dmcContact
 	 */
	public function insert($dmcContact){
		$sql = 'INSERT INTO dmc_contact (dmc_contact_title, dmc_contact_details) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($dmcContact->dmcContactTitle);
		$sqlQuery->set($dmcContact->dmcContactDetails);

		$id = $this->executeInsert($sqlQuery);	
		$dmcContact->dmcContactId = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param DmcContactMySql dmcContact
 	 */
	public function update($dmcContact){
		$sql = 'UPDATE dmc_contact SET dmc_contact_title = ?, dmc_contact_details = ? WHERE dmc_contact_id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($dmcContact->dmcContactTitle);
		$sqlQuery->set($dmcContact->dmcContactDetails);

		$sqlQuery->setNumber($dmcContact->dmcContactId);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM dmc_contact';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByDmcContactTitle($value){
		$sql = 'SELECT * FROM dmc_contact WHERE dmc_contact_title = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDmcContactDetails($value){
		$sql = 'SELECT * FROM dmc_contact WHERE dmc_contact_details = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByDmcContactTitle($value){
		$sql = 'DELETE FROM dmc_contact WHERE dmc_contact_title = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDmcContactDetails($value){
		$sql = 'DELETE FROM dmc_contact WHERE dmc_contact_details = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return DmcContactMySql 
	 */
	protected function readRow($row){
		$dmcContact = new DmcContact();
		
		$dmcContact->dmcContactId = $row['dmc_contact_id'];
		$dmcContact->dmcContactTitle = $row['dmc_contact_title'];
		$dmcContact->dmcContactDetails = $row['dmc_contact_details'];

		return $dmcContact;
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
	 * @return DmcContactMySql 
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