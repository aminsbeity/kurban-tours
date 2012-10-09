<?php
/**
 * Class that operate on table 'latest_news'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2012-09-10 17:52
 */
class LatestNewsMySqlDAO implements LatestNewsDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return LatestNewsMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM latest_news WHERE latest_news_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM latest_news';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM latest_news ORDER BY '.$orderColumn .' desc ';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param latestNew primary key
 	 */
	public function delete($latest_news_id){
		$sql = 'DELETE FROM latest_news WHERE latest_news_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($latest_news_id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param LatestNewsMySql latestNew
 	 */
	public function insert($latestNew){
		$sql = 'INSERT INTO latest_news (latest_news_title, latest_news_details, latest_news_date, latest_news_image) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($latestNew->latestNewsTitle);
		$sqlQuery->set($latestNew->latestNewsDetails);
		$sqlQuery->set($latestNew->latestNewsDate);
		$sqlQuery->set($latestNew->latestNewsImage);

		$id = $this->executeInsert($sqlQuery);	
		$latestNew->latestNewsId = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param LatestNewsMySql latestNew
 	 */
	public function update($latestNew){
		$sql = 'UPDATE latest_news SET latest_news_title = ?, latest_news_details = ?, latest_news_date = ?, latest_news_image = ? WHERE latest_news_id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($latestNew->latestNewsTitle);
		$sqlQuery->set($latestNew->latestNewsDetails);
		$sqlQuery->set($latestNew->latestNewsDate);
		$sqlQuery->set($latestNew->latestNewsImage);

		$sqlQuery->setNumber($latestNew->latestNewsId);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM latest_news';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByLatestNewsTitle($value){
		$sql = 'SELECT * FROM latest_news WHERE latest_news_title = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLatestNewsDetails($value){
		$sql = 'SELECT * FROM latest_news WHERE latest_news_details = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLatestNewsDate($value){
		$sql = 'SELECT * FROM latest_news WHERE latest_news_date = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLatestNewsImage($value){
		$sql = 'SELECT * FROM latest_news WHERE latest_news_image = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByLatestNewsTitle($value){
		$sql = 'DELETE FROM latest_news WHERE latest_news_title = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLatestNewsDetails($value){
		$sql = 'DELETE FROM latest_news WHERE latest_news_details = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLatestNewsDate($value){
		$sql = 'DELETE FROM latest_news WHERE latest_news_date = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLatestNewsImage($value){
		$sql = 'DELETE FROM latest_news WHERE latest_news_image = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return LatestNewsMySql 
	 */
	protected function readRow($row){
		$latestNew = new LatestNew();
		
		$latestNew->latestNewsId = $row['latest_news_id'];
		$latestNew->latestNewsTitle = $row['latest_news_title'];
		$latestNew->latestNewsDetails = $row['latest_news_details'];
		$latestNew->latestNewsDate = $row['latest_news_date'];
		$latestNew->latestNewsImage = $row['latest_news_image'];

		return $latestNew;
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
	 * @return LatestNewsMySql 
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