<?php
/**
 * Class that operate on table 'product'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2012-09-07 15:16
 */
class ProductMySqlDAO implements ProductDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ProductMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM product WHERE product_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM product';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM product ORDER BY '.$orderColumn.' asc';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param product primary key
 	 */
	public function delete($product_id){
		$sql = 'DELETE FROM product WHERE product_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($product_id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ProductMySql product
 	 */
	public function insert($product){
		$sql = 'INSERT INTO product (product_name, product_title, product_details, product_icon, product_image) VALUES (?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($product->productName);
		$sqlQuery->set($product->productTitle);
		$sqlQuery->set($product->productDetails);
		$sqlQuery->set($product->productIcon);
		$sqlQuery->set($product->productImage);

		$id = $this->executeInsert($sqlQuery);	
		$product->productId = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ProductMySql product
 	 */
	public function update($product){
		$sql = 'UPDATE product SET product_name = ?, product_title = ?, product_details = ?, product_icon = ?, product_image = ? WHERE product_id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($product->productName);
		$sqlQuery->set($product->productTitle);
		$sqlQuery->set($product->productDetails);
		$sqlQuery->set($product->productIcon);
		$sqlQuery->set($product->productImage);

		$sqlQuery->setNumber($product->productId);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM product';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByProductName($value){
		$sql = 'SELECT * FROM product WHERE product_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByProductTitle($value){
		$sql = 'SELECT * FROM product WHERE product_title = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByProductDetails($value){
		$sql = 'SELECT * FROM product WHERE product_details = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByProductIcon($value){
		$sql = 'SELECT * FROM product WHERE product_icon = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByProductImage($value){
		$sql = 'SELECT * FROM product WHERE product_image = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByProductName($value){
		$sql = 'DELETE FROM product WHERE product_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByProductTitle($value){
		$sql = 'DELETE FROM product WHERE product_title = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByProductDetails($value){
		$sql = 'DELETE FROM product WHERE product_details = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByProductIcon($value){
		$sql = 'DELETE FROM product WHERE product_icon = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByProductImage($value){
		$sql = 'DELETE FROM product WHERE product_image = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ProductMySql 
	 */
	protected function readRow($row){
		$product = new Product();
		
		$product->productId = $row['product_id'];
		$product->productName = $row['product_name'];
		$product->productTitle = $row['product_title'];
		$product->productDetails = $row['product_details'];
		$product->productIcon = $row['product_icon'];
		$product->productImage = $row['product_image'];

		return $product;
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
	 * @return ProductMySql 
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