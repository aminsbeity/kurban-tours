<?php
/**
 * Class that operate on table 'dmc_product'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2012-09-07 15:16
 */
class DmcProductMySqlDAO implements DmcProductDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return DmcProductMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM dmc_product WHERE dmc_product_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM dmc_product';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM dmc_product ORDER BY '.$orderColumn .' asc';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param dmcProduct primary key
 	 */
	public function delete($dmc_product_id){
		$sql = 'DELETE FROM dmc_product WHERE dmc_product_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($dmc_product_id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param DmcProductMySql dmcProduct
 	 */
	public function insert($dmcProduct){
		$sql = 'INSERT INTO dmc_product (dmc_product_title, dmc_product_details) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($dmcProduct->dmcProductTitle);
		$sqlQuery->set($dmcProduct->dmcProductDetails);

		$id = $this->executeInsert($sqlQuery);	
		$dmcProduct->dmcProductId = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param DmcProductMySql dmcProduct
 	 */
	public function update($dmcProduct){
		$sql = 'UPDATE dmc_product SET dmc_product_title = ?, dmc_product_details = ? WHERE dmc_product_id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($dmcProduct->dmcProductTitle);
		$sqlQuery->set($dmcProduct->dmcProductDetails);

		$sqlQuery->setNumber($dmcProduct->dmcProductId);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM dmc_product';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByDmcProductTitle($value){
		$sql = 'SELECT * FROM dmc_product WHERE dmc_product_title = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDmcProductDetails($value){
		$sql = 'SELECT * FROM dmc_product WHERE dmc_product_details = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByDmcProductTitle($value){
		$sql = 'DELETE FROM dmc_product WHERE dmc_product_title = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDmcProductDetails($value){
		$sql = 'DELETE FROM dmc_product WHERE dmc_product_details = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return DmcProductMySql 
	 */
	protected function readRow($row){
		$dmcProduct = new DmcProduct();
		
		$dmcProduct->dmcProductId = $row['dmc_product_id'];
		$dmcProduct->dmcProductTitle = $row['dmc_product_title'];
		$dmcProduct->dmcProductDetails = $row['dmc_product_details'];

		return $dmcProduct;
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
	 * @return DmcProductMySql 
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