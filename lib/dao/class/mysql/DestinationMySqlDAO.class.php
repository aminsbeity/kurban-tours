<?php
/**
 * Class that operate on table 'destination'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2012-09-07 15:16
 */
class DestinationMySqlDAO implements DestinationDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return DestinationMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM destination WHERE destination_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM destination';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM destination ORDER BY '.$orderColumn . ' desc ';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param destination primary key
 	 */
	public function delete($destination_id){
		$sql = 'DELETE FROM destination WHERE destination_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($destination_id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param DestinationMySql destination
 	 */
	public function insert($destination){
		$sql = 'INSERT INTO destination (destination_name, destination_title, destination_details, destination_image, destination_top) VALUES (?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($destination->destinationName);
		$sqlQuery->set($destination->destinationTitle);
		$sqlQuery->set($destination->destinationDetails);
		$sqlQuery->set($destination->destinationImage);
		$sqlQuery->setNumber($destination->destinationTop);

		$id = $this->executeInsert($sqlQuery);	
		$destination->destinationId = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param DestinationMySql destination
 	 */
	public function update($destination){
		$sql = 'UPDATE destination SET destination_name = ?, destination_title = ?, destination_details = ?, destination_image = ?, destination_top = ? WHERE destination_id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($destination->destinationName);
		$sqlQuery->set($destination->destinationTitle);
		$sqlQuery->set($destination->destinationDetails);
		$sqlQuery->set($destination->destinationImage);
		$sqlQuery->setNumber($destination->destinationTop);

		$sqlQuery->setNumber($destination->destinationId);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM destination';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByDestinationName($value){
		$sql = 'SELECT * FROM destination WHERE destination_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDestinationTitle($value){
		$sql = 'SELECT * FROM destination WHERE destination_title = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDestinationDetails($value){
		$sql = 'SELECT * FROM destination WHERE destination_details = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDestinationImage($value){
		$sql = 'SELECT * FROM destination WHERE destination_image = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDestinationTop($value){
		$sql = 'SELECT * FROM destination WHERE destination_top = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByDestinationName($value){
		$sql = 'DELETE FROM destination WHERE destination_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDestinationTitle($value){
		$sql = 'DELETE FROM destination WHERE destination_title = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDestinationDetails($value){
		$sql = 'DELETE FROM destination WHERE destination_details = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDestinationImage($value){
		$sql = 'DELETE FROM destination WHERE destination_image = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDestinationTop($value){
		$sql = 'DELETE FROM destination WHERE destination_top = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return DestinationMySql 
	 */
	protected function readRow($row){
		$destination = new Destination();
		
		$destination->destinationId = $row['destination_id'];
		$destination->destinationName = $row['destination_name'];
		$destination->destinationTitle = $row['destination_title'];
		$destination->destinationDetails = $row['destination_details'];
		$destination->destinationImage = $row['destination_image'];
		$destination->destinationTop = $row['destination_top'];

		return $destination;
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
	 * @return DestinationMySql 
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