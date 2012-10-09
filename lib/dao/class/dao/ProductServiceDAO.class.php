<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2012-09-07 15:16
 */
interface ProductServiceDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return ProductService 
	 */
	public function load($id);

	/**
	 * Get all records from table
	 */
	public function queryAll();
	
	/**
	 * Get all records from table ordered by field
	 * @Param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn);
	
	/**
 	 * Delete record from table
 	 * @param productService primary key
 	 */
	public function delete($product_service_id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ProductService productService
 	 */
	public function insert($productService);
	
	/**
 	 * Update record in table
 	 *
 	 * @param ProductService productService
 	 */
	public function update($productService);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByProductServiceTitle($value);

	public function queryByProductServiceDetails($value);

	public function queryByProductId($value);


	public function deleteByProductServiceTitle($value);

	public function deleteByProductServiceDetails($value);

	public function deleteByProductId($value);


}
?>