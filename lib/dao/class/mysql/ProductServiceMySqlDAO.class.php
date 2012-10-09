<?php
/**
 * Class that operate on table 'product_service'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2012-09-07 15:16
 */
class ProductServiceMySqlDAO implements ProductServiceDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ProductServiceMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM product_service WHERE product_service_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM product_service';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM product_service ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param productService primary key
 	 */
	public function delete($product_service_id){
		$sql = 'DELETE FROM product_service WHERE product_service_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($product_service_id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ProductServiceMySql productService
 	 */
	public function insert($productService){
		$sql = 'INSERT INTO product_service (product_service_title, product_service_details, product_id) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($productService->productServiceTitle);
		$sqlQuery->set($productService->productServiceDetails);
		$sqlQuery->setNumber($productService->productId);

		$id = $this->executeInsert($sqlQuery);	
		$productService->productServiceId = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ProductServiceMySql productService
 	 */
	public function update($productService){
		$sql = 'UPDATE product_service SET product_service_title = ?, product_service_details = ?, product_id = ? WHERE product_service_id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($productService->productServiceTitle);
		$sqlQuery->set($productService->productServiceDetails);
		$sqlQuery->setNumber($productService->productId);

		$sqlQuery->setNumber($productService->productServiceId);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM product_service';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByProductServiceTitle($value){
		$sql = 'SELECT * FROM product_service WHERE product_service_title = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByProductServiceDetails($value){
		$sql = 'SELECT * FROM product_service WHERE product_service_details = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByProductId($value){
		$sql = 'SELECT * FROM product_service WHERE product_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByProductServiceTitle($value){
		$sql = 'DELETE FROM product_service WHERE product_service_title = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByProductServiceDetails($value){
		$sql = 'DELETE FROM product_service WHERE product_service_details = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByProductId($value){
		$sql = 'DELETE FROM product_service WHERE product_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ProductServiceMySql 
	 */
	protected function readRow($row){
		$productService = new ProductService();
		
		$productService->productServiceId = $row['product_service_id'];
		$productService->productServiceTitle = $row['product_service_title'];
		$productService->productServiceDetails = $row['product_service_details'];
		$productService->productId = $row['product_id'];

		return $productService;
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
	 * @return ProductServiceMySql 
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