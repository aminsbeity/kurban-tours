<?php
/**
 * Class that operate on table 'static_page'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2012-09-07 15:16
 */
class StaticPageMySqlDAO implements StaticPageDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return StaticPageMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM static_page WHERE static_page_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM static_page';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM static_page ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param staticPage primary key
 	 */
	public function delete($static_page_id){
		$sql = 'DELETE FROM static_page WHERE static_page_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($static_page_id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param StaticPageMySql staticPage
 	 */
	public function insert($staticPage){
		$sql = 'INSERT INTO static_page (static_page_name, static_page_title, static_page_subtitle, static_page_details, static_page_image) VALUES (?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($staticPage->staticPageName);
		$sqlQuery->set($staticPage->staticPageTitle);
		$sqlQuery->set($staticPage->staticPageSubtitle);
		$sqlQuery->set($staticPage->staticPageDetails);
		$sqlQuery->set($staticPage->staticPageImage);

		$id = $this->executeInsert($sqlQuery);	
		$staticPage->staticPageId = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param StaticPageMySql staticPage
 	 */
	public function update($staticPage){
		$sql = 'UPDATE static_page SET static_page_name = ?, static_page_title = ?, static_page_subtitle = ?, static_page_details = ?, static_page_image = ? WHERE static_page_id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($staticPage->staticPageName);
		$sqlQuery->set($staticPage->staticPageTitle);
		$sqlQuery->set($staticPage->staticPageSubtitle);
		$sqlQuery->set($staticPage->staticPageDetails);
		$sqlQuery->set($staticPage->staticPageImage);

		$sqlQuery->setNumber($staticPage->staticPageId);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM static_page';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByStaticPageName($value){
		$sql = 'SELECT * FROM static_page WHERE static_page_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStaticPageTitle($value){
		$sql = 'SELECT * FROM static_page WHERE static_page_title = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStaticPageSubtitle($value){
		$sql = 'SELECT * FROM static_page WHERE static_page_subtitle = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStaticPageDetails($value){
		$sql = 'SELECT * FROM static_page WHERE static_page_details = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStaticPageImage($value){
		$sql = 'SELECT * FROM static_page WHERE static_page_image = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByStaticPageName($value){
		$sql = 'DELETE FROM static_page WHERE static_page_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStaticPageTitle($value){
		$sql = 'DELETE FROM static_page WHERE static_page_title = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStaticPageSubtitle($value){
		$sql = 'DELETE FROM static_page WHERE static_page_subtitle = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStaticPageDetails($value){
		$sql = 'DELETE FROM static_page WHERE static_page_details = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStaticPageImage($value){
		$sql = 'DELETE FROM static_page WHERE static_page_image = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return StaticPageMySql 
	 */
	protected function readRow($row){
		$staticPage = new StaticPage();
		
		$staticPage->staticPageId = $row['static_page_id'];
		$staticPage->staticPageName = $row['static_page_name'];
		$staticPage->staticPageTitle = $row['static_page_title'];
		$staticPage->staticPageSubtitle = $row['static_page_subtitle'];
		$staticPage->staticPageDetails = $row['static_page_details'];
		$staticPage->staticPageImage = $row['static_page_image'];

		return $staticPage;
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
	 * @return StaticPageMySql 
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