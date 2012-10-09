<?php
/**
 * Class that operate on table 'dmc_brochure'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2012-09-07 15:16
 */
class DmcBrochureMySqlDAO implements DmcBrochureDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return DmcBrochureMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM dmc_brochure WHERE dmc_brochure_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM dmc_brochure';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM dmc_brochure ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param dmcBrochure primary key
 	 */
	public function delete($dmc_brochure_id){
		$sql = 'DELETE FROM dmc_brochure WHERE dmc_brochure_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($dmc_brochure_id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param DmcBrochureMySql dmcBrochure
 	 */
	public function insert($dmcBrochure){
		$sql = 'INSERT INTO dmc_brochure (dmc_brochure_title, dmc_brochure_file) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($dmcBrochure->dmcBrochureTitle);
		$sqlQuery->set($dmcBrochure->dmcBrochureFile);

		$id = $this->executeInsert($sqlQuery);	
		$dmcBrochure->dmcBrochureId = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param DmcBrochureMySql dmcBrochure
 	 */
	public function update($dmcBrochure){
		$sql = 'UPDATE dmc_brochure SET dmc_brochure_title = ?, dmc_brochure_file = ? WHERE dmc_brochure_id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($dmcBrochure->dmcBrochureTitle);
		$sqlQuery->set($dmcBrochure->dmcBrochureFile);

		$sqlQuery->setNumber($dmcBrochure->dmcBrochureId);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM dmc_brochure';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByDmcBrochureTitle($value){
		$sql = 'SELECT * FROM dmc_brochure WHERE dmc_brochure_title = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDmcBrochureFile($value){
		$sql = 'SELECT * FROM dmc_brochure WHERE dmc_brochure_file = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByDmcBrochureTitle($value){
		$sql = 'DELETE FROM dmc_brochure WHERE dmc_brochure_title = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDmcBrochureFile($value){
		$sql = 'DELETE FROM dmc_brochure WHERE dmc_brochure_file = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return DmcBrochureMySql 
	 */
	protected function readRow($row){
		$dmcBrochure = new DmcBrochure();
		
		$dmcBrochure->dmcBrochureId = $row['dmc_brochure_id'];
		$dmcBrochure->dmcBrochureTitle = $row['dmc_brochure_title'];
		$dmcBrochure->dmcBrochureFile = $row['dmc_brochure_file'];

		return $dmcBrochure;
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
	 * @return DmcBrochureMySql 
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