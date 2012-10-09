<?php
/**
 * Class that operate on table 'offer'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2012-09-07 17:59
 */
class OfferMySqlDAO implements OfferDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return OfferMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM offer WHERE offer_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM offer';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM offer ORDER BY '.$orderColumn.' desc';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param offer primary key
 	 */
	public function delete($offer_id){
		$sql = 'DELETE FROM offer WHERE offer_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($offer_id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param OfferMySql offer
 	 */
	public function insert($offer){
		$sql = 'INSERT INTO offer (offer_date, offer_title, offer_details, offer_home, offer_image, destination_id) VALUES (?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($offer->offerDate);
		$sqlQuery->set($offer->offerTitle);
		$sqlQuery->set($offer->offerDetails);
		$sqlQuery->setNumber($offer->offerHome);
		$sqlQuery->set($offer->offerImage);
		$sqlQuery->setNumber($offer->destinationId);

		$id = $this->executeInsert($sqlQuery);	
		$offer->offerId = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param OfferMySql offer
 	 */
	public function update($offer){
		$sql = 'UPDATE offer SET offer_date = ?, offer_title = ?, offer_details = ?, offer_home = ?, offer_image = ?, destination_id = ? WHERE offer_id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($offer->offerDate);
		$sqlQuery->set($offer->offerTitle);
		$sqlQuery->set($offer->offerDetails);
		$sqlQuery->setNumber($offer->offerHome);
		$sqlQuery->set($offer->offerImage);
		$sqlQuery->setNumber($offer->destinationId);

		$sqlQuery->setNumber($offer->offerId);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM offer';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByOfferDate($value){
		$sql = 'SELECT * FROM offer WHERE offer_date = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByOfferTitle($value){
		$sql = 'SELECT * FROM offer WHERE offer_title = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByOfferDetails($value){
		$sql = 'SELECT * FROM offer WHERE offer_details = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByOfferHome($value){
		$sql = 'SELECT * FROM offer WHERE offer_home = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByOfferImage($value){
		$sql = 'SELECT * FROM offer WHERE offer_image = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDestinationId($value){
		$sql = 'SELECT * FROM offer WHERE destination_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByOfferDate($value){
		$sql = 'DELETE FROM offer WHERE offer_date = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByOfferTitle($value){
		$sql = 'DELETE FROM offer WHERE offer_title = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByOfferDetails($value){
		$sql = 'DELETE FROM offer WHERE offer_details = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByOfferHome($value){
		$sql = 'DELETE FROM offer WHERE offer_home = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByOfferImage($value){
		$sql = 'DELETE FROM offer WHERE offer_image = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDestinationId($value){
		$sql = 'DELETE FROM offer WHERE destination_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return OfferMySql 
	 */
	protected function readRow($row){
		$offer = new Offer();
		
		$offer->offerId = $row['offer_id'];
		$offer->offerDate = $row['offer_date'];
		$offer->offerTitle = $row['offer_title'];
		$offer->offerDetails = $row['offer_details'];
		$offer->offerHome = $row['offer_home'];
		$offer->offerImage = $row['offer_image'];
		$offer->destinationId = $row['destination_id'];

		return $offer;
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
	 * @return OfferMySql 
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